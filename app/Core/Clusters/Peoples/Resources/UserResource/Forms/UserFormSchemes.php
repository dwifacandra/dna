<?php

namespace App\Core\Clusters\Peoples\Resources\UserResource\Forms;

use App\Core\Enums\Gender;
use Illuminate\Support\Facades\Hash;
use Filament\Support\Enums\Alignment;
use Filament\Forms\Components\{TextInput, DateTimePicker, Repeater, Tabs, Tabs\Tab, Actions\Action, Section, SpatieMediaLibraryFileUpload, Split, ToggleButtons, DatePicker, Select};

class UserFormSchemes
{
    public static function getOptions(): array
    {
        return [
            Tabs::make('Tabs')
                ->tabs([
                    Tab::make('Personal Info')
                        ->schema([
                            TextInput::make('name')
                                ->required(),
                            DatePicker::make('birthday')
                                ->format('Y-m-d'),
                            ToggleButtons::make('gender')
                                ->options(Gender::class)
                                ->nullable()
                                ->inline()
                                ->grouped(),
                        ]),
                    Tab::make('Contact')
                        ->schema([
                            TextInput::make('phone')
                                ->tel()
                                ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/'),
                            TextInput::make('email')
                                ->email()
                                ->required(),
                            DateTimePicker::make('email_verified_at'),
                        ]),
                    Tab::make('Social Media')
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
                                ->addActionAlignment(Alignment::Start)
                                ->addAction(
                                    fn(Action $action) => $action->label('New Acounts'),
                                ),
                        ]),
                    Tab::make('Security')
                        ->schema([
                            Select::make('roles')
                                ->preload()
                                ->native(false)
                                ->relationship('roles', 'name'),
                            TextInput::make('password')
                                ->password()
                                ->revealable()
                                ->maxLength(255)
                                ->dehydrateStateUsing(fn(string $state): string => Hash::make($state))
                                ->dehydrated(fn(?string $state): bool => filled($state))
                                ->required(fn(string $operation): bool => $operation === 'create'),
                        ]),
                    Tab::make('Photo')
                        ->schema([
                            SpatieMediaLibraryFileUpload::make('avatar')
                                ->collection('users_avatar')
                                ->visibility('private')
                                ->image()
                                ->imageEditor()
                                ->nullable()
                                ->alignCenter(),
                        ]),
                ])
                ->columnSpanFull()
                ->contained(false)
        ];
    }
}
