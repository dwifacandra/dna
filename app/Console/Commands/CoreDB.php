<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CoreDB extends Command
{
    protected $signature = 'db:truncate {table : The name of the table or model}';
    protected $description = 'Truncate a specified table or model. Can only be run in local environment.';

    public function handle()
    {
        // Check if the application is in local environment
        if (app()->environment('local')) {
            $table = $this->argument('table');

            // Check if the table exists
            if (Schema::hasTable($table)) {
                DB::table($table)->truncate();
                $this->info("Table '{$table}' has been truncated.");
            } else {
                // Check if the model exists
                $modelClass = 'App\\Models\\' . Str::studly(Str::singular($table));
                if (class_exists($modelClass)) {
                    $modelClass::truncate();
                    $this->info("Model '{$modelClass}' has been truncated.");
                } else {
                    $this->error("Table or model '{$table}' does not exist.");
                }
            }
        } else {
            $this->error('This command can only be run in the local environment.');
        }
    }
}
