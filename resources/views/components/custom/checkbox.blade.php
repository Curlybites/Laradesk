@props([
    'name',
    'value' => '',
    'label' => '',
    'checked' => false
])

<div x-data="{ checkboxToggle: {{ $checked ? 'true' : 'false' }} }">
    <label class="flex cursor-pointer items-center text-sm font-medium text-gray-700 select-none dark:text-gray-400">
        <div class="relative">
            {{-- Ginagamit natin ang $value bilang ID para unique bawat isa --}}
            <input type="checkbox" 
                name="{{ $name }}" 
                value="{{ $value }}" 
                class="sr-only"
                {{ $checked ? 'checked' : '' }}
                @change="checkboxToggle = !checkboxToggle" 
            />
            
            <div :class="checkboxToggle ? 'border-brand-500 bg-brand-500' : 'bg-transparent border-gray-300 dark:border-gray-700'"
                class="mr-3 flex h-5 w-5 items-center justify-center rounded-md border-[1.25px] transition hover:border-brand-500 dark:hover:border-brand-500">
                <span :class="checkboxToggle ? 'block' : 'hidden'">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.6666 3.5L5.24992 9.91667L2.33325 7" stroke="white" stroke-width="1.94437" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
            </div>
        </div>
        {{ $label }}
    </label>
</div>
