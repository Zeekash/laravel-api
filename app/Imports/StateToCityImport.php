<?php

namespace App\Imports;

use App\Models\CityPage;
use App\Models\StateToCityRoute;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class StateToCityImport implements ToCollection, WithChunkReading, WithBatchInserts
{
    protected $admin_id;

    public $skipped = 0;   
    public $inserted = 0;

    public function __construct($admin_id)
    {
        $this->admin_id = $admin_id;
    }

    public function collection(Collection $rows)
    {
        $batchRecords = [];
        $uniqueKeys = [];

        foreach ($rows as $row) {

            if (!CityPage::where('id', $row[1])->exists()) {
                continue;
            }

            $key = $row[0] . '_' . $row[1];

            if (isset($uniqueKeys[$key])) {
                continue;
            }

            $uniqueKeys[$key] = true;

            // Add to batch
            $batchRecords[] = [
                'state_from_id' => $row[0],
                'city_to_id'    => $row[1],
                'create_by_id'  => $this->admin_id,
                'created_at'    => now(),
                'updated_at'    => now(),
            ];
        }

        if (!empty($batchRecords)) {

            // Check REAL duplicates in DB
            $existing = StateToCityRoute::whereIn('state_from_id', array_column($batchRecords, 'state_from_id'))
                ->whereIn('city_to_id', array_column($batchRecords, 'city_to_id'))
                ->get()
                ->keyBy(fn($item) => $item->state_from_id . '_' . $item->city_to_id);

            $newRecords = [];

            foreach ($batchRecords as $record) {
                $key = $record['state_from_id'] . '_' . $record['city_to_id'];

                if ($existing->has($key)) {
                    //  ONLY REAL DUPLICATES GET COUNTED
                    $this->skipped++;
                } else {
                    $newRecords[] = $record;
                }
            }

            // Insert new ones
            if (!empty($newRecords)) {
                DB::table('state_to_city_routes')->insert($newRecords);
                $this->inserted += count($newRecords);
            }
        }
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function batchSize(): int
    {
        return 1000;
    }
}
