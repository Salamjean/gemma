@extends('layouts.dashboard')

@push('css')
<!-- Ajouter le fichier evo-calendar.css pour le style -->
<link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/evo-calendar@1.1.2/evo-calendar/css/evo-calendar.min.css" />

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/evo-calendar@1.1.2/evo-calendar/css/evo-calendar.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/evo-calendar@1.1.2/evo-calendar/css/evo-calendar.royal-navy.css"/>
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div id='agenda'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('js')
    <!-- Ajouter la bibliothèque jQuery (obligatoire) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>

    <script src="{{ asset('js/evo-calendar.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#agenda').evoCalendar({
                theme: 'Royal Navy',
                language: 'fr',
                format: 'dd MM, yyyy',
                todayHighlight: true,
                calendarEvents: @json($events)
            });
        });
    </script>
    @endpush
@endsection
