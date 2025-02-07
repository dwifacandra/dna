<?php

namespace App\Http\Controllers\Dev;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Filament\Notifications\Notification;
use Illuminate\Support\{Str, Facades\Artisan};

class AutomationController extends Controller
{
    public function command(Request $request)
    {
        $command = $request->route('command');
        $exitCode = Artisan::call($command);
        $output = Str::limit(Str::of(Artisan::output())->trim(), 100);
        $recipient = auth()->user();
        if ($recipient) {
            if ($exitCode === 0) {
                Notification::make()
                    ->title(ucfirst($command) . ' Successful')
                    ->body(trim($output))
                    ->success()
                    ->sendToDatabase($recipient);
            } else {
                Notification::make()
                    ->title(ucfirst($command) . ' Failed')
                    ->body('There was an error executing the command "' . $command . '": ' . trim($output))
                    ->danger()
                    ->sendToDatabase($recipient);
            }
        }
        return redirect()->back();
    }
    public function link()
    {
        $exitCode = Artisan::call('storage:link');
        $output = Artisan::output();
        $recipient = auth()->user();
        if ($exitCode === 0 && $recipient) {
            if (strpos($output, 'ERROR') === false) {
                Notification::make()
                    ->title('Storage: Link')
                    ->body('Storage has been successfully linked.')
                    ->success()
                    ->sendToDatabase($recipient);
            } else {
                Notification::make()
                    ->title('Storage: Link')
                    ->body('Warning: ' . Str::replace('ERROR', '', trim($output)))
                    ->warning()
                    ->sendToDatabase($recipient);
            }
        } elseif ($recipient) {
            Notification::make()
                ->title('Storage: Link')
                ->body('There was an error linking the storage: ' . trim($output))
                ->danger()
                ->sendToDatabase($recipient);
        }
        return redirect()->back();
    }
    public function unlink()
    {
        $exitCode = Artisan::call('storage:unlink');
        $output = Artisan::output();
        $recipient = auth()->user();
        if ($exitCode === 0 && $recipient) {
            Notification::make()
                ->title('Storage: Unlink')
                ->body($output)
                ->success()
                ->sendToDatabase($recipient);
        } elseif ($recipient) {
            Notification::make()
                ->title('Storage: Unlink')
                ->body('There was an error unlinking the storage: ' . trim($output))
                ->danger()
                ->sendToDatabase($recipient);
        }
        return redirect()->back();
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
                    ->sendToDatabase($recipient);
            } else {
                Notification::make()
                    ->title('Sitemap: Generate by ' . $recipient->name)
                    ->body('There was an error executing the command ' . trim($output))
                    ->danger()
                    ->sendToDatabase($recipient);
            }
        }
        return redirect('/sitemap.xml');
    }
}
