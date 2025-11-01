<?php

namespace App\Filament\Resources\Teachers\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables;
use Filament\Tables\Table;

class TeachersTable
{
    public static function configure(Table $table): Table
    {
        return $table->columns([
            // 👨‍🏫 Basic Info
            Tables\Columns\TextColumn::make('name')
                ->label('Name')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('designation')
                ->label('Designation')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('email')
                ->label('Email')
                ->searchable(),

            Tables\Columns\TextColumn::make('experience_years')
                ->label('Experience (Years)')
                ->sortable(),

            Tables\Columns\TextColumn::make('joining_date')
                ->label('Joining Date')
                ->date()
                ->sortable(),

            // 🎓 Courses taught (many-to-many pivot)
            Tables\Columns\TextColumn::make('courses.name')
                ->label('Courses Taught')
                ->badge() // Displays as colored badges
                ->separator(', ')
                ->wrap()
                ->searchable()
                ->limitList(3)
                ->tooltip(fn ($record) => $record->courses->pluck('name')->join(', ')),

            Tables\Columns\TextColumn::make('qualification')
                ->label('Qualification')
                ->toggleable(isToggledHiddenByDefault: true),
        ])
            ->filters([
                // (Optional) Add filters if needed later, e.g., by designation or experience
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
