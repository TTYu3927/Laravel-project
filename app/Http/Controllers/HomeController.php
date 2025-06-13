<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use Storage;

class HomeController extends Controller
{
    public function index(){
        return view('home', [
        ]);
    }
    public function store(Request $request)
    {
        // $filename = $request->file('image')->getClientOriginalName();
        // $request->file('image')->move(public_path('images'), $filename);
        $image = $request->file('image');
        Storage::disk('public')->putFileAs('uploads', $image, 'prot.jpg');

    }
    public function about(){
        return view('about');
    }
    public function contact()
    {
        return view('contact');
    }


    public function submit(StorePostRequest $request)
    {
        $validatedData = $request->validated();

        return redirect()->back()->with('success', 'Form submitted successfully!');
             
    }
    public function adminpage(){
        return view('admin');
    }
}

