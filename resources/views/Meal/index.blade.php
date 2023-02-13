<x-layout title="all Meals">
    <x-button>
        <a href="{{route('meal.create')}}">Add new meal</a>
    </x-button>
    <div class="flex flex-wrap gap-2 justify-center">
        @foreach ($meals as $meal)
            <x-meal-card title="{{$meal->name}}" price="{{$meal->price}}" meal_id="{{$meal->id}}" ></x-meal-card>
        @endforeach
    </div>
</x-layout>