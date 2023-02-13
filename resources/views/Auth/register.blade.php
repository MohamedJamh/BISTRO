<x-layout title="Create an account">
    <form action="{{route('user.store')}}" method="post" class="md:w-1/2 mt-5 mx-auto">
        @csrf
        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Your Full Name</label>
            <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="john doe" required>
        </div>
        <div class="mb-6">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Your email</label>
            <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="adress@email.com" required>
        </div>
        <div class="mb-6">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Your password</label>
            <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="* * * * * *" required>
        </div>
        <div class="flex gap-2">
            <x-button>
                <button type="submit">Sign Up</button>
            </x-button>
        </div>
    </form>
    {{-- <form action="{{route('user.store')}}" method="post" class="flex flex-col items-center gap-4">
        @csrf
        <p>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="border border-black rounded-lg">
        </p>
        <p>
            <label for="email">Adress</label>
            <input type="text" name="email" id="email" class="border border-black rounded-lg">
        </p>
        <p>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="border border-black rounded-lg">
        </p>
        <div class="flex gap-2">
            <button class="border border-black rounded-lg px-4 w-32"  type="submit">Register</button>
        </div>
    </form> --}}
</x-layout>