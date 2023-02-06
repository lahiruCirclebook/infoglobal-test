<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\CustomerClass;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Exception;


class CustomerController extends Controller
{

    private $customerManager;
    public function __construct(CustomerClass $customer)
    {
        $this->customerManager = $customer;
    }


    //add customer
    public function addCustomer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nic' => 'required|unique:posts|max:10',
            'full_name' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'religions' => 'required',
            'phone_no' => 'required|unique:posts|max:10',
            'date_of_registered' => 'required',
        ], [
            'nic.unique:posts' => 'This Customer Already Exists!',
            'phone_no.unique:posts' => 'This Customer Already Exists!!'
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


    /*public function getCustomer(Request $request)
    {
        return $this->customerManager->getCustomer();
    }*/

    public function getSingleCustomer($id)
    {

        return $this->customerManager->getSingleCustomer($id);
    }


    public function updateCustomer(Request $request)
    {


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

        return $this->customerManager->updateCustomer($id, $nic, $full_name, $address, $dob, $religions, $phone_no, $date_of_registered);
    }


    public function deleteCustomer($id)
    {
        return $this->customerManager->deleteCustomer($id);
    }


    public function getDashboard()
    {
        return $this->customerManager->getDashboard();
    }
}
