<?php

namespace Happy\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class HappyInitCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'happy:init {--user_id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create api componenent for model';

    /**
     * Execute the console command.
     *
     * @param  \App\DripEmailer  $drip
     * @return mixed
     */
    public function handle()
    {
        if (empty($this->option('user_id'))) {
            if (! empty(User::where('name', 'happy')->first())) {
                return $this->error('Happy User already exist !');
            }

            User::insert([
                ...config('happy.user'),
                'email_verified_at' => now(),
                'password' => bcrypt('secret'),
                'created_at' => now(),
                'updated_at' => now()
            ]);

            $this->info('Happy User created !');
        }

        $user = $this->option('user_id') ? User::findOrFail($this->option('user_id')) : User::where('name', 'happy')->first();

        $this->call('passport:client', [
            '--personal' => true,
            '--user_id'=> $user->id,
            '--name' => "Happy Access"]
        );

        $this->info('Creating token for Happy');

        $this->line($user->createToken('happy')->accessToken);

        $this->comment('Sometimes your terminal can add some line break in the output be careful on copy / paste your keys !');
    }
}
