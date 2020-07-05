<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class crudController extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:controller {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a Controller with crud system (Eg. > php artisan crud:controller Todo)';

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
            Variable declaration
        ---------------------------------------*/
        $model  = $this->argument()['model'];
        
        // In case the Model ends with a Y
        $last_word = substr($model, -1);
        if($last_word == 'y'){
            $table = strtolower(substr($model, 0, -1)).'ies';
        }else{
            $table = strtolower($model).'s';
        }

        /*------------
            Duplicate And Move File
        ---------------------------------------*/
        $skeleton_file = base_path('app/Console/Skeletons/modelController.php');
        $new_file      = base_path('app/Http/Controllers/'.$model.'Controller.php');
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
            ['_table_', '_model_', '_modelower_'],
            [$table, $model, $model_lower],
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