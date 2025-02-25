<?php

namespace App\Http\Controllers\Admin;

use App\Helper\JWTToken;
use App\Http\Controllers\Controller;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

use function Termwind\render;

class AdminCustomerController extends Controller
{
    public function customerSave(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return response()->json(['message' => 'Customer created successfully'], 200);
    }

    public function customerUpdate(Request $request){

        $request->validate([
            'name' => 'required',
            'password' => 'required|min:8',
        ]);
        User::where('id',$request->id)->update(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

        return response()->json(['message' => 'Customer updated successfully'], 200);
    }

    public function customerListPage(Request $request){

        $customers = User::all();
        return Inertia::render('Admin/Customer/CustomerListPage', ['customers' => $customers]);

    }

    public function customerSavePage(Request $request){

        $id=$request->query('id');
        $customer=User::where('id','=',$id)->first();
        return Inertia::render('Admin/Customer/CustomerSavePage', ['customer' => $customer]);
    }

    public function customerShowPage(Request $request){
        $id=$request->query('id');
        $details=User::where('id',$id)->with('rentals','rentals.car')->first();
        return Inertia::render('Admin/Customer/CustomerShowPage',['details'=>$details]);
    }


}


