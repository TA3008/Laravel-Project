<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Enlink - Admin Dashboard Template</title>

    <link rel="shortcut icon" href="/assets/images/logo/favicon.png">
    <link href="/assets/css/app.min.css" rel="stylesheet">
    @livewireStyles
</head>

<body>
    <div class="app">
        {{ $slot }}
    </div>
    <script src="/assets/js/vendors.min.js"></script>
    <script src="/assets/js/app.min.js"></script>
    @livewireScripts
</body>

</html>