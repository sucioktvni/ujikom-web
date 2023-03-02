<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $ruang = Ruang::all();

        return view('admin.ruang.index',compact('ruang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ruang.create');
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
            // 'nama_ruang' => 'required|unique:books',
            // 'image' => 'required|image|max:2048',
        ]);

        $ruang = new Ruang;
        $ruang->nama_ruang = $request->nama_ruang;
        $ruang->keterangan = $request->keterangan;
        // upload image / foto
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('image/ruang/', $name);
            $ruang->image = $name;
        }
        $ruang->save();
        return redirect()->route('ruang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ruang = Ruang::findOrFail($id);

        return view('admin.ruang.show', compact('ruang'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ruang = Ruang::findOrFail($id);

        return view('admin.ruang.edit', compact('ruang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    //     $validated = $request->validate([
    //         // 'ruang'   => 'required',
    //         // 'nama_ruang' => 'required',
            
    //    ]);
        
        
        // $ruang->ruang   = $request->ruang;
        // $ruang->nama_ruang = $request->nama_ruang;
        // $ruang->keterangan = $request->keterangan;
        // $ruang->foto = $request->foto;
        $ruang = Ruang::findOrFail($id);
        $ruang->nama_ruang = $request->nama_ruang;
        $ruang->keterangan = $request->keterangan;
        // upload image / foto
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('image/ruang/', $name);
            $ruang->image = $name;
        }

        $ruang->save();

        return redirect()->route('ruang.index')
            ->with('success', 'Data Berhasil Ditambah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!ruang::destroy($id)) {
            return redirect()->back();
        }

        return redirect()->route('ruang.index')
        ->with('success', 'Data Berhasil Dihapus!');
    }
}
