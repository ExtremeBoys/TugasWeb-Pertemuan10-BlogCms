@props(['title' => null, 'subtitle' => null, 'footer' => null])

<div {{ $attributes->merge(['class' => 'bg-white border border-slate-200 rounded-lg shadow-sm overflow-hidden']) }}>
    @if ($title || $subtitle)
        <div class="px-6 py-4 border-b border-slate-100">
            @if ($title)
                <h3 class="text-lg font-semibold text-slate-800 leading-snug">{{ $title }}</h3>
            @endif
            @if ($subtitle)
                <p class="text-xs text-slate-500 mt-1">{{ $subtitle }}</p>
            @endif
        </div>
    @endif

    <div class="p-6">
        {{ $slot }}
    </div>

    @if ($footer)
        <div class="px-6 py-3 bg-slate-50 border-t border-slate-100 flex items-center justify-between text-sm">
            {{ $footer }}
        </div>
    @endif
</div>
