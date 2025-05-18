<?php

namespace App\Filament\Customer\Resources;

use App\Filament\Customer\Resources\CustomerResource\Pages;
use App\Filament\Customer\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Data Diri Saya';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama lengkap sesuai KTP')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('nik')
                    ->label('NIK')
                    ->required()
                    ->maxLength(16),
                Forms\Components\TextInput::make('phone')
                    ->label('Nomor HP')
                    ->required()
                    ->maxLength(13),
                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->required()
                    ->email(),
                Forms\Components\DatePicker::make('birthday')
                    ->label('Tanggal Lahir')
                    ->required(),
                Forms\Components\TextInput::make('birthplace')
                    ->label('Tempat Lahir')
                    ->required()
                    ->maxLength(50),
                Forms\Components\Select::make('gender')
                    ->label('Jenis Kelamin')
                    ->required()
                    ->options([
                        'male' => 'Laki-Laki',
                        'female' => 'Perempuan',
                    ]),
                Forms\Components\TextInput::make('address')
                    ->label('Alamat sesuai KTP')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('other_address')
                    ->label('Alamat domisili')
                    ->helperText('Kosongkan jika sama seperti alamat KTP')
                    ->maxLength(255),
                Forms\Components\TextInput::make('occupation')
                    ->label('Pekerjaan')
                    ->required()
                    ->maxLength(50),
                FileUpload::make('identity_card')
                    ->required()
                    ->downloadable()
                    ->label('KTP'),
                FileUpload::make('family_card')
                    ->required()
                    ->downloadable()
                    ->label('Kartu Keluarga'),
                FileUpload::make('guarantee_document')
                    ->label('Dokumen Jaminan')
                    ->downloadable()
                    ->required(),
                FileUpload::make('salary_slip')
                    ->label('Slip Gaji')
                    ->downloadable()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nik')
                    ->label('NIK')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->sortable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Nomor HP')
                    ->sortable(),
                Tables\Columns\TextColumn::make('birthday')
                    ->label('Tanggal Lahir')
                    ->sortable(),
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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
