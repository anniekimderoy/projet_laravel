<!DOCTYPE html>
<html lang="en" class="h-full bg-indigo-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes de cours</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
</head>

<body class="h-full bg-indigo-950 overflow-hidden pt-0.5">

    {{-- Message de confirmaiton d'ajout d'une note --}}
    <x-alertes.succes cle="succes" />

    <div class="h-full m-auto">
        <h1
            class="font-mono text-indigo-100 mt-64 text-center sm:text-left sm:ps-20 xl:ps-48 text-2xl sm:text-4xl md:text-6xl xl:text-8xl relative font-semibold before:content-['>'] before:mr-4 before:inline-block after:content-[''] after:inline-block after:ml-1 sm:after:ml-4 after:absolute after:w-0.5 sm:after:w-1 md:after:w-2 xl:after:w-4 after:h-full after:scale-y-125 after:bg-indigo-100">
            Notes de cours.</h1>

        <div class="flex pt-64 justify-center md:justify-end md:pr-24">
            <a href="{{ route('connexion.create') }}"
                class="text-indigo-100 text-lg sm:text-xl md:text-2xl font-semibold p-2 md:p-4 rounded-md block text-center w-1/3 sm:w-1/4 border-2 border-indigo-100 hover:border-0 hover:bg-indigo-100 hover:text-indigo-900">
                Go.
            </a>
        </div>
    </div>

</body>

</html>
