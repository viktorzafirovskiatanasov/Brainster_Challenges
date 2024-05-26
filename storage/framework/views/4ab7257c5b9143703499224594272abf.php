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
        <?php if (isset($component)) { $__componentOriginaldbf52243d7994e4c84cef4d134adc013 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldbf52243d7994e4c84cef4d134adc013 = $attributes; } ?>
<?php $component = App\View\Components\HomeView::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('home-view'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\HomeView::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldbf52243d7994e4c84cef4d134adc013)): ?>
<?php $attributes = $__attributesOriginaldbf52243d7994e4c84cef4d134adc013; ?>
<?php unset($__attributesOriginaldbf52243d7994e4c84cef4d134adc013); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldbf52243d7994e4c84cef4d134adc013)): ?>
<?php $component = $__componentOriginaldbf52243d7994e4c84cef4d134adc013; ?>
<?php unset($__componentOriginaldbf52243d7994e4c84cef4d134adc013); ?>
<?php endif; ?>
        
    </main>
    <?php echo $__env->make('challenge.partials._script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH C:\Users\User\Desktop\challenges\resources\views/challenge/home-template.blade.php ENDPATH**/ ?>