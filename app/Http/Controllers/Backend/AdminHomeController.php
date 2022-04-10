<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class AdminHomeController extends Controller
{

    public function index()
    {

        return view('admin.index');
    }
}
