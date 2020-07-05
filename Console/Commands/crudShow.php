<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class crudShow extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:show {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a view Show with crud system (Eg. > php artisan crud:show Todo)';

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
            Variable declaration ($model, $table, $std, $file)
        ---------------------------------------*/
        $file   = 'show';
        $model  = $this->argument()['model'];

        // In case the Model ends with a Y
        $last_word = substr($model, -1);
        if($last_word == 'y'){
            $table = strtolower(substr($model, 0, -1)).'ies';
        }else{
            $table = strtolower($model).'s';
        }
        $std    = DB::select('describe '. $table);

        /*------------
            Create new folder
        ---------------------------------------*/
        $path_name = base_path('resources/views/'.$table); 
        if (!is_dir($path_name)) {
            mkdir($path_name, 0700,true);
        }

        /*------------
            Duplicate And Move File
        ---------------------------------------*/
        $skeleton_file = base_path('app/Console/Skeletons/'.$file.'.blade.php');
        $new_file      = $path_name.'/'.$file.'.blade.php';
        copy($skeleton_file, $new_file);

        /*------------
            Handle file
        ---------------------------------------*/
        // Get All Fields
        $th_fields = [];
        $td_fields = [];
        $model_lower = strtolower($model);
        $saut = "\r\n\t\t\t";

        foreach($std as $k => $v){
            $th_fields[] = '<th scope="col">'.$v->Field.'</th>'.$saut;
            $td_fields[] = '<td>{{$'.$model_lower.'->'.$v->Field.'}}</td>'.$saut;
        }

        // Open File for reading and modification
        $text=fopen($new_file,'r');
        $contenu=file_get_contents($new_file);
        $contenuMod=str_replace(
            ['_table_', '_th_fields_', '_td_fields_', '_model_lower_'],
            [$table, implode('',$th_fields), implode('', $td_fields), $model_lower],
            $contenu
        );
        fclose($text);

        // ReWrite modification
        $text2=fopen($new_file,'w+');
        fwrite($text2,$contenuMod);
        fclose($text2);

        echo 'Success';
    }
}