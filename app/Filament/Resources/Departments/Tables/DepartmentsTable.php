<?php

namespace App\Filament\Resources\Departments\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables;
use Filament\Tables\Table;

class DepartmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('name')
                ->label('Department Name')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('code')
                ->label('Code')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('head_of_department')
                ->label('Head of Department')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('email')
                ->label('Email'),

            Tables\Columns\TextColumn::make('phone')
                ->label('Phone'),

            Tables\Columns\TextColumn::make('office_location')
                ->label('Office'),

        ])
            ->filters([
                // optional filters (e.g., by course count) can be added later
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
