<?php

namespace App\Http\Controllers;

use App\Models\Clown;
use Illuminate\Http\Request;

class ClownController extends Controller
{
    public function getAll() {
        return Clown::all();
    }

    public function setName(int $id, string $name) {
        $clown = Clown::all()->find($id)->first;
        Clown::create([
            'id' => ''
        ]);
    }
}
