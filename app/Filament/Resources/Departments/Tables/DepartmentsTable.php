<?php

namespace App\Filament\Resources\Departments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DepartmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Department Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('code')
                    ->label('Code')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('head_of_department')
                    ->label('Head of Department')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->toggleable(),

                TextColumn::make('phone')
                    ->label('Phone')
                    ->toggleable(),

                TextColumn::make('office_location')
                    ->label('Office')
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label('Created On')
                    ->dateTime('M d, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // You can add future filters here (e.g., by department code or HOD)
            ])
            ->recordActions([
                EditAction::make()
                    ->label('Edit')
                    ->button()
                    ->color('primary'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('Delete Selected'),
                ]),
            ]);
    }
}
