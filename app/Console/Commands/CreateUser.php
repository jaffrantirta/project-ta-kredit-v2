<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User; // Adjust this import based on your User model's location
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    protected $signature = 'app:create-user {--name=} {--email=} {--password=} {--role=}';

    protected $description = 'Create a new user with specified attributes';

    public function handle()
    {
        // Retrieve options
        $name = $this->option('name');
        $email = $this->option('email');
        $password = $this->option('password');
        $role = $this->option('role');

        // Validate inputs
        if (empty($name) || empty($email) || empty($password) || empty($role)) {
            $this->error('All fields (name, email, password, role) are required.');
            return 1; // Return a non-zero exit code
        }

        // Create the user
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password), // Hash the password
        ]);

        // Assign role (assuming you have a Role model and a method to assign roles)
        // Adjust this logic according to your role management implementation
        if (method_exists($user, 'assignRole')) {
            $user->assignRole($role);
        } else {
            $this->error('Role assignment method does not exist on User model.');
            return 1; // Return a non-zero exit code
        }

        // Output success message
        $this->info('User created successfully: ' . $user->email);
        return 0; // Return a success exit code
    }
}
