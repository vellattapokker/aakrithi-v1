
<?php $__env->startSection('title', 'Account - Aakrithi'); ?>

<?php $__env->startSection('content'); ?>
<div class="container auth-page">
    <div class="auth-card" id="loginCard">
        <div class="auth-header">
            <h1>Welcome Back</h1>
            <p>Sign in to your Aakrithi account</p>
        </div>
        <?php if($errors->any()): ?>
            <div class="alert alert-danger" style="color:red; margin-bottom:1rem; font-size:0.875rem;">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <form class="auth-form" method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo csrf_field(); ?>
            <?php if(request()->has('redirect_to')): ?>
                <input type="hidden" name="redirect_to" value="<?php echo e(request('redirect_to')); ?>">
            <?php endif; ?>
            <div class="input-group">
                <i data-lucide="mail"></i>
                <input type="email" name="email" placeholder="Email address" value="<?php echo e(old('email')); ?>" required>
            </div>
            <div class="input-group">
                <i data-lucide="lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn-dark" style="margin-top:0.5rem;">Sign In</button>
        </form>
        <p style="text-align:center; margin-top:1.5rem; font-size:0.875rem; color:var(--color-text-light);">
            Don't have an account? <a href="javascript:void(0)" onclick="toggleAuth('register')" style="font-weight:700; color:var(--color-accent);">Register Now</a>
        </p>
    </div>

    <div class="auth-card" id="registerCard" style="display:none;">
        <div class="auth-header">
            <h1>Create Account</h1>
            <p>Join the Aakrithi community</p>
        </div>
        <form class="auth-form" method="POST" action="<?php echo e(route('register')); ?>">
            <?php echo csrf_field(); ?>
            <?php if(request()->has('redirect_to')): ?>
                <input type="hidden" name="redirect_to" value="<?php echo e(request('redirect_to')); ?>">
            <?php endif; ?>
            <div class="input-group">
                <i data-lucide="user"></i>
                <input type="text" name="name" placeholder="Full Name" value="<?php echo e(old('name')); ?>" required>
            </div>
            <div class="input-group">
                <i data-lucide="mail"></i>
                <input type="email" name="email" placeholder="Email address" value="<?php echo e(old('email')); ?>" required>
            </div>
            <div class="input-group">
                <i data-lucide="lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="input-group">
                <i data-lucide="lock"></i>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            </div>
            <button type="submit" class="btn-dark" style="margin-top:0.5rem;">Create Account</button>
        </form>
        <p style="text-align:center; margin-top:1.5rem; font-size:0.875rem; color:var(--color-text-light);">
            Already have an account? <a href="javascript:void(0)" onclick="toggleAuth('login')" style="font-weight:700; color:var(--color-accent);">Sign In</a>
        </p>
    </div>
</div>

<script>
function toggleAuth(type) {
    const loginCard = document.getElementById('loginCard');
    const registerCard = document.getElementById('registerCard');
    if (type === 'register') {
        loginCard.style.display = 'none';
        registerCard.style.display = 'block';
    } else {
        loginCard.style.display = 'block';
        registerCard.style.display = 'none';
    }
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\New folder\Git uploads\aakrithi-v1\resources\views/account.blade.php ENDPATH**/ ?>