<?php

namespace App\Http\Controllers;

use App\Models\Bagian;
use App\Models\Criteria;
use App\Models\Pegawai;
use App\Models\Penyakit;
use App\Models\Product;
use App\Models\Tumbuhan;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Penilaian;

class MooraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penyakit = Bagian::all();
        $criterion = Criteria::all();
        $products = Pegawai::all();
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
            $pegawais = Pegawai::all();
            $crits = Criteria::all();

            for ($i = 0; $i < count($pegawais); $i++) {
                for ($j = 0; $j < count($crits); $j++) {
                    $nilai = Penilaian::where('pegawai_id', $pegawais[$i]['id'])->where('criteria_id', $crits[$j]['id'])->first();
                    $pegawais[$i]['crit_' . ($j + 1)] = $nilai->nilai;
                }
            }



            $criterion = Criteria::all('bobot');
            return response()->json([
                'pegawais' => $pegawais,
                'bobot' => $criterion,
            ]);
        }
    }

    public function getMatriksFiltered(Request $request)
    {
        if ($request->ajax()) {
            $param = $request->param;
            $pegawais = Pegawai::where('bagian_id', $param['bagian_id'])->get();
            $crits = Criteria::all();
            for ($i = 0; $i < count($pegawais); $i++) {
                for ($j = 0; $j < count($crits); $j++) {
                    $nilai = Penilaian::where('pegawai_id', $pegawais[$i]['id'])->where('criteria_id', $crits[$j]['id'])->first();
                    $pegawais[$i]['crit_' . ($j + 1)] = $nilai->nilai;
                }
            }



            $criterion = Criteria::all('bobot');
            return response()->json([
                'pegawais' => $pegawais,
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
            $product = Pegawai::all();
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
            $product = Pegawai::where($whereParam)->get();

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
