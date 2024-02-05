<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/css/main.css">
    <title>{{ $title . ' | Blogger' ?? 'Blogger' }}</title>
</head>

<body>
    <x-main-header />
    <main>
        {{ $slot }}
    </main>
    <x-main-footer />
</body>

</html>
