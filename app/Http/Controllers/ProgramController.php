<?php

namespace App\Http\Controllers;

use App\Edulevel;
use App\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::all();

        return view('programs.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edulevels = Edulevel::all();
        return view('programs.add', compact('edulevels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required|min:3',
        'edulevels_id' => 'required',
        ],[
            'name.required' => 'Name Programs Tidak Boleh Kosong',
            'name.min' => 'Minimal 3 Karakter Untuk Name Programs',
            'edulevels_id.required' => 'Jenjang Edulevels Tidak Boleh Kosong',
        ]);

        $programs = new Program();
        $programs->name = $request->name;
        $programs->edulevels_id = $request->edulevels_id;
        $programs->student_price = $request->student_price;
        $programs->student_max = $request->student_max;
        $programs->info = $request->info;
        $programs->save();
        return redirect('programs')->with('status', 'Anda Berhasil Menambahkan Data Baru!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        return view('programs.show', compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        $edulevels = Edulevel::all();
        return view('programs.edit', compact('program', 'edulevels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program)
    {
        $request->validate([
        'name' => 'required|min:3',
        'edulevels_id' => 'required',
        ],[
            'name.required' => 'Name Programs Tidak Boleh Kosong',
            'name.min' => 'Minimal 3 Karakter Untuk Name Programs',
            'edulevels_id.required' => 'Jenjang Edulevels Tidak Boleh Kosong',
        ]);
        $program->name = $request->name;
        $program->edulevels_id = $request->edulevels_id;
        $program->student_price = $request->student_price;
        $program->student_max = $request->student_max;
        $program->info = $request->info;
        $program->save();
        return redirect('programs')->with('status', 'Anda Berhasil Mengupdate Data Ini!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        $program->delete();
        return redirect('programs')->with('status', 'Anda Berhasil Menghapus Data Ini!');
    }
}
