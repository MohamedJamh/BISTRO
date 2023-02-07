
<x-layout title="loginn">
    <form action="{{route('authenticate')}}" method="post" class="flex flex-col items-center gap-4">
        <p>
            @csrf
        </p>
        <p>
            <label for="email">Adress</label>
            <input type="text" name="email" id="email" class="border border-black rounded-lg">
        </p>
        <p>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="border border-black rounded-lg">
        </p>
        <button class="border border-black rounded-lg px-4 w-32"  type="submit">Authenticate</button>
    </form>
</x-layout>