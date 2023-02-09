<x-layout title="all Meals">
    <p>
        <a href="{{route('meal.create')}}">Add new meal</a>
    </p>
    <div>
        @foreach ($meals as $meal)
            <div>
                <br>
                <h2>
                    <a href="{{ route('meal.show',['meal'=>$meal->id]) }}">{{$meal->name}}</a>
                </h2>
                <p>{{$meal->description}}</p>
                <small>{{$meal->price}}</small>
            </div>
        @endforeach
    </div>
</x-layout>