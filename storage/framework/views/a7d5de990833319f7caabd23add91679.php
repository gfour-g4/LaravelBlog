<?php if (isset($component)) { $__componentOriginal72bad77d1410e20f4512cbc04deb37d4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal72bad77d1410e20f4512cbc04deb37d4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.blog','data' => ['title' => 'All Posts']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.blog'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'All Posts']); ?>
    <h1>All Posts</h1>

    <form action="<?php echo e(route('posts.index')); ?>" method="GET" style="margin-bottom: 24px;">
        <input 
            type="text" 
            name="search" 
            placeholder="Search posts by title or content..." 
            value="<?php echo e($search ?? ''); ?>"
            style="padding: 8px 12px; width: 100%; max-width: 400px; margin-right: 8px;"
        >
        <select name="sort" style="padding: 8px 12px; margin-right: 8px;">
            <option value="newest" <?php echo e(($sort ?? 'newest') === 'newest' ? 'selected' : ''); ?>>Newest first</option>
            <option value="oldest" <?php echo e(($sort ?? 'newest') === 'oldest' ? 'selected' : ''); ?>>Oldest first</option>
            <option value="title-asc" <?php echo e(($sort ?? 'newest') === 'title-asc' ? 'selected' : ''); ?>>Title (A-Z)</option>
            <option value="title-desc" <?php echo e(($sort ?? 'newest') === 'title-desc' ? 'selected' : ''); ?>>Title (Z-A)</option>
            <option value="likes" <?php echo e(($sort ?? 'newest') === 'likes' ? 'selected' : ''); ?>>Most likes</option>
            <option value="dislikes" <?php echo e(($sort ?? 'newest') === 'dislikes' ? 'selected' : ''); ?>>Most dislikes</option>
        </select>
        <button type="submit" style="padding: 8px 16px;">Search</button>
        <?php if($search ?? ''): ?>
            <a href="<?php echo e(route('posts.index', ['sort' => $sort ?? 'newest'])); ?>" style="padding: 8px 16px; margin-left: 8px; text-decoration: none; color: inherit;">Clear</a>
        <?php endif; ?>
    </form>

    <?php if($search ?? ''): ?>
        <p style="margin-bottom: 16px;">Showing results for: <strong><?php echo e($search); ?></strong></p>
    <?php endif; ?>

    <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="card" style="display: flex; gap: 20px; align-items: flex-start;">
            <div style="flex-shrink: 0;">
                <?php
                    preg_match('/<img[^>]+src="([^"]+)"/', $post->content, $matches);
                    $imageUrl = $matches[1] ?? null;
                ?>
                <?php if($imageUrl): ?>
                    <img src="<?php echo e($imageUrl); ?>" alt="" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">
                <?php else: ?>
                    <div style="width: 100px; height: 100px; background: #f0f0f0; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #999;">
                        📝
                    </div>
                <?php endif; ?>
            </div>
            <div style="flex: 1;">
                <h2>
                    <a href="<?php echo e(route('posts.show', $post)); ?>"><?php echo e($post->title); ?></a>
                </h2>
                <p class="muted">By <?php echo e($post->user->name); ?> · <?php echo e($post->created_at ? $post->created_at->format('F j, Y \a\t g:i A') : ''); ?></p>
                <?php
                    $contentWithoutImage = preg_replace('/<img[^>]+>/', '', $post->content);
                ?>
                <div><?php echo \Illuminate\Support\Str::limit(strip_tags($contentWithoutImage), 200); ?></div>
                <div class="muted" style="margin-top: 8px;">
                    <?php echo e($post->likes); ?> likes · <?php echo e($post->dislikes); ?> dislikes
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p class="muted">No posts yet.</p>
    <?php endif; ?>
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
<?php /**PATH /home/legion/DEV/Prepa/2eme/projetWeb/blog/resources/views/posts/index.blade.php ENDPATH**/ ?>