@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Create Menu" />

    <div class="space-y-6">
        <div class="rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            {{-- <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-800">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                    Create Role
                </h3>
            </div> --}}

                <form action="{{ route('menus.store') }}" method="POST" class="p-6 ">
                    @csrf
                <div class="flex justify-between gap-6">

                    <!-- LEFT SIDE (FORM) -->
                    <div class="w-2/3">
                        <x-forms.input label="Name" name="name" required />

                        <div class="mt-4">
                            <x-forms.input label="Route" name="route" required />
                        </div>

                        <div class="mt-4">
                            <x-forms.input label="Icon" name="icon" required />
                        </div>

                        <div class="mt-4">
                            <x-custom.select-input 
                                name="department" 
                                label="Department"
                                :options="$menus->pluck('name', 'id')"
                            />
                        </div>

                        <div class="mt-4">
                            <x-forms.text-area 
                                label="Description" 
                                name="description" 
                                rows="6" 
                                required 
                            />
                        </div>
                    </div>

                    <!-- RIGHT SIDE (ROLES) -->
                    <div class="w-1/3 flex justify-end">
                        <div class="w-full max-w-xs border rounded-lg p-4 dark:border-gray-700">
                            <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-400">
                                Assign Roles
                            </p>

                            <div class="space-y-2">
                                @foreach($roles as $role)
                                    <x-custom.checkbox 
                                        name="roles[]" 
                                        :value="$role->name" 
                                        :label="$role->name" 
                                    />
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            
                <div class="mt-4 w-full px-2.5">
                    <div class="mt-1 flex items-center gap-3">
                        <button type="submit" class="bg-brand-500 hover:bg-brand-600 flex items-center justify-center gap-2 rounded-lg px-4 py-3 text-sm font-medium text-white">
                           Create Menu
                        </button>
    
                        <a href="{{ route('menus.index') }}"
                            class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-5 py-3 text-sm font-medium text-gray-700 shadow-theme-xs transition hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03]">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

