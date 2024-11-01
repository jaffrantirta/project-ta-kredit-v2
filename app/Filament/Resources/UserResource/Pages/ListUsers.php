<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    public function getTabs(): array
    {
        return [
            'super_admin' => Tab::make('Super Admin')
                ->modifyQueryUsing(fn (Builder $query) => $query->whereHas('roles', fn (Builder $query) => $query->where('name', 'super-admin'))),
            'admin' => Tab::make('Admin')
                ->modifyQueryUsing(fn (Builder $query) => $query->whereHas('roles', fn (Builder $query) => $query->where('name', 'admin'))),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
