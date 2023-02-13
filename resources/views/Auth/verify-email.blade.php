<x-layout title="Email verification">
    <div class="px-5 bg-green-700 text-slate-200 mx-auto w-1/2 py-4 rounded-lg text-start">
        Please Verify your email
        <form action="{{route('verification.send')}}" method="POST">
            @csrf
            <button type="submit" class="text-sky-400 pointer">Need a verify email</button>
        </form>
    </div>
</x-layout>