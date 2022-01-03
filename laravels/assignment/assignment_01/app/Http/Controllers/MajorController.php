<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Major;
use Illuminate\Support\Facades\Gate;

class MajorController extends Controller
{
    public function create()
    {
        $major = new Major;
        $major->name = request()->name;
        $major->save();
        return back();
    }
    public function delete($id)
    {
        $major = Major::find($id);
        $major->delete();
        return back();
    }
}
