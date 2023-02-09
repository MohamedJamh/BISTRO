<x-layout title="Edit a Meal">
    <form action="{{route('meal.update',['meal'=>$meal])}}" method="post" class="flex flex-col items-center gap-4">
        @method('PUT')
        @csrf
        <p>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="border border-black rounded-lg" value="{{$meal->name}}">
        </p>
        <p>
            <label for="description">Description</label>
            <textarea name="description" id="description" class="border border-black rounded-lg" cols="30" rows="10">{{$meal->description}}</textarea>
        </p>
        <p>
            <label for="price">Price</label>
            <input type="number" min="10" name="price" id="price" class="border border-black rounded-lg" value="{{$meal->price}}">
        </p>
        <button class="border border-black rounded-lg px-4 w-32"  type="submit">Edit Meal</button>
    </form>
</x-layout>