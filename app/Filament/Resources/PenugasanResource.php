<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Penugasan;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Section as Section;
use App\Filament\Resources\PenugasanResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PenugasanResource\RelationManagers\PegawaiRelationManager;
use Filament\Tables\Columns\IconColumn;

class PenugasanResource extends Resource
{
    protected static ?string $model = Penugasan::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationGroup = 'Perjalanan Dinas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_st')
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_st')
                    ->required(),
                TextInput::make('dasar_st')
                    ->required(),
                TextInput::make('perihal_dasar')
                    ->required(),
                DatePicker::make('tanggal_mulai')
                    ->required(),
                DatePicker::make('tanggal_selesai')
                    ->required(),
                TextInput::make('agenda')
                    ->required(),
                TextInput::make('jenis_st')
                    ->required(),
                TextInput::make('tujuan')
                    ->required(),
                // Forms\Components\Section::make('Pegawai yang Ditugaskan')->schema([
                //     Forms\Components\Select::make('pegawai')->multiple()->relationship('pegawai', 'nama'),
                // ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_st')
                    ->searchable(),
                TextColumn::make('tanggal_mulai')
                    ->date()
                    ->sortable(),
                TextColumn::make('tanggal_selesai')
                    ->date()
                    ->sortable(),
                TextColumn::make('tujuan')->badge(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            PegawaiRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPenugasans::route('/'),
            'create' => Pages\CreatePenugasan::route('/create'),
            'view' => Pages\ViewPenugasan::route('/{record}'),
            'edit' => Pages\EditPenugasan::route('/{record}/edit'),
        ];
    }
}
