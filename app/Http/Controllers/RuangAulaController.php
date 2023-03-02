<?php

namespace App\Http\Controllers;

use App\Models\Ruang_aula;
use Illuminate\Http\Request;

class RuangAulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ruang_aula = Ruang_aula::all();

        return view('admin.ruang_aula.index',compact('ruang_aula'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ruang_aula = Ruang_aula::all();

        return view('admin.ruang_aula.create', compact('ruang_aula'));
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
            'nama' => 'required',
            'notes' => 'required',
            'waktu' => 'required',
        ]);

        $ruang_aula = new Ruang_aula();

        // $ruang_aula->ruang_aula   = $request->ruang_aula;
        $ruang_aula->nim = $request->nim;
        $ruang_aula->nama = $request->nama;
        $ruang_aula->notes = $request->notes;
        $ruang_aula->waktu = $request->waktu;
        $ruang_aula->save();

        return redirect()->route('ruang_aula.index')
            ->with('success', 'Data Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ruang_aula  $ruang_aula
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ruang_aula = Ruang_aula::findOrFail($id);

        return view('admin.ruang_aula.show', compact('ruang_aula'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ruang_aula  $ruang_aula
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ruang_aula = Ruang_aula::findOrFail($id);

        return view('admin.ruang_aula.edit', compact('ruang_aula'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ruang_aula  $ruang_aula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            // 'ruang_multimedia'   => 'required',
            'nim' => 'required',
            'nama' => 'required',
            'notes' => 'required',
            'waktu' => 'required',
        ]);

        $ruang_aula = Ruang_aula::findOrFail($id);
        // $ruang_aula->ruang_aula   = $request->ruang_aula;
        $ruang_aula->nim = $request->nim;
        $ruang_aula->nama = $request->nama;
        $ruang_aula->notes = $request->notes;
        $ruang_aula->waktu = $request->waktu;
        $ruang_aula->save();

        return redirect()->route('ruang_aula.index')
            ->with('success', 'Data Berhasil Ditambah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ruang_aula  $ruang_aula
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!ruang_aula::destroy($id)) {
            return redirect()->back();
        }

        return redirect()->route('ruang_aula.index')
        ->with('success', 'Data Berhasil Dihapus!');
    }
}
