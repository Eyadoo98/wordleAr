<?php

namespace App\Http\Controllers\WordleAr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StatusController extends Controller
{
    public function getStatus(): View
    {
        return view('partials.WordleAr.status');
    }
}
