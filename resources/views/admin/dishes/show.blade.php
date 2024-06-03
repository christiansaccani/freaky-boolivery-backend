@extends('layouts.app')

@section ('content')

<div class="container py-5">
    <h1 class="py-2">{{$dish->name}}</h1>

    <div class="dish-image">
        <img src="{{ str_starts_with($dish->image, 'http') ? $dish->image : asset('storage/' . $dish->image)}}" class="card-img-top img-fluid" alt="" style="width: 500px;">
    </div>

    <div class="p_container">

        
        <p class="py-2 show_p">
            <span class="show_titles">Description:</span> {{$dish->description}}
        </p>

        <p class="py-2 show_p dish-ingredients">
            <span class="show_titles">Ingredients:</span> {{$dish->ingredients}}
        </p>

        <p class="py-2 show_p dish-price">
            <span class="show_titles">Price:</span> € {{$dish->price}}
        </p>

        <p class="py-2 show_p dish-visible">
            <span class="show_titles">Visible:</span> 
            @if ($dish->visible == 1)
                yes
            @else
                no
            @endif
        </p>
    </div>

    <div class="d-flex gap-2 align-items-center">

        <div class="py-2">
            <a href="{{route('admin.dishes.edit', $dish->id)}}" class="edit-button">Modifica</a>       
        </div>
    
        <div class="py-2">
            <a href="{{route('admin.index')}}" class="back-button">Indietro</a>       
        </div>
    
        <button type="button" class="delete-button" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Elimina
        </button>

    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
          <div class="modal-content">

            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina il piatto</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              Sei sicuro che vuoi eliminare il piatto "{{$dish->name}}"
            </div>


            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <form action="{{route('admin.dishes.destroy', $dish->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    
                    {{-- stessa cosa --}}
                    {{-- <input type="submit" class="btn btn-danger" value="Elimina"> --}}
                    <button class="btn btn-danger">Elimina</button>
                </form>

            </div>

          </div>
        </div>
    </div>

</div>

@endsection