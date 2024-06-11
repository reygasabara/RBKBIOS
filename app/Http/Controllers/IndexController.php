<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ConsoleTVs\Charts\Facades\Charts;

class IndexController extends Controller
{
    public function index()
    {
        return view('layers.index.index', ['active'=>['index', 'beranda']]);
    }
}
