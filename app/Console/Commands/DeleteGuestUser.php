<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DeleteGuestUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:guest';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Guest User Deleted';

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
     * @return int
     */
    public function handle()
    {
        $date  = Carbon::now()->subMinutes( 60 );
        DB::table('users')->where('created_at','<', $date)
                                ->where('role_id','=', '4')
                                ->delete();
    }
}
