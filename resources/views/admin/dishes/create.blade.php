@extends('layouts.app')

@section ('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('admin.dishes.store')}}" method="POST" enctype="multipart/form-data" class="form_data pt-3">
                @csrf
                <h3 class="text-center fs-4 mb-3">Add a dish</h3>
        
                <div class="mb-4 row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Dish Name</label>
                <div class="col-md-8">
                    <input id="name" type="text" 
                    class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}" required title="You must insert dish name">
                  @error('image')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
        
                <div class="mb-4 row">
                    <label for="image" class="col-md-4 col-form-label text-md-right">Dish Image</label>
                    <div class="col-md-8">
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" aria-describedby="imgHelper" value="{{old('image')}}">
                    @error('image')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <small id="imgHelper" class="text-muted">(optional) accepted format: jpg, jpeg, png</small>
                </div>
            </div>
        
                <div class="mb-4 row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                    <div class="col-md-8">
                    <textarea style="height: 150px;" type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" aria-describedby="descriptionHelper" >{{ old('description') }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <small id="descriptionHelper" class="text-muted">(optional) Describe your dish</small>
                </div>
            </div>
                
                <div class="mb-4 row">
                    <label for="ingredients" class="col-md-4 col-form-label text-md-right">Ingredients</label>
                    <div class="col-md-8">
                    <input type="text" class="form-control @error('ingredients') is-invalid @enderror"  id="ingredients" name="ingredients" aria-describedby="ingredientsHelper" value="{{old('ingredients')}}">
                    @error('ingredients')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <small id="ingredientsHelper" class="text-muted">(optional) Insert dish ingredients </small>
                </div>
                </div>
                
                <div class="mb-4 row">
                    <label for="price" class="col-md-4 col-form-label text-md-right">Price</label>
                    <div class="col-md-8">
                    <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" aria-describedby="priceHelper" value="{{old('price')}}" required title="Must insert a price">
                    @error('price')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <small id="descriptionHelper" class="text-muted">Insert price between 0 and 3000</small>
                </div>
            </div>
                <div class="mb-4 row">
                    <label class="form-check-label text-md-right col-md-4"  for="visible">
                        Visibile?
                    </label>
                    <div class="col-md-8 d-flex">
                    <input class="form-check-input align-items-center me-2" type="checkbox" value="1" id="visible" name="visible" aria-describedby="visibleHelper" checked>
                    @error('visible')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <small id="descriptionHelper" class="text-muted d-block m-0">If this is checked your plates will be shown in your menu</small>
                </div>
            </div>
        
                  @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
        
                <div class="text-center">
                <button type="submit" class="btn reg-button sub-btn">Save</button>
                <a href="{{route('admin.index')}}" class="btn reg-button">Back</a>
            </div>
        
            </form>



        </div>
    </div>
    
  
</div>


@endsection

<style>

.form_data {
  background-color: #f8f8f6;;
  box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
  border-radius: 24px;

  padding: 0 1rem 1rem;
  width: 100%;

  .checkout_field {
    padding-top: 1rem;

    label {
      font-weight: 500;
    }
  }
}
</style>