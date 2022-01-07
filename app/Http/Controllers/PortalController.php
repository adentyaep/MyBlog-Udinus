<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MainMenu;
use App\Models\Post;
use App\Models\Sliders;
use App\Models\User;
use Illuminate\Http\Request;

class PortalController extends Controller
{
    public function index(){
        $data['slider']          = Sliders::where('status', 1)->get();
        $data['posts']           = Post::where('status', 1)->get();
        $data['latestposts']     = Post::where('status', 1)->limit(5)->get();
        $data['headline']        = Post::where('status', 1)->get();
        $data['user']            = User::first();
        $data['category']        = Category::get();
        $data['mainmenu']        = MainMenu::where('status', 1)->get();
        
        return view('portal.index', compact('data'));

    }

    public function about(){
        $data['posts']           = Post::where('status', 1)->get();
        $data['latestposts']     = Post::where('status', 1)->limit(5)->get();
        $data['category']        = Category::get();
        $data['user']            = User::first();

        return view('portal.about', compact('data'));
    }

    public function postDetail($id){
        $data['posts']           = Post::where('status', 1)->get();
        $data['latestposts']     = Post::where('status', 1)->limit(5)->get();
        $data['category']        = Category::get();
        $data['comment']         = Comment::where('post_id', $id->get());
        $data['user']            = User::first();
        $posts                   = Post::find($id);

        return view('portal.post-detail', compact('posts', 'data'));
    }

    public function menu($id){
        $data['posts']           = Post::where('status', 1)->get();
        $data['latestposts']     = Post::where('status', 1)->limit(5)->get();
        $data['category']        = Category::get();
        $data['user']            = User::first();
        $data['menu']            = MainMenu::find($id);

        return view('portal.menu');
    }

    public function category($id){
        $data['posts']           = Post::where('status', 1)->get();
        $data['latestposts']     = Post::where('status', 1)->limit(5)->get();
        $data['category']        = Category::get();

        return view('portal.category');
    }

    public function search(Request $request){
        $data['posts']           = Post::where('status', 1)
                                        ->where('title','LIKE', '%'.$request->search.'%')
                                        ->orWhere('content', 'LIKE', '%'.$request->search.'%')
                                        ->get();
        $data['latestposts']     = Post::where('status', 1)->limit(5)->get();
        $data['category']        = Category::get();
        $data['user']            = User::first();

        return view('portal.search', compact('data'));
    }
}