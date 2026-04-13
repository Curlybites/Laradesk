@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Calender" />
    <x-calendar-area />
    
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    let calendarEl = document.getElementById('calendar');

    if (!calendarEl) {
        console.log('Calendar div not found');
        return;
    }

    let calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
    });

    calendar.render();
});
</script>
@endpush