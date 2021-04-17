<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use App\Models\Tumbuhan;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use File;

class TumbuhanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tumbuhans = Tumbuhan::all();
        return view('admin.pages.tumbuhan.index', ['tumbuhans' => $tumbuhans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penyakit = Penyakit::all();
        return view('admin.pages.tumbuhan.create', compact('penyakit'));
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
            'latin'    => 'required',
            'deskripsi' => 'required',
            'penyakit_id' => 'required',
            'bagian' => 'required',
            'pengolahan' => 'required',
            'penggunaan' => 'required',
            'jenis' => 'required',
            'cover'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        // pindah file gambar
        $imageName = 'tumbuhan-cover-' . time() . '.' . $request->cover->extension();
        $request->cover->move(public_path('images/tumbuhan/cover'), $imageName);

        $tumbuhan           = new Tumbuhan();
        $tumbuhan->nama    = $request->nama;
        $tumbuhan->slug     = SlugService::createSlug(Tumbuhan::class, 'slug', $request->nama);
        $tumbuhan->deskripsi  = $request->deskripsi;
        $tumbuhan->bagian  = $request->bagian;
        $tumbuhan->pengolahan  = $request->pengolahan;
        $tumbuhan->penggunaan  = $request->penggunaan;
        $tumbuhan->jenis  = $request->jenis;
        $tumbuhan->latin  = $request->latin;
        $tumbuhan->cover    = $imageName;
        $tumbuhan->penyakit_id    = $request->penyakit_id;
        $tumbuhan->save();
        return redirect('/admin/tumbuhan')->with('post_success', 'Tumbuhan Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $tumbuhan = Tumbuhan::where('slug', '=', $slug)->firstOrFail();
        $penyakit = Penyakit::all();
        return view('admin.pages.tumbuhan.edit', [
            'tumbuhan' => $tumbuhan,
            'penyakit' => $penyakit
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
            'latin'    => 'required',
            'deskripsi' => 'required',
            'penyakit_id' => 'required',
            'bagian' => 'required',
            'pengolahan' => 'required',
            'penggunaan' => 'required',
            'jenis' => 'required',
        ]);

        if ($request->has('cover')) {
            $tumbuhan = Tumbuhan::where('slug', '=', $slug)->firstOrFail();

            if (File::exists(public_path('images/tumbuhan/cover/' . $tumbuhan->cover))) {
                File::delete(public_path('images/tumbuhan/cover/' . $tumbuhan->cover));
            }

            // pindah file gambar
            $imageName = 'tumbuhan-cover-' . time() . '.' . $request->cover->extension();
            $request->cover->move(public_path('images/tumbuhan/cover'), $imageName);


            $tumbuhan->nama    = $request->nama;
            $tumbuhan->slug     = SlugService::createSlug(Tumbuhan::class, 'slug', $request->nama);
            $tumbuhan->deskripsi  = $request->deskripsi;
            $tumbuhan->bagian  = $request->bagian;
            $tumbuhan->pengolahan  = $request->pengolahan;
            $tumbuhan->penggunaan  = $request->penggunaan;
            $tumbuhan->jenis  = $request->jenis;
        $tumbuhan->latin  = $request->latin;
        $tumbuhan->cover    = $imageName;
            $tumbuhan->penyakit_id    = $request->penyakit_id;
            $tumbuhan->update();
        } else {
            $tumbuhan = Tumbuhan::where('slug', '=', $slug)->firstOrFail();
            $tumbuhan->nama    = $request->nama;
            $tumbuhan->slug     = SlugService::createSlug(Tumbuhan::class, 'slug', $request->nama);
            $tumbuhan->deskripsi  = $request->deskripsi;
            $tumbuhan->bagian  = $request->bagian;
            $tumbuhan->pengolahan  = $request->pengolahan;
            $tumbuhan->penggunaan  = $request->penggunaan;
        $tumbuhan->latin  = $request->latin;
        $tumbuhan->jenis  = $request->jenis;
            $tumbuhan->penyakit_id    = $request->penyakit_id;
            $tumbuhan->update();
        }

        return redirect('/admin/tumbuhan')->with('post_success', 'Tumbuhan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tumbuhan = Tumbuhan::findOrFail($id);
        if ($tumbuhan->delete()) {
            if (File::exists(public_path('images/tumbuhan/cover/' . $tumbuhan->cover))) {
                File::delete(public_path('images/tumbuhan/cover/' . $tumbuhan->cover));
            } else {
            }
            return response()->json([
                'success' => 'Tumbuhan Berhasil Dihapus',
            ]);
        }
        return response()->json([
            'error' => 'Tumbuhan tidak ditemukan',
        ]);
    }
}
