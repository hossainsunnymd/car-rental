<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RentalController extends Controller
{
    public function rentCar(Request $request){
        $userId=$request->header('user_id');
        $request->validate([
            'car_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);
        $startDate=Carbon::parse($request->input('start_date'));
        $endDate=Carbon::parse($request->input('end_date'));
        $days=$startDate->diffInDays($endDate);
        $dailyRentPrice=Car::where('id','=',$request->car_id)->first()->daily_rent_price;
        $totalCost=$days*$dailyRentPrice;

       Rental::Create([
           'car_id' => $request->car_id,
           'user_id' => $userId,
           'total_cost' =>$totalCost,
           'start_date' => $request->start_date,
           'end_date' => $request->end_date
       ]);
       return response()->json(['message' => 'Car rented successfully'], 200);

    }

    public function rentals(Request $request){
        $userId=$request->header('user_id');
        $rentals=Rental::where('user_id', $userId)->where('status', 'Ongoing')->with('car')->get();
        return Inertia::render('Customer/RentalPage',['rentals'=>$rentals]);
    }

    public function rentalHistory(Request $request){
        $userId=$request->header('user_id');
        $rentals = Rental::where('user_id', $userId)
        ->where(function ($query) {
            $query->where('status', 'Completed')
                  ->orWhere('status', 'Cancelled');
        })
        ->with('car')
        ->get();

        return Inertia::render('Customer/RentalHistoryPage',['rentals'=>$rentals]);
    }

    public function cancelRental(Request $request){
        $id=$request->query('id');
        Rental::where('id',$id)->update(['status'=>'Cancelled']);
        return redirect('/customer/rentals');
    }
}
