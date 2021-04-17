<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Criteria;
use App\Models\PerbandinganKriteria;
use Illuminate\Support\Facades\DB;

class AhpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $criterion = Criteria::all();
        $row = [];
        $comparison = [];
        $jumlah = [];
        $eigenValue = [];
        $bobotPrioritas = [];

        //hitung isi table pairwise per baris
        for ($i = 0; $i < count($criterion); $i++) {
            $row = PerbandinganKriteria::where('kriteria1_id', '=', $i + 1)->get();
            array_push($comparison, $row);
        }

        //hitung eigen value
        for ($i = 0; $i < count($comparison); $i++) {
            $jumlahColumn = 0;
            for ($j = 0; $j < count($comparison[$i]); $j++) {
                $jumlahColumn += $comparison[$j][$i]->nilai;
            }
            array_push($eigenValue, $this->eigenValue($comparison[$i], count($criterion)));
            array_push($jumlah, $jumlahColumn);
        }

        $jumlahEigenValue = array_sum($eigenValue);

        //hitung bobot prioritas
        for ($z = 0; $z < count($eigenValue); $z++) {
            array_push($bobotPrioritas, $eigenValue[$z] / $jumlahEigenValue);
        }

        $jumlahBobot = array_sum($bobotPrioritas);

        // update bobot ke database
        for ($x = 0; $x < count($criterion); $x++) {
            $criteria = Criteria::findOrFail($criterion[$x]->id);
            $criteria->bobot    = $bobotPrioritas[$x];
            $criteria->update();
        }


        $jumlahKriteria = Criteria::all()->count();
        $arrayIndeksRandom = [0.0, 0.0, 0.58, 0.9, 1.12, 1.24, 1.32, 1.41, 1.45, 1.49, 1.51, 1.48, 1.56, 1.57, 1.59];

        $indeksRandom = $arrayIndeksRandom[$jumlahKriteria - 1];

        return view('admin.pages.ahp.index', [
            'criterion' => $criterion,
            'comparison' => $comparison,
            'jumlah' => $jumlah,
            'eigenValue' => $eigenValue,
            'jumlahEigenValue' => $jumlahEigenValue,
            'bobotPrioritas' => $bobotPrioritas,
            'jumlahBobot' => $jumlahBobot,
            'indeksRandom' => $indeksRandom,
            'jumlahKriteria' => $jumlahKriteria,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('perbandingan_kriterias')->truncate();
        $criterion = Criteria::all();
        for ($i = 0; $i < count($criterion); $i++) {
            for ($j = 0; $j < count($criterion); $j++) {
                $compare           = new PerbandinganKriteria();
                $compare->kriteria1_id    = $criterion[$i]->id;
                $compare->kriteria2_id    = $criterion[$j]->id;
                $compare->nilai    = $request->data[$i][$j];
                $compare->save();
            }
        }
        return response()->json([
            'success' => 'Nilai Berhasil Disimpan',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function eigenValue($comparison, $criterion)
    {
        $value = [];
        foreach ($comparison as $compare) {
            array_push($value, $compare->nilai);
        }
        $eigenValue = pow(array_product($value), (1 / $criterion));
        return $eigenValue;
    }
}
