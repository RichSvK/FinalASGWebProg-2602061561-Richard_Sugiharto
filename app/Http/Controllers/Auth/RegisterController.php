<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Work;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'linkedin' => ['required', 'string', 'regex:/^https:\/\/www\.linkedin\.com\/in\/[a-zA-Z0-9_-]+$/'],
            'mobile_number' => ['required', 'regex:/^\d{5,}$/'],
            'gender' => ['required', 'in:Male,Female'],
            'registration' => ['required', 'numeric', 'between:100000,125000'],
            'birth' => ['required', 'date', 'before:today'],
            'works' => ['required', 'array', 'min:3'],
            'works.*' => ['required', 'string', 'max:255'],
        ]);
    }

    protected function create(array $data){
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'gender' => $data['gender'],
            'linkedin_profile' => $data['linkedin'],
            'mobile_number' => $data['mobile_number'],
            'coin' => -$data['registration'],
            'birth_date' => $data['birth'],
            'password' => Hash::make($data['password']),
        ]);

        foreach($data['works'] as $work){
            Work::create([
                'userId' => $user->id,
                'work' => $work,
            ]);
        }

        return $user;
    }
}
