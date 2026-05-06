<?php if (isset($component)) { $__componentOriginal72bad77d1410e20f4512cbc04deb37d4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal72bad77d1410e20f4512cbc04deb37d4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.blog','data' => ['title' => 'Register']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.blog'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Register']); ?>
    <div class="card" style="max-width: 460px; margin: 0 auto;">
        <h1>Register</h1>

        <form method="POST" action="<?php echo e(route('register')); ?>">
            <?php echo csrf_field(); ?>

            <div>
                <label for="name">Name</label>
                <input id="name" type="text" name="name" value="<?php echo e(old('name')); ?>" required autofocus autocomplete="name">
            </div>

            <div style="margin-top: 12px;">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="username">
            </div>

            <div style="margin-top: 12px;">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required autocomplete="new-password">
            </div>

            <div style="margin-top: 12px;">
                <label for="password_confirmation">Confirm password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="actions">
                <button type="submit" class="button">Register</button>
                <a href="<?php echo e(route('login')); ?>">Already registered?</a>
            </div>
        </form>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal72bad77d1410e20f4512cbc04deb37d4)): ?>
<?php $attributes = $__attributesOriginal72bad77d1410e20f4512cbc04deb37d4; ?>
<?php unset($__attributesOriginal72bad77d1410e20f4512cbc04deb37d4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal72bad77d1410e20f4512cbc04deb37d4)): ?>
<?php $component = $__componentOriginal72bad77d1410e20f4512cbc04deb37d4; ?>
<?php unset($__componentOriginal72bad77d1410e20f4512cbc04deb37d4); ?>
<?php endif; ?>
<?php /**PATH /home/legion/DEV/Prepa/2eme/projetWeb/blog/resources/views/auth/register.blade.php ENDPATH**/ ?>