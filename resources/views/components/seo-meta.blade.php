@props([
    'title' => 'Aakrithi | Premium Boutique for Designer Ethnic Wear & Sarees',
    'description' => 'Discover Aakrithi – your destination for handloom sarees, designer kurtis, and exquisite ethnic wear. Elevate your wardrobe with our curated artisanal collections.',
    'keywords' => 'Aakrithi, ethnic wear online, handloom sarees, designer kurtis, Indian boutique, sustainable fashion, artisanal clothing',
    'image' => asset('images/logo.png'),
    'url' => url()->current(),
    'isNoindex' => false,
])

<title>{{ $title }}</title>
<meta name="description" content="{{ $description }}">
<meta name="keywords" content="{{ $keywords }}">
<link rel="canonical" href="{{ $url }}" />

@if($isNoindex)
<meta name="robots" content="noindex, nofollow">
@else
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
@endif

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ $url }}">
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:image" content="{{ $image }}">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ $url }}">
<meta property="twitter:title" content="{{ $title }}">
<meta property="twitter:description" content="{{ $description }}">
<meta property="twitter:image" content="{{ $image }}">
