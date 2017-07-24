<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
	
	/**
    * Create view file
    *
    * @return void
    */
    public function imageUpload()
    {
    	return view('uploadform');
    }

	/**
    * Manage Post Request
    *
    * @return void
    */
    public function imageUploadPost(Request $request)
    {
		$this->validate($request, [
			'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
		//$request->file('image')->store('my_image');
		$imageName = time().'.'.$request->file('image')->getClientOriginalExtension();
		//dd($request->file('image')->extension(), $request->file('image')->getClientOriginalExtension(), $request->file('image')->path());
		$request->file('image')->move(public_path('images'), $imageName);
		//$request->file('image')->store('images');
		return back()
			->with('success', 'Image Uploaded successfully.')
			->with('path', $imageName);
	}
	// public function usersList()
	// {
	// 	return view('_users');
	// }
}
