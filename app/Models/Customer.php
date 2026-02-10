<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    public static function getAll()
    {
       $customers = DB::table("customers")->get();
       return $customers;
    }
}
