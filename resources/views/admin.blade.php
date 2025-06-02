<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body>
    <nav class='bg-white shadow-md px-4 py-3'>
       <div class="flex justify-between item-center">
        <div class="text-2xl hover:text-blue-500 cursor-pointer">
            Quiz System
        </div>
        <div class="space-x-4">
            <a href="" class="text-gary-700 hover:text-blue-500"> Categories </a>
            <a href=""class="text-gary-700 hover:text-blue-500"> Quiz </a>
            <a href=""class="text-gary-700 hover:text-blue-500"> Welcome {{$name}}</a>
            <a href=""class="text-gary-700 hover:text-blue-500"> Logout</a>

        </div>
       </div>
    </nav>
</body>
</html>