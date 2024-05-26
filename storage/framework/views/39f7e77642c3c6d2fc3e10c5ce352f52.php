<div class="container-fluid m-32">
    <div class="row">
        <?php if(session('success')): ?>
            <div class="alert alert-success bg-green-200 py-4 px-2 my-8 rounded-lg">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        <div class="col-4 offset-4">
            <h1 class="text-center text-5xl font-extrabold">Welcome To The Forum</h1>
        </div>
        <div class="col-4 offset-4 w-52 h-40 my-8">
            <?php if(Auth::check()): ?>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg mb-4">
                    <a href="<?php echo e(route('discussions.create')); ?>">
                        Add New Discussion
                    </a>
                </button>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                    <a href="<?php echo e(route('dashboard')); ?>">
                        Go To Dashboard
                    </a>
                </button>
            <?php else: ?>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                    <a href="<?php echo e(route('login')); ?>">
                        Log In to Add New Discussion
                    </a>
                </button>
            <?php endif; ?>
        </div>

        <div class="col-8 offset-2 align-center">
            <?php $__currentLoopData = $discussions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discussion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            

            
                <a href="<?php echo e(route('single', ['id' => $discussion->id])); ?>" class="w-full">
                    <div class="w-full lg:max-w-full flex bg-white p-8 rounded-lg">
                        <div class="flex-none">
                            <?php if($discussion->image): ?>
                                <img src="<?php echo e(Storage::url('public/images/' . $discussion->image)); ?>" alt="Image"
                                    class="min-w-48 h-32 object-cover rounded-lg">
                            <?php else: ?>
                                <p>No image available</p>
                            <?php endif; ?>
                        </div>
                        <div class="flex-grow pl-16 pr-8">
                            <p class="text-gray-900 font-bold text-xl mb-2"><?php echo e($discussion->title); ?></p>
                            <p class="text-gray-700 text-base"><?php echo e($discussion->description); ?></p>
                        </div>
                        <div class="flex items-center">
                            <p class="text-gray-500 text-lg leading-none whitespace-nowrap">
                                <?php echo e($discussion->category->title); ?> | <?php echo e($discussion->user->username); ?></p>
                        </div>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\User\Desktop\challenges\resources\views/components/home-view.blade.php ENDPATH**/ ?>