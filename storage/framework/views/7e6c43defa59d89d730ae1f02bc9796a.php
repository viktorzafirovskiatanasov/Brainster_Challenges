<div class="container mx-auto mt-8 p-8 max-w-md bg-white border rounded shadow-lg">
    <h2 class="text-2xl font-bold mb-6">Create Discussion</h2>
    <form method="POST" action="<?php echo e(route('discussions.store')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-600">Title:</label>
            <input type="text" name="title" id="title" class="mt-1 p-2 w-full border rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-600">Image:</label>
            <input type="file" name="image" id="image" class="mt-1 p-2 w-full border rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-600">Description:</label>
            <textarea name="description" id="description" class="mt-1 p-2 w-full border rounded-md" rows="3" required></textarea>
        </div>

        <div class="mb-4">
            <label for="category_id" class="block text-sm font-medium text-gray-600">Category:</label>
            <select name="category_id" id="category_id" class="mt-1 p-2 w-full border rounded-md" required>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">Submit</button>
    </form>
</div>
<?php /**PATH C:\Users\User\Desktop\challenges\resources\views/challenge/disccusion-create.blade.php ENDPATH**/ ?>