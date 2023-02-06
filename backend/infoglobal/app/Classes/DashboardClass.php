<?php

namespace App\Classes;

use App\Models\Customer;

use Illuminate\Support\Facades\Log;

class DashboardClass
{
    private $customer;
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }
    public function getDashboard()
    {
        try {
            $data = [];

            $getBuddhistReligion = $this->customer->getBuddhistReligion();
            $getHinduReligion = $this->customer->getHinduReligion();
            $getCristianReligion = $this->customer->getCristianReligion();



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
