<?php

namespace App\Console\Commands;

use App\Models\LiveCall;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;

class DisableLiveCallDispute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'live-call-disable';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Disable dispute option after 45 hours of created_at';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $cutoffTime = Carbon::now()->subMinutes(2);

        $affected = LiveCall::where('disputable', true)
            ->where('created_at', '<=', $cutoffTime)
            ->update(['disputable' => false]);

        $this->info("Dispute disabled for {$affected} calls.");
    }
}
