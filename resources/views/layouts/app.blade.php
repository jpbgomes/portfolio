<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <meta name="description"
        content="Welcome to my portfolio! I am an enthusiastic developer passionate about leveraging technology to create innovative solutions that drive business success. My goal is to foster win-win situations, leaving a positive footprint in the world through collaboration and creativity.">
    <meta name="keywords"
        content="developer, web developer, software engineer, IT, technology, PHP, JavaScript, HTML, CSS, programming, full-stack developer, UX/UI design, innovation, problem-solving">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://jpbgomes.com">

    <!-- Meta Tags Open Graph -->
    <meta property="og:title" content="JPB Gomes | Passionate Developer and Innovator">
    <meta property="og:description"
        content="Explore the portfolio of JPB Gomes, an enthusiastic developer dedicated to creating impactful solutions through technology. Discover innovative projects, problem-solving approaches, and a commitment to leaving a positive mark on the world.">
    <meta property="og:image" content="https://jpbgomes.com/logo.png">
    <meta property="og:url" content="https://jpbgomes.com">
    <meta property="og:type" content="website">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KQ7CFG8CDJ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-KQ7CFG8CDJ');
    </script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    @livewireStyles

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body id="body" class="font-sans antialiased bg-newblack px-5 md:px-0">
    <x-banner />

    <main>
        {{ $slot }}

        @livewire('footer')
    </main>

    @stack('modals')
    @livewireScripts
</body>

</html>
