<?php

namespace App\Filament\Customer\Pages\Auth;

use App\Models\User;
use Filament\Pages\Auth\Register as BaseRegister;
use Filament\Forms;
use Illuminate\Support\Facades\Hash;

class Register extends BaseRegister
{
    public $name;
    public $email;
    public $phone;
    public $password;
    public $passwordConfirmation;

    protected function getForms(): array
    {
        return [
            'form' => $this
                ->makeForm()
                ->schema([
                    Forms\Components\TextInput::make('name')->required(),
                    Forms\Components\TextInput::make('email')->email()->required(),
                    Forms\Components\TextInput::make('phone')->required(),
                    Forms\Components\TextInput::make('password')
                        ->password()
                        ->required()
                        ->same('passwordConfirmation'),
                    Forms\Components\TextInput::make('passwordConfirmation')
                        ->password()
                        ->required()
                        ->label('Confirm Password')
                        ->dehydrated(false),
                ])
        ];
    }

    protected function handleRegistration(array $data): User
    {
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make($this->password),
        ]);

        $user->assignRole('customer');  // Assign the "customer" role

        return $user;
    }
}
