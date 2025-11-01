<?php

namespace App\Filament\Resources\Courses\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables;
use Filament\Tables\Table;

class CoursesTable
{
    public static function configure(Table $table): Table
    {
        return $table->columns([
            // 🆔 Course ID
            Tables\Columns\TextColumn::make('id')
                ->label('ID')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),

            // 📘 Course Name
            Tables\Columns\TextColumn::make('name')
                ->label('Course Name')
                ->searchable()
                ->sortable(),

            // 🔢 Course Code
            Tables\Columns\TextColumn::make('code')
                ->label('Code')
                ->sortable()
                ->searchable(),

            // 🏛️ Departments (many-to-many)
            Tables\Columns\TagsColumn::make('departments.name')
                ->label('Departments')
                ->limit(3)
                ->separator(',')
                ->searchable(),

            // 👩‍🏫 Teachers (many-to-many)
            Tables\Columns\TagsColumn::make('teachers.name')
                ->label('Teachers')
                ->limit(3)
                ->separator(',')
                ->searchable(),

            // 🎓 Credit Hours
            Tables\Columns\TextColumn::make('credit_hours')
                ->label('Credit Hours')
                ->sortable(),

            // 🗓️ Semester
            Tables\Columns\TextColumn::make('semester')
                ->label('Semester')
                ->sortable(),

            // 🕒 Created At
            Tables\Columns\TextColumn::make('created_at')
                ->label('Created')
                ->dateTime('d M, Y')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ])

            ->filters([
                // You can add filters later like by department or semester
            ])

            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])

            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }
}
