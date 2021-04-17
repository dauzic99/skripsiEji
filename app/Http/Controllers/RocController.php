<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Criteria;

class RocController extends Controller
{
    public function index()
    {
        $criterion = Criteria::orderBy('rank', 'ASC')->get();
        return view('admin.pages.roc.index', compact('criterion'));
    }

    public function update(Request $request)
    {
        $data = $request->orderArray;
        $criterionCount = Criteria::all()->count();
        foreach ($data as $value) {
            $criteria = Criteria::findOrFail($value['id']);
            $criteria->rank = $value['rank'];

            $bobot = 0;
            //hitung bobot
            for ($i = intval($value['rank']); $i <= $criterionCount; $i++) {
                $bobot += 1 / $i;
            }
            $bobot = $bobot / $criterionCount;

            $criteria->bobot = $bobot;
            $criteria->update();
        }
        return response()->json([
            'success' => 'Rank berhasil di update',
        ]);
    }

    public function getBobot()
    {
        $criterion = Criteria::orderBy('rank', 'ASC')->get();
        return response()->json([
            'bobot' => $criterion,
        ]);
    }
}
