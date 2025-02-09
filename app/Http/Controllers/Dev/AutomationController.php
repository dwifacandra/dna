<?php

namespace App\Http\Controllers\Dev;

use App\Core\Events\DevEvent;
use App\Models\User;
use App\Http\Controllers\Controller;
use Filament\Notifications\Notification;
use Illuminate\Support\{Str, Facades\Artisan};

class AutomationController extends Controller
{
    public function callCommand($command): void
    {
        $recipient = auth()->user();
        $exitCode = Artisan::call($command);
        $output = Str::limit(Str::of(Artisan::output())->trim(), 100);
        if ($recipient) {
            $success = $exitCode === 0;
            $containsWarning = strpos($output, 'WARNING') !== false;
            $containsInfo = strpos($output, 'INFO') !== false;
            $containsError = strpos($output, 'ERROR') !== false;
            if ($containsError) {
                $success = false;
            }
            $notificationType = 'success';
            if ($containsError) {
                $notificationType = 'danger';
            } elseif ($containsWarning) {
                $notificationType = 'warning';
            } elseif ($containsInfo) {
                $notificationType = 'info';
            }
            event(new DevEvent($recipient, $command, trim($output), $success));
            Notification::make()
                ->title(ucfirst($command) . ($success ? ' Successful' : ' Failed'))
                ->body($success ? trim($output) : 'There was an error executing the command "' . $command . '": ' . trim($output))
                ->{$notificationType}()
                ->sendToDatabase($recipient)
                ->broadcast($recipient)
                ->send();
        } else {
            Notification::make()
                ->title('There was an error executing the command')
                ->danger()
                ->sendToDatabase($recipient)
                ->broadcast($recipient)
                ->send();
        }
    }
    public function sitemap()
    {
        $exitCode = Artisan::call('sitemap:generate');
        $output = Artisan::output();
        $recipient = auth()->user();
        if (!$recipient) {
            $recipient = User::find(1);
            $recipient->name = 'Bot';
        }
        if ($recipient) {
            if ($exitCode === 0) {
                Notification::make()
                    ->title('Sitemap: Generate by ' . $recipient->name)
                    ->body(trim($output))
                    ->success()
                    ->sendToDatabase($recipient)
                    ->broadcast($recipient)
                    ->send();
            } else {
                Notification::make()
                    ->title('Sitemap: Generate by ' . $recipient->name)
                    ->body('There was an error executing the command ' . trim($output))
                    ->danger()
                    ->sendToDatabase($recipient)
                    ->broadcast($recipient)
                    ->send();
            }
        }
        return redirect('/sitemap.xml');
    }
}
