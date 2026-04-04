<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'title' => 'Aakrithi | Premium Women\'s Ethnic Wear & Designer Kids Clothing Boutique',
    'description' => 'Discover Aakrithi – your destination for designer ethnic wear, handloom sarees, and trendy kids\' party wear. From traditional kurtis to festive children\'s outfits, find timeless style for the whole family.',
    'keywords' => 'Aakrithi, women\'s ethnic wear online, designer sarees India, kids party wear, traditional kids clothing, handcrafted Indian boutique, sustainable fashion, designer kurtis, Kerala sarees, festive children\'s outfits, newborn baby clothes online, bridal ethnic wear, artisanal fashion',
    'image' => asset('images/logo.png'),
    'url' => url()->current(),
    'isNoindex' => false,
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'title' => 'Aakrithi | Premium Women\'s Ethnic Wear & Designer Kids Clothing Boutique',
    'description' => 'Discover Aakrithi – your destination for designer ethnic wear, handloom sarees, and trendy kids\' party wear. From traditional kurtis to festive children\'s outfits, find timeless style for the whole family.',
    'keywords' => 'Aakrithi, women\'s ethnic wear online, designer sarees India, kids party wear, traditional kids clothing, handcrafted Indian boutique, sustainable fashion, designer kurtis, Kerala sarees, festive children\'s outfits, newborn baby clothes online, bridal ethnic wear, artisanal fashion',
    'image' => asset('images/logo.png'),
    'url' => url()->current(),
    'isNoindex' => false,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<title><?php echo e($title); ?></title>
<meta name="description" content="<?php echo e($description); ?>">
<meta name="keywords" content="<?php echo e($keywords); ?>">
<link rel="canonical" href="<?php echo e($url); ?>" />

<?php if($isNoindex): ?>
<meta name="robots" content="noindex, nofollow">
<?php else: ?>
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
<?php endif; ?>

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="<?php echo e($url); ?>">
<meta property="og:title" content="<?php echo e($title); ?>">
<meta property="og:description" content="<?php echo e($description); ?>">
<meta property="og:image" content="<?php echo e($image); ?>">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="<?php echo e($url); ?>">
<meta property="twitter:title" content="<?php echo e($title); ?>">
<meta property="twitter:description" content="<?php echo e($description); ?>">
<meta property="twitter:image" content="<?php echo e($image); ?>">
<?php /**PATH D:\New folder\Git uploads\aakrithi-v1\resources\views/components/seo-meta.blade.php ENDPATH**/ ?>