<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriArtikel;

class KategoriArtikelController extends Controller
{
    public function index(){
        $listKategoriArtikel=KategoriArtikel::all();
        return view('kategori_artikel.index',compact('listKategoriArtikel'));
    }

    public function show($id){ 
        $kategoriArtikel=KategoriArtikel::find($id);

    
        if(empty($kategoriArtikel)){
            return redirect(route('kategori_artikel.index'));
        }

        return view('kategori_artikel.show',compact('kategoriArtikel'));
    }

    public function create(){
        return view('kategori_artikel.create');
    }

    public function store(Request $request){
        $input= $request->all();
     
     KategoriArtikel::create($input);

     return redirect(route('kategori_artikel.index'));
    }

    public function edit($id){
        $kategoriArtikel=KategoriArtikel::find($id);

        if(empty($kategoriArtikel)){
            return redirect(route('kategori_artikel.index'));
        }
        return view('kategori_artikel.edit',compact('kategoriArtikel'));
    }

    public function update($id,Request $request){
        $kategoriArtikel=KategoriArtikel::find($id);
        $input= $request->all();

        if(empty($kategoriArtikel)){
            return redirect(route('kategori_artikel.index'));
        }

        $kategoriArtikel->update($input);

        return redirect(route('kategori_artikel.index'));
    }

    public function destroy($id){
        $kategoriArtikel=KategoriArtikel::find($id);

        if(empty($kategoriArtikel)){
            return redirect(route('kategori_artikel.index'));
        }

        $kategoriArtikel->delete();
        return redirect(route('kategori_artikel.index'));
    }

    public function trash(){
        $listKategoriArtikel=KategoriArtikel::onlyTrashed();
        return view('kategori_artikel.index',compact('listKategoriArtikel'));
    }
}
