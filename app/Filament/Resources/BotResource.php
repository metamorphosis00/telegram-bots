<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BotResource\Pages;
use App\Filament\Resources\BotResource\RelationManagers;
use App\Models\Bot;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BotResource extends Resource
{
    protected static ?string $model = Bot::class;

    protected static ?string $navigationIcon = 'heroicon-s-paper-airplane';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('token')
                    ->required()
                    ->maxLength(150)
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_active')->default(true)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('token'),
                Tables\Columns\ToggleColumn::make('is_active'),
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
            RelationManagers\ChatsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBots::route('/'),
            'create' => Pages\CreateBot::route('/create'),
            'edit' => Pages\EditBot::route('/{record}/edit'),
        ];
    }
}
