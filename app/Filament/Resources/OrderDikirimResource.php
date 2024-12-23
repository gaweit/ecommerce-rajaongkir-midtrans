<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Order;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\OrderDikirim;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Actions\ActionGroup;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\OrderDikirimResource\Pages;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use App\Filament\Resources\OrderDikirimResource\RelationManagers;

class OrderDikirimResource extends Resource
{
    protected static ?string $model = Order::class;
    protected static ?string $navigationGroup = 'Orders';
    protected static ?string $navigationLabel = 'Order Dikirim';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationBadge(): ?string
    {
        return Order::where('status', 'Dikirim')->count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kode')
                    ->required()
                    ->disabled(),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->preload()
                    ->disabled()
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('produk_id')
                    ->relationship('produk', 'judul')
                    ->preload()
                    ->disabled()
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('kota_id')
                    ->relationship('kota', 'nama')
                    ->preload()
                    ->disabled()
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('ekspedisi_id')
                    ->relationship('ekspedisi', 'nama')
                    ->preload()
                    ->disabled()
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('alamat')
                    ->required()
                    ->disabled(),
                Forms\Components\TextInput::make('jumlah_order')
                    ->required()
                    ->disabled(),
                Forms\Components\TextInput::make('total')
                    ->required()
                    ->disabled(),
                Forms\Components\FileUpload::make('transfer')
                    ->disabled(),
                Forms\Components\TextInput::make('metode')
                    ->required()
                    ->disabled(),
                Forms\Components\Select::make('status')
                    ->options([
                        'Pending' => 'Pending',
                        'Diproses' => 'Diproses',
                        'Dikirim' => 'Dikirim',
                        'Diterima' => 'Diterima',
                        'Cancel' => 'Cancel',
                    ])
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(function () {
                return Order::where('status', 'Dikirim')->orderBy('id', 'Asc');
            })
            ->columns([
                Tables\Columns\TextColumn::make('kode')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('produk.judul')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kota.nama')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ekspedisi.nama')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jumlah_order')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total')
                    ->searchable(),
                Tables\Columns\TextColumn::make('metode')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('transfer')
                    ->circular()
                    ->url(fn($record) => asset('storage/' . $record->transfer)) // URL gambar asli dari storage
                    ->openUrlInNewTab() // Membuka bukti transfer di tab baru saat diklik
                    ->label('Klik Bukti'),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->searchable()
                    ->badge()
                    ->colors([
                        'primary' => 'Pending',
                        'info' => 'Diproses',
                        'secondary ' => 'Dikirim',
                        'success' => 'Diterima',
                        'danger' => 'Cancel',
                    ]),
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
                Filter::make('user_id')
                    ->label('Petugas Respon')
                    ->form([
                        Forms\Components\Select::make('user_id')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload(),
                    ])
                    ->query(function ($query, array $data) {
                        return $query->when(
                            $data['user_id'],
                            fn($query, $user_id) => $query->where('user_id', $user_id)
                        );
                    }),

                Filter::make('created_from')
                    ->form([
                        DatePicker::make('created_from')
                            ->label('Tanggal Dari'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query->when(
                            $data['created_from'],
                            fn($query, $date) => $query->whereDate('updated_at', '>=', $date)
                        );
                    }),

                Filter::make('created_to')
                    ->form([
                        DatePicker::make('created_to')
                            ->label('Tanggal Sampai'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query->when(
                            $data['created_to'],
                            fn($query, $date) => $query->whereDate('updated_at', '<=', $date)
                        );
                    }),
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
            ])
            ->bulkActions([
                ExportBulkAction::make()
                    ->label('Eksport Berdasarkan Yang Dipilih'),
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
            'index' => Pages\ListOrderDikirims::route('/'),
            'create' => Pages\CreateOrderDikirim::route('/create'),
            'edit' => Pages\EditOrderDikirim::route('/{record}/edit'),
        ];
    }
}
