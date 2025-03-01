<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CarController extends Controller
{

    public function carListByBrand(Request $request){
        $carListbyBrand=Car::where('brand','=',$request->brand)->get();

        return Inertia::render('FrontEnd/CarByType',['carList'=>$carListbyBrand]);
    }

    public function carListByType(Request $request){

        $carListbyType=Car::where('car_type','=',$request->type)->get();
        return Inertia::render('FrontEnd/CarByType',['carList'=>$carListbyType]);
    }

    public function carListByPrice(Request $request){
        $carListbyPrice=Car::where('daily_rent_price','=',$request->price)->get();
        return Inertia::render('FrontEnd/CarByType',['carList'=>$carListbyPrice]);
    }

    public function carDetails(Request $request){
        $carDetails=Car::where('id','=',$request->id)->first();
        return Inertia::render('FrontEnd/CarDetails',['carDetails'=>$carDetails]);
    }
}
