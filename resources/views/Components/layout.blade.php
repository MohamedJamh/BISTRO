@props(['title'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
    <title>{{$title}}</title>
</head>
<body>
    <x-navbar></x-navbar>
    <main>
        <div>
            @foreach ($errors->all() as $error)
                <p class="mx-3 bg-red-200 text-white rounded-lg"><small>{{$error}}</small></p>
            @endforeach
        </div>
        <div id="info-div">
            @if (session('info-message'))
                <p class="mx-3 bg-sky-200 text-slate-100 rounded-lg">
                    {{session('info-message')}}
                    <a href="#" onclick="document.getElementById('info-div').classList.add('hidden')">x</a>
                </p>
            @endif
        </div>
        {{$slot}}
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>
</html>