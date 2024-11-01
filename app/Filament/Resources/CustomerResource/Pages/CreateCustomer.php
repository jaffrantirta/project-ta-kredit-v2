<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use App\Filament\Resources\CustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\User;

class CreateCustomer extends CreateRecord
{
    protected static string $resource = CustomerResource::class;


    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['phone']),
        ]);
        $user->assignRole('customer');
        $data['user_id'] = $user->id;
        return $data;
    }
}
