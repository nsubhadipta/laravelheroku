<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_detail extends Model
{
    use HasFactory;
    // public function users()
    // {
    // 	return $this->belongsTo(User::class);
    // }
    // public function products()
    // {
    // 	return $this->hasMany(Product::class);
    // }
    protected $table = 'user_details';
    protected $fillable = ['user_id', 'phone','address','city','zip'];

}
