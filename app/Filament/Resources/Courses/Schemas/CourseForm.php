<?php

namespace App\Filament\Resources\Courses\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;

class CourseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('name')
                    ->label('Course Name')
                    ->required(),

                Forms\Components\TextInput::make('code')
                    ->label('Course Code')
                    ->required()
                    ->unique(ignoreRecord: true),

                Forms\Components\TextInput::make('credit_hours')
                    ->label('Credit Hours')
                    ->numeric()
                    ->default(3),

                Forms\Components\Select::make('department_id')
                    ->label('Department')
                    ->relationship('department', 'name')
                    ->required()
                    ->searchable(),

                Forms\Components\Select::make('teacher_id')
                    ->label('Assigned Teacher')
                    ->relationship('teacher', 'name')
                    ->searchable(),

                Forms\Components\TextInput::make('semester')
                    ->label('Semester')
                    ->placeholder('e.g., Fall 2025'),

                Forms\Components\Textarea::make('description')
                    ->label('Course Description')
                    ->rows(3),

            ]);
    }
}
