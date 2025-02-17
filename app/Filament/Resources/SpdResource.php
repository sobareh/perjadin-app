<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SpdResource\Pages;
use App\Filament\Resources\SpdResource\RelationManagers;
use App\Models\{Spd, Penugasan};
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Repeater;

class SpdResource extends Resource
{
    protected static ?string $model = Spd::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('Pilih Penugasan')
                    ->options(Penugasan::Daftar()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('no_sppd')
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_sppd')
                    ->required(),
                Forms\Components\TextInput::make('harian')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('jumlah_hari')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('penginapan')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('tiket_transport')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('dpr')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('tanggal_pencairan')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('penugasan_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('no_sppd')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_sppd')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('harian')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jumlah_hari')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('penginapan')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tiket_transport')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('dpr')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_pencairan')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSpds::route('/'),
            'create' => Pages\CreateSpd::route('/create'),
            'edit' => Pages\EditSpd::route('/{record}/edit'),
        ];
    }
}
