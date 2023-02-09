<x-layout title="Consulting a Meal">
    <div>
        <br>
        <h2>{{$meal->name}}</h2>
        <p>{{$meal->description}}</p>
        <small>{{$meal->price}}</small>
    </div>
    <div class="flex gap-2">
        <a href="{{ route('meal.edit',['meal'=>$meal]) }}">edit</a>
        <form action="{{route('meal.destroy',['meal'=>$meal])}}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit">Delete</button>
        </form>
    </div>
</x-layout>