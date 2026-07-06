<?php

namespace App\Jobs;

use App\Imports\StateToCityImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class StateToCityimportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $filePath;
    protected $adminId;

    public function __construct($filePath, $adminId)
    {
        $this->filePath = $filePath;
        $this->adminId = $adminId;
    }

    public function handle()
    {
        $import = new StateToCityImport($this->adminId);
        Excel::import($import, storage_path('app/' . $this->filePath));

        $summary = [
            'inserted' => $import->inserted,
            'skipped'  => $import->skipped,
        ];
        // Temp Store In Cache For Inserted or dublicated skipped Info 
        Cache::put("import_summary_{$this->adminId}", $summary, now()->addMinutes(10));
    }
}
