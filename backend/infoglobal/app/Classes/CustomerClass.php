<?php

namespace App\Classes;

use App\Models\Customer;
use Illuminate\Support\Facades\Log;

class CustomerClass
{
    private $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }



    public function addCustomer($nic, $full_name, $address, $dob, $religions, $phone_no, $date_of_registered)
    {
        try {
            $addCus = $this->customer->addCustomer($nic, $full_name, $address, $dob, $religions, $phone_no, $date_of_registered);
            if ($addCus) {
                return response()->json(['status' => true, 'message' => 'Customer add success'])->setStatusCode(200);
            }
            return response()->json(['status' => false, 'message' => 'error while add customer'])->setStatusCode(400);
        } catch (\Exception $ex) {

            return response()->json(['status' => false, 'message' => 'internal server error'])->setStatusCode(500);
        }
    }

    /* public function getCustomer()
    {
        try {
            $data = $this->customer->getCustomer();
            if (isset($data) && !empty($data)) {
                return response()->json(['status' => true, 'message' => 'customer get success', 'data' => $data])->setStatusCode(200);
            }
            return response()->json(['status' => false, 'message' => 'error while get customer'])->setStatusCode(400);
        } catch (\Exception $ex) {

            return response()->json(['status' => false, 'message' => 'internal server error'])->setStatusCode(500);
        }
    }*/


    public function getSingleCustomer($id)
    {
        try {
            $data = $this->customer->getSingleCustomer($id);
            if (isset($data) && !empty($data)) {
                return response()->json(['status' => true, 'message' => 'Customer get success', 'data' => $data])->setStatusCode(200);
            }
            return response()->json(['status' => false, 'message' => 'error while get Customer'])->setStatusCode(400);
        } catch (\Exception $ex) {
            return response()->json(['status' => false, 'message' => 'internal server error'])->setStatusCode(500);
        }
    }

    public function updateCustomer($id, $nic, $full_name, $address, $dob, $religions, $phone_no, $date_of_registered)
    {

        try {
            $updateCustomer = $this->customer->updateCustomer($id, $nic, $full_name, $address, $dob, $religions, $phone_no, $date_of_registered);
            if ($updateCustomer) {

                return response()->json(['status' => true, 'message' => 'customer update success'])->setStatusCode(200);
            }
            return response()->json(['status' => false, 'message' => 'error while update customer'])->setStatusCode(400);
        } catch (\Exception $ex) {

            return response()->json(['status' => false, 'message' => 'internal server error'])->setStatusCode(500);
        }
    }

    public function deleteCustomer($id)
    {

        try {
            $data = $this->customer->deleteCustomer($id);
            if ($data) {
                return response()->json(['status' => true, 'message' => 'customer delete success'])->setStatusCode(200);
            }
            return response()->json(['status' => false, 'message' => 'error while delete customer'])->setStatusCode(400);
        } catch (\Exception $ex) {

            return response()->json(['status' => false, 'message' => 'internal server error'])->setStatusCode(500);
        }
    }


    public function getDashboard()
    {
        try {
            $data = [];

            $getCustomer = $this->customer->getCustomer();
            $getBuddhistReligion = $this->customer->getBuddhistReligion();
            $getHinduReligion = $this->customer->getHinduReligion();
            $getCristianReligion = $this->customer->getCristianReligion();


            $data["customer"] = $getCustomer;
            $data["buddhist"] = $getBuddhistReligion;
            $data["hindu"] = $getHinduReligion;
            $data["cristian"] = $getCristianReligion;


            if (isset($data) && !empty($data)) {
                return response()->json(["status" => true, "message" => "dashboard Data Get Success", "data" => $data])->setStatusCode(200);
            }
            return response()->json(["status" => true, "message" => "error while get dashboard data"])->setStatusCode(400);
        } catch (\Exception $ex) {

            return response()->json(["status" => false, "message" => "internal server Error"])->setStatusCode(500);
        }
    }
}
