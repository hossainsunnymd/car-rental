<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminRentalController extends Controller
{
    public function rentals(Request $request){
        $rentals=Rental::with('car','user')->get();
        return Inertia::render('Admin/Rental/RentalListPage',['rentals'=>$rentals]);
    }

    public function rentalSavePage(Request $request){
        $rental=Rental::where('id','=',$request->query('id'))->with('car','user')->first();
        $cars=Car::all();
        $users=User::all();
        return Inertia::render('Admin/Rental/RentalSavePage',['rental'=>$rental,'cars'=>$cars,'users'=>$users]);
    }

    public function rentalSave(Request $request){

        try{
            $request->validate([
                'car_id' => 'required',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after:start_date',
            ]);

            $startDate=Carbon::parse($request->input('start_date'));
            $endDate=Carbon::parse($request->input('end_date'));
            $count=Rental::where('car_id','=',$request->car_id)
            ->whereBetween('start_date',[$startDate,$endDate])
            ->orwhereBetween('end_date',[$startDate,$endDate])->orWhere(function($q)use($startDate,$endDate){
                $q->where('start_date','=<',$startDate)
                ->Where('end_date','>=',$endDate);
            })->count();
            if(!$count){
                $days=$startDate->diffInDays($endDate);
                $dailyRentPrice=Car::where('id','=',$request->car_id)->first()->daily_rent_price;
                $totalCost=$days*$dailyRentPrice;
                Rental::Create([
                    'car_id' => $request->car_id,
                    'user_id' => $request->customer_id,
                    'total_cost' =>$totalCost,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'status' => $request->status
                ]);
                return redirect('/admin/rental-list')->with(['status'=>true,'message'=>'Rental Added Successfully']);
            } else {
                return redirect('/admin/rental-list')->with(['status'=>false,'message'=>'This car is already book for these dates']);
            }

        }catch(Exception $e){

            return redirect('/admin/rental-list')->with(['status'=>false,'message'=>'something went wrong']);
        }
    }

    public function rentalUpdate(Request $request) {
        $id = $request->id;

        try {
            // Parse dates using Carbon
            $startDate = Carbon::parse($request->input('start_date'))->format('Y-m-d');
            $endDate = Carbon::parse($request->input('end_date'))->format('Y-m-d');

            // Calculate rental cost
            $days = Carbon::parse($startDate)->diffInDays(Carbon::parse($endDate));
            $dailyRentPrice = Car::where('id', $request->car_id)->value('daily_rent_price');
            $totalCost = $days * $dailyRentPrice;

            // Check if car is already booked in the selected date range
            $count = Rental::where('car_id', $request->car_id)
                ->where('id', '!=', $id)
                ->where(function ($query) use ($startDate, $endDate) {
                    $query->whereBetween('start_date', [$startDate, $endDate])
                          ->orWhereBetween('end_date', [$startDate, $endDate])
                          ->orWhere(function ($q) use ($startDate, $endDate) {
                              $q->where('start_date', '<=', $startDate)
                                ->where('end_date', '>=', $endDate);
                          });
                })
                ->count();

            // If car is already booked, return an error message
            if ($count > 0) {
                return redirect('/admin/rental-list')->with(['status' => false, 'message' => 'Car is already booked for these dates']);
            }

            // Update the rental record
            Rental::where('id', $id)->update([
                'car_id' => $request->car_id,
                'user_id' => $request->customer_id,
                'total_cost' => $totalCost,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'status' => $request->status
            ]);

            return redirect('/admin/rental-list')->with(['status' => true, 'message' => 'Rental Updated Successfully']);

        } catch (Exception $e) {
            return redirect('/admin/rental-list')->with(['status' => false, 'message' => 'Something went wrong']);
        }
    }

    public function rentalDelete(Request $request){

        $id=$request->query('id');
        Rental::where('id',$id)->delete();
        return redirect('/admin/rental-list')->with(['status'=>true,'message'=>'Rental Deleted Successfully']);
    }

    public function rentalShowPage(Request $request){
        $id=$request->query('id');
        $rental=Rental::where('id','=',$id)->with('car','user')->first();
        return Inertia::render('Admin/Rental/RentalShowPage',['rental'=>$rental]);
    }
}
