<?php

namespace App\Filament\Customer\Resources\CustomerResource\Pages;

use App\Filament\Customer\Resources\CustomerResource;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;
use Illuminate\Database\Eloquent\Builder;

class ListCustomers extends ListRecords
{
    protected static string $resource = CustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            auth()->guard('web')->user()->customer ? Actions\Action::make('Data sudah dilengkapi')->color('success')->disabled() : Actions\CreateAction::make()
                ->label('Lengkapi Data Diri'),
        ];
    }

    public function getTabs(): array
    {
        return [
            'Data saya' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('user_id', auth()->guard('web')->user()->id)),
        ];
    }
}
