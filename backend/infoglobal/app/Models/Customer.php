<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Log;

class Customer extends Model
{

    protected $table = "customers";
    protected $primaryKey = 'id';

    use HasFactory;
}
