<?php $__env->startSection('meta_title', 'Order ' . $order->order_number . ' | Aakrithi'); ?>
<?php $__env->startSection('meta_description', 'Order details for ' . $order->order_number); ?>

<?php $__env->startSection('content'); ?>
<div class="container" style="max-width:800px; margin:4rem auto; padding:0 1.5rem; font-family: var(--font-family);">
    
    
    <div style="background: var(--color-surface); border: 1px solid var(--color-border); border-top: 5px solid var(--color-accent); border-radius: var(--border-radius); padding: 3rem 2rem; text-align:center; margin-bottom:2rem; box-shadow: 0 10px 30px rgba(0,0,0,0.03);">
        <div style="width:70px; height:70px; background:var(--color-secondary); color: var(--color-accent); border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 1.5rem;">
            <i data-lucide="check" style="width:36px; height:36px;"></i>
        </div>
        <h1 style="font-size:2rem; font-family:var(--font-family); color:var(--color-text); margin-bottom:0.75rem; font-weight: 600;">Order Confirmed!</h1>
        <p style="color:var(--color-text-light); font-size:1.05rem;">Thank you for shopping with Aakrithi. Your elegance is on its way.</p>
    </div>

    
    <div style="background:var(--color-surface); border:1px solid var(--color-border); border-radius:var(--border-radius); padding:2rem; margin-bottom:1.5rem; box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
        <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:1rem; margin-bottom:1.5rem;">
            <div>
                <p style="color:var(--color-text-light); font-size:0.85rem; text-transform:uppercase; letter-spacing:1px; margin-bottom:0.25rem;">Order Number</p>
                <p style="font-size:1.5rem; font-weight:700; color:var(--color-accent); letter-spacing:1px;"><?php echo e($order->order_number); ?></p>
            </div>
            <div style="text-align:right;">
                <p style="color:var(--color-text-light); font-size:0.85rem; text-transform:uppercase; letter-spacing:1px; margin-bottom:0.5rem;">Status</p>
                <span style="background:rgba(197, 160, 89, 0.1); color:var(--color-accent); padding:6px 16px; border-radius:30px; font-size:0.85rem; font-weight:600; border: 1px solid rgba(197, 160, 89, 0.2);">Confirmed</span>
            </div>
        </div>
        <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap:1.5rem; padding-top:1.5rem; border-top:1px dashed var(--color-border);">
            <div>
                <p style="color:var(--color-text-light); font-size:0.8rem; text-transform:uppercase; letter-spacing:0.5px; margin-bottom:0.25rem;">Date</p>
                <p style="font-weight:500; color:var(--color-text);"><?php echo e($order->created_at->format('d M Y, h:i A')); ?></p>
            </div>
            <div>
                <p style="color:var(--color-text-light); font-size:0.8rem; text-transform:uppercase; letter-spacing:0.5px; margin-bottom:0.25rem;">Payment</p>
                <p style="font-weight:500; color:var(--color-text);"><?php echo e($order->payment_method === 'razorpay' ? 'Paid Online' : 'Cash on Delivery'); ?></p>
            </div>
            <?php if($order->payment_id): ?>
            <div>
                <p style="color:var(--color-text-light); font-size:0.8rem; text-transform:uppercase; letter-spacing:0.5px; margin-bottom:0.25rem;">Payment ID</p>
                <p style="font-weight:500; font-size:0.9rem; color:var(--color-text);"><?php echo e($order->payment_id); ?></p>
            </div>
            <?php endif; ?>
        </div>
    </div>

    
    <?php
        $statuses = ['confirmed' => 'Order Confirmed', 'processing' => 'Processing', 'shipped' => 'Shipped', 'delivered' => 'Delivered'];
        $currentStatusIndex = array_search(strtolower($order->status), array_keys($statusList = ['confirmed', 'processing', 'shipped', 'delivered']));
        if($currentStatusIndex === false) $currentStatusIndex = 0; // Default to confirmed if unknown
    ?>
    
    <style>
        .timeline-container { display: flex; justify-content: space-between; position: relative; width: 100%; padding-bottom: 1rem; }
        .timeline-bg-line { position: absolute; top: 20px; left: 12.5%; right: 12.5%; height: 3px; background: var(--color-border); z-index: 1; }
        .timeline-active-line { position: absolute; top: 20px; left: 12.5%; height: 3px; background: var(--color-accent); z-index: 2; transition: width 0.5s ease; }
        .timeline-step { flex: 1; display: flex; flex-direction: column; align-items: center; position: relative; z-index: 3; }
        .timeline-icon { width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 0.5rem; transition: all 0.3s ease; background-color: var(--color-surface); }
        .timeline-icon i { width: 20px; height: 20px; }
        .timeline-label { font-size: 0.75rem; text-align: center; line-height: 1.2; word-break: break-word; padding: 0 4px; }
        
        @media (min-width: 640px) {
            .timeline-bg-line, .timeline-active-line { top: 24px; }
            .timeline-icon { width: 50px; height: 50px; margin-bottom: 0.75rem; }
            .timeline-icon i { width: 24px; height: 24px; }
            .timeline-label { font-size: 0.85rem; }
        }
    </style>

    <div style="background:var(--color-surface); border:1px solid var(--color-border); border-radius:var(--border-radius); padding:2rem 1rem; margin-bottom:1.5rem; box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
        <h2 style="font-size:1.25rem; margin-bottom:2rem; color:var(--color-text); font-weight:600; padding: 0 1rem;">Track Your Order</h2>
        
        <div class="timeline-container">
            <div class="timeline-bg-line"></div>
            <div class="timeline-active-line" style="width: <?php echo e(($currentStatusIndex / (count($statusList) - 1)) * 75); ?>%;"></div>
            
            <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php 
                $stepIndex = $loop->index;
                $isCompleted = $stepIndex <= $currentStatusIndex;
                $isActive = $stepIndex === $currentStatusIndex;
                $icon = match($key) {
                    'confirmed' => 'clipboard-check',
                    'processing' => 'package',
                    'shipped' => 'truck',
                    'delivered' => 'home',
                    default => 'circle'
                };
            ?>
            <div class="timeline-step">
                <div class="timeline-icon" style="
                    background: <?php echo e($isCompleted ? 'var(--color-accent)' : 'var(--color-surface)'); ?>; 
                    border: <?php echo e($isCompleted ? '2px solid var(--color-accent)' : '2px solid var(--color-border)'); ?>;
                    color: <?php echo e($isCompleted ? '#fff' : 'var(--color-text-light)'); ?>;
                    <?php echo e($isActive ? 'box-shadow: 0 0 0 4px rgba(197, 160, 89, 0.2);' : ''); ?>">
                    <i data-lucide="<?php echo e($icon); ?>"></i>
                </div>
                <p class="timeline-label" style="font-weight:<?php echo e($isActive ? '700' : '500'); ?>; color:<?php echo e($isCompleted ? 'var(--color-text)' : 'var(--color-text-light)'); ?>;"><?php echo e($label); ?></p>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    
    <div style="background:var(--color-surface); border:1px solid var(--color-border); border-radius:var(--border-radius); padding:2rem; margin-bottom:1.5rem; box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
        <h2 style="font-size:1.25rem; margin-bottom:1.5rem; color:var(--color-text); font-weight:600;">Items Ordered</h2>
        <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div style="display:flex; justify-content:space-between; align-items:center; padding:1rem 0; <?php echo e(!$loop->last ? 'border-bottom:1px solid var(--color-border);' : ''); ?>">
            <div style="display:flex; align-items:center; gap:1rem;">
                <?php if(isset($item['image'])): ?>
                <img src="<?php echo e($item['image']); ?>" alt="<?php echo e($item['name']); ?>" style="width:60px; height:80px; object-fit:cover; border-radius:4px; border:1px solid var(--color-border);">
                <?php endif; ?>
                <div>
                    <p style="font-weight:500; color:var(--color-text); font-size:1.05rem; margin-bottom:0.25rem;"><?php echo e($item['name']); ?></p>
                    <p style="color:var(--color-text-light); font-size:0.9rem;">Qty: <?php echo e($item['quantity']); ?></p>
                </div>
            </div>
            <p style="font-weight:600; color:var(--color-text); font-size:1.1rem;">₹<?php echo e(number_format($item['price'] * $item['quantity'])); ?></p>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div style="display:flex; justify-content:space-between; align-items:center; padding-top:1.5rem; margin-top:0.5rem; border-top:2px solid var(--color-border);">
            <p style="font-weight:600; font-size:1.25rem; color:var(--color-text);">Total</p>
            <p style="font-weight:700; font-size:1.4rem; color:var(--color-accent);">₹<?php echo e(number_format($order->total)); ?></p>
        </div>
    </div>

    
    <div style="background:var(--color-surface); border:1px solid var(--color-border); border-radius:var(--border-radius); padding:2rem; margin-bottom:2.5rem; box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
        <h2 style="font-size:1.25rem; margin-bottom:1.5rem; color:var(--color-text); font-weight:600;">Shipping Details</h2>
        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:1.5rem;">
            <div>
                <p style="color:var(--color-text-light); font-size:0.8rem; text-transform:uppercase; letter-spacing:0.5px; margin-bottom:0.25rem;">Name</p>
                <p style="font-weight:500; color:var(--color-text);"><?php echo e($order->customer_name); ?></p>
            </div>
            <div>
                <p style="color:var(--color-text-light); font-size:0.8rem; text-transform:uppercase; letter-spacing:0.5px; margin-bottom:0.25rem;">Phone</p>
                <p style="font-weight:500; color:var(--color-text);"><?php echo e($order->customer_phone); ?></p>
            </div>
            <div style="grid-column: span 2;">
                <p style="color:var(--color-text-light); font-size:0.8rem; text-transform:uppercase; letter-spacing:0.5px; margin-bottom:0.25rem;">Delivery Address</p>
                <p style="font-weight:500; color:var(--color-text); line-height:1.6;"><?php echo e($order->shipping_address); ?><br><?php echo e($order->city); ?>, <?php echo e($order->state); ?> - <?php echo e($order->pincode); ?></p>
            </div>
        </div>
    </div>

    <div style="text-align:center;">
        <a href="<?php echo e(route('shop')); ?>" style="text-decoration:none; display:inline-block; padding:14px 40px; background:var(--color-accent); color:white; border-radius:var(--border-radius); font-weight:600; font-size:1.05rem; letter-spacing:1px; transition: opacity 0.3s ease;" onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
            CONTINUE SHOPPING
        </a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\aakriti-laravel\resources\views/order-details.blade.php ENDPATH**/ ?>