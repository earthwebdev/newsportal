<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ Config('app.name') }}</title>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <x-base.back.navbar />
   <div class="container mt-4">
        <div class="row">
            <div class="col-md-3"><x-base.back.sidebar/></div>
            <div class="col-md-9">{{ $slot }}</div>
        </div>
    </div>
</body>
</html>
