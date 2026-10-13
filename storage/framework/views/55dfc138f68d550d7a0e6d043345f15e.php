<?php $__env->startSection('title', 'Daftar Artikel Blog - Tugas Rutin 10'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 bg-white p-6 border border-slate-200 rounded-lg shadow-sm">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Artikel Blog</h1>
            <p class="text-sm text-slate-500">Kelola dan baca seluruh artikel dengan Route Model Binding dan Pagination.</p>
        </div>

        <form action="<?php echo e(route('posts.index')); ?>" method="GET" class="flex gap-2 w-full md:w-auto">
            <input type="text" name="cari" placeholder="Cari judul, penulis, isi..." value="<?php echo e(request('cari')); ?>" class="px-3 py-2 border border-slate-300 rounded text-sm w-full md:w-64 focus:outline-none focus:border-teal-500">
            <button type="submit" class="px-4 py-2 bg-teal-600 hover:bg-teal-700 text-white rounded text-sm font-medium">Cari</button>
            <?php if(request('cari')): ?>
                <a href="<?php echo e(route('posts.index')); ?>" class="px-3 py-2 bg-slate-100 border border-slate-300 text-slate-700 rounded text-sm hover:bg-slate-200">Reset</a>
            <?php endif; ?>
        </form>
    </div>

    <?php if($posts->count() > 0): ?>
        <div class="space-y-4">
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => ['title' => $post->title,'subtitle' => 'Penulis: ' . $post->author . ' • ' . $post->created_at->format('d M Y')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($post->title),'subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Penulis: ' . $post->author . ' • ' . $post->created_at->format('d M Y'))]); ?>
                    <div class="flex flex-col md:flex-row gap-5 items-start">
                        <?php if($post->image): ?>
                            <div class="w-full md:w-48 h-32 flex-shrink-0 bg-slate-100 rounded border border-slate-200 overflow-hidden">
                                <img src="<?php echo e(asset('storage/' . $post->image)); ?>" alt="<?php echo e($post->title); ?>" class="w-full h-full object-cover">
                            </div>
                        <?php endif; ?>

                        <div class="flex-grow space-y-2">
                            <p class="text-sm text-slate-600 line-clamp-3 leading-relaxed">
                                <?php echo e($post->content); ?>

                            </p>
                        </div>
                    </div>

                     <?php $__env->slot('footer', null, []); ?> 
                        <a href="<?php echo e(route('posts.show', $post)); ?>" class="text-teal-600 hover:underline font-semibold text-xs">
                            Baca Selengkapnya &rarr;
                        </a>

                        <div class="flex items-center gap-2">
                            <a href="<?php echo e(route('posts.edit', $post)); ?>" class="px-3 py-1 bg-sky-50 text-sky-700 border border-sky-200 rounded text-xs font-medium hover:bg-sky-100 transition">
                                Edit
                            </a>

                            <form action="<?php echo e(route('posts.destroy', $post)); ?>" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');" class="inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="px-3 py-1 bg-red-50 text-red-700 border border-red-200 rounded text-xs font-medium hover:bg-red-100 transition">
                                    Hapus
                                </button>
                            </form>
                        </div>
                     <?php $__env->endSlot(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal53747ceb358d30c0105769f8471417f6)): ?>
<?php $attributes = $__attributesOriginal53747ceb358d30c0105769f8471417f6; ?>
<?php unset($__attributesOriginal53747ceb358d30c0105769f8471417f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53747ceb358d30c0105769f8471417f6)): ?>
<?php $component = $__componentOriginal53747ceb358d30c0105769f8471417f6; ?>
<?php unset($__componentOriginal53747ceb358d30c0105769f8471417f6); ?>
<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="mt-6">
            <?php echo e($posts->links()); ?>

        </div>
    <?php else: ?>
        <div class="text-center py-12 bg-white border border-slate-200 rounded-lg text-slate-500">
            Tidak ada postingan yang ditemukan.
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Hype\ExtremeBoy\pemrograman-web\tr10\resources\views/posts/index.blade.php ENDPATH**/ ?>