<?php

namespace App\Http\Controllers;

use App\blank;
use App\Http\Requests\EditBlankScreen;
use Illuminate\Http\Request;

class BlankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blank = blank::get();

        return view('blank', compact('blank'));
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
            'nomor_sekolah' => $request->nomor_sekolah,
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
    public function edit(blank $blank)
    {
        return view('edit', compact('blank'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditBlankScreen $request, blank $blank)
    {
            // return var_dump($blank);
            $blank->nomor_sekolah = $request->nomor_sekolah;
            $blank->sekolah = $request->sekolah;
            $blank->tahun = $request->tahun;
            $blank->save();

            return redirect()->route('blank.index')->with('message', 'Blank updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(blank $blank)
    {
        $blank->delete();

        return redirect()->route('blank.index')->with('message', 'Data blank berhasil dihapus!');
    }
}
