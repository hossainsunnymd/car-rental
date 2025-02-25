<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PageController extends Controller
{
    public function home(Request $request){
        $carList=Car::where('availability','=','Available')->get();
        return Inertia::render('Home',['carList'=>$carList]);
    }

    public function signUpPage(Request $request){
        return Inertia::render('SignUpPage');
    }

    public function signInPage(Request $request){
        return Inertia::render('SignInPage');
    }

    public function adminDashboard(Request $request){
        $availableCar=Car::where('availability','=','Available')->count();
        $totalCar=Car::count();
        $rentals=Rental::count();
        $total=Rental::sum('total_cost');
        $data=[
            'availableCar'=>$availableCar,
            'totalCar'=>$totalCar,
            'rentals'=>$rentals,
            'total'=>$total
        ];
        return Inertia::render('Admin/DashboardPage',$data);
    }

    public function customerDashboard(Request $request){
        return Inertia::render('Customer/DashBoardPage');
    }

    public function rentalPage(){
        $carList=Car::where('availability','=','Available')->get();
        return Inertia::render('RentalPage',['carList'=>$carList]);
    }

    public function aboutPage(){
        return Inertia::render('AboutPage');
    }

    public function contactPage(){
        return Inertia::render('ContactPage');
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/home')->cookie('token','',-1);
    }



}
