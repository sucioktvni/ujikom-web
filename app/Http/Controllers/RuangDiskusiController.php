<?php

namespace App\Http\Controllers;

use App\Models\Ruang_diskusi;
use Illuminate\Http\Request;

class RuangDiskusiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ruang_diskusi = Ruang_diskusi::all();

        return view('admin.ruang_diskusi.index',compact('ruang_diskusi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ruang_diskusi = Ruang_diskusi::all();

        return view('admin.ruang_diskusi.create', compact('ruang_diskusi'));
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
            // 'ruang_diskusi'   => 'required',
            'nim' => 'required',
            'name' => 'required',
            'notes' => 'required',
        ]);

        $ruang_diskusi = new Ruang_diskusi();

        // $ruang_diskusi->ruang_diskusi   = $request->ruang_diskusi;
        $ruang_diskusi->nim = $request->nim;
        $ruang_diskusi->name = $request->name;
        $ruang_diskusi->notes = $request->notes;
        $ruang_diskusi->save();

        return redirect()->route('ruang_diskusi.index')
            ->with('success', 'Data Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ruang_diskusi  $ruang_diskusi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ruang_diskusi = Ruang_diskusi::findOrFail($id);

        return view('admin.ruang_diskusi.show', compact('ruang_diskusi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ruang_diskusi  $ruang_diskusi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ruang_diskusi = Ruang_diskusi::findOrFail($id);

        return view('admin.ruang_diskusi.edit', compact('ruang_diskusi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ruang_diskusi  $ruang_diskusi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            // 'ruang_diskusi'   => 'required',
            'nim' => 'required',
            'name' => 'required',
            'notes' => 'required',
        ]);
        
        $ruang_diskusi = ruang_diskusi::findOrFail($id);

        // $ruang_diskusi->ruang_diskusi   = $request->ruang_diskusi;
        $ruang_diskusi->nim = $request->nim;
        $ruang_diskusi->name = $request->name;
        $ruang_diskusi->notes = $request->notes;

        $ruang_diskusi->save();

        return redirect()->route('ruang_diskusi.index')
            ->with('success', 'Data Berhasil Ditambah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ruang_diskusi  $ruang_diskusi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!ruang_diskusi::destroy($id)) {
            return redirect()->back();
        }

        return redirect()->route('ruang_diskusi.index')
        ->with('success', 'Data Berhasil Dihapus!');
    }
}
