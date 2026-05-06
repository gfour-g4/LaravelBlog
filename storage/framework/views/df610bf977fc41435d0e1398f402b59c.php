<?php if (isset($component)) { $__componentOriginal72bad77d1410e20f4512cbc04deb37d4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal72bad77d1410e20f4512cbc04deb37d4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.blog','data' => ['title' => 'Users']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.blog'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Users']); ?>
    <h1>All Users</h1>

    <div class="card">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
            <tr>
                <th style="text-align: left; border-bottom: 1px solid #eee; padding: 12px 8px;">Name</th>
                <th style="text-align: left; border-bottom: 1px solid #eee; padding: 12px 8px;">Email</th>
                <th style="text-align: left; border-bottom: 1px solid #eee; padding: 12px 8px;">Role</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="padding: 12px 8px; border-bottom: 1px solid #f5f5f5;"><?php echo e($user->name); ?></td>
                    <td style="padding: 12px 8px; border-bottom: 1px solid #f5f5f5;"><?php echo e($user->email); ?></td>
                    <td style="padding: 12px 8px; border-bottom: 1px solid #f5f5f5;">
                        <form action="<?php echo e(route('users.update-role', $user)); ?>" method="POST" style="display: inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <select name="role" onchange="this.form.submit()" style="padding: 6px 10px; border: 1px solid #ddd; border-radius: 2px; font-size: 14px;">
                                <option value="user" <?php echo e($user->role === 'user' ? 'selected' : ''); ?>>User</option>
                                <option value="author" <?php echo e($user->role === 'author' ? 'selected' : ''); ?>>Author</option>
                                <option value="admin" <?php echo e($user->role === 'admin' ? 'selected' : ''); ?>>Admin</option>
                            </select>
                        </form>
                    </td>

                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
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
<?php /**PATH /home/legion/DEV/Prepa/2eme/projetWeb/blog/resources/views/users/index.blade.php ENDPATH**/ ?>