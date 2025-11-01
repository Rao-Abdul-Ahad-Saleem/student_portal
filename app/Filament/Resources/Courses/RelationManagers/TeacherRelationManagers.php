<?php

namespace App\Filament\Resources\Courses\RelationManagers;

use Filament\Actions\AssociateAction;
use Filament\Actions\CreateAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class TeachersRelationManager extends RelationManager
{
    protected static string $relationship = 'teachers'; // Matches Course::teachers()

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Teacher Name')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                Tables\Columns\TextColumn::make('designation')
                    ->label('Designation')
                    ->sortable(),

                Tables\Columns\TextColumn::make('qualification')
                    ->label('Qualification'),

                Tables\Columns\TextColumn::make('experience_years')
                    ->label('Experience (Years)')
                    ->sortable(),
            ])
            ->headerActions([

                CreateAction::make()
                    ->label('Create & Assign Teacher')
                    ->form([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('designation')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('qualification')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('experience_years')
                            ->numeric()
                            ->label('Experience (Years)'),
                    ]),

                AssociateAction::make()
                    ->preloadRecordSelect()
                    ->label('Assign Teacher'),
            ])
            ->actions([
                DissociateAction::make(),
            ])
            ->bulkActions([
                DissociateBulkAction::make(),
            ]);
    }
}
