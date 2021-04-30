<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class crudClear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:clear {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create all file CRUD (Eg. > php artisan crud:clear Todo)';

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
        $model  = $this->argument()['model'];

        // In case the Model ends with a Y
        $last_word = substr($model, -1);
        if($last_word == 'y'){
            $table = strtolower(substr($model, 0, -1)).'ies';
        }else{
            $table = strtolower($model).'s';
        }
        $std = DB::select('describe '. $table);

        /*------------
            Delete File to Model Folder
        ---------------------------------------*/
        if(!file_exists(base_path('app/Models/'.$model.'.php'))){
            $this->info('+ Model :  app/Models/'.$model.'.php already delete !');
        } else{
            unlink(base_path('app/Models/'.$model.'.php'));
            $this->info('+ Model :  app/Models/'.$model.'.php  delete !');
        }

        /*------------
            Delete Controller's File
        ---------------------------------------*/
        if(!file_exists(base_path('app/Http/Controllers/'.$model.'Controller.php'))){
            $this->info('+ Controller : app/Http/Controllers/'.$model.'Controller.php already delete !');
        } else{
            unlink(base_path('app/Http/Controllers/'.$model.'Controller.php'));
            $this->info('+ Controller : app/Http/Controllers/'.$model.'Controller.php delete !');
        }

        /*------------
            Delete View's File 
        ---------------------------------------*/
        $table = strtolower($table);
        if(!is_dir(base_path('resources/views/'.$table))){
            $this->info('+ View : resources/views/'.$table.' already delete !');
        } else{
            $this->rrmdir(base_path('resources/views/'.$table));
            $this->info('+ View : resources/views/'.$table.' delete !');
        }
        
        $this->comment('/!\  In the database/migrations folder. Please manually delete the file containing the "'.$table.'" table');
        $this->comment('/!\  In the route/web.php file. Please manually delete the route from the controller "'.$table.'"');


        /*------------
            Drop table in DB
        ---------------------------------------*/
        Schema::dropIfExists($table);
    }

    private function rrmdir($dir) {
        if (is_dir($dir)) {
          $objects = scandir($dir);
          foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
              if (filetype($dir."/".$object) == "dir") rmdir($dir."/".$object); else unlink($dir."/".$object);
            }
          }
          reset($objects);
          rmdir($dir);
        }
    }  
}