<?php

namespace App\Http\Controllers;

use App\Models\Farm;

class FarmController extends Controller
{
    public function getAll()
    {
        return Farm::all();
    }
}
