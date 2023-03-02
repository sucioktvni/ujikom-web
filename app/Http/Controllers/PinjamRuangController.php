<?php

namespace App\Http\Controllers;

use App\Models\PinjamRuang;
use Illuminate\Http\Request;
use App\Models\Ruang;

class PinjamRuangController extends Controller
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
        $PinjamRuang = PinjamRuang::latest()->get();

        return view('admin.PinjamRuang.index',compact('PinjamRuang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $PinjamRuang = PinjamRuang::all();
        $Ruangs = Ruang::all();
        return view('admin.PinjamRuang.create', compact('PinjamRuang','Ruangs'));
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
            // 'PinjamRuang'   => 'required',
            'nim' => 'required',
            'nama' => 'required',
            'notes' => 'required',
            'jamu' => 'required|before_or_equal:jamse',
            'jamse' => 'required|after_or_equal:jamu',
        ]);

        $PinjamRuang = new PinjamRuang();

        // $PinjamRuang->PinjamRuang   = $request->PinjamRuang;
        $PinjamRuang->nim = $request->nim;
        $PinjamRuang->nama = $request->nama;
        $PinjamRuang->notes = $request->notes;
        $PinjamRuang->jamu = $request->jamu;
        $PinjamRuang->jamse = $request->jamse;
        
        $PinjamRuang->ruang_id = $request->ruang_id;

        if ($request->jamu >= $request->jamse){
            return back()->with('error', 'Data yang diinput tidak valid');
        }
        $PinjamRuang->save();
        return redirect('/')
            ->with('success', 'Data Berhasil Ditambah!');

            // logic
            


        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PinjamRuang  $pinjamRuang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $PinjamRuang = PinjamRuang::findOrFail($id);

        return view('admin.PinjamRuang.show', compact('PinjamRuang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PinjamRuang  $pinjamRuang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $PinjamRuang = PinjamRuang::all();
        
        // return view('admin.PinjamRuang.edit', compact('PinjamRuang','Ruangs'));

        $PinjamRuang = PinjamRuang::findOrFail($id);
        $Ruangs = Ruang::all();

        return view('admin.PinjamRuang.edit', compact('PinjamRuang','Ruangs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PinjamRuang  $pinjamRuang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PinjamRuang $pinjamRuang, $id)
    {
        $validated = $request->validate([
            // 'PinjamRuang'   => 'required',
            'nim' => 'required',
            'nama' => 'required',
            'notes' => 'required',
            'jamu' => 'required',
            'jamse' => 'required',
        ]);

        $PinjamRuang = PinjamRuang::findOrFail($id);

        // $PinjamRuang->PinjamRuang   = $request->PinjamRuang;
        $PinjamRuang->nim = $request->nim;
        $PinjamRuang->nama = $request->nama;
        $PinjamRuang->notes = $request->notes;
        $PinjamRuang->jamu = $request->jamu;
        $PinjamRuang->jamse = $request->jamse;
        $PinjamRuang->ruang_id = $request->ruang_id;


        $PinjamRuang->save();

        return redirect()->route('PinjamRuang.index')
            ->with('success', 'Data Berhasil Ditambah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PinjamRuang  $pinjamRuang
     * @return \Illuminate\Http\Response
     */
    public function destroy(PinjamRuang $pinjamRuang, $id)
    {
        if(!PinjamRuang::destroy($id)) {
            return redirect()->back();
        }

        return redirect()->route('PinjamRuang.index')
        ->with('success', 'Data Berhasil Dihapus!');
    }
}
