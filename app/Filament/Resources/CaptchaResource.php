<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CaptchaResource\Pages;
use App\Filament\Resources\CaptchaResource\RelationManagers;
use App\Models\Captcha;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CaptchaResource extends Resource
{
    protected static ?string $model = Captcha::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Captches';
    protected static ?string $pluralLabel = 'Captches';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('text')
                    ->label('Text')
                    ->required(),

                FileUpload::make('link')
                    ->label('Image')
                    ->image()
                    ->directory('captchas')
                    ->required(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('test')->label('Text'),
                ImageColumn::make('src')->label('Pic'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCaptchas::route('/'),
            'create' => Pages\CreateCaptcha::route('/create'),
            'edit' => Pages\EditCaptcha::route('/{record}/edit'),
        ];
    }
}
