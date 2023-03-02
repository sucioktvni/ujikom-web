<?php

namespace App\Http\Controllers;

use App\Models\Ruang_multimedia;
use Illuminate\Http\Request;

class RuangMultimediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ruang_multimedia = Ruang_multimedia::all();

        return view('admin.ruang_multimedia.index',compact('ruang_multimedia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ruang_multimedia = ruang_multimedia::all();

        return view('admin.ruang_multimedia.create', compact('ruang_multimedia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            // 'ruang_multimedia'   => 'required',
            'nim' => 'required',
            'name' => 'required',
            'notes' => 'required',
            'no_pc' => 'required',
            'jamu' => 'required',
            'jamse' => 'required',
        ]);

        $ruang_multimedia = new ruang_multimedia();

        // $ruang_multimedia->ruang_multimedia   = $request->ruang_multimedia;
        $ruang_multimedia->nim = $request->nim;
        $ruang_multimedia->name = $request->name;
        $ruang_multimedia->no_pc = $request->no_pc;
        $ruang_multimedia->notes = $request->notes;
        $ruang_multimedia->jamu = $request->jamu;
        $ruang_multimedia->jamse = $request->jamse;

        $ruang_multimedia->save();

        return redirect()->route('ruang_multimedia.index')
            ->with('success', 'Data Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ruang_multimedia  $ruang_multimedia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ruang_multimedia = ruang_multimedia::findOrFail($id);

        return view('admin.ruang_multimedia.show', compact('ruang_multimedia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ruang_multimedia  $ruang_multimedia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ruang_multimedia = ruang_multimedia::findOrFail($id);

        return view('admin.ruang_multimedia.edit', compact('ruang_multimedia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ruang_multimedia  $ruang_multimedia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,$id)
    {
        $validated = $request->validate([
            // 'ruang_multimedia'   => 'required',
            'nim' => 'required',
            'name' => 'required',
            'no_pc' => 'required',
            'notes' => 'required',
            'jamu' => 'required',
            'jamse' => 'required',
        ]);

        $ruang_multimedia = ruang_multimedia::findOrFail($id);

        // $ruang_multimedia->ruang_multimedia   = $request->ruang_multimedia;
        $ruang_multimedia->nim = $request->nim;
        $ruang_multimedia->name = $request->name;
        $ruang_multimedia->no_pc = $request->no_pc;
        $ruang_multimedia->notes = $request->notes;
        $ruang_multimedia->jamu = $request->jamu;
        $ruang_multimedia->jamse = $request->jamse;
        $ruang_multimedia->save();

        return redirect()->route('ruang_multimedia.index')
            ->with('success', 'Data Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ruang_multimedia  $ruang_multimedia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!ruang_multimedia::destroy($id)) {
            return redirect()->back();
        }

        return redirect()->route('ruang_multimedia.index')
        ->with('success', 'Data Berhasil Dihapus!');
    }
}
