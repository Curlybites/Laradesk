@props([
    'name',
    'options' => [],
    'placeholder' => 'Select Option',
    'value' => null,
])

<div x-data="{ selected: '{{ $value }}' }" class="relative z-20">
    
    <select
        name="{{ $name }}"
        x-model="selected"
        class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 
        dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 
        bg-transparent px-4 py-2.5 pr-11 text-sm text-gray-800 focus:ring-3 focus:outline-hidden 
        dark:border-gray-700 dark:bg-gray-900 dark:text-white/90"
        :class="selected ? 'text-gray-800 dark:text-white/90' : 'text-gray-400'"
    >
        <option value="">{{ $placeholder }}</option>

        @foreach ($options as $key => $label)
            <option value="{{ $key }}">
                {{ $label }}
            </option>
        @endforeach
    </select>

    <!-- Arrow -->
    <span class="pointer-events-none absolute top-1/2 right-4 -translate-y-1/2 text-gray-700 dark:text-gray-400">
        <svg class="stroke-current" width="20" height="20" fill="none">
            <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396"
                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </span>
</div>