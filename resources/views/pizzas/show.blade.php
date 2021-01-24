@extends('layouts.app')

@section('content')
<div class="wrapper pizza-details">
  <h1>Order for {{ $pizza->name }}</h1>
  <p class="type">Type - {{ $pizza->type }}</p>
  <p class="base">Base - {{ $pizza->base }}</p>
  <p class="toppings">Extra toppings:</p>
  <ul>
    @foreach($pizza->toppings as $topping)
      <li>{{ $topping }}</li>
    @endforeach
  </ul>
  <!-- browsers don't understand DELETE mthod always, so write POST -->
  <form action="/pizzas/{{ $pizza->id }}" method="POST">
    @csrf
    <!-- then here we are overriding the POST request and setting it to DELETE -->
    @method('DELETE')
    <button>Complete Order</button>
  </form>
</div>
<a href="/pizzas" class="back"><- Back to all pizzas</a>
@endsection