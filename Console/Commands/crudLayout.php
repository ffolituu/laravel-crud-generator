<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class crudLayout extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:layout';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Layout For CRUD Generator';

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
            Create new folder
        ---------------------------------------*/
        $path_name = base_path('resources/views/layout-crud'); 
        if (!is_dir($path_name)) {
            mkdir($path_name, 0700,true);
        }

        /*------------
            Duplicate And Move File
        ---------------------------------------*/
        $skeleton_file = base_path('app/Console/Skeletons/layout.blade.php');
        $new_file      = $path_name.'/layout.blade.php';
        copy($skeleton_file, $new_file);
    }
}