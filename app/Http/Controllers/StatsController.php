<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Restaurant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatsController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $restaurant = Restaurant::where('user_id', $userId)->firstOrFail();

        $orders = Order::whereHas('dishes', function ($query) use ($restaurant) {
            $query->where('restaurant_id', $restaurant->id);
        })->get();

        $monthlyOrders = $orders->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('m');
        });

        $ordersPerMonth = array_fill(0, 5, 0);
        $revenuePerMonth = array_fill(0, 5, 0);

        foreach ($monthlyOrders as $month => $orders) {
            $ordersPerMonth[(int)$month - 1] = count($orders);
            $revenuePerMonth[(int)$month - 1] = $orders->sum('total_price');
        }

        return view('admin.statistics.index', compact('ordersPerMonth', 'revenuePerMonth'));
    }
}
