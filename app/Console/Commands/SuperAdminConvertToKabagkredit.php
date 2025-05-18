<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class SuperAdminConvertToKabagkredit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:convert-role {--from=} {--to=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Retrieve options
        $from = $this->option('from');
        $to = $this->option('to');

        $fromRole = Role::where('name', $from)->first();
        $toRole = Role::where('name', $to)->first();

        if ($fromRole && $toRole) {
            $users = User::role($fromRole)->get();

            foreach ($users as $user) {
                $user->assignRole($toRole);
            }
        }

        $this->info($from . ' role converted to ' . $to . ' role successfully.');
    }
}
