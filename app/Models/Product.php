<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function company()
    {

        return $this->belongsTo(Company::class);
        
    }
    public function carts()
    {
        return $this->belongsToMany(Cart::class)->withPivot('quantity');
    }
}
