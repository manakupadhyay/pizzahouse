<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;

class PizzaController extends Controller
{
    // below constructor will apply the authentication to all the functions in the class
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        // $pizzas = Pizza::all();
        // $pizzas = Pizza::orderBy('name','desc')->get();
        // $pizzas = Pizza::where('type', 'onion')->get();
        $pizzas = Pizza::latest()->get();

        // $name = request('name');        // query parameter
        return view('pizzas.index', ['pizzas' => $pizzas]);
    }
    public function show($id)
    {
        // $pizza = Pizza::find($id);
        $pizza = Pizza::findOrFail($id); //--> if found return else show the not found page
        return view('pizzas.show', ['pizza' =>  $pizza]);
    }
    public function create()
    {
        return view('pizzas.create');
    }
    public function store()
    {
        error_log(request('name')); // logs it to console

        $pizzaobj = new Pizza();

        $pizzaobj->name = request('name');
        $pizzaobj->base = request('base');
        $pizzaobj->type = request('type');
        $pizzaobj->toppings = request('toppings');

        $pizzaobj->save();

        // with(key,value) is used to send a message to the specified url
        return redirect('/')->with('message', 'Thanks for the order');
    }
    public function destroy($id)
    {
        $pizza = Pizza::findOrFail($id);
        $pizza->delete();

        return redirect('/pizzas');
    }
}
