<?php if (isset($component)) { $__componentOriginal72bad77d1410e20f4512cbc04deb37d4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal72bad77d1410e20f4512cbc04deb37d4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.blog','data' => ['title' => $post->title]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.blog'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($post->title)]); ?>
    <div class="card">
        <h1><?php echo e($post->title); ?></h1>
        <p class="muted">By <?php echo e($post->user->name); ?> · <?php echo e($post->created_at ? $post->created_at->format('F j, Y \a\t g:i A') : ''); ?></p>
        <div style="margin-top: 24px;"><?php echo $post->content; ?></div>
        <div class="muted" style="margin-top: 20px;">
            <?php echo e($post->likes); ?> likes · <?php echo e($post->dislikes); ?> dislikes
        </div>

        <?php if(auth()->guard()->check()): ?>
            <div class="actions">
                <form action="<?php echo e(route('posts.like', $post)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="button">Like</button>
                </form>
                <form action="<?php echo e(route('posts.dislike', $post)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="button button-danger">Dislike</button>
                </form>
            </div>
        <?php endif; ?>

        <div class="actions">
            <a href="<?php echo e(route('posts.index')); ?>">← Back</a>

            <?php if(auth()->guard()->check()): ?>
                <?php if(auth()->user()->isAdmin() || auth()->id() === $post->user_id): ?>
                    <a class="button" href="<?php echo e(route('posts.edit', $post)); ?>">Edit</a>

                    <form action="<?php echo e(route('posts.destroy', $post)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="button button-danger">Delete</button>
                    </form>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="card">
        <h2>Comments</h2>

        <?php if(auth()->guard()->check()): ?>
            <form action="<?php echo e(route('comments.store', $post)); ?>" method="POST" style="margin-top: 20px;">
                <?php echo csrf_field(); ?>
                <div>
                    <label for="content">Add a comment</label>
                    <textarea id="content" name="content" rows="3" required><?php echo e(old('content')); ?></textarea>
                </div>
                <div class="actions">
                    <button type="submit" class="button">Post</button>
                </div>
            </form>
        <?php else: ?>
            <p class="muted" style="margin-top: 20px;">Login to write a comment.</p>
        <?php endif; ?>

        <div style="margin-top: 32px;">
            <?php $__empty_1 = true; $__currentLoopData = $post->comments->sortByDesc('id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div style="padding: 20px; background: #fafafa; border-radius: 4px; margin-bottom: 16px;">
                    <p><strong><?php echo e($comment->user->name); ?></strong></p>
                    <p style="margin: 8px 0;"><?php echo e($comment->content); ?></p>
                    <div class="muted">
                        <?php echo e($comment->likes); ?> likes · <?php echo e($comment->dislikes); ?> dislikes
                    </div>

                    <?php if(auth()->guard()->check()): ?>
                        <div class="actions">
                            <form action="<?php echo e(route('comments.like', $comment)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="button">Like</button>
                            </form>
                            <form action="<?php echo e(route('comments.dislike', $comment)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="button button-danger">Dislike</button>
                            </form>
                        </div>
                    <?php endif; ?>

                    <?php if(auth()->guard()->check()): ?>
                        <?php if(auth()->user()->isAdmin() || auth()->id() === $comment->user_id): ?>
                            <div class="actions" style="margin-top: 8px;">
                                <form action="<?php echo e(route('comments.destroy', $comment)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="button button-danger">Delete</button>
                                </form>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="muted" style="margin-top: 20px;">No comments yet.</p>
            <?php endif; ?>
        </div>
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
<?php /**PATH /home/legion/DEV/Prepa/2eme/projetWeb/blog/resources/views/posts/show.blade.php ENDPATH**/ ?>