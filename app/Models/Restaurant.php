<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'address', 'phone', 'vat', 'user_id'];
    public function types()
    {
        return $this->belongsToMany(Type::class);
    }

    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
