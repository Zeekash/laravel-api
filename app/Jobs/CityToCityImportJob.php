<?php

namespace App\Jobs;

use App\Imports\CityToCityImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Facades\Excel;

class CityToCityImportJob implements ShouldQueue
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
        $import = new CityToCityImport($this->adminId);
        Excel::import($import, storage_path('app/' . $this->filePath));

        $summary = [
            'inserted' => $import->inserted,
            'skipped'  => $import->skipped,
        ];
        // Temp Store In Cache For Inserted or dublicated skipped Info 
        Cache::put("import_summary_{$this->adminId}", $summary, now()->addMinutes(10));
    }
}
