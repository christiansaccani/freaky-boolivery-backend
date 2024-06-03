<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurant = Restaurant::where('user_id', Auth::id())->firstOrFail();

        // Ottieni gli ordini che contengono piatti del ristorante specifico
        $orders = Order::whereHas('dishes', function ($query) use ($restaurant) {
            $query->where('restaurant_id', $restaurant->id);
        })->with('dishes')->orderBy('created_at', 'DESC')->get();

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Order $order
        $order = Order::with('dishes')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    public function usermail()
    {

        $restaurant = Restaurant::where('user_id', Auth::id())->firstOrFail();

        // Ottieni gli ordini che contengono piatti del ristorante specifico
        $orders = Order::whereHas('dishes', function ($query) use ($restaurant) {
            $query->where('restaurant_id', $restaurant->id);
        })->with('dishes')->orderBy('created_at', 'DESC')->get();

        // dump($orders);

        return view('admin.mails.usermail', compact('orders'));
    }

    public function restaurantmail()
    {
        $restaurant = Restaurant::where('user_id', Auth::id())->firstOrFail();

        // Ottieni gli ordini che contengono piatti del ristorante specifico
        $orders = Order::whereHas('dishes', function ($query) use ($restaurant) {
            $query->where('restaurant_id', $restaurant->id);
        })->with('dishes')->orderBy('created_at', 'DESC')->get();

        // dump($orders);

        return view('admin.mails.restaurantmail', compact('orders'));
    }
}
