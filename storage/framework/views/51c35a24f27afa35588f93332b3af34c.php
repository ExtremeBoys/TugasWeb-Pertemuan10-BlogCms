<?php $__env->startSection('title', $post->title . ' - Tugas Rutin 10'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-3xl mx-auto space-y-6">
    <div class="mb-4">
        <a href="<?php echo e(route('posts.index')); ?>" class="text-sm text-teal-600 hover:underline">&larr; Kembali ke Semua Artikel</a>
    </div>

    <?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => ['title' => $post->title,'subtitle' => 'Ditulis oleh ' . $post->author . ' pada ' . $post->created_at->format('d F Y, H:i') . ' WIB']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($post->title),'subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Ditulis oleh ' . $post->author . ' pada ' . $post->created_at->format('d F Y, H:i') . ' WIB')]); ?>
        <div class="space-y-6">
            <?php if($post->image): ?>
                <div class="w-full max-h-96 rounded-lg overflow-hidden border border-slate-200 bg-slate-100">
                    <img src="<?php echo e(asset('storage/' . $post->image)); ?>" alt="<?php echo e($post->title); ?>" class="w-full h-full object-cover">
                </div>
            <?php endif; ?>

            <div class="text-base text-slate-700 leading-relaxed whitespace-pre-line">
                <?php echo e($post->content); ?>

            </div>
        </div>

         <?php $__env->slot('footer', null, []); ?> 
            <span class="text-xs text-slate-400">Slug: <?php echo e($post->slug); ?></span>

            <div class="flex items-center gap-2">
                <a href="<?php echo e(route('posts.edit', $post)); ?>" class="px-3.5 py-1.5 bg-sky-50 text-sky-700 border border-sky-200 rounded text-xs font-medium hover:bg-sky-100 transition">
                    Edit Artikel
                </a>

                <form action="<?php echo e(route('posts.destroy', $post)); ?>" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');" class="inline">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="px-3.5 py-1.5 bg-red-50 text-red-700 border border-red-200 rounded text-xs font-medium hover:bg-red-100 transition">
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
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Hype\ExtremeBoy\pemrograman-web\tr10\resources\views/posts/show.blade.php ENDPATH**/ ?>