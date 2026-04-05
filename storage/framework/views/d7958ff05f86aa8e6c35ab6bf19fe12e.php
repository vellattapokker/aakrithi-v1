<?php $__env->startSection('meta_title', 'Wholesale Storefront | Aakrithi B2B Boutique'); ?>

<?php $__env->startSection('body_class', 'home-page'); ?>

<?php $__env->startSection('content'); ?>
<div class="wholesale-storefront">
    
    <section class="wholesale-hero-banner" style="background: url('<?php echo e(asset('images/landing-hero.png')); ?>') no-repeat center center; background-size: cover; position: relative; padding: 10rem 0 6rem;">
        <div class="hero-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to bottom, rgba(7, 40, 33, 0.4), rgba(7, 40, 33, 0.95)); z-index: 1;"></div>
        <div class="container position-relative" style="z-index: 2;">
            <div class="wholesale-hero-content reveal-blur">
                <span class="badge-premium">B2B & Partnerships</span>
                <h1 class="landing-title reveal-up" style="font-family: var(--font-serif); font-size: clamp(3.5rem, 12vw, 8rem); font-weight: 700; letter-spacing: 0.15em; color: #FEFEE3;">AAKRITHI</h1>
                <p style="font-size: 1.2rem; opacity: 0.8; max-width: 700px; margin: 1rem auto;">Premium handcrafted collections at scale. Experience the heritage of Aakrithi for your business.</p>
                <div class="moq-alert reveal-up mt-4" style="background: rgba(197, 160, 89, 0.1); border-color: var(--color-accent); color: var(--color-accent);">
                    <i data-lucide="info"></i>
                    <span><strong>Wholesale Requirement:</strong> Minimum order quantity of <strong>6 pieces</strong> per item.</span>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-5" style="padding: 8rem 1rem;">
        <div class="section-header reveal-up mb-5 flex-column flex-md-row text-center text-md-start gap-3">
            <div>
                <h2 style="font-family: var(--font-serif); font-size: clamp(2rem, 8vw, 3rem); color: #FEFEE3;">Wholesale Collection</h2>
                <p style="opacity: 0.7;">Premium artisanal packs ready for global dispatch.</p>
            </div>
            <div class="wholesale-status">
                <span class="status-dot"></span> Real-time Inventory Active
            </div>
        </div>

        
        <div class="products-grid reveal-up reveal-delay-2" style="gap: 3rem;">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="product-card b2b-card">
                <a href="<?php echo e(route('wholesale.product', $product->slug)); ?>" class="wholesale-card-link" style="color: inherit; text-decoration: none;">
                    <div class="product-image-container">
                        <span class="badge moq-badge">MOQ: 6 Pcs</span>
                        <?php if($product->badge): ?>
                        <span class="badge secondary-badge"><?php echo e($product->badge); ?></span>
                        <?php endif; ?>
                        <img src="<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?> - Wholesale <?php echo e($product->category); ?>" class="product-image" loading="lazy">
                    </div>
                    <div class="product-info">
                        <p class="product-category"><?php echo e($product->category); ?></p>
                        <h3 class="product-name"><?php echo e($product->name); ?></h3>
                        <div class="price-wrapper">
                            <p class="product-price">₹<?php echo e(number_format($product->price)); ?> <span class="price-unit">/ unit</span></p>
                            <p class="wholesale-note">Retail Price shown. Bulk discount applies at checkout.</p>
                        </div>
                    </div>
                </a>
                <div class="product-actions" style="padding: 0 1.5rem 1.5rem;">
                    <a href="<?php echo e(route('wholesale.product', $product->slug)); ?>" class="btn btn-primary wholesale-btn w-100" style="text-decoration:none; text-align:center;">
                        Order Wholesale
                    </a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        
        <div class="wholesale-features">
            <div class="feature-item">
                <i data-lucide="truck"></i>
                <div>
                    <h4>Priority Shipping</h4>
                    <p>Wholesale orders receive expedited processing and global tracking.</p>
                </div>
            </div>
            <div class="feature-item">
                <i data-lucide="shield-check"></i>
                <div>
                    <h4>Quality Verified</h4>
                    <p>Every piece undergoes dual-stage quality checks before dispatch.</p>
                </div>
            </div>
            <div class="feature-item">
                <i data-lucide="refresh-ccw"></i>
                <div>
                    <h4>Easy Restocking</h4>
                    <p>Dedicated dashboard for quick re-ordering of popular collections.</p>
                </div>
            </div>
        </div>

        
        <div class="wholesale-footer-form">
            <div class="form-card">
                <h2>Custom Bulk Request</h2>
                <p>Specific requirements? Custom designs? Let's talk.</p>
                <form class="premium-form">
                    <div class="form-row">
                        <input type="text" placeholder="Name" required>
                        <input type="email" placeholder="Email" required>
                    </div>
                    <textarea placeholder="Your message..." rows="3"></textarea>
                    <button type="button" class="btn btn-primary">Submit Request</button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .wholesale-hero-banner {
        padding: 6rem 0 4rem;
        background: var(--color-background);
        border-bottom: 1px solid var(--color-border);
        margin-bottom: 3rem;
    }

    .wholesale-hero-content {
        text-align: center;
        max-width: 800px;
        margin: 0 auto;
    }

    .moq-alert {
        display: inline-flex;
        align-items: center;
        gap: 1rem;
        background: rgba(80, 200, 120, 0.1);
        border: 1px solid var(--color-accent);
        padding: 1rem 2rem;
        border-radius: 12px;
        color: var(--color-accent);
        margin-top: 2rem;
    }

    .moq-alert i {
        width: 20px;
        height: 20px;
    }

    .wholesale-status {
        font-size: 0.8rem;
        color: var(--color-success);
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 600;
    }

    .status-dot {
        width: 8px;
        height: 8px;
        background: var(--color-success);
        border-radius: 50%;
        animation: pulse 2s infinite;
    }

    .b2b-card:hover {
        border-color: var(--color-accent);
        box-shadow: 0 20px 40px rgba(0,0,0,0.4);
    }

    .moq-badge {
        background: var(--color-accent) !important;
        color: var(--color-primary) !important;
        font-weight: 700 !important;
        left: 1rem !important;
        top: 1rem !important;
    }

    .secondary-badge {
        top: 3rem !important;
        left: 1rem !important;
    }

    .price-wrapper {
        margin: 1rem 0;
    }

    .price-unit {
        font-size: 0.75rem;
        opacity: 0.6;
    }

    .wholesale-note {
        font-size: 0.7rem;
        color: var(--color-accent);
        margin-top: 0.25rem;
    }

    .wholesale-features {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 3rem;
        margin: 5rem 0;
        padding: 4rem;
        background: var(--color-surface);
        border-radius: 24px;
        border: 1px solid var(--color-border);
    }

    .feature-item {
        display: flex;
        gap: 1.5rem;
    }

    .feature-item i {
        color: var(--color-accent);
        width: 32px;
        height: 32px;
        flex-shrink: 0;
    }

    .feature-item h4 {
        color: var(--color-text);
        margin-bottom: 0.5rem;
    }

    .feature-item p {
        font-size: 0.85rem;
        color: var(--color-text-light);
        line-height: 1.6;
    }

    .wholesale-footer-form {
        max-width: 700px;
        margin: 0 auto 5rem;
        text-align: center;
    }

    .form-card {
        background: var(--color-surface);
        padding: 3rem;
        border-radius: 24px;
        border: 1px solid var(--color-border);
    }

    @keyframes pulse {
        0% { opacity: 1; }
        50% { opacity: 0.5; }
        100% { opacity: 1; }
    }

    @media (max-width: 992px) {
        .wholesale-features {
            grid-template-columns: 1fr;
            padding: 2.5rem;
        }
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\New folder\Git uploads\aakrithi-v1\resources\views/wholesale.blade.php ENDPATH**/ ?>