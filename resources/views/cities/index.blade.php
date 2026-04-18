@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Cities" />

    <div class="space-y-6">
        @session('success')
            <x-ui.alert variant="success">
                <p class="dark:text-white">{{ $value }}</p>
            </x-ui.alert>
        @endsession
    
        <a href="{{ route('cities.create') }}" class="inline-flex items-center text-inherit no-underline">
            <x-ui.button size="sm" variant="primary">
                    Add City
            </x-ui.button>
        </a> 

     <!-- <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

        @foreach ($cities as $city)

        @endforeach

    </div> -->


    <div class=" grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

        @foreach ($cities as $city)
        <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-5 shadow-sm hover:shadow-md transition">

            <!-- HEADER -->
            <div class="flex items-center justify-between">
                 <!-- LEFT SIDE -->
            <div class="flex items-center gap-3">

                <!-- COLOR DOT -->
                <span class="w-3 h-3 rounded-full"
                    style="background-color: {{ $city->color }}"></span>

                <!-- CITY NAME -->
                <h3 class="text-sm font-semibold text-gray-800 dark:text-white">
                    {{ $city->name }}
                </h3>

            </div>

            <!-- RIGHT SIDE (COUNT) -->
            <div>
                <span class="text-sm font-bold text-gray-600 dark:text-gray-300">
                
                   {{ $city->barangays_count }}
                </span>
            </div>
            </div>

            <!-- ACTIONS -->
            <div class="flex items-center gap-2 mt-5">

                <!-- VIEW -->
                <a href="{{ route('cities.barangays.index', $city) }}" 
                   class="flex-1 flex items-center justify-center gap-1 text-sm border border-gray-200 dark:border-gray-600 rounded-lg py-2 hover:bg-gray-100 dark:hover:bg-gray-700 transition dark:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                    </svg>
                    View
                </a>

                <!-- EDIT -->
                <a href=""
                   class="p-2 rounded-lg border border-gray-200 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 transition dark:text-white">
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                        </svg>

                </a>

                <!-- DELETE -->
                <form action="" method="POST" onsubmit="return confirm('Delete this city?')">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        class="p-2 rounded-lg bg-red-500 hover:bg-red-600 text-white transition">
                       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>

                    </button>
                </form>

            </div>

        </div>
        @endforeach

    </div>

@endsection

