<?php

namespace App\Filament\Resources\Departments\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;

class DepartmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            Forms\Components\TextInput::make('name')
                ->label('Department Name')
                ->placeholder('e.g., Computer Science')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('code')
                ->label('Department Code')
                ->placeholder('e.g., CS, EE, BBA')
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(10),

            Forms\Components\TextInput::make('head_of_department')
                ->label('Head of Department')
                ->placeholder('e.g., Dr. Sarah Khan')
                ->maxLength(255),

            Forms\Components\Textarea::make('description')
                ->label('Description')
                ->placeholder('Brief description of the department...')
                ->rows(3)
                ->columnSpanFull(),

            Forms\Components\TextInput::make('email')
                ->label('Email')
                ->email()
                ->placeholder('e.g., cs@university.edu'),

            Forms\Components\TextInput::make('phone')
                ->label('Phone')
                ->placeholder('e.g., +92 300 1234567'),

            Forms\Components\TextInput::make('office_location')
                ->label('Office Location')
                ->placeholder('e.g., Room 202, Admin Block'),

        ]);
    }
}
