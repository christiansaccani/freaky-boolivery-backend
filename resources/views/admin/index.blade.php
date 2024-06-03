
@extends ('layouts.app')
@section('content')

<div class="py-5 d-flex row justify-content-center w-100">
    @foreach($restaurants as $restaurant)
    <h1 class="text-center mb-4">Welcome in "{{$restaurant->name}}" Home! </h1>

    <img class="restaurant-img mb-3" src="{{asset('storage/' . $restaurant->image)}}" alt="">

    <div class="row justify-content-center mb-5">

        <div class="section-one-container mb-5">
            <h3>Restaurant Categories:</h3>
            <div class="d-flex justify-content-center gap-2">

                @foreach($restaurant->types as $type)
                        <p class="badge rounded-pill custom_badge mt-3">{{$type->type}}</p>
                @endforeach
            </div>

        </div>
    @endforeach
        
{{-- ---------- --}}

        <div class="alldishes_container">
            @foreach ($dishes as $dish)

                <div class="col-3 card card-container">
                    <img src="{{ str_starts_with($dish->image, 'http') ? $dish->image : asset('storage/' . $dish->image)}}" class="card-img-top img-fluid" alt="">

                    <div class="card-body text-center">
                        <h5 class="card-title">{{$dish->name}}</h5>
                        <p class="card-text">{{$dish->price}} €</p>
                        <a class="show-button" href="{{route('admin.dishes.show', $dish->id)}}">Visualizza</a>
                    </div>
                </div>
            @endforeach
        </div>

{{-- ---------- --}}

</div>
        <div class="d-flex justify-content-center gap-3">
            <a href="{{route('admin.dishes.create')}}" class="add-dish-button">Aggiungi Piatto</a>
            <a href="{{route('admin.orders.index')}}" class="add-dish-button">Riepilogo Ordini</a>                          
        </div>
</div>


@endsection