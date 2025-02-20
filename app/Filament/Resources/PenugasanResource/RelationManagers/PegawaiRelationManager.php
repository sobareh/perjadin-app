<?php

namespace App\Filament\Resources\PenugasanResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PegawaiRelationManager extends RelationManager
{
    protected static string $relationship = 'pegawai';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('no_sppd')
                    // ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tanggal_sppd')
                    // ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('harian')
                    // ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('penginapan')
                    // ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('dpr')
                    // ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('status')
                    // ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nama')
            ->columns([
                Tables\Columns\TextColumn::make('nama'),
                Tables\Columns\TextColumn::make('nip'),
                Tables\Columns\TextColumn::make('jabatan'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make()->label('tugaskan pegawai'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label('view SPD'),
                Tables\Actions\EditAction::make()->label('input rincian SPD'),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ]);
    }
}
