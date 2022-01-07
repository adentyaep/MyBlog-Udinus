<?php

namespace App\Http\Controllers;

use App\Models\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index(){
        $data = Sliders::get();
        return view('admin.slider.index', compact('data'));
    }

    public function create(){
        return view('admin.slider.create');
    }

    public function insert(Request $request){
        $request->validate(Sliders::$rules);
        $requests = $request->all();
        $requests['image'] = "";
        if($request->hasFile('image')){
            $files = Str::random(20)."-". $request->image->getClientOriginalName();
            $request->file('image')->move("file/slider/", $files);
            $requests['image'] = "file/slider/" . $files;
        }

        $posts = Sliders::create($requests);
        if($posts){
            return redirect('admin/slider')->with('status', 'Berhasil menambah data!');
        }

        return redirect('admin/slider')->with('status', 'Gagal menambah data!');
    }

    public function edit($id){
        $data = Sliders::find($id);
        return view('admin.slider.edit', compact('data'));
        
    }

    public function update(Request $request, $id){
        $d = Sliders::find($id);
        if($d == null){
            return redirect('admin/slider')->with('status', 'Data tidak ditemukan!');

        }

        $req = $request->all();

        if($request->hasFile('image')){
            if($d->image !== null){
                File::delete("$d->image");
            }
            
            $post = Str::random(20)."-". $request->image->getClientOriginalName();
            $request->file('image')->move("file/slider/", $post);
            $req['image'] = "file/slider/". $post;

            $data = Sliders::find($id)->update($req);
            if($data){
                return redirect('admin/slider')->with('status', 'Category berhasil diedit!');
            }
            return redirect('admin/slider')->with('status', 'Gagal edit category!');
        }
    }

    public function delete($id){
        $data = Sliders::find($id);
        if($data == null){
            return redirect('admin/slider')->with('status', 'Data tidak ditemukan!');

        }

        if($data->image !== null || $data->image !== ""){
            File::delete("$data->image");
        }

        $delete = $data->delete();
        if($delete){
            return redirect('admin/slider')->with('status', 'Berhasil Hapus Slider!');
        }
        return redirect('admin/slider')->with('status', 'Gagal Hapus Slider');

    }
}