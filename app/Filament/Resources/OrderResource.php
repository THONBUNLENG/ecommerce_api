<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers\OrderItemsRelationManager;
use App\Models\Order;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-receipt-percent';

    protected static ?string $navigationGroup = 'Orders';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('user_id')
                ->label('Customer')
                ->relationship('user', 'name')
                ->searchable()
                ->preload()
                ->required(),
            TextInput::make('total_amount')
                ->label('Total amount')
                ->numeric()
                ->prefix('$')
                ->minValue(0)
                ->required()
                ->live(onBlur: true)
                ->afterStateUpdated(fn ($state, callable $set) => $set('total', $state)),
            // Keep the legacy non-null orders.total column in sync.
            Hidden::make('total')->default(0)->dehydrated(),
            Select::make('payment_method')
                ->options([
                    'cod' => 'Cash on delivery',
                    'aba_khqr' => 'ABA KHQR',
                ])
                ->required(),
            Select::make('payment_status')
                ->options([
                    'pending' => 'Pending',
                    'paid' => 'Paid',
                ])
                ->default('pending')
                ->required(),
            Select::make('order_status')
                ->options([
                    'processing' => 'Processing',
                    'shipping' => 'Shipping',
                    'completed' => 'Completed',
                    'cancelled' => 'Cancelled',
                ])
                ->default('processing')
                ->required(),
            Textarea::make('shipping_address')
                ->rows(3)
                ->columnSpanFull(),
        ])->columns(2);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            TextEntry::make('id')->label('Order ID')->copyable(),
            TextEntry::make('user.name')->label('Customer'),
            TextEntry::make('total_amount')->money('USD'),
            TextEntry::make('payment_method')->badge(),
            TextEntry::make('payment_status')
                ->badge()
                ->color(fn (string $state): string => $state === 'paid' ? 'success' : 'warning'),
            TextEntry::make('order_status')->badge(),
            TextEntry::make('shipping_address')
                ->placeholder('No shipping address recorded')
                ->columnSpanFull(),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('Order ID')
                    ->formatStateUsing(fn (int $state): string => '#'.$state)
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Customer')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_amount')
                    ->label('Total')
                    ->money('USD')
                    ->sortable(),
                Tables\Columns\TextColumn::make('payment_status')
                    ->badge()
                    ->color(fn (string $state): string => $state === 'paid' ? 'success' : 'warning')
                    ->sortable(),
                Tables\Columns\SelectColumn::make('order_status')
                    ->label('Order status')
                    ->options([
                        'processing' => 'Processing',
                        'shipping' => 'Shipping',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->selectablePlaceholder(false),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('payment_status')
                    ->options([
                        'pending' => 'Pending',
                        'paid' => 'Paid',
                    ]),
                Tables\Filters\SelectFilter::make('order_status')
                    ->options([
                        'processing' => 'Processing',
                        'shipping' => 'Shipping',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            OrderItemsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
