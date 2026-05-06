<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e($title ?? 'Simple Blog'); ?></title>
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            margin: 0;
            background: #ffffff;
            color: #111;
            line-height: 1.6;
        }
        nav {
            padding: 16px 0;
            border-bottom: 1px solid #f0f0f0;
            margin-bottom: 32px;
        }
        .nav-wrap {
            max-width: 700px;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            justify-content: space-between;
            gap: 16px;
            align-items: center;
        }
        .nav-links {
            display: flex;
            gap: 20px;
            align-items: center;
        }
        .container {
            max-width: 700px;
            margin: 0 auto;
            padding: 0 24px;
        }
        .card {
            padding: 24px 0;
            border-bottom: 1px solid #f5f5f5;
            margin-bottom: 24px;
        }
        .card:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }
        a {
            color: #111;
            text-decoration: none;
            border-bottom: 1px solid transparent;
        }
        a:hover {
            border-bottom-color: #111;
        }
        .button {
            background: transparent;
            color: #111;
            border: 1px solid #111;
            padding: 6px 14px;
            border-radius: 2px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 400;
        }
        .button:hover {
            background: #111;
            color: #fff;
        }
        .button-danger {
            border-color: #cc0000;
            color: #cc0000;
        }
        .button-danger:hover {
            background: #cc0000;
            color: #fff;
        }
        textarea, input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            border: 1px solid #e5e5e5;
            padding: 10px;
            margin-top: 8px;
            font-size: 15px;
        }
        textarea:focus, input:focus {
            outline: none;
            border-color: #111;
        }
        label {
            font-size: 14px;
            color: #555;
        }
        .actions {
            display: flex;
            gap: 10px;
            align-items: center;
            margin-top: 20px;
            flex-wrap: wrap;
        }
        .actions form { margin: 0; }
        .message {
            padding: 12px 16px;
            margin-bottom: 24px;
            font-size: 14px;
        }
        .message-success {
            border-left: 2px solid #00aa00;
            background: #f9fff9;
        }
        .message-error {
            border-left: 2px solid #cc0000;
            background: #fff9f9;
        }
        .muted {
            color: #777;
            font-size: 13px;
        }
        h1, h2 {
            font-weight: 600;
            margin-top: 0;
        }
        h1 { font-size: 28px; }
        h2 { font-size: 20px; }
        img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
            margin: 16px 0;
        }
    </style>
</head>
<body>
<nav>
    <div class="nav-wrap">
        <div class="nav-links">
            <a href="<?php echo e(route('posts.index')); ?>">Home</a>
            <?php if(auth()->guard()->check()): ?>
                <?php if(auth()->user()->isAuthor()): ?>
                    <a href="<?php echo e(route('posts.create')); ?>">Create Post</a>
                <?php endif; ?>
                <?php if(auth()->user()->isAdmin()): ?>
                    <a href="<?php echo e(route('users.index')); ?>">Users</a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="nav-links">
            <?php if(auth()->guard()->guest()): ?>
                <a href="<?php echo e(route('login')); ?>">Login</a>
                <a href="<?php echo e(route('register')); ?>">Register</a>
            <?php else: ?>
                <span class="muted"><?php echo e(auth()->user()->name); ?> (<?php echo e(auth()->user()->role); ?>)</span>
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="button">Logout</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</nav>

<main class="container">
    <?php if(session('success')): ?>
        <div class="message message-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="message message-error">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php echo e($slot); ?>

</main>
</body>
</html>
<?php /**PATH /home/legion/DEV/Prepa/2eme/projetWeb/blog/resources/views/components/layouts/blog.blade.php ENDPATH**/ ?>