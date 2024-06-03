@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                        <form class="form_data pt-3" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="text-center fs-4 mb-3">{{ __('Register to Boolivery') }}</div>

                            <div class="user-reg m-4">
                            <div class="mb-3 fs-5 fw-bold">
                                User Registration
                            </div>
                            <div class="mb-4 row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" autocomplete="name" autofocus pattern="^[A-Za-zÀ-ÖØ-öø-ÿ]{2,}" title="Name must be at least 2 characters and it cannot contain number or special characters or symbols">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text"
                                        class="form-control @error('surname') is-invalid @enderror" name="surname"
                                        value="{{ old('surname') }}" autocomplete="surname" autofocus pattern="^[A-Za-zÀ-ÖØ-öø-ÿ]{2,}" title="Surname must be at least 2 characters and it cannot contain number or special characters or symbols">

                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" autocomplete="email" title="email is required" required pattern="/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="new-password" required pattern="{8,}" title="Password must be at least 8 characters long">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" autocomplete="new-password" required pattern="{8,}">
                                </div>
                            </div>
                        </div>

                        <div class="user-reg m-4">
                            <div class="mb-3 fs-5 fw-bold">Restaurant Registration</div>
                            <div class="mb-4 row">
                                <label for="restaurant_name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Restaurant Name') }}</label>

                                <div class="col-md-6">
                                    <input id="restaurant_name" type="text"
                                        class="form-control @error('restaurant_name') is-invalid @enderror"
                                        name="restaurant_name" value="{{ old('restaurant_name') }}"
                                        autocomplete="restaurant_name" autofocus required>

                                    @error('restaurant_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 row">
                            
                                <!-- Bottone per aprire il modale -->
                                <label for="restaurant_name "
                                    class="col-md-4 col-form-label text-md-right">{{ __('Categories') }}</label>
                                    <div class="col-md-6">
                                <button type="button" class="btn reg-button" data-bs-toggle="modal" data-bs-target="#categoryModal">
                                    Choose Categories
                                </button>
                            </div>

                            <!-- Output per le categorie selezionate -->
                            <div class="row mt-4 align-items-center" id="selectedCategories">
                                <label class="col-md-4 col-form-label text-md-right" for="selectedCategories">Categories selected:</label>
                                <div class="col-md-6">
                                    <div id="selectedCategoriesList"></div>
                                </div>
                            </div>
                            
                                @if ($errors->has('types'))
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $errors->first('types') }}</strong>
                </span>
            @endif
                        </div>

                            <div class="mb-4 row">
                                <label for="image"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                                <div class="col-md-6">
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        id='image' value="{{ old('image') }}" name="image">
                                    @error('image')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" autocomplete="address" autofocus required>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="phone"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="phone"
                                        value="{{ old('phone') }}" autocomplete="phone" autofocus required title="phone number must be 10 numeric digits" pattern="\d{10}">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="vat"
                                    class="col-md-4 col-form-label text-md-right">{{ __('VAT') }}</label>

                                <div class="col-md-6">
                                    <input id="vat" type="text"
                                        class="form-control @error('vat') is-invalid @enderror" name="vat"
                                        value="{{ old('vat') }}" autocomplete="vat" autofocus required pattern="^IT[0-9]{9}$" title="VAT must be of 11 digits">

                                    @error('vat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                            <div class="mb-4 row mb-0">
                                <div class="col text-center">
                                    <button type="submit" class="btn reg-button">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
    </div>

    <!-- modal for types -->
    <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel">Choose categories for you restaurant</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="checkbox-container">
                        @foreach ($types as $type)
                            <div class="checkbox-item">
                                <input class="checkbox" type="checkbox" value="{{$type->id}}" id="{{ $type->type }}" name="types[]"
                                {{ in_array($type->id, old('types', [])) ? 'checked' : '' }}>
                                <label class="label-type" for="{{ $type->type }}">
                                    {{ $type->type }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn reg-button" data-bs-dismiss="modal" onclick="updateSelectedCategories()">Save</button>
                </div>
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

.checkbox-container {
    display: flex;
    flex-wrap: wrap;
    gap: 25px;
}

.checkbox-item {
    display: flex;
    align-items: center;
    width: 200px;

    .checkbox{
        margin-right: 10px;
    }
}

</style>


<script>
    function updateSelectedCategories() {
        let selectedCategories = [];
        document.querySelectorAll('.checkbox:checked').forEach(function(checkbox) {
            selectedCategories.push(checkbox.nextElementSibling.textContent);
        });
        document.getElementById('selectedCategoriesList').textContent = selectedCategories.join(', ');
    }
</script>