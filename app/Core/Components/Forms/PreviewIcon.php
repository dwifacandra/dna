<?php

namespace App\Core\Components\Forms;

use Filament\Forms\Components\Field;

class PreviewIcon extends Field
{
    protected string $view = 'core.components.forms.preview-icon';

    public function iconPreview(): string
    {
        return $this->getState() ?? '';
    }

    public function getIconData(): array
    {
        $icon = $this->iconPreview();
        $iconColor = '';

        // Jika $icon kosong, ambil dari record
        if (empty($icon)) {
            $record = $this->getRecord();
            $icon = $record->icon ?? '';
            $iconColor = $record->icon_color ?? '';
        }

        // Mendapatkan bagian type dan color dari $icon
        $iconType = '';
        if (!empty($icon)) {
            $iconParts = explode(':', $icon);
            $iconType = $iconParts[0] ?? ''; // Mendapatkan bagian type
            $iconColor = $iconParts[1] ?? $iconColor; // Mendapatkan bagian color, jika ada
        }

        return [
            'icon' => $iconType,
            'color' => $iconColor,
        ];
    }
}
