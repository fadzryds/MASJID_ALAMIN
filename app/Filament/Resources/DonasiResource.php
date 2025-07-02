<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DonasiResource\Pages;
use App\Filament\Resources\DonasiResource\RelationManagers;
use App\Models\Donasi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DonasiResource extends Resource
{
    protected static ?string $model = Donasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_kategori')
                    ->label('Jenis Kategori')
                    ->relationship('kategori', 'jenis_kategori') 
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('id_jamaah')
                    ->label('Nama Jamaah')
                    ->relationship('jamaah', 'nama_lengkap') 
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('id_pengurus')
                    ->label('Nama Pengurus')
                    ->relationship('pengurus', 'nama_lengkap') 
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('nominal')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('jumlah_barang')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('deskripsi_barang')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\DatePicker::make('tanggal_donasi')
                    ->required(),
                Forms\Components\Radio::make('status_konfirmasi')
                    ->label('Status Konfirmasi')
                    ->options([
                        'Menunggu' => 'Menunggu',
                        'Diterima' => 'Diterima',
                        'Ditolak' => 'Ditolak',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('keterangan')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\FileUpload::make('bukti_transaksi')
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kategori.jenis_kategori'),
                Tables\Columns\TextColumn::make('jamaah.nama_lengkap'),
                Tables\Columns\TextColumn::make('pengurus.nama_lengkap'),
                Tables\Columns\TextColumn::make('nominal')->label('Jumlah Donasi')->money('IDR', true),
                Tables\Columns\TextColumn::make('jumlah_barang'),
                Tables\Columns\TextColumn::make('deskripsi_barang'),
                Tables\Columns\TextColumn::make('tanggal_donasi')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status_konfirmasi'),
                Tables\Columns\TextColumn::make('keterangan')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('bukti_transaksi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListDonasis::route('/'),
            'create' => Pages\CreateDonasi::route('/create'),
            'edit' => Pages\EditDonasi::route('/{record}/edit'),
        ];
    }
}
