<html>

<head>
    <?php echo $__env->make('challenge.partials._head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('script'); ?>
</head>

<body class="bg-zinc-100">
    <nav>
        <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </nav>
    <main>
        <?php echo $__env->make('challenge.disccusion-create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </main>
    <?php echo $__env->make('challenge.partials._script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\Users\User\Desktop\challenges\resources\views/challenge/disccusion-template.blade.php ENDPATH**/ ?>