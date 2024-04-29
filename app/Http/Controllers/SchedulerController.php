<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SchedulerController extends Controller
{
    public function runCommand() {
        Artisan::call('schedule:run');
        alert()->success('Sukses!','Command scheduler telah dijalankan.');
        return redirect()->back();
    }
    

}
