<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_dtl extends Model
{
    use HasFactory;
    protected $table = 'order_dtl';
    protected $fillable = ['order_id','user_id', 'product_id','delivery_status'];
}
