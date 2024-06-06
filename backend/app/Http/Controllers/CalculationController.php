<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calculation; 

class CalculationController extends Controller
{
    public function store(Request $request){
        $model = new Calculation();
        $model->calculation_method = $request->calculation_method??null;
        $model->calculation_result = $request->calculation_result??null;
        $model->save();

        if(!$model){
            return response()->json([
                'message' => 'Failed to Store Calculation',
                'status' => false
            ]);
        }

        return response()->json([
            'message' => 'Calculation Stored Successfully',
            'status' => true,
            'code' => 200
        ]);
    }
}
