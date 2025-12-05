@extends('layouts.dashboard')

@section('content')
    <div class="container p-10">
        <div id='calendar'></div>
    </div>
    @php

        $formattedEvents = [];

        foreach ($rendezVous as $rdv) {
            $formattedEvents[] = [
                'title' => $rdv->title,
                'patient' => $rdv->consultation->patient->user->name . ' ' . $rdv->consultation->patient->user->prenom,
                'start' => $rdv->date,
                'color' => 'red',
                'type' => 'rendezVous',
                'url' => route('doctor.patient.detail', $rdv->consultation->patient->id),
            ];
        }

    @endphp

    @php
        $currentMonth = date('Y-m');
        $daysInMonth = date('t');
        $availableDays = json_decode(Illuminate\Support\Facades\Auth::user()->availability->days);
    @endphp

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var initialLocaleCode = 'fr';
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth'
                },
                locale: initialLocaleCode,

                events: [
                    @foreach ($availableDays as $day)
                        @for ($i = -1; $i < 6; $i++)
                            {
                                start: '{{ date('Y-m-d', strtotime('this Monday +' . ($i * 7 + $day) . ' days')) }}',
                                end: '{{ date('Y-m-d', strtotime('this Monday +' . ($i * 7 + $day) . ' days')) }}',
                                display: 'background'
                            },
                        @endfor
                    @endforeach
                    @foreach ($formattedEvents as $rdv)
                        {
                            title: `{{ $rdv['patient'] }}: {{ $rdv['title'] }}`,
                            start: '{{ $rdv['start'] }}',
                            color: 'brown',
                            type: 'rendezVous',
                            url: '{{ $rdv['url'] }}'
                        },
                    @endforeach
                ],
                eventContent: function(info) {
                    var content = document.createElement('div');

                    if (info.event.extendedProps.type === 'rendezVous') {
                        content.innerText = info.event.title;
                        content.style.backgroundColor = 'brown';
                    }

                    return {
                        domNodes: [content]
                    };
                },
                eventClick: function(info) {
                    if (info.event.extendedProps.type === 'rendezVous' && info.event.extendedProps
                        .url) {
                        window.location.href = info.event.extendedProps.url;
                    }
                },
            });
            calendar.render();


        });
    </script>


    <style>
        .fc-toolbar {
            background-color: #ffffff !important;
        }

        .fc-button-primary {
            background-color: #6CA9E9 !important;
            color: #fff;
        }

        .fc-day-header {
            background-color: #4280C2 !important;
            color: #fff;
        }

        .fc-event:hover {
            background-color: #ff9900;
            color: #fff;
        }

        .fc-border-separate {
            border-color: #ddd !important;
        }
    </style>
@endsection
