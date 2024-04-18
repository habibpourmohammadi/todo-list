<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/icon/icon.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>.:: Todo List ::.</title>
</head>

<body class="bg-gray-100">
    <main class="container m-auto">
        <h1 class="text-center text-5xl mt-5 text-zinc-500 font-bold">TODO LIST</h1>
        <livewire:todo.create>
    </main>
</body>

</html>
