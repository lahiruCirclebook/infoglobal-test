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

    private $customerManager;
    public function __construct(Customer $customer)
    {
        $this->customerManager = $customer;
    }


    //add customer
    public function addCustomer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nic' => 'required|uniq|max:10',
            'full_name' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'religions' => 'required',
            'phone_no' => 'required',
            'date_of_registered' => 'required',
        ]);
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return response()->json(['status' => false, 'message' => $error])->setStatusCode(400);
        }
        $nic = $request->nic;
        $full_name = $request->full_name;
        $address = $request->address;
        $dob = $request->dob;
        $religions = $request->religions;
        $phone_no = $request->phone_no;
        $date_of_registered = $request->date_of_registered;

        return $this->customerManager->addCustomer($nic, $full_name, $address, $dob, $religions, $phone_no, $date_of_registered);
    }


    public function getCustomer(Request $request)
    {
        try {

            $customer = Customer::all();


            if (!isset($customer) && empty($customer)) {
                return response()->json(['status' => false, 'message' => "data not found"])->setStatusCode(400);
            }

            return response()->json(['status' => true, 'message' => 'customer get success', 'customer' => $customer])->setStatusCode(200);
        } catch (\Exception $exception) {
            return response()->json(['status' => false, 'message' => 'public.internal_server_error'])->setStatusCode(500);
        }
    }

    public function getSingleCustomer($id)
    {
        try {
            $data = Customer::where('id', $id)->first();
            if (isset($data) && !empty($data)) {
                return response()->json(['status' => true, 'message' => 'project get success', 'data' => $data])->setStatusCode(200);
            }
            return response()->json(['status' => false, 'message' => 'error while get project'])->setStatusCode(400);
        } catch (\Exception $ex) {

            return response()->json(['status' => false, 'message' => 'internal server error'])->setStatusCode(500);
        }
    }


    public function updateCustomer(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'nic' => 'required',
                'full_name' => 'required',
                'address' => 'address',
                'dob' => 'required',
                'religions' => 'required',
                'phone_no' => 'required',
                'date_of_registered' => 'required',
            ]);
            if ($validator->fails()) {
                $error = $validator->errors()->first();
                return response()->json(['status' => false, 'message' => $error])->setStatusCode(400);
            }
            $id = $request->id;
            $nic = $request->nic;
            $full_name = $request->full_name;
            $address = $request->address;
            $dob = $request->dob;
            $religions = $request->religions;
            $phone_no = $request->phone_no;
            $date_of_registered = $request->date_of_registered;

            $data = $this->customerManager->updateCustomer($id, $nic, $full_name, $address, $dob, $religions, $phone_no, $date_of_registered);

            if ($data) {
                return response()->json(['status' => true, 'message' => 'Customer Update success'])->setStatusCode(200);
            }
            return response()->json(['status' => false, 'message' => 'Customer Update failed'])->setStatusCode(400);
        } catch (Exception $ex) {

            return response()->json(['status' => false, 'message' => 'internal server error'])->setStatusCode(500);
        }
    }


    public function deleteCustomer($id)
    {
        try {
            $data = $this->customerManager->deleteCustomer($id);
            if ($data) {
                return response()->json(['status' => true, 'message' => 'Customer delete success'])->setStatusCode(200);
            }
            return response()->json(['status' => false, 'message' => 'error while delete Customer'])->setStatusCode(400);
        } catch (Exception $ex) {

            return response()->json(['status' => false, 'message' => 'internal server error'])->setStatusCode(500);
        }
    }
}
