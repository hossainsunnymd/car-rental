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
        return Inertia::render('FrontEnd/Home',['carList'=>$carList]);
    }

    public function signUpPage(Request $request){
        return Inertia::render('FrontEnd/SignUpPage');
    }

    public function signInPage(Request $request){
        return Inertia::render('FrontEnd/SignInPage');
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
        $userId=$request->header('user_id');
        $totalRental=Rental::where('user_id','=',$userId)->count();
        $totalOngoingRental=Rental::where('user_id','=',$userId)->where('status','=','Ongoing')->count();
        $totalCompletedRental=Rental::where('user_id','=',$userId)->where('status','=','Completed')->count();
        $totalCancelledRental=Rental::where('user_id','=',$userId)->where('status','=','Cancelled')->count();
        $data=[
            'totalRental'=>$totalRental,
            'totalOngoingRental'=>$totalOngoingRental,
            'totalCompletedRental'=>$totalCompletedRental,
            'totalCancelledRental'=>$totalCancelledRental
        ];
        return Inertia::render('Customer/DashBoardPage',$data);
    }

    public function rentalPage(){
        $carList=Car::where('availability','=','Available')->get();
        return Inertia::render('FrontEnd/RentalPage',['carList'=>$carList]);
    }

    public function aboutPage(){
        return Inertia::render('FrontEnd/AboutPage');
    }

    public function contactPage(){
        return Inertia::render('FrontEnd/ContactPage');
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('FrontEnd/home')->cookie('token','',-1);
    }



}
