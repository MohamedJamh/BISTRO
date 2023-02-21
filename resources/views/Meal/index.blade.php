<x-layout title="all Meals">
    <x-button>
        <a href="{{route('meal.create')}}">Add new meal</a>
    </x-button>
    <div class="flex flex-wrap ">
        @foreach ($meals as $meal)
            <x-meal-card title="{{$meal->name}}" price="{{$meal->price}}" image="{{$meal->image}}" meal_id="{{$meal->id}}" ></x-meal-card>
        @endforeach
    </div>
</x-layout>