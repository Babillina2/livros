<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdutoResource\Pages;
use App\Models\Produto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ProdutoResource extends Resource
{
    protected static ?string $model = Produto::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->label('Nome do Produto')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('descricao')
                    ->label('Descrição')
                    ->maxLength(500),

                Forms\Components\TextInput::make('preco')
                    ->label('Preço')
                    ->numeric()
                    ->required(),

                Forms\Components\TextInput::make('estoque')
                    ->label('Estoque')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->label('Nome do Produto'),

                Tables\Columns\TextColumn::make('descricao')
                    ->label('Descrição'),

                Tables\Columns\TextColumn::make('preco')
                    ->label('Preço')
                    ->money('BRL'),

                Tables\Columns\TextColumn::make('estoque')
                    ->label('Estoque'),
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
            'index' => Pages\ListProdutos::route('/'),
            'create' => Pages\CreateProduto::route('/create'),
            'edit' => Pages\EditProduto::route('/{record}/edit'),
        ];
    }
}
