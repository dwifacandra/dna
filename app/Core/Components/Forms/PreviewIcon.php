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
        if (empty($icon)) {
            $record = $this->getRecord();
            $icon = $record->icon ?? '';
            $iconColor = $record->icon_color ?? '';
        }
        $iconType = '';
        if (!empty($icon)) {
            $iconParts = explode(':', $icon);
            $iconType = $iconParts[0] ?? '';
            $iconColor = $iconParts[1] ?? $iconColor;
        }
        return [
            'icon' => $iconType,
            'color' => $iconColor,
        ];
    }
}
