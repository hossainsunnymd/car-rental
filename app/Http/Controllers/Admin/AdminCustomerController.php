<?php

namespace App\Http\Controllers\Admin;

use App\Helper\JWTToken;
use App\Http\Controllers\Controller;
use App\Models\Rental;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Inertia\Inertia;

use function Termwind\render;

class AdminCustomerController extends Controller
{
    public function customerSave(Request $request){

       try{
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
            return redirect('/admin/customer-list-page')->with(['status'=>true,'message'=>'Customer Added Successfully']);
       }catch(Exception $e){
            return redirect('/admin/customer-list-page')->with(['status'=>false,'message'=>'something went wrong']);
       }

    }

    public function customerUpdate(Request $request){

       try{
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
            return redirect('/admin/customer-list-page')->with(['status'=>true,'message'=>'Customer updated Successfully']);
       }catch(Exception $e){
            return redirect('/admin/customer-list-page')->with(['status'=>false,'message'=>'something went wrong']);
       }
    }

    public function customerDelete(Request $request){
        try{
            User::where('id',$request->id)->delete();
            return redirect('/admin/customer-list-page')->with(['status'=>true,'message'=>'Customer deleted Successfully']);
        }catch(Exception $e){
            return redirect('/admin/customer-list-page')->with(['status'=>false,'message'=>'something went wrong']);
        }
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


