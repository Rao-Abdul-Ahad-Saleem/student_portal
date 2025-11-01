<?php

namespace App\Filament\Resources\Teachers\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;

class TeacherForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            // 👨‍🏫 Basic Information
            Forms\Components\TextInput::make('name')
                ->label('Full Name')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('email')
                ->label('Email Address')
                ->email()
                ->required()
                ->unique(ignoreRecord: true),

            Forms\Components\TextInput::make('phone')
                ->label('Phone Number')
                ->placeholder('+92 300 1234567')
                ->maxLength(20),

            // 🧑‍🎓 Professional Info
            Forms\Components\TextInput::make('designation')
                ->label('Designation')
                ->placeholder('Lecturer, Assistant Professor, etc.')
                ->maxLength(100),

            Forms\Components\TextInput::make('qualification')
                ->label('Highest Qualification')
                ->placeholder('e.g., MSc Computer Science, PhD AI')
                ->maxLength(150),

            Forms\Components\TextInput::make('experience_years')
                ->label('Experience (Years)')
                ->numeric()
                ->default(0),

            Forms\Components\DatePicker::make('joining_date')
                ->label('Joining Date')
                ->placeholder('Select date'),

            // 🏫 Courses taught (many-to-many)
            Forms\Components\Select::make('courses')
                ->label('Courses Taught')
                ->multiple()
                ->relationship('courses', 'name')
                ->preload()
                ->searchable()
                ->helperText('Select one or more courses this teacher teaches.'),

            // 🏠 Address
            Forms\Components\Textarea::make('address')
                ->label('Address')
                ->placeholder('Residential or office address')
                ->rows(3)
                ->columnSpanFull(),
        ]);
    }
}
