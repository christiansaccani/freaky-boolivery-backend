<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dish extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'ingredients', 'price', 'visible', 'restaurant_id', 'deleted_at'];
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
    public function restaurants()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
