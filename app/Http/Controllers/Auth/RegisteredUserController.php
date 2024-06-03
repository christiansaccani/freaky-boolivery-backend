<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Type;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $types = Type::all();
        return view('auth.register', compact('types'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $data = $request->all();
        $request->validate(
            [
                // USER VALIDATION RULES
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],

                // RESTAURANT VALIDATION RULES
                'restaurant_name' => ['required', 'string', 'max:255'],
                'address' => ['nullable', 'string', 'max:255'],
                'phone' => ['nullable', 'string', 'min:10', 'max:10'],
                'vat' => ['nullable', 'string', 'min:11', 'max:11', 'unique:' . Restaurant::class],
                'types' => ['required', 'array'],
            ],

            //USER VALIDATION MESSAGES

            [
                'name.required' => 'You must enter a name',
                'name.string' => 'The name must consist of letters or letters and numbers',
                'name.max' => 'The name must be less than 255 characters',

                // Surname messages
                'surname.required' => 'You must enter a surname',
                'surname.string' => 'The surname must consist of letters',
                'surname.max' => 'The surname must be less than 255 characters',

                // Email messages
                'email.required' => 'You must enter an email',
                'email.string' => 'The email must consist of letters or letters and numbers',
                'email.lowercase' => 'The email must be in lowercase',
                'email.email' => 'The email must be valid',
                'email.max' => 'The email must be less than 255 characters',
                'email.unique' => 'The email must be unique',

                // Password messages
                'password.required' => 'Devi inserire una password',
                'password.confirmed' => 'Devi confermare la password',



                // ---------------------------------------------------------------------------------------------------


                // RESTAURANT VALIDATION RULES

                // Name messages
                'restaurant_name.required' => 'You must enter a name',
                'restaurant_name.string' => 'The name must consist of letters or letters and numbers',
                'restaurant_name.max' => 'The name must be less than 255 characters',

                // Address messages
                'address.required' => 'You must enter an address',
                'address.string' => 'The address must consist of letters or letters and numbers',
                'address.max' => 'The address must be less than 255 characters',

                // Phone messages
                'phone.string' => 'The phone number must consist of digits',
                'phone.min' => 'The phone number must be at least 10 characters long',
                'phone.max' => 'The phone number must be at most 10 characters long',


                // VAT messages
                'vat.required' => 'VAT is required',
                'vat.number' => 'The VAT number must consist of digits',
                'vat.max' => 'VAT must be 11 characters long',
                'vat.min' => 'VAT must be 11 characters long',


                // Types messages
                'types.required' => 'You must choose a typology for your restaurant',
            ]


        );


        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        $restaurant = Restaurant::create([
            'user_id' => $user->id,
            'name' => $request->restaurant_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'vat' => $request->vat,
            'image' => $request->image,
            'type' => $request->type,
        ]);

        // check if the image is present
        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('restaurant_images', $request->file('image'));
            $restaurant->image = $path;
        }

        if (Arr::exists($data, "types")) $restaurant->types()->attach($data["types"]);
        $restaurant->save();




        event(new Registered($user));
        event(new Registered($restaurant));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
