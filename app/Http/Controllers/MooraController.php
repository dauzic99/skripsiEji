<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Penyakit;
use App\Models\Product;
use App\Models\Tumbuhan;
use Illuminate\Http\Request;
use App\Models\User;

class MooraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penyakit = Penyakit::all();
        $criterion = Criteria::all();
        $products = Tumbuhan::all();
        return view('admin.pages.moora.index', compact('criterion', 'products', 'penyakit'));
    }

    public function getPenyakit(Request $request)
    {
        if ($request->ajax()) {
            $tumbuhan = Tumbuhan::where('penyakit_id', $request->id)->get();
            return response()->json([
                'tumbuhan' => $tumbuhan,
            ]);
        }
    }

    public function getPenyakitFiltered(Request $request)
    {
        if ($request->ajax()) {
            $param = $request->param;
            $whereParam = array();
            foreach ($param as $key => $value) {

                if ($value == null) {
                    continue;
                }
                $where = [$key, '=', $value];
                array_push($whereParam, $where);
            }
            $tumbuhan = Tumbuhan::where($whereParam)->get();

            return response()->json([
                'tumbuhan' => $tumbuhan,
            ]);
        }
    }

    public function getMatriks(Request $request)
    {
        if ($request->ajax()) {
            $tumbuhan = Tumbuhan::where('penyakit_id', $request->id)->get();

            $plants = array();
            foreach ($tumbuhan as $plant) {
                $arrayPlant = array(
                    "nama" => $plant->nama,
                    "bagian" => $this->normalize($request->id, $plant->bagian, 'bagian'),
                    "pengolahan" => $this->normalize($request->id, $plant->pengolahan, 'pengolahan'),
                    "penggunaan" => $this->normalize($request->id, $plant->penggunaan, 'penggunaan'),
                    "jenis" => $this->normalize($request->id, $plant->jenis, 'jenis'),
                );
                array_push($plants, $arrayPlant);
            }

            $criterion = Criteria::all('bobot');
            return response()->json([
                'tumbuhan' => $plants,
                'bobot' => $criterion,
            ]);
        }
    }

    public function getMatriksFiltered(Request $request)
    {
        if ($request->ajax()) {
            $param = $request->param;
            $whereParam = array();
            foreach ($param as $key => $value) {

                if ($value == null) {
                    continue;
                }
                $where = [$key, '=', $value];
                array_push($whereParam, $where);
            }
            $tumbuhan = Tumbuhan::where($whereParam)->get();

            $plants = array();
            foreach ($tumbuhan as $plant) {
                $arrayPlant = array(
                    "nama" => $plant->nama,
                    "bagian" => $this->normalize($param['penyakit_id'], $plant->bagian, 'bagian'),
                    "pengolahan" => $this->normalize($param['penyakit_id'], $plant->pengolahan, 'pengolahan'),
                    "penggunaan" => $this->normalize($param['penyakit_id'], $plant->penggunaan, 'penggunaan'),
                    "jenis" => $this->normalize($param['penyakit_id'], $plant->jenis, 'jenis'),
                );
                array_push($plants, $arrayPlant);
            }

            $criterion = Criteria::all('bobot');
            return response()->json([
                'tumbuhan' => $plants,
                'bobot' => $criterion,
            ]);
        }
    }

    public function normalize($id, $value, $crit)
    {
        $jumlahTumbuhan = Tumbuhan::where('penyakit_id', $id)->get()->count();
        $jumlahSub = Tumbuhan::where('penyakit_id', $id)->where($crit, $value)->get()->count();
        $result = $jumlahSub / $jumlahTumbuhan;
        return number_format($result, 2, '.', '');
    }

    public function hitungPreferensi(Request $request)
    {
        if ($request->ajax()) {
            $criterion = Criteria::all();
            $product = Tumbuhan::where('penyakit_id', $request->penyakit_id)->get();
            $nilaiPreferensi = array();

            $arrayNormalBobot = $request->arrayMatriksNormalBobot;

            for ($i = 0; $i < count($arrayNormalBobot); $i++) {
                $nilai = 0;
                for ($j = 0; $j < count($arrayNormalBobot[$i]); $j++) {
                    if (strcasecmp($criterion[$j]->tipe, 'benefit') == 0) {
                        $nilai += floatval($arrayNormalBobot[$i][$j]);
                    } else {
                        $nilai -= floatval($arrayNormalBobot[$i][$j]);
                    }
                }


                array_push($nilaiPreferensi, [
                    'produk' => $product[$i]->nama,
                    'slug' => $product[$i]->slug,
                    'nilai' => $nilai,
                ]);
            }
            return json_encode($nilaiPreferensi);
        }
    }

    public function hitungPreferensiFiltered(Request $request)
    {
        if ($request->ajax()) {
            $criterion = Criteria::all();

            $param = $request->param;
            $whereParam = array();
            foreach ($param as $key => $value) {

                if ($value == null) {
                    continue;
                }
                $where = [$key, '=', $value];
                array_push($whereParam, $where);
            }
            $product = Tumbuhan::where($whereParam)->get();

            $nilaiPreferensi = array();

            $arrayNormalBobot = $request->arrayMatriksNormalBobot;

            for ($i = 0; $i < count($arrayNormalBobot); $i++) {
                $nilai = 0;
                for ($j = 0; $j < count($arrayNormalBobot[$i]); $j++) {
                    if (strcasecmp($criterion[$j]->tipe, 'benefit') == 0) {
                        $nilai += floatval($arrayNormalBobot[$i][$j]);
                    } else {
                        $nilai -= floatval($arrayNormalBobot[$i][$j]);
                    }
                }


                array_push($nilaiPreferensi, [
                    'produk' => $product[$i]->nama,
                    'slug' => $product[$i]->slug,
                    'nilai' => $nilai,
                ]);
            }
            return json_encode($nilaiPreferensi);
        }
    }
}
