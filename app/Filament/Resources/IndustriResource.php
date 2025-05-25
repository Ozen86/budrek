<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IndustriResource\Pages;
use App\Filament\Resources\IndustriResource\RelationManagers;
use App\Models\Industri;
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
use Illuminate\Support\Facades\Hash;
use FIlament\Tables\Columns\TextColumn;

class IndustriResource extends Resource
{
    protected static ?string $model = Industri::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';

     protected static ?string $navigationLabel = 'Industri';

    protected static ?string $modelLabel = 'Industri';

    protected static ?string $pluralModelLabel = 'Industri';

    protected static ?string $navigationGroup = 'Main Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_industri')
                    ->required()
                    ->maxLength(50),
                TextInput::make('bidang_usaha')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('alamat')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('kontak')
                    ->tel()
                    ->required()
                    ->maxLength(16),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(50)
                    ->unique(ignoreRecord: true),
                TextInput::make('website')
                    ->url()
                    ->dehydrated(true)
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama_industri')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('bidang_usaha')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat')
                    ->searchable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('kontak'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('website')
                    ->label('Website')
                    ->url(fn ($record): ?string => $record->website)
                    ->openUrlInNewTab(),
                Tables\Columns\TextColumn::make('created_at')
                    ->datetime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->datetime()
                    ->sortable(),

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
            'index' => Pages\ListIndustris::route('/'),
            'create' => Pages\CreateIndustri::route('/create'),
            'edit' => Pages\EditIndustri::route('/{record}/edit'),
        ];
    }
}
