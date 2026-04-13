@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Edit Permission" />

    <div class="space-y-6">
        <div class="rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <form action="{{ route('permissions.update', $permission->id) }}" method="POST" class="p-6">
                @csrf
                @method('PUT')
                <div>
                    <x-forms.input label="Name" name="name" value="{{ $permission->name }}" required />
                </div>

                <div class="mt-4">
                    <x-forms.text-area label="Description" name="description" placeholder="Enter a description..." rows="6" value="{{ $permission->description }}" required />
                </div>

                <div class="mt-4 w-full px-2.5">
                    <div class="mt-1 flex items-center gap-3">
                        <button type="submit" class="bg-brand-500 hover:bg-brand-600 flex items-center justify-center gap-2 rounded-lg px-4 py-3 text-sm font-medium text-white">
                           Update Permission
                        </button>
    
                        <a href="{{ route('permissions.index') }}"
                            class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-5 py-3 text-sm font-medium text-gray-700 shadow-theme-xs transition hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03]">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

