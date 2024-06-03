<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTypeRequest;
use App\Models\Dish;
use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $dishes = Dish::where('restaurant_id', Auth::id())->orderBy('name')->get();
        $restaurants = Restaurant::where('user_id', Auth::id())->get();
        return view('admin.index', compact('dishes', 'restaurants'));
    }
}
