
<?php $__env->startSection('title', ($title ?? 'Shop') . ' - Aakrithi'); ?>
<?php $__env->startSection('meta_title', $title ?? 'Shop Our Collection | Aakrithi Premium Boutique'); ?>
<?php $__env->startSection('meta_description', $meta_description ?? 'Browse our exclusive range of Designer Kurthies, Kerala Sets, and Embroidered Sarees. Quality artisanal wear for every occasion.'); ?>
<?php $__env->startSection('meta_keywords', $meta_keywords ?? 'Aakrithi shop, designer apparel, ethnic wear online, boutique sarees'); ?>

<?php $__env->startSection('structured_data'); ?>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [{
        "@type": "ListItem",
        "position": 1,
        "name": "Home",
        "item": "<?php echo e(route('home')); ?>"
    }, {
        "@type": "ListItem",
        "position": 2,
        "name": "<?php echo e($title ?? 'Shop'); ?>",
        "item": "<?php echo e(url()->current()); ?>"
    }]
}
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container shop-page">
    <div class="shop-header">
        <h1><?php echo e($title ?? 'All Shop'); ?></h1>
        <p class="product-count"><?php echo e(count($products)); ?> Products</p>
    </div>

    <div class="shop-toolbar">
        <button class="filter-toggle"><i data-lucide="sliders-horizontal"></i> Filters</button>
        <div class="shop-controls">
            <div class="sort-control">
                <span>Sort by:</span>
                <select id="price-sort" onchange="sortProducts(this.value)">
                    <option value="latest" <?php echo e(request('sort') == 'latest' ? 'selected' : ''); ?>>Featured</option>
                    <option value="price-low" <?php echo e(request('sort') == 'price-low' ? 'selected' : ''); ?>>Price: Low to High</option>
                    <option value="price-high" <?php echo e(request('sort') == 'price-high' ? 'selected' : ''); ?>>Price: High to Low</option>
                    <option value="newest" <?php echo e(request('sort') == 'newest' ? 'selected' : ''); ?>>Newest</option>
                </select>
            </div>
        </div>
    </div>

    <div class="products-grid">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route('product', $product->slug)); ?>" class="product-card" style="text-decoration:none; color:inherit;">
            <div class="product-image-container">
                <?php if($product->badge): ?>
                <span class="badge"><?php echo e($product->badge); ?></span>
                <?php endif; ?>
                <img src="<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>" class="product-image" loading="lazy">
                <div class="product-overlay">
                    <span class="overlay-btn primary">
                        <i data-lucide="shopping-bag"></i>
                    </span>
                    <button class="overlay-btn" onclick="event.preventDefault(); addToWishlist(<?php echo e($product->id); ?>);"><i data-lucide="heart"></i></button>
                </div>
            </div>
            <div class="product-info">
                <p class="product-category"><?php echo e($product->category); ?></p>
                <h3 class="product-name"><?php echo e($product->name); ?></h3>
                <p class="product-price">₹<?php echo e(number_format($product->price)); ?></p>
            </div>
        </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
function sortProducts(value) {
    const url = new URL(window.location.href);
    url.searchParams.set('sort', value);
    window.location.href = url.toString();
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\New folder\Git uploads\aakrithi-v1\resources\views/shop.blade.php ENDPATH**/ ?>