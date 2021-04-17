<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $criterion = Criteria::all();
        return view('admin.pages.criterion.index', ['criterion' => $criterion]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.criterion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama'    => 'required',
            'tipe' => 'required',
        ]);

        $criteria           = new Criteria();
        $criteria->nama    = $request->nama;
        $criteria->tipe    = $request->tipe;
        $criteria->save();

        return redirect('/admin/kriteria')->with('post_success', 'Kriteria Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Criteria  $criteria
     * @return \Illuminate\Http\Response
     */
    public function show(Criteria $criteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Criteria  $criteria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $criteria = Criteria::findOrFail($id);
        return view('admin.pages.criterion.edit', [
            'criteria' => $criteria
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Criteria  $criteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama'    => 'required',
            'tipe' => 'required',
        ]);

        $criteria           = Criteria::findOrFail($id);
        $criteria->nama    = $request->nama;
        $criteria->tipe    = $request->tipe;
        $criteria->update();

        return redirect('/admin/kriteria')->with('post_success', 'Kriteria Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Criteria  $criteria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $criteria = Criteria::findOrFail($id);
        if ($criteria->delete()) {
            return response()->json([
                'success' => 'Kriteria Berhasil Dihapus',
            ]);
        }
        return response()->json([
            'error' => 'Kriteria tidak ditemukan',
        ]);
    }
}
