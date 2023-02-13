
<x-layout title="Log in to your account">
    <form action="{{route('authenticate')}}" method="POST" class="flex flex-col items-center gap-4">
        @csrf
        <p>
            <label for="email">Adress</label>
            <input type="text" name="email" id="email" class="border border-black rounded-lg">
        </p>
        <p>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="border border-black rounded-lg">
        </p>
        <div class="flex gap-2">
            <a href="{{ route('password.request') }}">Forgot Password ?</a>
            <button class="border border-black rounded-lg px-4 w-32"  type="submit">Authenticate</button>
        </div>
    </form>
</x-layout>