<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Products';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->columns([
                    'sm'=>3,
                    'xl'=>3,
                    '2xl'=>3,
                ])->schema([
                    Forms\Components\Select::make('category_id')
                    ->options(
                        \App\Models\Category::all()->pluck('name', 'id')
                    )->required()->label('Category'),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('description')
                    ->maxLength(255),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                Forms\Components\TextInput::make('stock_quantity')
                    ->required()
                    ->numeric(),
                Forms\Components\FileUpload::make('image_url')
                    ->image(),
                Forms\Components\TextInput::make('orginal_price')
                    ->maxLength(255),
                Forms\Components\TextInput::make('discount_price')
                    ->maxLength(255),
                    Forms\Components\Checkbox::make('is_popular'),
                    Forms\Components\Checkbox::make('is_latest_drop'),


                // Optional: If using product_variations table
                Repeater::make('product_variations')
                    ->schema([
                        Forms\Components\Select::make('color_id')
                            ->options(
                                \App\Models\Color::all()->pluck('name', 'id')
                            )->required()->label('Color'),
                        Forms\Components\Select::make('size_id')
                            ->options(
                                \App\Models\Size::all()->pluck('name', 'id')
                            )->required()->label('Size'),
                    ])->grid(3)
                    ->addActionLabel('Add Variation')
                    ->columnSpan(3)
                    ->relationship('variations')
                ])
          
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('stock_quantity')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('image_url'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('orginal_price')
                    ->searchable(),
                Tables\Columns\TextColumn::make('discount_price')
                    ->searchable(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
