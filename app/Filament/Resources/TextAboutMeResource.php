<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TextAboutMeResource\Pages;
use App\Filament\Resources\TextAboutMeResource\RelationManagers;
use App\Models\TextAboutMe;
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

class TextAboutMeResource extends Resource
{
    protected static ?string $model = TextAboutMe::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                ->required(),
                Textarea::make('text'),
                Select::make('type')
                    ->options([
                        'personal-info' => 'personal',
                        'professional-info' => 'professional'
                    ])
                    ->reactive()
                    ->required(),
                Select::make('subtype')
                    ->options(function (callable $get) {
                        $type = $get('type');
                        if ($type == 'personal-info') {
                            return [
                                'interests' => 'interests',
                                'education' => 'education'
                            ];
                        }

                        if ($type == 'professional-info') {
                            return [
                                'front-end' => 'front-end',
                                'back-end' => 'back-end'
                            ];
                        }

                        return [];
                    })->reactive()
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('text'),
                TextColumn::make('type'),
                TextColumn::make('subtype')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\ForceDeleteBulkAction::make(),
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
            'index' => Pages\ListTextAboutMes::route('/'),
            'create' => Pages\CreateTextAboutMe::route('/create'),
            'edit' => Pages\EditTextAboutMe::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery();
    }
}
