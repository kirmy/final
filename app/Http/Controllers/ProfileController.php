<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { //View::make('profiles.create');
	//dd('create');
		return view('profiles.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'name' => request('name'),
            'birthday' => request('birthday'),
            'email' => request('email'),
            'telefon' => request('telefon'),
            'url' => request('url'),
			'addition' => request('addition'),
			'image' => request('image')
        ];
		
        if ($this->validateData($data)) {
            //dd($data);
			$imageName =  Auth::user()->login . '.' . $request->file('image')->getClientOriginalExtension();
			$data['imagefilename'] = $request->file('image')->storeAs('images', $imageName);
			//dd($data);
			
			//$data->imagefilename
            Auth::user()->profile()->create($data);
            //dd($data);
			return redirect('/users');
			//return response('', 201); 
        }
		else dd('store:fail validation');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show($login)
    {	//dd('show', $login);
        $profile = User::where('login', $login)->firstOrFail()->profile;
        //$c = compact('profile');
        $name = $profile->name;
        $birthday = $profile->birthday;
        $email = $profile->email;
        $telefon = $profile->telefon;
        $url = $profile->url;
        //var_dump($name, $birthday, $email);
        return view('profiles.show')->with('profile', $profile);
		//return view('profile', compact('name','birthday','email', 'telefon', 'url'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit($login)
    { 	//dd('edit', $login);
        $profile = User::where('login', $login)->first()->profile;
        //dd($login);
        //return view('profile', compact('name','birthday','email', 'telefon', 'url'));
        return view('profiles.edit', ['profile' => $profile, 'login' => $login]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $login)
    {	//dd($login);
		$profile = User::where('login', $login)->first()->profile;
        $data = [
            'name' => request('name'),
            'birthday' => request('birthday'),
            'email' => request('email'),
            'telefon' => request('telefon'),
            'url' => request('url'),
			'addition' => request('addition'),
			'imagefilename' => request('imagefilename'),
        ];
		dd($data['imagefilename']);
        if ($this->validateData($data)) {
            //dd($data);
            //Auth::user()->
			$profile->update($data);
            return redirect('/users');
			//return response('', 201);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy($login)
    {	//dd('destroy', $login);
        $profile = User::where('login', $login)->first()->profile;
        //dd($profile);
		$profile->delete();
        return redirect('/users');
    }

    public function validateData($data)
    {
        $rules = [
            'name' => 'required|min:3',
            'birthday' => 'nullable|date',
            'email' => 'nullable|email',
            'telefon' => 'nullable|numeric',
            'url' => 'nullable|url',
			'image' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ];

        $validator = \Validator::make($data, $rules);
        $validator->validate();

        if ($validator->passes()) {
            return $data;
        }
		dd('Fail validation');
        return false;
	}
}
	
/*	public function destroyProfile($login)
	{	
		$profile = User::where('login', $login)->first()->profile;
		if (confirm('Удалить профиль'.$profile->name)){
			return view('profiles.destroy', ['profile' => $profile, 'login' => $login]);
		}
		return redirect('/users');
}
