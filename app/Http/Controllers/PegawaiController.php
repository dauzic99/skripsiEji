<?php

namespace App\Http\Controllers;

use App\Models\Bagian;
use App\Models\Criteria;
use App\Models\Pegawai;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use File;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawais = Pegawai::all();
        return view('admin.pages.pegawai.index', ['pegawais' => $pegawais]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bagian = Bagian::all();
        return view('admin.pages.pegawai.create', compact('bagian'));
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
            'bagian_id'    => 'required',
            'cover'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        // pindah file gambar
        $imageName = 'pegawai-cover-' . time() . '.' . $request->cover->extension();
        $request->cover->move(public_path('images/pegawai/cover'), $imageName);

        $pegawai           = new Pegawai();
        $pegawai->nama    = $request->nama;
        $pegawai->slug     = SlugService::createSlug(Pegawai::class, 'slug', $request->nama);
        $pegawai->bagian_id    = $request->bagian_id;
        $pegawai->cover    = $imageName;
        $pegawai->save();
        return redirect('/admin/pegawai')->with('post_success', 'Pegawai Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $pegawai = Pegawai::where('slug', $slug)->first();

        $criterion = Criteria::all();
        for ($i = 0; $i < count($criterion); $i++) {
            $nilai = Penilaian::where('pegawai_id', $pegawai->id)->where('criteria_id', $criterion[$i]['id'])->first();
            if ($nilai != null) {
                $criterion[$i]['nilai'] = $nilai->nilai;
                # code...
            }
        }

        return view('admin.pages.pegawai.form', [
            'criterion' => $criterion,
            'pegawai' => $pegawai,
        ]);
    }

    public function penilaian(Request $request)
    {
        $arrayNilai = $request->arrayNilai;
        if ($request->ajax()) {
            $delete = Penilaian::where('pegawai_id', intval($arrayNilai[0]['pegawai_id']));
            $delete->delete();
            foreach ($arrayNilai as $key => $value) {
                $penilaian = new Penilaian();
                $penilaian->pegawai_id = intval($value['pegawai_id']);
                $penilaian->criteria_id = intval($value['criteria_id']);
                $penilaian->nilai = intval($value['nilai']);
                $penilaian->save();
            }

            return response()->json([
                'success' => 'Berhasil menyimpan penilaian',
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $pegawai = Pegawai::where('slug', '=', $slug)->firstOrFail();
        $bagian = Bagian::all();
        return view('admin.pages.pegawai.edit', [
            'pegawai' => $pegawai,
            'bagian' => $bagian
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $validatedData = $request->validate([
            'nama'    => 'required',
            'bagian_id' => 'required',
        ]);

        if ($request->has('cover')) {
            $pegawai = Pegawai::where('slug', '=', $slug)->firstOrFail();

            if (File::exists(public_path('images/pegawai/cover/' . $pegawai->cover))) {
                File::delete(public_path('images/pegawai/cover/' . $pegawai->cover));
            }

            // pindah file gambar
            $imageName = 'pegawai-cover-' . time() . '.' . $request->cover->extension();
            $request->cover->move(public_path('images/pegawai/cover'), $imageName);


            $pegawai->nama    = $request->nama;
            $pegawai->slug     = SlugService::createSlug(Pegawai::class, 'slug', $request->nama);
            $pegawai->bagian_id    = $request->bagian_id;
            $pegawai->cover    = $imageName;
            $pegawai->update();
        } else {
            $pegawai = Pegawai::where('slug', '=', $slug)->firstOrFail();
            $pegawai->nama    = $request->nama;
            $pegawai->slug     = SlugService::createSlug(Pegawai::class, 'slug', $request->nama);
            $pegawai->bagian_id    = $request->bagian_id;
            $pegawai->update();
        }

        return redirect('/admin/pegawai')->with('post_success', 'Pegawai Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        if ($pegawai->delete()) {
            if (File::exists(public_path('images/pegawai/cover/' . $pegawai->cover))) {
                File::delete(public_path('images/pegawai/cover/' . $pegawai->cover));
            } else {
            }
            return response()->json([
                'success' => 'Pegawai Berhasil Dihapus',
            ]);
        }
        return response()->json([
            'error' => 'Pegawai tidak ditemukan',
        ]);
    }
}
