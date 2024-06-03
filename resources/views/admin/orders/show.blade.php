@extends('layouts.app')

@section('content')
<div class="container my-4">
    <h1>Order Details #{{ $order->id }}</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Dish Name</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->dishes as $dish)
                <tr>
                    <td>{{ $dish->name }}</td>
                    {{-- <td>{{ $dish->quantity }}</td>  --}}
                    {{-- QUANTITY MANCA --}}
                    <td>€ {{ $dish->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Client Details</h2>
    <p><strong>Name:</strong> {{ $order->customer_name }}</p>
    <p><strong>Name:</strong> {{ $order->customer_last_name }}</p>
    <p><strong>Address:</strong> {{ $order->customer_address }}</p>
    <p><strong>Email:</strong> {{ $order->customer_email }}</p>
    <p><strong>Phone:</strong> {{ $order->customer_phone }}</p>
    
    <h2>Order Total</h2>
    <h3>€ {{ $order->total_price }}</h3>
    
    <a href="{{ route('admin.orders.index') }}" class="btn btn-primary back-orders">Back to Orders</a>
    </div>

</div>
@endsection