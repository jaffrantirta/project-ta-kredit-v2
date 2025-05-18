<?php

namespace App\Filament\Customer\Resources\CustomerResource\Pages;

use App\Filament\Customer\Resources\CustomerResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions;

class CreateCustomer extends CreateRecord
{
    protected static string $resource = CustomerResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->guard('web')->user()->id;

        return $data;
    }
}
