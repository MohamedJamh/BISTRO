<x-layout title="Create an account">
    <form action="{{route('user.store')}}" method="post" class="flex flex-col items-center gap-4">
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
    </form>
</x-layout>