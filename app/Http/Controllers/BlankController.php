<?php

namespace App\Http\Controllers;

use App\blank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blank = blank::get();

        return view('blank', ['blank' => $blank]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'Id_sekolah'=> 'required|numeric|unique:blank'
        // ]);
        blank::create([
            'Id_sekolah' => $request->id_sekolah,
            'sekolah' => $request->sekolah,
            'tahun' => $request->tahun,

        ]);

        return redirect()->route('blank.index')->with('message', 'User added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = blank::where('Id_sekolah', $id) ->first();
        return view('edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'Id_sekolah' => 'required|string|max:255',
            'sekolah' => 'nullable|string|max:255',
            'tahun' => 'required|string|max:255' .$id,

        ]);


       if ($request->isMethod('post')) {
             $editAdmin  =$request->all();


             blank::where(['id'=>$id])->update(['Id_sekolah'=>$editAdmin['Id_sekolah'],
             'sekolah'=>$editAdmin['sekolah'],'tahun'=>$editAdmin['tahun'],]);

             return redirect()->back()->with('flash_message_success','Data berhasil diubah ');

         }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
