<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable =['car_id','user_id','start_date','end_date','total_price'];
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function car(){
        return $this->belongsTo(Car::class);
    }
}
