<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class crudModel extends Command
{

    // EX command : php artisan crud:migration Person name,string,unique;slug,string,nullable;age,integer,nullable

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:model {model} {fillable}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a Model with fields (Eg. > php artisan crud:model Person name,slug,...)';

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
        $fillable = $this->argument()['fillable'];
        $model  = $this->argument()['model'];

        /*------------
            Duplicate And Move File
        ---------------------------------------*/
        $skeleton_file = base_path('app/Console/Skeletons/model.php');
        $new_file      = base_path('app/Models/'.$model.'.php');
        copy($skeleton_file, $new_file);

        /*------------
            Handle file
        ---------------------------------------*/
        // Get All Fields
        // Open File for reading and modification
        $text=fopen($new_file,'r');
        $contenu=file_get_contents($new_file);
        $contenuMod=str_replace(
            ['_model_', '_fillable_'],
            [$model, $fillable],
            $contenu
        );
        fclose($text);

        // ReWrite modification
        $text2=fopen($new_file,'w+');
        fwrite($text2,$contenuMod);
        fclose($text2);
        
    }
}