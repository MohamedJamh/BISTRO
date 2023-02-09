<x-layout title="Add New Meal">
    <form action="{{route('meal.store')}}" method="post" class="flex flex-col items-center gap-4">
        @csrf
        <p>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="border border-black rounded-lg" value="{{old('description')}}">
        </p>
        <p>
            <label for="description">Description</label>
            <textarea name="description" id="description" class="border border-black rounded-lg" cols="30" rows="10">{{old('description')}}
            </textarea>
        </p>
        <p>
            <label for="price">Price</label>
            <input type="number" min="10" name="price" id="price" class="border border-black rounded-lg" value="{{old('description')}}">
        </p>
        <button class="border border-black rounded-lg px-4 w-32"  type="submit">Add Meal</button>
    </form>
</x-layout>