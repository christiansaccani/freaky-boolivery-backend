@extends('layouts.app')

@section('content')

<div class="container">

    <div class="chart-container">
    
    <div class="container chart-order-container">
        <h2>Orders</h2>
        <canvas id="ordersChart"></canvas>
    </div>

    <div class="container chart-revenue-container">
        <h2>Revenue</h2>
        <canvas id="revenueChart"></canvas>
    </div>

    </div>

    <a href="{{ route('admin.orders.index') }}" class="btn btn-primary my_form_btn return-order">Return to Orders</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ordersCtx = document.getElementById('ordersChart').getContext('2d');
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');

    const ordersPerMonth = @json(array_values($ordersPerMonth));
    const revenuePerMonth = @json(array_values($revenuePerMonth));

    new Chart(ordersCtx, {
      type: 'bar',
      data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        datasets: [{
          label: '# of Orders',
          data: ordersPerMonth,
          borderWidth: 1,
          backgroundColor: 'rgba(245, 39, 82, 0.8)',
          borderColor: 'rgba(54, 162, 235, 1)',
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    new Chart(revenueCtx, {
      type: 'bar',
      data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        datasets: [{
          label: 'Revenue (€)',
          data: revenuePerMonth,
          borderWidth: 1,
          backgroundColor: 'rgba(245, 39, 82, 0.8)',
          borderColor: 'rgba(75, 192, 192, 1)',
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
</script>
@endsection