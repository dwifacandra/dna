<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class CoreOptimize extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dna:optimize {--clear : Clear the optimization cache}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Optimize the application or clear optimization cache';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if ($this->option('clear')) {
            // Menjalankan perintah artisan optimize:clear
            $this->info('Clearing optimization cache...');

            $exitCode = Artisan::call('optimize:clear');
            $this->info(Artisan::output());

            if ($exitCode === 0) {
                $this->info('Optimization cache cleared successfully.');
            } else {
                $this->error('Failed to clear optimization cache with exit code: ' . $exitCode);
            }

            // Menjalankan perintah artisan filament:optimize-clear
            $this->info('Clearing Filament optimization cache...');

            $exitCode = Artisan::call('filament:optimize-clear');
            $this->info(Artisan::output());

            if ($exitCode === 0) {
                $this->info('Filament optimization cache cleared successfully.');
            } else {
                $this->error('Failed to clear Filament optimization cache with exit code: ' . $exitCode);
            }
        } else {
            // Menjalankan perintah artisan optimize
            $this->info('Running optimization...');

            $exitCode = Artisan::call('optimize');
            $this->info(Artisan::output());

            if ($exitCode === 0) {
                $this->info('Optimization completed successfully.');
            } else {
                $this->error('Optimization failed with exit code: ' . $exitCode);
            }

            // Menjalankan perintah artisan filament:optimize
            $this->info('Running Filament optimization...');

            $exitCode = Artisan::call('filament:optimize');
            $this->info(Artisan::output());

            if ($exitCode === 0) {
                $this->info('Filament optimization completed successfully.');
            } else {
                $this->error('Filament optimization failed with exit code: ' . $exitCode);
            }
        }
    }
}
