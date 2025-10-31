<?php

namespace App\Filament\Resources\Teachers\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;

class TeacherForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Forms\Components\TextInput::make('name')
                    ->label('Full Name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->unique(ignoreRecord: true)
                    ->required(),

                Forms\Components\TextInput::make('phone')
                    ->label('Phone Number')
                    ->maxLength(20),

                Forms\Components\Select::make('designation')
                    ->label('Designation')
                    ->options([
                        'Lecturer' => 'Lecturer',
                        'Assistant Professor' => 'Assistant Professor',
                        'Associate Professor' => 'Associate Professor',
                        'Professor' => 'Professor',
                    ])
                    ->required(),

                Forms\Components\Select::make('department_id')
                    ->label('Department')
                    ->relationship('department', 'name')
                    ->preload()
                    ->searchable()
                    ->required(),

                Forms\Components\TextInput::make('qualification')
                    ->label('Qualification')
                    ->maxLength(255),

                Forms\Components\TextInput::make('experience_years')
                    ->label('Experience (Years)')
                    ->numeric()
                    ->default(0),

                Forms\Components\DatePicker::make('joining_date')
                    ->label('Joining Date'),

                Forms\Components\Textarea::make('address')
                    ->label('Address')
                    ->rows(3),

            ]);
    }
}
