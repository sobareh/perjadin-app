<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Penugasan;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Section as Section;
use App\Filament\Resources\PenugasanResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PenugasanResource\RelationManagers\PegawaiRelationManager;

class PenugasanResource extends Resource
{
    protected static ?string $model = Penugasan::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationGroup = 'Perjalanan Dinas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                ->schema([
                    Section::make('Detail Perjalanan Dinas')
                        ->schema([
                            TextInput::make('nama_st')
                                ->required(),
                            DatePicker::make('tanggal_st')
                                ->label('Tanggal ST')
                                ->native(false)
                                ->displayFormat('d mm Y')
                                ->required(),
                            TextInput::make('dasar_st')
                                ->required(),
                            TextInput::make('perihal_dasar')
                                ->required(),
                            Textarea::make('agenda')
                                ->required(),
                            TextInput::make('jenis_st')
                                ->required(),
                            TextInput::make('tujuan')
                                ->required(),
                    ])->columns(2)
                ])->columnSpan(['lg' => 2]),
                Group::make()
                    ->schema([
                        Section::make('Waktu')
                            // ->description('Prevent abuse by limiting the number of requests per period')
                            ->schema([
                                DatePicker::make('tanggal_mulai')
                                    ->required(),
                                DatePicker::make('tanggal_selesai')
                                    ->required(),
                            ])
                ])->columnSpan(['lg' => 1]),
                // Forms\Components\Section::make('Pegawai yang Ditugaskan')->schema([
                //     Forms\Components\Select::make('pegawai')->multiple()->relationship('pegawai', 'nama'),
                // ]),
            ])->columns(3);
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
                TextColumn::make('tujuan')->badge()->color('danger'),
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
