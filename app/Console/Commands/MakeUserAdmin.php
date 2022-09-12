<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MakeUserAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:admin {email : User email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Grant user admin capabilities';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email = $this->argument('email');

        try {
            $user = User::where('email', $email)->firstOrFail();
            $user->is_admin = true;
            $user->save();

            $this->info(sprintf('User: %s, is now an administrator', $email));
        } catch (ModelNotFoundException $e) {
            $this->error(sprintf('User: %s not found, Aborting...', $email));
            return 1;
        }

        return 0;
    }
}
