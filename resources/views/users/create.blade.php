@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Create Role" />

    <div class="space-y-6">
        <div class="rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
<form action="{{ route('users.store') }}" method="POST" class="p-6 space-y-6">
    @csrf

    {{-- ================= PERSONAL INFORMATION ================= --}}
    <div class="border p-4 rounded-lg">
        <h3 class="text-base font-semibold mb-4">Personal Information</h3>

        <div class="space-y-4">
            <x-forms.input label="First Name" name="first_name" required />
            <x-forms.input label="Middle Name" name="middle_name" />
            <x-forms.input label="Last Name" name="last_name" required />
            <x-forms.input label="Suffix" name="name_suffix" placeholder="Jr, Sr, etc" />
        </div>
    </div>

    {{-- ================= ADDRESS ================= --}}
    <div class="border p-4 rounded-lg">
        <h3 class="text-base font-semibold mb-4">Address Information</h3>

        <div class="space-y-4">
            <x-forms.input label="House No / Street" name="street" required />
            <x-forms.input label="Barangay" name="barangay" required />
            <x-forms.input label="City / Municipality" name="city" required />
            <x-forms.input label="Province" name="province" required />
        </div>
    </div>

    {{-- ================= CONTACT ================= --}}
    <div class="border p-4 rounded-lg">
        <h3 class="text-base font-semibold mb-4">Contact Details</h3>

        <div class="space-y-4">
            <x-forms.input label="Mobile Number" name="mobile_number" required />
        
        </div>
    </div>

    {{-- ================= ACCOUNT ================= --}}
    <div class="border p-4 rounded-lg">
        <h3 class="text-base font-semibold mb-4">Account Details</h3>

        <div class="space-y-4">
            <x-forms.input label="Email Address" name="email" type="email" required />

            <!-- <div>
                <label class="block text-sm mb-1">Password *</label>
                <input type="password" name="password" class="form-input w-full" required>
            </div> -->
            <x-forms.input label="Password" name="password" type="password" required />
            <x-forms.input label="Confirm Password" name="password_confirmation" type="password" required />
        </div>
    </div>

    {{-- ================= ROLES ================= --}}
    <div class="border p-4 rounded-lg">
        <h3 class="text-base font-semibold mb-4">Assign Roles</h3>

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

    {{-- ================= BUTTONS ================= --}}
    <div class="flex gap-3">
        <button type="submit" class="bg-brand-500 px-6 py-2 text-white rounded-lg">
            Create User
        </button>

        <a href="{{ route('users.index') }}" class="border px-6 py-2 rounded-lg">
            Cancel
        </a>
    </div>
</form>
        </div>
    </div>
@endsection

