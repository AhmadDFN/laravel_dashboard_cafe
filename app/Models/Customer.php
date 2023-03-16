<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guard = ['id'];
    protected $fillable = ['cus_kd','cus_nm','cus_alamat','cus_kota','cus_jk','cus_telp','cus_status','cus_point','cus_user_id'];
}
