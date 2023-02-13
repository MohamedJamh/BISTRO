<x-layout title="Edit a Meal">
    
    
    <form action="{{route('meal.update',['meal'=>$meal])}}" method="post" class="md:w-1/2 mt-5 mx-auto">
        @method('PUT')
        @csrf
        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Meal Name</label>
            <input value="{{$meal->name}}" type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="" required>
        </div>
        <div class="mb-6">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Description</label>
            <textarea name="description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " cols="30" rows="10">{{$meal->description}}</textarea>
        </div>
        <div class="mb-6">
            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Price</label>
            <input value="{{$meal->price}}" type="number" id="price" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
        </div>
        <div class="flex gap-2 justify-between">
            <x-button>
                <button  type="submit">Edit Meal</button>
            </x-button>
        </div>
    </form>
</x-layout>