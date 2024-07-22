<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsModelResource\Pages;
use App\Filament\Resources\NewsModelResource\RelationManagers;
use App\Models\NewsModel;
use Filament\Forms;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NewsModelResource extends Resource
{
    protected static ?string $model = NewsModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('TextInput')
                    ->maxLength(255)
                    ->columnSpanFull(),
                RichEditor::make('description')
                    ->label('RichEditor')
                    ->columnSpanFull(),
                MarkdownEditor::make('content')
                    ->label('MarkdownEditor')
                    ->columnSpanFull(),
                Textarea::make('description')
                    ->label('Textarea')
                    ->rows(7)
                    ->columnSpanFull(),
                TextInput::make('slug')
                    ->label('TextInput')
                    ->maxLength(255),
                TextInput::make('sort')
                    ->label('TextInput')
                    ->maxLength(255)
                    ->default(500),
                Toggle::make('is_visible')
                    ->label('OFF|ON')
                    ->onColor('danger')
                    ->offColor('success')
                    ->inline(false)
                    ->onIcon('heroicon-m-bolt')
                    ->offIcon('heroicon-m-user'),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sort')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_visible')
                    ->boolean(),
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
            'index' => Pages\ListNewsModels::route('/'),
            'create' => Pages\CreateNewsModel::route('/create'),
            'edit' => Pages\EditNewsModel::route('/{record}/edit'),
        ];
    }
}
