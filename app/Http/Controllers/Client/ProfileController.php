<?php

namespace App\Http\Controllers\Client;

use App\Events\NewRecordEvent;
use App\Events\UpdateCarOptions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client\{
    Customers,
    Cars,
    CarsOptions,
    CustomerCars
};
use App\Http\Requests\Client\ProfileRequest;
use Hash;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $data['activeClass']='profile';
        $data['cars']   = Cars::all();
        $data['client'] = Customers::findOrFail(auth()->guard('client')->user()['CustomerId']);

        $data['customerCars'] = Customers::with('cars.car.option.model')
        ->leftjoin('customers_cars as cc', 'cc.CustomerId', '=', 'customers.CustomerId')
        ->leftjoin('cars_options as co', 'co.CarOptionId', '=', 'cc.CarOptionId')
        ->leftjoin('cars as cr', 'cr.CarId', '=', 'cc.CarId')
        ->select('co.*', 'cr.Name as CarName')->get()->toArray();

        return view('client.profile.edit', $data);
//        return view('welcome');
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function carOptions(Request $request)
    {

        $carsOptions   = CarsOptions::where('CarId',$request->carId)->get();

        $html = '';
        foreach($carsOptions as $single){
            $html .='<option value="'.$single->CarOptionId.'">'.$single->Name.'</option>';
        }
        return response()->json(array('carsOptions'=>$carsOptions, 'html'=>$html));

    }


    public function update(ProfileRequest $request)
    {

        // Delete older
        CustomerCars::where('CustomerId', auth()->guard('client')->user()['CustomerId'])->delete();

        $customerId = auth()->guard('client')->user()['CustomerId'];
        $records = [];
        // Re-insert
        foreach($request->carOptId as $single){

            $newRecord = CustomerCars::create([
                'CustomerId' => $customerId,
                'CarId' => $request->post('carId'),
                'CarOptionId' => $single
            ]);
            $records[] = $newRecord->load('car','customer','carOption.car');

        }
        \App\Events\CarOptionsEvent::dispatch($records);
        session()->flash('success', __('Updated successfully'));
        return redirect()->back();
    }
}
