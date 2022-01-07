<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MainMenu;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class MainmenuController extends Controller
{
    public function index(){
        $data = MainMenu::get();
        return view('admin.mainmenu.index', compact('data'));
    }

    public function create(){
        $parent = Post::get();
        return view('admin.mainmenu.create', compact('parent'));
    }

    public function insert(Request $request){
        $request->validate(MainMenu::$rules);
        $requests = $request->all();
        $requests['file'] = "";
        if($request->hasFile('file')){
            $files = Str::random(20)."-". $request->file->getClientOriginalName();
            $request->file('file')->move("file/mainmenu/", $files);
            $requests['file'] = "file/mainmenu/" . $files;
        }

        $posts = MainMenu::create($requests);
        if($posts){
            return redirect('admin/mainmenu')->with('status', 'Berhasil menambah data!');
        }

        return redirect('admin/mainmenu')->with('status', 'Gagal menambah data!');
    }

    public function edit($id){
        $data = MainMenu::find($id);
        $parent = Post::get();
        return view('admin.mainmenu.edit', compact('data','parent'));
        
    }

    public function update(Request $request, $id){
        $d = MainMenu::find($id);
        if($d == null){
             return redirect('admin/mainmenu')->with('status', 'Data tidak ditemukan!');
        }

        $req = $request->all();

        if($request->hasFile('file')){
            if($d->file !== null){
                File::delete("$d->file");
            }
            
            $files = Str::random(20)."-". $request->file->getClientOriginalName();
            $request->file('file')->move("file/mainmenu/", $files);
            $req['file'] = "file/mainmenu/". $files;

            $data = MainMenu::find($id)->update($req);
            if($data){
                return redirect('admin/mainmenu')->with('status', 'MainMenu berhasil diedit!');
            }

            return redirect('admin/mainmenu')->with('status', 'Gagal edit MainMenu!');
        }else{
            File::delete("$d->file");
            $data = MainMenu::find($id)->update($req);
            if($data){
                return redirect('admin/mainmenu')->with('status', 'MainMenu berhasil diedit!');
            }
            return redirect('admin/mainmenu')->with('status', 'Gagal edit MainMenu!');

        }
        
        //return redirect('admin/mainmenu')->with('status','Kembali');
    }

    public function delete($id){
        $data = MainMenu::find($id);
        if($data == null){
            return redirect('admin/mainmenu')->with('status', 'Data tidak ditemukan!');

        }

        if($data->file !== null || $data->file !== ""){
            File::delete("$data->file");
        }

        $delete = $data->delete();
        if($delete){
            return redirect('admin/mainmenu')->with('status', 'Berhasil Hapus data MainMenu!');
        }
        return redirect('admin/mainmenu')->with('status', 'Gagal Hapus data MainMenu');

    }
}