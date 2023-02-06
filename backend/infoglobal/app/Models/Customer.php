<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Log;

class Customer extends Model
{

    use HasFactory;

    protected $table = "customers";
    protected $primaryKey = 'id';


    public function updateCustomer($id, $nic, $full_name, $address, $dob, $religions, $phone_no, $date_of_registered)
    {
        try {
            $sqlQuery = $this->newQuery();

            $sqlQuery->where('id', $id);
            $sqlQuery->update(['nic' => $nic, 'full_name' => $full_name, 'address' => $address, 'dob' => $dob, 'religions' => $religions, 'phone_no' => $phone_no, 'date_of_registered' => $date_of_registered]);
            if ($sqlQuery) {
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
}
