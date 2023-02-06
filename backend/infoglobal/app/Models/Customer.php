<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Log;

class Customer extends Model
{

    //use HasFactory;

    protected $table = "customers";
    protected $primaryKey = 'id';

    public $incrementing = false;


    public function getCustomer()
    {
        try {
            $result = $this->all();
            if (count($result) > 0) {
                return $result;
            }
            return null;
        } catch (QueryException $ex) {

            return null;
        }
    }


    public function getSingleCustomer($id)
    {
        try {
            $result = $this->where('id', $id)->first();
            if (isset($result) & !empty($result)) {
                return $result;
            }
            return null;
        } catch (\Exception $ex) {

            return response()->json(['status' => false, 'message' => 'internal server error'])->setStatusCode(500);
            return null;
        }
    }


    public function addCustomer($nic, $full_name, $address, $dob, $religions, $phone_no, $date_of_registered)
    {
        try {
            $this->nic = $nic;
            $this->full_name = $full_name;
            $this->address = $address;
            $this->dob = $dob;
            $this->religions = $religions;
            $this->phone_no = $phone_no;
            $this->date_of_registered = $date_of_registered;

            if ($this->save()) {
                return true;
            }

            return false;
        } catch (QueryException $ex) {
            //Log::info("ProjectModel Error", ["addCustomer" => $ex->getMessage(), "line" => $ex->getLine()]);
            return false;
        }
    }



    public function updateCustomer($id, $nic, $full_name, $address, $dob, $religions, $phone_no, $date_of_registered)
    {
        try {

            $result = $this->where('id', $id)
                ->update(['nic' => $nic, 'full_name' => $full_name, 'address' => $address, 'dob' => $dob, 'religions' => $religions, 'phone_no' => $phone_no, 'date_of_registered' => $date_of_registered]);
            if ($result) {
                return true;
            }
            return false;
        } catch (QueryException $ex) {

            return false;
        }
    }

    public function deleteCustomer($id)
    {
        try {
            $result = $this->where('id', $id)->delete();
            if ($result) {
                return true;
            }
            return false;
        } catch (QueryException $ex) {

            return false;
        }
    }


    public function getBuddhistReligion()
    {
        try {
            $result = $this->where('religions', '=', 'buddhist')
                ->count();
            if ($result > 0) {
                return $result;
            }
            return 0;
        } catch (QueryException $ex) {

            return 0;
        }
    }

    public function getHinduReligion()
    {
        try {
            $result = $this->where('religions', '=', 'hindu')
                ->count();
            if ($result > 0) {
                return $result;
            }
            return 0;
        } catch (QueryException $ex) {

            return 0;
        }
    }

    public function getCristianReligion()
    {
        try {
            $result = $this->where('religions', '=', 'cristian')
                ->count();
            if ($result > 0) {
                return $result;
            }
            return 0;
        } catch (QueryException $ex) {

            return 0;
        }
    }
}
