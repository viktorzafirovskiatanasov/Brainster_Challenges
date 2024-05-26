<!-- resources/views/challenge/comments/create.blade.php -->

<html>

<head>
    <?php echo $__env->make('challenge.partials._head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('script'); ?>
</head>

<body class="bg-zinc-200">
    <nav>
        <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </nav>
    <main>
        <div class="container mx-auto my-8">
            <h1 class="text-center text-3xl font-bold mb-4">Add Comment</h1>
            <form action="<?php echo e(route('discussions.comment.store', ['discussion' => $discussion->id])); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="mb-4">
                    <label for="content" class="block text-lg font-medium text-gray-600">Comment:</label>
                    <input type="text" id="content" name="content" class="mt-1 p-2 w-full border rounded-md" placeholder="Type your comment here...">
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                    Submit Comment
                </button>
            </form>
            
        </div>
    </main>
    <?php echo $__env->make('challenge.partials._script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\Users\User\Desktop\challenge\resources\views/challenge/create-comment.blade.php ENDPATH**/ ?>