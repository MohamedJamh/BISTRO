
<x-layout title="Log in to your account">
    <form action="{{route('authenticate')}}" method="POST" class="md:w-1/2 mt-5 mx-auto">
        @csrf
        <div class="mb-6">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Your email</label>
            <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="name@flowbite.com" required>
        </div>
        <div class="mb-6">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Your password</label>
            <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
        </div>
        <div class="flex gap-2 justify-between">
            <a class="text-sky-500 underline" href="{{ route('password.request') }}">Forgot Password ?</a>
            <x-button>
                <button  type="submit">Authenticate</button>
            </x-button>
        </div>
    </form>
</x-layout>