<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Inertia\Inertia;


class AdminCarController extends Controller
{
    public function carList(Request $request){
        $carList=Car::all();
        return Inertia::render('Admin/Car/CarListPage',['carList'=>$carList]);
    }

    public function carSavePage(Request $request){

        $id=$request->query('id');
        $car=Car::where('id',$id)->first();
        return Inertia::render('Admin/Car/CarSavePage',['car'=>$car]);
    }

    public function carSave(Request $request){

        $file=$request->file('image');
        $fileName=time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('images'),$fileName);
        $request->merge(['image'=>$fileName]);
        Car::create($request->input());
        return redirect('/admin/car-list');
    }

    public function carUpdate(Request $request){
        $id=$request->input('id');
        if($request->hasFile('image')){
            $file=$request->file('image');
            $fileName=time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images'),$fileName);
            $request->merge(['image'=>$fileName]);
            $oldImage=Car::where('id',$id)->first()->image;
            File::delete('images/'.$oldImage);
        }
        Car::where('id',$id)->update($request->input());
        return redirect('/admin/car-list');
    }

    public function carDelete(Request $request){
        $id=$request->query('id');
        Car::where('id',$id)->delete();
        return redirect('/admin/car-list');
    }

    public function carDetailsPage(Request $request){
        $id=$request->query('id');
        $carDetails=Car::where('id','=',$id)->first();
        return Inertia::render('Admin/Car/CarShowPage',['carDetails'=>$carDetails]);
    }
}
