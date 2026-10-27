<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class OrderItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    protected static ?string $recordTitleAttribute = 'id';

    protected static ?string $title = 'Order items';

    public function form(Form $form): Form
    {
        return $form->schema([]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('productVariant.product.name')
                    ->label('Product')
                    ->placeholder('Product unavailable')
                    ->wrap(),
                Tables\Columns\TextColumn::make('productVariant.sku')
                    ->label('SKU')
                    ->placeholder('—'),
                Tables\Columns\TextColumn::make('productVariant.color')
                    ->label('Color')
                    ->placeholder('—'),
                Tables\Columns\TextColumn::make('productVariant.size')
                    ->label('Size')
                    ->placeholder('—'),
                Tables\Columns\TextColumn::make('quantity')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('unit_price')
                    ->label('Unit price')
                    ->money('USD')
                    ->sortable(),
                Tables\Columns\TextColumn::make('line_total')
                    ->label('Line total')
                    ->state(fn (Model $record): float => (float) $record->unit_price * $record->quantity)
                    ->money('USD'),
            ])
            ->headerActions([])
            ->actions([])
            ->bulkActions([]);
    }
}
