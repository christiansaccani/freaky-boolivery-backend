@extends('layouts.app')
@section('content')

@php
    use Carbon\Carbon;
@endphp

<div class="container">
<table class="table table-hover mt-5" style="border-radius: 5px; overflow:hidden">
    <thead>
      <tr style="vertical-align: middle">
        {{-- <th scope="col">#</th> --}}
        <th class="phone-none" scope="col">Name</th>
        <th scope="col">Last Name</th>
        <th class="phone-none" scope="col">Address</th>
        <th class="phone-none" scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Total Price</th>
        <th class="phone-none" scope="col">Order Date</th>
      </tr>
    </thead>
    <tbody">

    @foreach ($orders as $order)
    <tr onclick="window.location='{{ route('admin.orders.show', $order->id) }}';" style="cursor:pointer; vertical-align: middle;">
      <td class="align-middle phone-none">{{$order->customer_name}}</td>
      <td class="align-middle">{{$order->customer_last_name}}</td>
      <td class="align-middle table_address phone-none">{{$order->customer_address}}</td>
      <td class="align-middle table_mail phone-none">{{$order->customer_email}}</td>
      <td class="align-middle">{{$order->customer_phone}}</td>
      <td class="align-middle">€{{$order->total_price}}</td>
      <td class="align-middle phone-none">{{ Carbon::parse($order->created_at)->format('d/m/Y H:i') }}</td>
    </tr>    
      
    @endforeach
      
    </tbody>
  </table>

  <a href="{{route('admin.statistics.index')}}" class="add-dish-button">Show Chart</a> 

</div>

@endsection