<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ItemVendaResource\Pages;
use App\Models\ItemVenda;
use App\Models\Produto;
use App\Models\Venda;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ItemVendaResource extends Resource
{
    protected static ?string $model = ItemVenda::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('venda_id')
                    ->label('Venda')
                    ->relationship('venda', 'id') // Relacionamento com a venda
                    ->required()
                    ->searchable(),

                Forms\Components\Select::make('produto_id')
                    ->label('Produto')
                    ->relationship('produto', 'nome') // Relacionamento com o produto
                    ->required()
                    ->searchable(),

                Forms\Components\TextInput::make('quantidade')
                    ->label('Quantidade')
                    ->numeric()
                    ->required(),

                Forms\Components\TextInput::make('preco_unitario')
                    ->label('Preço Unitário')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('venda.id')
                    ->label('Venda'),

                Tables\Columns\TextColumn::make('produto.nome')
                    ->label('Produto'),

                Tables\Columns\TextColumn::make('quantidade')
                    ->label('Quantidade'),

                Tables\Columns\TextColumn::make('preco_unitario')
                    ->label('Preço Unitário')
                    ->money('BRL'),

                Tables\Columns\TextColumn::make('total')
                    ->label('Total')
                    ->formatStateUsing(function ($record) {
                        return $record->quantidade * $record->preco_unitario;
                    })
                    ->money('BRL'),
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
            'index' => Pages\ListItemVendas::route('/'),
            'create' => Pages\CreateItemVenda::route('/create'),
            'edit' => Pages\EditItemVenda::route('/{record}/edit'),
        ];
    }
}
