<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Akun;
use Illuminate\Support\Facades\Hash;
class AkunController extends Controller
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
        $user = User::all();

        return view('admin.akun.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $akun = Akun::all();
        // $akuns = akun::all();
        return view('admin.akun.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // $validated = $request->validate([
        //     // 'akun'   => 'required',
            
        //     'nama' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
            
        // ]);

        $akun = new User();

        // $akun->akun   = $request->akun;
        
        $akun->name = $request->name;
        $akun->email = $request->email;
        $akun->password = Hash::make($request->password);


        $akun->save();

        return redirect()->route('akun.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $akun = Akun::findOrFail($id);

        return view('admin.akun.show', compact('akun'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $akun = akun::all();
        
        // return view('admin.akun.edit', compact('akun','akuns'));

        $user = User::findOrFail($id);
        // $akuns = akun::all();

        return view('admin.akun.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $validated = $request->validate([
        //     // 'akun'   => 'required',
            
        //     'nama' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
           
        // ]);

        $akun = User::findOrFail($id);

        // $akun->akun   = $request->akun;
       
        $akun->name = $request->name;
        $akun->email = $request->email;
        $akun->password = Hash::make($request->password);
        


        $akun->save();

        return redirect()->route('akun.index')
            ->with('success', 'Data Berhasil Ditambah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user, $id)
    {
        if(!user::destroy($id)) {
            return redirect()->back();
        }

        return redirect()->route('akun.index')
        ->with('success', 'Data Berhasil Dihapus!');
    }
}
