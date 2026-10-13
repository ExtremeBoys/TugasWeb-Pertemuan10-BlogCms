<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['type' => 'success', 'message' => null]));

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

foreach (array_filter((['type' => 'success', 'message' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
$colorClasses = [
    'success' => 'bg-emerald-50 border-emerald-200 text-emerald-800',
    'danger' => 'bg-red-50 border-red-200 text-red-800',
    'warning' => 'bg-amber-50 border-amber-200 text-amber-800',
    'info' => 'bg-blue-50 border-blue-200 text-blue-800',
][$type] ?? 'bg-slate-50 border-slate-200 text-slate-800';
?>

<?php if($message || $slot->isNotEmpty()): ?>
    <div <?php echo e($attributes->merge(['class' => "p-4 border rounded-md text-sm mb-6 flex items-start justify-between $colorClasses"])); ?>>
        <div>
            <?php echo e($message ?? $slot); ?>

        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\Users\Hype\ExtremeBoy\pemrograman-web\tr10\resources\views/components/alert.blade.php ENDPATH**/ ?>