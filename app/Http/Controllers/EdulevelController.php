<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class EdulevelController extends Controller
{
    public function data(){
        $edulevels = DB::table('edulevels')->get();
        
        return view('edulevels.data', ['edulevels' => $edulevels]);
    }

    public function add(){
        return view('edulevels.add');
    }

    public function addProcess(Request $request){

        $request->validate([
        'name' => 'required|min:3',
        'desc' => 'required',
        ],[
            'name.required' => 'Jenjang Edulevels Tidak Boleh Kosong',
            'name.min' => 'Minimal 3 Karakter Untuk Name Jenjang Edulevels',
            'desc.required' => 'Description Tidak Boleh Kosong',
        ]);

        DB::table('edulevels')->insert([
            'name' => $request->name,
            'desc' => $request->desc,
            ]);
            return redirect('edulevels')->with('status', 'Anda Berhasil Menambahkan Data Baru!');
    }

    public function edit($id){
        $edulevels = DB::table('edulevels')->where('id', $id)->first();
        
        return view('edulevels.edit', compact('edulevels'));
    }

    public function editProcess(Request $request, $id){
        DB::table('edulevels')->where('id', $id)
                    ->update([
                        'name' => $request->name,
                        'desc' => $request->desc,
                    ]);
            return redirect('edulevels')->with('status', 'Anda Berhasil Mengupdate Data Ini!');
    }

    public function delete(Request $request, $id){
        DB::table('edulevels')->where('id', $id)->delete();
        return redirect('edulevels')->with('status', 'Anda Berhasil Menghapus Data Ini!');
    }
}
