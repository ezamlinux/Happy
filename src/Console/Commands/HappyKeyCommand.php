<?php

namespace Ezamlinux\Happy\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class HappyKeyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'happy:key {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create key for api';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @param  \App\DripEmailer  $drip
     * @return mixed
     */
    public function handle()
    {
        $happy = User::where('name', 'happy')->first();

        return $this->line($happy->createToken($this->argument('name'))->accessToken);
    }
}
