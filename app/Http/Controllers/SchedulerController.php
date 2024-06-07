<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Artisan;

class SchedulerController extends Controller
{
    public function runCommand()
    {
        try {
            Artisan::call('schedule:run');
            alert()->success('Sukses!', 'Command scheduler telah dijalankan.');
            return redirect()->back()->with('success', 'Command scheduler telah dijalankan.');
        } catch (QueryException $e) {
            alert()->error('gagal!', 'Command scheduler telah dijalankan.');
            return redirect()->back()->with('error', 'Gagal menjalankan command scheduler: ' . $e->getMessage());
        }
        // Artisan::call('schedule:run');
        return redirect()->back();  
    }
}
