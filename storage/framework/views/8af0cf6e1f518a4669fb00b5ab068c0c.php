<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'title' => 'Aakrithi Fashion & Boutique',
    'description' => 'Aakrithi brings you the finest selection of handloom sarees, designer kurtis, and exquisite ethnic wear.',
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
    'title' => 'Aakrithi Fashion & Boutique',
    'description' => 'Aakrithi brings you the finest selection of handloom sarees, designer kurtis, and exquisite ethnic wear.',
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
<?php /**PATH C:\wamp64\www\aakriti-laravel\resources\views/components/seo-meta.blade.php ENDPATH**/ ?>