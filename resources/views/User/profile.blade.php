<x-layout title="Profile">
    <div class="my-2">
        <form class="w-full md:w-2/5 mx-auto p-5 border-2 rounded-lg" action="{{route('user.change-details')}}" method="POST">
            @method('PUT')
            @csrf
            <h2 class="text-2xl font-bold">User Informaitons</h2>
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Your Full Name</label>
                <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{$user->name}}" required>
            </div>
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Your Email Adress</label>
                <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{$user->email}}" required>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Change Details</button>
        </form>
    </div>
    <div class="my-2 ">
        <form class="w-full md:w-2/5 mx-auto p-5 border-2 rounded-lg" action="{{route('user.reset-password')}}" method="POST">
            @method('PUT')
            @csrf
            <h2 class="text-2xl font-bold">Reset Password</h2>
            <div class="mb-6">
                <label for="current-password" class="block mb-2 text-sm font-medium text-gray-900 ">Your Current Password</label>
                <input type="password" id="current-password" name="current_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
            </div>
            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Your New Password</label>
                <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
            </div>
            <div class="mb-6">
                <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 ">Repeat New Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Change Password</button>
        </form>
    </div>
</x-layout>