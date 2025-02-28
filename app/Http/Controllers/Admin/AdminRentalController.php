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
            $startDate=Carbon::parse($request->input('start_date'));
            $endDate=Carbon::parse($request->input('end_date'));
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
        }catch(Exception $e){
            return redirect('/admin/rental-list')->with(['status'=>false,'message'=>'something went wrong']);
        }
    }

    public function rentalUpdate(Request $request){
       try{
        $id=$request->id;
        Rental::where('id',$id)->update($request->input());
        return redirect('/admin/rental-list')->with(['status'=>true,'message'=>'Rental Updated Successfully']);
       }catch(Exception $e){
        return redirect('/admin/rental-list')->with(['status'=>false,'message'=>'something went wrong']);
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
