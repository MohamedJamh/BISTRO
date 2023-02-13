<x-layout title="Consulting a Meal">
    
<div class="w-full bg-white border border-gray-200 rounded-lg shadow ">
    <a href="#">
        <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
    </a>
    <div class="p-5">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{$meal->name}}</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700">{{$meal->description}}</p>
        <small>{{$meal->price}} DH</small>
        @if (auth()->user()->roles()->where('name','Admin')->exists())
            <div class="flex gap-2 my-2">
                <x-button>
                    <a href="{{ route('meal.edit',['meal'=>$meal]) }}">edit</a>
                </x-button>
                <form action="{{route('meal.destroy',['meal'=>$meal])}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <x-button>
                        <button type="submit">Delete</button>
                    </x-button>
                </form>
            </div>
        @endif
    </div>
</div>
</x-layout>