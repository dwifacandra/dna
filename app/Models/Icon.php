<?php

namespace App\Models;

use Sushi\Sushi;
use App\Core\Helpers\CoreIcon;
use Illuminate\{Database\Eloquent\Model, Support\Facades\Cache};

class Icon extends Model
{
    use Sushi;
    protected $fillable = [
        'preview',
        'name',
        'folder',
        'path'
    ];
    public function getRows()
    {
        return Cache::remember('core_icons', 60 * 60 * 24, function () {
            $coreIcon = new CoreIcon();
            $icons = $coreIcon->getIcons();
            return array_map(function ($iconKey) {
                $parts = explode('.', $iconKey);
                $folderName = count($parts) > 1 ? $parts[0] : 'root';
                $fileName = count($parts) > 1 ? $parts[1] : $parts[0];
                if ($folderName === 'root') {
                    $path = "svg/{$fileName}.svg";
                } else {
                    $path = "svg/{$folderName}/{$fileName}.svg";
                }
                return [
                    'preview' => $iconKey,
                    'name' => $iconKey,
                    'folder' => $folderName,
                    'path' => $path,
                ];
            }, array_keys($icons));
        });
    }
}
