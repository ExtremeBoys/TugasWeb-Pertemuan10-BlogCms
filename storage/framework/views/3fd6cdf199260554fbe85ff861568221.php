<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['title' => null, 'subtitle' => null, 'footer' => null]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['title' => null, 'subtitle' => null, 'footer' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div <?php echo e($attributes->merge(['class' => 'bg-white border border-slate-200 rounded-lg shadow-sm overflow-hidden'])); ?>>
    <?php if($title || $subtitle): ?>
        <div class="px-6 py-4 border-b border-slate-100">
            <?php if($title): ?>
                <h3 class="text-lg font-semibold text-slate-800 leading-snug"><?php echo e($title); ?></h3>
            <?php endif; ?>
            <?php if($subtitle): ?>
                <p class="text-xs text-slate-500 mt-1"><?php echo e($subtitle); ?></p>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="p-6">
        <?php echo e($slot); ?>

    </div>

    <?php if($footer): ?>
        <div class="px-6 py-3 bg-slate-50 border-t border-slate-100 flex items-center justify-between text-sm">
            <?php echo e($footer); ?>

        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\Users\Hype\ExtremeBoy\pemrograman-web\tr10\resources\views/components/card.blade.php ENDPATH**/ ?>