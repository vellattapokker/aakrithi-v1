<?php $__env->startSection('title', 'Wholesale Cart | Aakrithi B2B'); ?>
<?php $__env->startSection('body_class', 'home-page'); ?>

<?php $__env->startSection('content'); ?>
<div class="container cart-page wholesale-cart reveal-up" style="padding-top: 4rem; padding-bottom: 8rem;">
    <div class="wholesale-cart-header">
        <h1 class="cart-title">Wholesale Cart</h1>
        <p class="moq-status <?php echo e($totalQuantity >= 6 ? 'status-met' : 'status-pending'); ?>">
            <i data-lucide="<?php echo e($totalQuantity >= 6 ? 'check-circle' : 'alert-circle'); ?>"></i>
            <?php echo e($totalQuantity); ?>/6 Pieces Selected
        </p>
    </div>

    <?php if($totalQuantity < 6 && count($cart) > 0): ?>
    <div class="moq-warning-banner reveal-blur">
        <div class="warning-icon"><i data-lucide="shopping-bag"></i></div>
        <div class="warning-text">
            <h3>MOQ Requirement Not Met</h3>
            <p>Wholesale orders require a minimum of <strong>6 pieces</strong> total. Please add <strong><?php echo e(6 - $totalQuantity); ?> more</strong> items to continue to checkout.</p>
        </div>
        <a href="<?php echo e(route('wholesale')); ?>" class="btn-outline-light">Browse More</a>
    </div>
    <?php endif; ?>

    <div class="cart-layout">
        <div class="cart-items">
            <?php if(count($cart) > 0): ?>
                <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="cart-item glass-card reveal-up" data-id="<?php echo e($id); ?>">
                        <div class="item-image">
                            <img src="<?php echo e($details['image']); ?>" alt="<?php echo e($details['name']); ?>">
                        </div>
                        <div class="item-details">
                            <div class="item-header">
                                <div>
                                    <p class="product-category showcase-text"><?php echo e($details['category']); ?></p>
                                    <h3><?php echo e($details['name']); ?></h3>
                                </div>
                                <div class="price-stack">
                                    <p class="item-price">₹<?php echo e(number_format($details['price'])); ?></p>
                                    <span class="unit-label">per unit</span>
                                </div>
                            </div>
                            <div class="item-controls">
                                <div class="quantity-selector-b2b">
                                    <button class="qty-btn minus" type="button"><i data-lucide="minus"></i></button>
                                    <input type="number" value="<?php echo e($details['quantity']); ?>" class="qty-input" readonly>
                                    <button class="qty-btn plus" type="button"><i data-lucide="plus"></i></button>
                                </div>
                                <button class="remove-btn remove-from-wholesale-cart"><i data-lucide="trash-2"></i> Remove</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="empty-cart-state reveal-blur">
                    <i data-lucide="package" class="empty-icon"></i>
                    <h2>Your wholesale pack is empty</h2>
                    <p>Start browsing our artisanal collections to build your wholesale order.</p>
                    <a href="<?php echo e(route('wholesale')); ?>" class="btn-primary mt-4">Go to Wholesale Hub</a>
                </div>
            <?php endif; ?>
        </div>
        
        <?php if(count($cart) > 0): ?>
        <div class="cart-summary glass-card reveal-up">
            <h2>Wholesale Summary</h2>
            <div class="summary-row"><span>Total Quantity</span><span class="<?php echo e($totalQuantity >= 6 ? 'text-success' : 'text-danger'); ?>"><strong><?php echo e($totalQuantity); ?> Pcs</strong></span></div>
            <div class="summary-row"><span>Subtotal</span><span>₹<?php echo e(number_format($total)); ?></span></div>
            <div class="summary-row"><span>Logistics</span><span>Calculated at Checkout</span></div>
            <div class="summary-divider"></div>
            <div class="summary-row total"><span>Order Total</span><span>₹<?php echo e(number_format($total)); ?></span></div>
            
            <?php if($totalQuantity >= 6): ?>
                <a href="<?php echo e(route('wholesale.checkout')); ?>" class="btn-primary w-100 mt-4 reveal-scale" style="text-align: center; display: block; padding: 1.2rem;">Proceed to B2B Checkout</a>
            <?php else: ?>
                <button class="btn-disabled w-100 mt-4" disabled>MOQ 6 Pcs Required</button>
            <?php endif; ?>
            <p class="secure-checkout-note"><i data-lucide="shield-check"></i> Secure Wholesale Portal</p>
        </div>
        <?php endif; ?>
    </div>
</div>

