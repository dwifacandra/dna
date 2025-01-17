<?php

namespace App\Core\Clusters\Peoples\Resources\UserResource\Forms;

use Filament\Forms\Components\{TextInput, DateTimePicker, Repeater, Tabs, Tabs\tab, Actions\Action};

class UserFormSchemes
{
    public static function getOptions(): array
    {
        return [
            Tabs::make('Tabs')
                ->tabs([
                    Tab::make('Generals')
                        ->schema([
                            TextInput::make('name')
                                ->required(),
                            TextInput::make('email')
                                ->email()
                                ->required(),
                            DateTimePicker::make('email_verified_at'),
                            TextInput::make('password')
                                ->password()
                                ->required(),
                        ])
                        ->columns(2),
                    Tab::make('Accounts')
                        ->schema([
                            Repeater::make('accounts')
                                ->relationship('accounts')
                                ->label(false)
                                ->collapsible()
                                ->columnSpanFull()
                                ->live(debounce: 500)
                                ->grid(2)
                                ->itemLabel(fn(array $state): ?string => $state['name'] ?? null)
                                ->schema(AccountFormSchemes::getOptions())
                                ->addAction(
                                    fn(Action $action) => $action->label('New Acounts'),
                                ),
                        ]),
                ])
                ->columnSpanFull()
                ->contained(false)
        ];
    }
}
