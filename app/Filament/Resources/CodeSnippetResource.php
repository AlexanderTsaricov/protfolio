<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CodeSnippetResource\Pages;
use App\Filament\Resources\CodeSnippetResource\RelationManagers;
use App\Models\CodeSnippet;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CodeSnippetResource extends Resource
{
    protected static ?string $model = CodeSnippet::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                RichEditor::make('code')
                    ->label('Код/Текст')
                    ->required()
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'underline',
                        'strike',
                        'h2',
                        'h3',
                        'bulletList',
                        'orderedList',
                        'blockquote',
                        'codeBlock',
                        'link',
                        'redo',
                        'undo',
                    ])
                    ->maxLength(10000),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('code'),
                Tables\Columns\TextColumn::make('stars')->sortable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([
                //
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
            'index' => Pages\ListCodeSnippets::route('/'),
            'create' => Pages\CreateCodeSnippet::route('/create'),
            'edit' => Pages\EditCodeSnippet::route('/{record}/edit'),
        ];
    }
}
