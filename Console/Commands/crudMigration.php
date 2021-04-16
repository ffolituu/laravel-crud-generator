<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class crudMigration extends Command
{

    // EX command : php artisan crud:migration Person name,string,unique;slug,string,nullable;age,integer,nullable

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:migration {model} {table_fields}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create migration file with fields (Eg. > php artisan crud:migration Person name,string,unique;slug,string)';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        /*------------
            Explode table fields
        ---------------------------------------*/
        $fields = explode(';', $this->argument()['table_fields']);
        $row_option = null;
        $row_field_ouput = null;
        $fillable = null;

        foreach($fields as $row_field){
            $row = explode(',',$row_field);
            if(isset($row[3])){
                dd('sorry! but the declaration of fields only reaches 3 level. Ex: \'name(level 1),string(level 2),unique(level 3)');
            }
            if(isset($row[2])){
                $row_option = '->'.$row[2].'();'."\n\t\t\t";
            }else{
                $row_option = null;
            }

            $row_field_ouput .= '$table->'.$row[1].'(\''.$row[0].'\')'.$row_option; 
            $fillable .= '\''.$row[0].'\',';
        }


        /*------------
            Variable declaration
        ---------------------------------------*/
        $model  = $this->argument()['model'];
        
        // Plurial and In case the Model ends with a Y
        $last_word = substr($model, -1);
        if($last_word == 'y'){
            $table = strtolower(substr($model, 0, -1)).'ies';
            $model_upper = $model.'ies';
        }else{
            $table = strtolower($model).'s';
            $model_upper = $model.'s';
        }

        /*------------
            Duplicate And Move File
        ---------------------------------------*/
        $skeleton_file = base_path('app/Console/Skeletons/migration.php');
        $new_file      = base_path('database/migrations/'.date('Y').'_'.date('m').'_'.date('d').'_000000_create_'.$table.'_table.php');
        copy($skeleton_file, $new_file);

        /*------------
            Handle file
        ---------------------------------------*/
        // Get All Fields
        $model_lower = strtolower($model);

        // Open File for reading and modification
        $text=fopen($new_file,'r');
        $contenu=file_get_contents($new_file);
        $contenuMod=str_replace(
            ['_table_', '_model_', '_modelower_','_row_field_ouput_', '_modelUpper_'],
            [$table, $model, $model_lower, $row_field_ouput, $model_upper],
            $contenu
        );
        fclose($text);

        // ReWrite modification
        $text2=fopen($new_file,'w+');
        fwrite($text2,$contenuMod);
        fclose($text2);

        $this->info('+ Migration file created successfully !');
        
        /*------------
            Launch Artisan Command Migrate
        ---------------------------------------------*/
        Artisan::call('migrate');
        $this->info('+ File migrated successfully !');

        /*------------
            Launch Artisan Command Model
        ---------------------------------------------*/
        Artisan::call('crud:model',['model' => $model, 'fillable' => $fillable]);
        $this->info('+ Model file created successfully !');

        /*------------
            Launch Artisan Command CRUD CONTROLLER
        ---------------------------------------------*/
        Artisan::call('crud:controller',['model' => $model]);
        $this->info('+ Controller resource file created successfully !');

        /*------------
            Launch Artisan Command View Index
        ---------------------------------------------*/
        Artisan::call('crud:index',['model' => $model]);
        $this->info('+ View Index resource file created successfully !');

        $this->info('Info : Add this code to the web route file : Route::resource(\''.$table.'\', '.$model.'Controller::class);');
    }
}