<style>
    .wholesale-cart-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 3rem;
        border-bottom: 1px solid var(--color-border);
        padding-bottom: 1.5rem;
    }

    .moq-status {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-weight: 700;
        font-size: 1.1rem;
        padding: 0.5rem 1.5rem;
        border-radius: 40px;
    }

    .status-pending { background: rgba(255, 193, 7, 0.1); color: #FFC107; }
    .status-met { background: rgba(80, 200, 120, 0.1); color: var(--color-accent); }

    .moq-warning-banner {
        display: flex;
        gap: 2rem;
        background: rgba(220, 53, 69, 0.1);
        border: 1px solid rgba(220, 53, 69, 0.3);
        padding: 2rem;
        border-radius: 20px;
        margin-bottom: 3rem;
        align-items: center;
    }

    .warning-icon {
        width: 60px;
        height: 60px;
        background: #DC3545;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        flex-shrink: 0;
    }

    .warning-text h3 { color: #FF4D4D; margin-bottom: 0.5rem; }
    .warning-text p { color: var(--color-text-light); }

    .glass-card {
        background: rgba(10, 47, 39, 0.4);
        border: 1px solid var(--color-border);
        border-radius: 20px;
        padding: 2rem;
        backdrop-filter: blur(10px);
    }

    .item-header h3 { font-family: var(--font-serif); font-size: 1.5rem; }
    .showcase-text { color: var(--color-accent); font-weight: 700; font-size: 0.75rem; letter-spacing: 2px; text-transform: uppercase; }

    .quantity-selector-b2b {
        display: flex;
        border: 1px solid var(--color-border);
        border-radius: 8px;
        overflow: hidden;
    }

    .quantity-selector-b2b .qty-btn {
        padding: 0.5rem 1rem;
        background: rgba(255,255,255,0.05);
        color: var(--color-text);
        transition: background 0.3s;
    }

    .quantity-selector-b2b .qty-btn:hover { background: var(--color-accent); color: var(--color-primary); }

    .quantity-selector-b2b .qty-input {
        width: 50px;
        background: transparent;
        border: none;
        text-align: center;
        color: var(--color-text);
        font-weight: 700;
        pointer-events: none;
    }

    .remove-btn { color: #DC3545; font-size: 0.85rem; font-weight: 600; display: flex; align-items: center; gap: 0.5rem; opacity: 0.7; transition: opacity 0.3s; }
    .remove-btn:hover { opacity: 1; }

    .btn-disabled {
        background: rgba(255,255,255,0.1);
        color: rgba(255,255,255,0.3);
        padding: 1.2rem;
        border-radius: 40px;
        cursor: not-allowed;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .secure-checkout-note { text-align: center; margin-top: 1.5rem; font-size: 0.75rem; color: var(--color-text-light); opacity: 0.6; display: flex; align-items: center; justify-content: center; gap: 0.5rem; }

    .empty-cart-state { text-align: center; padding: 6rem 2rem; background: rgba(10, 47, 39, 0.2); border-radius: 40px; border: 1px dashed var(--color-border); }
    .empty-icon { width: 80px; height: 80px; opacity: 0.1; margin-bottom: 2rem; color: var(--color-accent); }

    @media (max-width: 768px) {
        .wholesale-cart-header { flex-direction: column; align-items: flex-start; gap: 1rem; }
        .moq-warning-banner { flex-direction: column; text-align: center; }
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    function updateWholesaleCart(id, qty) {
        fetch('<?php echo e(route('wholesale.cart.update')); ?>', {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
            },
            body: JSON.stringify({ id: id, quantity: qty })
        }).then(() => window.location.reload());
    }

    document.querySelectorAll(".qty-btn").forEach(btn => {
        btn.addEventListener("click", function() {
            const row = this.closest(".cart-item");
            const input = row.querySelector(".qty-input");
            const itemId = row.getAttribute("data-id");
            let val = parseInt(input.value);
            
            if (this.classList.contains("plus")) val++;
            else if (this.classList.contains("minus") && val > 6) val--;
            
            updateWholesaleCart(itemId, val);
        });
    });

    document.querySelectorAll(".remove-from-wholesale-cart").forEach(btn => {
        btn.addEventListener("click", function() {
            if(confirm("Remove this item from your wholesale pack?")) {
                fetch('<?php echo e(route('wholesale.cart.remove')); ?>', {
                    method: 'DELETE',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>' },
                    body: JSON.stringify({ id: this.closest(".cart-item").getAttribute("data-id") })
                }).then(() => window.location.reload());
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\New folder\Git uploads\aakrithi-v1\resources\views/wholesale-cart.blade.php ENDPATH**/ ?>