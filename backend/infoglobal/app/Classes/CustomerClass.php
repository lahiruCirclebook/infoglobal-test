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
}
