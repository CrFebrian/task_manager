<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\resources\views;
use Illuminate\View\View;
use App\Models\Task;

class UserController extends Controller
{
    //
    public function tampil(): View
    {
        return view ('welcome');
    }

    public function show(string $id)
    {
        $data = Task::find($id);
        return view ('profile', ['dataku'=>$data, 'data2'=>10]);
    }
}
