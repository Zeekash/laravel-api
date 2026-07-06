<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ImportInfoController extends Controller
{
    public function checkSummary()
    {
        $key = "import_summary_" . auth()->id();
        return Cache::get($key);
    }

    public function clearSummary()
    {
        $key = "import_summary_" . auth()->id();
        Cache::forget($key);

        return response()->json(['status' => 'cleared']);
    }
}
