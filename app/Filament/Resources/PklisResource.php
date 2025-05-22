<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PklisResource\Pages;
use App\Filament\Resources\PklisResource\RelationManagers;
use App\Models\Pklis;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Support\Facades\Hash;
use FIlament\Tables\Columns\TextColumn;

class PklisResource extends Resource
{
    protected static ?string $model = Pklis::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'PKL';

    protected static ?string $modelLabel = 'PKL';

    protected static ?string $pluralModelLabel = 'PKL';

     public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('siswa_id')
                    ->relationship('siswa', 'nama')
                    ->label('Nama Siswa')
                    ->required(),
                Select::make('industri_id')
                    ->relationship('industri', 'nama_industri')
                    ->required(),
                Select::make('guru_id')
                    ->relationship('guru', 'nama')
                    ->label('Nama Guru Pembimbing')
                    ->required(),
                DatePicker::make('mulai')->required()->label('Tanggal Mulai'),
                DatePicker::make('selesai')->label('Tanggal Selesai'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('siswa.nama')
                    ->label('Siswa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('industri.nama_industri')
                    ->label('Industri')
                    ->searchable(),
                Tables\Columns\TextColumn::make('guru.nama')
                    ->label('Guru')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mulai')
                    ->label('Start Date')
                    ->date(),
                Tables\Columns\TextColumn::make('selesai')
                    ->label('End Date')
                    ->date(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Updated At')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListPklis::route('/'),
            'create' => Pages\CreatePklis::route('/create'),
            'edit' => Pages\EditPklis::route('/{record}/edit'),
        ];
    }
}

