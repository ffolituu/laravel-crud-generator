<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class crudRoute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:route {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Route with crud system (Eg. > php artisan crud:route Todo)';

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
        $file   = 'create';
        $model  = $this->argument()['model'];

        // In case the Model ends with a Y
        $last_word = substr($model, -1);
        if($last_word == 'y'){
            $table = strtolower(substr($model, 0, -1)).'ies';
        }else{
            $table = strtolower($model).'s';
        }
        
        
        /*------------
            Handle file
        ---------------------------------------*/
        $route_file = base_path('routes/web.php');
        $modelController = $model.'Controller';

        // Open File for reading and modification
        $file=fopen($route_file,'a+');
        fwrite($file,"Route::resource('$table', App\Http\Controllers\\$modelController::class);"."\n");
        fclose($file);
        $this->info('+ Route created successfully !');
    }
}