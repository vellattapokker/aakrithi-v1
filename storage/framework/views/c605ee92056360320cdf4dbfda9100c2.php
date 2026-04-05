
<?php $__env->startSection('body_class', 'home-page'); ?>
<?php $__env->startSection('meta_title', setting('site_title', 'Aakrithi | Premium Women\'s Ethnic Wear & Designer Kids clothing Boutique')); ?>
<?php $__env->startSection('meta_description', setting('site_description', 'Shop Aakrithi for designer women\'s ethnic wear, handcrafted sarees, and trendy kids\' party wear. Discover a curated collection of traditional Indian clothing and artisanal fashion for the entire family.')); ?>
<?php $__env->startSection('meta_keywords', setting('meta_keywords', 'Aakrithi, women\'s ethnic wear, designer sarees online, kids party wear, traditional kids sets, newborn baby clothes, designer kurtis, Indian boutique, sustainable fashion India')); ?>

<?php $__env->startSection('content'); ?>

<section class="hero cinematic-hero" style="background: url('<?php echo e(asset('images/boutique-hero.png')); ?>') no-repeat center center; background-size: cover; height: 80vh; position: relative;">
    <div class="hero-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to bottom, rgba(7, 40, 33, 0.4), rgba(7, 40, 33, 0.9));"></div>
    <div class="container h-100 d-flex flex-column align-items-center justify-content-center text-center position-relative" style="z-index: 2;">
        <div class="hero-content reveal-blur">
            <h1 class="hero-title reveal-up" style="font-family: var(--font-serif); font-size: clamp(2.5rem, 8vw, 5rem); line-height: 1.1; color: #FEFEE3; text-transform: uppercase;">it suits you better</h1>
            <p class="hero-description reveal-up reveal-delay-1" style="font-size: 1.2rem; max-width: 600px; margin: 1.5rem auto; opacity: 0.8;">Discover our curated collection of handcrafted ethnic wear and designer apparel.</p>
            <div class="hero-actions reveal-up reveal-delay-2 mt-4">
                <a href="<?php echo e(route('shop')); ?>" class="btn-primary" style="padding: 1rem 2.5rem; text-decoration: none; border-radius: 40px; display: inline-block;">Explore Collection <i data-lucide="arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>


<div class="container" style="padding: 8rem 1rem;">
    <div class="section-header reveal-up mb-5 flex-column flex-md-row text-center text-md-start gap-3">
        <div>
            <h2 style="font-family: var(--font-serif); font-size: clamp(2rem, 8vw, 3rem);">Shop by Category</h2>
            <p style="opacity:0.7;">Curated masterpieces across tradition</p>
        </div>
        <a href="<?php echo e(route('shop')); ?>" class="btn-outline-light px-4 py-2" style="text-decoration:none;">View All</a>
    </div>
    <div class="categories-grid mb-5" style="gap: 3rem;">
        <a href="<?php echo e(route('category', 'apparels')); ?>" class="category-item">
            <img src="<?php echo e(asset('images/cat_dresses.png')); ?>" alt="Designer Kurthies and Ethnic Tops | Aakrithi Collection" loading="lazy">
            <div class="category-overlay">Designer Kurthies</div>
        </a>
        <a href="<?php echo e(route('category', 'kutties')); ?>" class="category-item">
            <img src="<?php echo e(asset('images/cat_sets.png')); ?>" alt="Traditional Kerala Sets and Handloom Mundu | Aakrithi" loading="lazy">
            <div class="category-overlay">Kerala Sets</div>
        </a>
        <a href="<?php echo e(route('category', 'decors')); ?>" class="category-item">
            <img src="<?php echo e(asset('images/cat_sarees.png')); ?>" alt="Exquisite Embroidered Sarees and Designer Blouses | Aakrithi" loading="lazy">
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
                <img src="<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?> - Premium <?php echo e($product->category); ?> by Aakrithi" class="product-image" loading="lazy">
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
        <div class="instagram-item"><img src="<?php echo e(asset('images/insta_1.png')); ?>" alt="Designer ethnic wear for women - Aakrithi Style" loading="lazy"></div>
        <div class="instagram-item"><img src="<?php echo e(asset('images/prod_1.png')); ?>" alt="Handcrafted artisanal clothing collection" loading="lazy"></div>
        <div class="instagram-item"><img src="<?php echo e(asset('images/prod_2.png')); ?>" alt="Traditional kids party wear and ethnic sets" loading="lazy"></div>
        <div class="instagram-item"><img src="<?php echo e(asset('images/prod_3.png')); ?>" alt="Elegant handloom sarees and designer blouses" loading="lazy"></div>
        <div class="instagram-item"><img src="<?php echo e(asset('images/cat_dresses.png')); ?>" alt="Latest trends in women's traditional fashion" loading="lazy"></div>
        <div class="instagram-item"><img src="<?php echo e(asset('images/cat_sets.png')); ?>" alt="Aakrithi - The best boutique for family ethnic wear" loading="lazy"></div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\New folder\Git uploads\aakrithi-v1\resources\views/home.blade.php ENDPATH**/ ?>