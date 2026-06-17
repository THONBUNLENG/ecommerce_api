<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?string $navigationLabel = 'Products';
    protected static ?string $navigationGroup = 'Shop';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Product')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Basic Information')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                Forms\Components\Section::make('Product Details')
                                    ->description('Basic product information')
                                    ->schema([
                                        Forms\Components\Select::make('category_id')
                                            ->label('Category')
                                            ->options(Category::pluck('name', 'id'))
                                            ->required()
                                            ->searchable()
                                            ->preload(),
                                        Forms\Components\TextInput::make('name')
                                            ->required()
                                            ->maxLength(255)
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(fn (string $context, $state, callable $set) => $context === 'create' ? $set('slug', Str::slug($state)) : null),
                                        Forms\Components\TextInput::make('slug')
                                            ->required()
                                            ->maxLength(255)
                                            ->unique(ignoreRecord: true),
                                        Forms\Components\Textarea::make('description')
                                            ->label('Short Description')
                                            ->maxLength(500)
                                            ->columnSpanFull(),
                                        Forms\Components\RichEditor::make('long_description')
                                            ->label('Long Description')
                                            ->columnSpanFull(),
                                    ]),

                                Forms\Components\Section::make('Pricing & Inventory')
                                    ->description('Set your product pricing')
                                    ->schema([
                                        Forms\Components\Grid::make()
                                            ->schema([
                                                Forms\Components\TextInput::make('price')
                                                    ->required()
                                                    ->numeric()
                                                    ->prefix('$')
                                                    ->minValue(0),
                                                Forms\Components\TextInput::make('original_price')
                                                    ->label('Compare at price')
                                                    ->numeric()
                                                    ->prefix('$')
                                                    ->minValue(0),
                                                Forms\Components\TextInput::make('discount_price')
                                                    ->label('Discounted price')
                                                    ->numeric()
                                                    ->prefix('$')
                                                    ->minValue(0)
                                                    ->visible(fn (Forms\Get $get) => filled($get('original_price'))),
                                            ])->columns(3),
                                        Forms\Components\TextInput::make('stock_quantity')
                                            ->required()
                                            ->numeric()
                                            ->minValue(0)
                                            ->suffix('units'),
                                        Forms\Components\Select::make('stock_status')
                                            ->label('Stock Status')
                                            ->options([
                                                'in_stock' => 'In Stock',
                                                'out_of_stock' => 'Out of Stock',
                                                'on_backorder' => 'On Backorder',
                                            ])
                                            ->required()
                                            ->default('in_stock'),
                                    ]),

                            Forms\Components\Section::make('Variations')
                                     ->description('Product sizes and colors')
                                     ->schema([
                                         Forms\Components\CheckboxList::make('sizes')
                                             ->label('Product Sizes')
                                             ->options(['S' => 'S', 'M' => 'M', 'L' => 'L', 'XL' => 'XL', 'XXL' => 'XXL', '20' => '20', '30' => '30', '40' => '40'])
                                             ->columns(4),
                                         Forms\Components\Select::make('colors')
                                             ->label('Product Colors')
                                             ->options(Color::pluck('name', 'id'))
                                             ->multiple()
                                             ->searchable()
                                             ->preload(),
                                     ]),

                                Forms\Components\Section::make('Visibility')
                                    ->schema([
                                        Forms\Components\Toggle::make('is_popular')
                                            ->label('Popular Product')
                                            ->helperText('Show on homepage popular section'),
                                        Forms\Components\Toggle::make('is_latest_drop')
                                            ->label('Latest Drop')
                                            ->helperText('Show on new arrivals section'),
                                        Forms\Components\Toggle::make('is_active')
                                            ->label('Active')
                                            ->default(true),
                                    ]),
                            ]),

                        Forms\Components\Tabs\Tab::make('Variations')
                            ->icon('heroicon-o-squares-plus')
                            ->schema([
                                Forms\Components\Repeater::make('variations')
                                    ->label('Product Variations')
                                    ->relationship('variations')
                                    ->schema([
                                        Forms\Components\Select::make('color_id')
                                            ->label('Color')
                                            ->options(Color::pluck('name', 'id'))
                                            ->required()
                                            ->searchable()
                                            ->preload(),
                                        Forms\Components\Select::make('size_id')
                                            ->label('Size')
                                            ->options(Size::pluck('name', 'id'))
                                            ->required()
                                            ->searchable()
                                            ->preload(),
                                        Forms\Components\TextInput::make('stock_quantity')
                                            ->label('Stock')
                                            ->numeric()
                                            ->default(0),
                                        Forms\Components\TextInput::make('price_adjustment')
                                            ->label('Price Adjustment')
                                            ->numeric()
                                            ->prefix('$')
                                            ->default(0),
                                    ])
                                    ->grid(2)
                                    ->addActionLabel('Add Variation')
                                    ->columns(4),
                            ]),

                        Forms\Components\Tabs\Tab::make('SEO')
                            ->icon('heroicon-o-globe-alt')
                            ->schema([
                                Forms\Components\Section::make('SEO Settings')
                                    ->schema([
                                        Forms\Components\TextInput::make('meta_title')
                                            ->label('Meta Title')
                                            ->maxLength(60),
                                        Forms\Components\Textarea::make('meta_description')
                                            ->label('Meta Description')
                                            ->maxLength(160),
                                    ]),
                            ]),
                        Forms\Components\Tabs\Tab::make('Media')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                Forms\Components\Section::make('Product Images')
                                    ->schema([
                                        Forms\Components\FileUpload::make('images')
                                            ->label('Images')
                                            ->relationship('images')
                                            ->multiple()
                                            ->maxFiles(3)
                                            ->directory('products')
                                            ->disk('public')
                                            ->image()
                                            ->downloadable()
                                            ->reorderable()
                                            ->columnSpanFull(),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('stock_quantity')
                    ->sortable()
                    ->badge()
                    ->color(fn (string $state): string => $state < 10 ? 'danger' : ($state < 50 ? 'warning' : 'success')),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_popular')
                    ->label('Popular')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_latest_drop')
                    ->label('Latest')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->relationship('category', 'name'),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active')
                    ->boolean(),
                Tables\Filters\TernaryFilter::make('is_popular')
                    ->label('Popular')
                    ->boolean(),
                Tables\Filters\Filter::make('trashed')
                    ->label('Trashed Products')
                    ->query(fn (Builder $query): Builder => $query->onlyTrashed()),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make()
                    ->label('View')
                    ->url(fn (Product $record): string => route('products.show', $record)),
                Tables\Actions\DeleteAction::make()
                    ->requiresConfirmation()
                    ->modalHeading('Delete Product')
                    ->modalDescription('Are you sure you want to delete this product? This action cannot be undone.')
                    ->modalSubmitActionColor('danger'),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\BulkAction::make('deactivate')
                        ->label('Deactivate Selected')
                        ->icon('heroicon-o-eye-slash')
                        ->action(fn ($records) => $records->each->update(['is_active' => false]))
                        ->deselectRecordsAfterCompletion()
                        ->requiresConfirmation()
                        ->color('gray'),
                    Tables\Actions\DeleteBulkAction::make()
                        ->requiresConfirmation()
                        ->modalDescription('This action cannot be undone.'),
                    Tables\Actions\RestoreBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                ])
                ->selectPageSelectRecords()
            ])
            ->defaultSort('created_at', 'desc');
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