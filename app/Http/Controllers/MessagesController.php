<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index(){
        $data = Messages::get();
        return view('admin.message.index', compact('data'));
    }
}