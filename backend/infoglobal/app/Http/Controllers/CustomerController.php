<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Exception;

class CustomerController extends Controller
{

    //add customer
    public function addCustomer(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'nic' => 'required|min:10|max:10|unique',
                'full_name' => 'required',
                'address' => 'required',
                'dob' => 'required',
                'religions' => 'required',
                'phone_no' => 'required|max:10',
                'date_of_registered' => 'required',
            ], [
                'nic.required' => 'NIC Filed is Required',
                'full_name.required' => 'Full Name Filed is Required',
                'address.required' => 'Address Filed is Required',
                'dob.required' => 'DoB Filed is Required',
                'religions.required' => 'Religions Filed is Required',
                'phone_no' => 'Phone number Filed is Required',
                'date_of_registered' => 'Date of Registered Filed is Required'
            ]);

            if ($validator->fails()) {

                $error = $validator->errors()->first();

                return response()->json(['status' => false, 'message' => $error])->setStatusCode(400);
            }

            if (Customer::where('nic', '=', $request->nic)->exists()) {
                return response()->json(['status' => false, 'message' => 'customer already exists'])->setStatusCode(400);
            }

            $customer = new Customer;

            $customer->nic =  $request->nic;
            $customer->full_name =  $request->full_name;
            $customer->address =  $request->address;
            $customer->dob =  $request->dob;
            $customer->religions =  $request->religions;
            $customer->phone_no =  $request->phone_no;
            $customer->date_of_registered =  $request->date_of_registered;

            return $customer->save();

            if ($customer) {

                return response()->json(['status' => true, 'message' => 'customer add success'])->setStatusCode(200);
            }
            return response()->json(['status' => false, 'message' => 'customer add failed'])->setStatusCode(400);
        } catch (Exception $exception) {
            return response()->json(['status' => false, 'message' => 'public.internal_server_error'])->setStatusCode(500);
        }
    }
}
