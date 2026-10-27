<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Discover the latest fashion, beauty and lifestyle from ZANDO Cambodia.">
    <title>ZANDO Cambodia | Fashion, Beauty & Lifestyle</title>
    @vite(['resources/css/app.css', 'resources/js/storefront.jsx'])
</head>
<body class="bg-white text-zinc-900 antialiased">
    <div id="storefront-root"></div>
</body>
</html>
