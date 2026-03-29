
<?php $__env->startSection('meta_title', setting('site_title', 'Aakrithi - Modern Fashion Ecommerce')); ?>
<?php $__env->startSection('meta_description', setting('site_description', 'Discover our curated collection of artisanal clothing designed for comfort and elegance.')); ?>
<?php $__env->startSection('meta_keywords', setting('meta_keywords', 'fashion, artisanal, ethnic wear, saree, kurta')); ?>

<?php $__env->startSection('content'); ?>

<section class="hero">
    <div class="hero-content fade-in-up">
        <span class="hero-subtitle">Spring / Summer 2026</span>
        <h1 class="hero-title">Timeless Style for the Modern Soul</h1>
        <p class="hero-description">Discover our curated collection of artisanal clothing designed for comfort and elegance.</p>
        <div class="hero-actions">
            <a href="<?php echo e(route('shop')); ?>" class="btn-primary">Shop Collection <i data-lucide="arrow-right"></i></a>
            <a href="<?php echo e(route('about')); ?>" class="btn-secondary">Explore Stories</a>
        </div>
    </div>
</section>


<div class="container">
    <div class="section-header">
        <div>
            <h2>Shop by Category</h2>
        </div>
        <a href="<?php echo e(route('shop')); ?>">View All</a>
    </div>
    <div class="categories-grid">
        <a href="<?php echo e(route('category', 'apparels')); ?>" class="category-item">
            <img src="<?php echo e(asset('images/cat_dresses.png')); ?>" alt="Designer Kurthies" loading="lazy">
            <div class="category-overlay">Designer Kurthies</div>
        </a>
        <a href="<?php echo e(route('category', 'kutties')); ?>" class="category-item">
            <img src="<?php echo e(asset('images/cat_sets.png')); ?>" alt="Kerala Sets" loading="lazy">
            <div class="category-overlay">Kerala Sets</div>
        </a>
        <a href="<?php echo e(route('category', 'decors')); ?>" class="category-item">
            <img src="<?php echo e(asset('images/cat_sarees.png')); ?>" alt="Embroidered Sarees" loading="lazy">
            <div class="category-overlay">Embroidered Sarees</div>
        </a>
    </div>

    
    <div class="section-header">
        <div>
            <h2>Signature Collections</h2>
            <p>Handpicked pieces for your wardrobe</p>
        </div>
        <a href="<?php echo e(route('shop')); ?>">View All</a>
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

    
    <div class="section-header center">
        <h2>Follow @aakrithiclothing</h2>
        <p>Inspired by our community around the globe</p>
    </div>
    <div class="instagram-grid">
        <div class="instagram-item"><img src="<?php echo e(asset('images/insta_1.png')); ?>" alt="Instagram post" loading="lazy"></div>
        <div class="instagram-item"><img src="<?php echo e(asset('images/prod_1.png')); ?>" alt="Instagram post" loading="lazy"></div>
        <div class="instagram-item"><img src="<?php echo e(asset('images/prod_2.png')); ?>" alt="Instagram post" loading="lazy"></div>
        <div class="instagram-item"><img src="<?php echo e(asset('images/prod_3.png')); ?>" alt="Instagram post" loading="lazy"></div>
        <div class="instagram-item"><img src="<?php echo e(asset('images/cat_dresses.png')); ?>" alt="Instagram post" loading="lazy"></div>
        <div class="instagram-item"><img src="<?php echo e(asset('images/cat_sets.png')); ?>" alt="Instagram post" loading="lazy"></div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\aakriti-laravel\resources\views/home.blade.php ENDPATH**/ ?>