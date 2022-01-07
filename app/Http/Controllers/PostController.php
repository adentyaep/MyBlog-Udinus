<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function index(){
        $data = Post::get();
        return view('admin.post.index', compact('data'));
    }

    public function create(){
        $category = Category::get();
        return view('admin.post.create', compact('category'));
    }

    public function insert(Request $request){
        $request->validate(Post::$rules);
        $requests = $request->all();
        $requests['thumnail'] = "";
        if($request->hasFile('thumnail')){
            $files = Str::random(20)."-". $request->thumnail->getClientOriginalName();
            $request->file('thumnail')->move("file/post/", $files);
            $requests['thumnail'] = "file/post/" . $files;
        }

        $posts = Post::create($requests);
        if($posts){
            return redirect('admin/post')->with('status', 'Berhasil menambah data!');
        }

        return redirect('admin/post')->with('status', 'Gagal menambah data!');
    }

    public function edit($id){
        $data = Post::find($id);
        $category = Category::get();
        return view('admin.post.edit', compact('data','category'));
        
    }

    public function update(Request $request, $id){
        $d = Post::find($id);
        if($d == null){
            return redirect('admin/post')->with('status', 'Data tidak ditemukan!');

        }

        $req = $request->all();

        if($request->hasFile('thumnail')){
            if($d->thumnail !== null){
                File::delete("$d->thumnail");
            }
            
            $post = Str::random(20)."-". $request->thumnail->getClientOriginalName();
            $request->file('thumnail')->move("file/post/", $post);
            $req['thumnail'] = "file/post/". $post;

            $data = Post::find($id)->update($req);
            if($data){
                return redirect('admin/post')->with('status', 'Category berhasil diedit!');
            }
            return redirect('admin/post')->with('status', 'Gagal edit category!');
        }
    }

    public function delete($id){
        $data = Post::find($id);
        if($data == null){
            return redirect('admin/post')->with('status', 'Data tidak ditemukan!');

        }

        if($data->thumnail !== null || $data->thumnail !== ""){
            File::delete("$data->thumnail");
        }

        $delete = $data->delete();
        if($delete){
            return redirect('admin/post')->with('status', 'Berhasil Hapus Category!');
        }
        return redirect('admin/post')->with('status', 'Gagal Hapus Category');

    }
}