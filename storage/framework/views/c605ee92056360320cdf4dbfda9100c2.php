
<?php $__env->startSection('meta_title', setting('site_title', 'Aakrithi | Premium Women\'s Ethnic Wear & Designer Kids clothing Boutique')); ?>
<?php $__env->startSection('meta_description', setting('site_description', 'Shop Aakrithi for designer women\'s ethnic wear, handcrafted sarees, and trendy kids\' party wear. Discover a curated collection of traditional Indian clothing and artisanal fashion for the entire family.')); ?>
<?php $__env->startSection('meta_keywords', setting('meta_keywords', 'Aakrithi, women\'s ethnic wear, designer sarees online, kids party wear, traditional kids sets, newborn baby clothes, designer kurtis, Indian boutique, sustainable fashion India')); ?>

<?php $__env->startSection('content'); ?>

<section class="hero">
    <div class="hero-content fade-in-up">
        <h1 class="hero-title">Premium Women's Ethnic Wear & Designer Kids Clothing</h1>
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