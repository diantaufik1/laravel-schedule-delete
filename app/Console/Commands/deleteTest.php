<?php

namespace App\Console\Commands;

use App\Models\test;
use Illuminate\Console\Command;
use Carbon\Carbon;
use DateInterval;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class deleteTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description hapus';

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
        $hari = -1;
        $dt   = Carbon::now();
        $date = $dt->addDay($hari)->toDateString();
        $tests = test::where('tanggal', $date)->get();
        foreach ($tests as $test) {
           test::find($test->id)->delete();
        }
        Log::info($date);

    }
}
