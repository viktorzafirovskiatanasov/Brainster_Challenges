<!-- resources/views/challenge/single.blade.php -->

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
        <div class="py-12">
            <div class="col-4 offset-4 mb-12">
                <h1 class="text-center text-5xl font-extrabold">Welcome To The Forum</h1>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="flex p-8">
                            <div class="flex-grow">
                                <?php if($discussion->image): ?>
                                    <img src="<?php echo e(Storage::url('public/images/' . $discussion->image)); ?>" alt="Image"
                                        class=" min-h-96 object-cover rounded-lg" style="max-width: 80%;">
                                <?php else: ?>
                                    <p>No image available</p>
                                <?php endif; ?>
                                <div class="mt-8">
                                    <p class="text-gray-900 font-bold text-xl mb-2"><?php echo e($discussion->title); ?></p>
                                    <p class="text-gray-500 text-extralight whitespace-wrap w-96">
                                        <?php echo e($discussion->description); ?></p>
                                </div>
                            </div>

                            <div class="flex-grow items-end justify-between">
                                <p class="text-gray-500 text-lg leading-none whitespace-nowrap text-center">
                                    <?php echo e($discussion->user->username); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-8">
                    <h2 class="text-xl">Comments:</h2>
                    <button class="my-5 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg">
                        <a href="<?php echo e(route('discussions.comment.create', ['discussion' => $discussion->id])); ?>">
                            Add Comment
                        </a>
                    </button>
                    <?php $__currentLoopData = $discussion->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="max-w-7xl mx-auto flex items-center">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-full">
                                <div class="p-6 text-gray-900 flex justify-between items-center">
                                    <div>
                                        <p class="mb-2">Posted by: <span
                                                class="text-black font-bold"><?php echo e($comment->user->username); ?></span></p>
                                        <p class="mb-2"><?php echo e($comment->content); ?></p>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <form action="<?php echo e(route('comments.destroy', ['comment' => $comment->id])); ?>"
                                            method="post"
                                            onsubmit="return confirm('Are you sure you want to delete this comment?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('delete'); ?>
                                            <button type="submit" class="text-red-500 px-4 mt-4" title="Delete Comment">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                        <a href="<?php echo e(route('comments.edit', ['comment' => $comment->id])); ?>"
                                            class="text-blue-500 px-4" title="Edit Comment">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    </div>
                                    <div class="text-center">
                                        <p><?php echo e($comment->created_at->format('F d, Y \a\t H:i')); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </main>
    <?php echo $__env->make('challenge.partials._script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\Users\User\Desktop\challenges\resources\views/challenge/single.blade.php ENDPATH**/ ?>