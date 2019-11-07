<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Winners;

class SelectWinner extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:selectwinner';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        $winners = Winners::all();
        foreach ($winners as $winner) {
            if ($winner->isShowed != 1) {
                $winner->isShowed = 1;
            }
            $winner->save();
        }
        
        
        dd($winners);
        
    }
}
