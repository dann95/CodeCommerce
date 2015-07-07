<?php namespace CodeCommerce\Services;

use CodeCommerce\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
            'cep' => ['required' , 'min:8','max:9'],
            'rua' => ['required'],
            'bairro' => ['required'],
            'complemento' => ['required'],
            'cidade' => ['required']
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
        $data['password'] = bcrypt($data['password']);
		return User::create($data);
	}

}
