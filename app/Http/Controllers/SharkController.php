<?php

namespace App\Http\Controllers;

use App\Models\Shark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class SharkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sharks = Shark::all();

        return view('sharks.index', ['sharks' => $sharks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sharks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules= array(
            'name' => 'required',
            'email' => 'required|email',
            'shark_level' => 'required|numeric'
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()){
            return redirect()->route('sharks.create')
                ->withErrors($validator);
        }

        Shark::create(['name' => $request->name, 'email' => $request->email, 'shark_level' => $request->shark_level]);


       return redirect()->route('sharks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shark  $shark
     * @return \Illuminate\Http\Response
     */
    public function show(Shark $shark)
    {
        return view('sharks.show', ['shark' => $shark]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shark  $shark
     * @return \Illuminate\Http\Response
     */
    public function edit(Shark $shark)
    {
        return view('sharks.edit', ['shark' => $shark]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shark  $shark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shark $shark)
    {
        $rules= array(
            'name' => 'required',
            'email' => 'required|email',
            'shark_level' => 'required|numeric'
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()){
            return redirect()->route('sharks.edit', $shark)
                ->withErrors($validator);
        }

        $shark = Shark::find($shark->id);
        $shark->name = $request->name;
        $shark->email = $request->email;
        $shark->shark_level = $request->shark_level;
        // dd($shark);
        $shark->save();

        return redirect()->route('sharks.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shark  $shark
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shark $shark)
    {

        $shark->delete();

        Session::flash('message', 'Succesfuly deleted shark');

        return redirect()->route('sharks.index');
    }
}
