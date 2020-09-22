<?php

namespace App\Http\Controllers;


use App\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phoneNumber' => ['required', 'number', 'max:10','min:10'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Guest::create([
            'role_id' => '4',
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'email' => $data['email'],
            'phoneNumber' => $data['phoneNumber'],
        ]);
    }
    public function store(Request $request)
    {
        $guest = new Guest();
        $guest->firstName = request('firstName');
        $guest->lastName = request('lastName');
        $guest->email = request('email');
        $guest->phoneNumber = request('phoneNumber');
        $guest->save();
        $guestsave = $guest->save();
        if ($guestsave) {
            return redirect('/tickets/book')->with("status", "Signed In");
        } else {
            return redirect('/book')->with("error", "Please Try Again");
        }
    }
}
