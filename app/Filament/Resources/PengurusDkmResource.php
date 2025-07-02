<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengurusDkmResource\Pages;
use App\Filament\Resources\PengurusDkmResource\RelationManagers;
use App\Models\pengurus_dkm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PengurusDkmResource extends Resource
{
    protected static ?string $model = pengurus_dkm::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_lengkap')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Radio::make('jabatan')
                    ->label('Jabatan')
                    ->options([
                        'Ketua_DKM' => 'KETUA_DKM',
                        'Wakil_Ketua' => 'WAKIL_KETUA',
                        'Sekretaris' => 'SEKRETARIS',
                        'Bendahara' => 'BENDAHARA',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('no_hp')
                    ->required()
                    ->maxLength(14),
                Forms\Components\Radio::make('status_aktif')
                    ->label('Status')
                    ->options([
                        'aktif' => 'Aktif',
                        'nonaktif' => 'Nonaktif',
                    ])    
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {   
            return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_lengkap')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jabatan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_hp'),
                Tables\Columns\TextColumn::make('status_aktif'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('soft_deletes')
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
            'index' => Pages\ListPengurusDkms::route('/'),
            'create' => Pages\CreatePengurusDkm::route('/create'),
            'edit' => Pages\EditPengurusDkm::route('/{record}/edit'),
        ];
    }
}