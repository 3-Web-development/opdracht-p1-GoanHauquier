<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Codes;

class CreateCode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:createcode';

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
        Codes::truncate();
        
        $one = rand(1, 9);
        $two = rand(1, 9);
        $three = rand(1, 9);
        $four = rand(1, 9);
        $five = rand(1, 9);
        
        $code = $one . $two . $three . $four . $five;
        
        $newCode = new Codes;
        $newCode->code = $code;
        $newCode->save();
    }
}
