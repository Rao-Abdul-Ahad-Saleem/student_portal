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
                // 🏷️ Course Basic Info
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

                // 📚 Semester Info
                Forms\Components\TextInput::make('semester')
                    ->label('Semester')
                    ->placeholder('e.g., Fall 2025'),

                Forms\Components\Textarea::make('description')
                    ->label('Course Description')
                    ->rows(3)
                    ->columnSpanFull(),

                // 🏛️ Many-to-Many: Departments
                Forms\Components\Select::make('departments')
                    ->label('Departments')
                    ->relationship('departments', 'name')
                    ->multiple()
                    ->preload()
                    ->searchable()
                    ->required(),

                // 👩‍🏫 Many-to-Many: Teachers
                Forms\Components\Select::make('teachers')
                    ->label('Teachers')
                    ->relationship('teachers', 'name')
                    ->multiple()
                    ->preload()
                    ->searchable(),

            ]);
    }
}
