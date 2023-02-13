<x-layout title="Reset Your Password">
    <div class="h-screen flex justify-center ">
        <form action="{{route('password.email')}}" method="POST" class="border-2 p-5 rounded-lg h-fit mt-20 w-full md:w-2/5">
            @csrf
            <h2 class="text-2xl font-bold mb-5">Reset Password</h2>
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Your email</label>
                <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="adress@email.com" required>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
        </form>
    </div>
</x-layout>