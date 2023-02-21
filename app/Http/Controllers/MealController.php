<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Meal.index', [
            'meals' => Meal::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Meal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //post
        $request->validate([
            "name" => ['required'],
            "description" => ['required'],
            "price" => ['required', 'numeric'],
            "thumbnail" => ['required']
        ]);

        $meal = new Meal();
        $meal->name = $request->input('name');
        $meal->description = $request->input('description');
        $meal->price = $request->input('price');

        $path = $request->file('thumbnail')->store('public/assets/img/meals');
        
        $meal->image = '/storage/'. substr($path,7);
        
        $meal->save();
        return redirect()->route('meal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Meal $meal)
    {
        //
        return view('Meal.show',['meal'=>$meal]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Meal $meal)
    {
        //
        return view('Meal.edit',['meal'=>$meal]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meal $meal)
    {
        //Put | patch
        
        $request->validate([
            "name" => ['required'],
            "description" => ['required'],
            "price" => ['required', 'numeric'],
        ]);

        $meal->name = $request->input('name');
        $meal->description = $request->input('description');
        $meal->price = $request->input('price');
        if($request->file('thumbnail') != null){
            $path = $request->file('thumbnail')->store('public/assets/img/meals');
            $meal->image = '/storage/'. substr($path,7);
        }
        $meal->save();
        return redirect()->route('meal.show', ['meal' => $meal]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal)
    {
        //
        $meal->delete();
        return redirect()->route('meal.index');
    }
}
