<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class delivery_status extends Model
{
    use HasFactory;
    protected $table = 'delivery_status';
    protected $fillable = ['delivery_status','name'];
}
