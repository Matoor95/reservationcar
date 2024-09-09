<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['libelle','model','year','seats','price_per_day','image'];
    use HasFactory;
}
