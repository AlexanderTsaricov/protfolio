<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LanguageInfoResource\Pages;
use App\Filament\Resources\LanguageInfoResource\RelationManagers;
use App\Models\LanguageInfo;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LanguageInfoResource extends Resource
{
    protected static ?string $model = LanguageInfo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                Textarea::make('text'),
                Select::make('type')->options([
                    'primary' => 'Primary',
                    'additional' => 'Additional'
                ])->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('text'),
                TextColumn::make('type')
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
            'index' => Pages\ListLanguageInfos::route('/'),
            'create' => Pages\CreateLanguageInfo::route('/create'),
            'edit' => Pages\EditLanguageInfo::route('/{record:name}/edit'),
        ];
    }

    public static function getLabel(): string
    {
        return 'Language info';
    }

    public static function getPluralLabel(): string
    {
        return 'Languages Info';
    }
}
