@props(['type' => 'success', 'message' => null])

@php
$colorClasses = [
    'success' => 'bg-emerald-50 border-emerald-200 text-emerald-800',
    'danger' => 'bg-red-50 border-red-200 text-red-800',
    'warning' => 'bg-amber-50 border-amber-200 text-amber-800',
    'info' => 'bg-blue-50 border-blue-200 text-blue-800',
][$type] ?? 'bg-slate-50 border-slate-200 text-slate-800';
@endphp

@if ($message || $slot->isNotEmpty())
    <div {{ $attributes->merge(['class' => "p-4 border rounded-md text-sm mb-6 flex items-start justify-between $colorClasses"]) }}>
        <div>
            {{ $message ?? $slot }}
        </div>
    </div>
@endif
