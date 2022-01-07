<?php

namespace App\Http\Controllers;

use App\Models\AboutMe;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    public function index($id){
        $data = AboutMe::find($id);
        return view('admin.profile.index', compact('data'));
    }
}