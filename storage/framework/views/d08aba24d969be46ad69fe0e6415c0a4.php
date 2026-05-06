<?php if (isset($component)) { $__componentOriginal72bad77d1410e20f4512cbc04deb37d4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal72bad77d1410e20f4512cbc04deb37d4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.blog','data' => ['title' => 'Create Post']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.blog'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Create Post']); ?>
    <div class="card">
        <h1>Create Post</h1>

        <form action="<?php echo e(route('posts.store')); ?>" method="POST" style="margin-top: 24px;">
            <?php echo csrf_field(); ?>

            <div>
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="<?php echo e(old('title')); ?>" required>
            </div>

            <div style="margin-top: 20px;">
                <label for="content">Content</label>
                <textarea id="content" name="content" rows="8" required><?php echo e(old('content')); ?></textarea>
            </div>

            <div class="actions">
                <button type="submit" class="button">Save</button>
                <a href="<?php echo e(route('posts.index')); ?>">Cancel</a>
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
<?php /**PATH /home/legion/DEV/Prepa/2eme/projetWeb/blog/resources/views/posts/create.blade.php ENDPATH**/ ?>