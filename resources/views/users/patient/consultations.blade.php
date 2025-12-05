@extends('layouts.patient', ['title' => 'Liste de vos consultations'])

@section('content')
    <div class="max-w-4xl min-w-max mx-auto bg-white py-16 md:py-8 md:px-16 border-t-4 border-orange-400 md:w-9/12">

        <div class="grid grid-cols-1  gap-4">
            @forelse ($consultations as $item)
                <div class="bg-white rounded-sm p-6 border-b-4 md:border-l-2  md:border-sky-400">
                    <h2 class="text-xl font-semibold mb-4">Consultation du {{ dateCompletFr($item->created_at) }} à
                        {{ heureFr($item->created_at) }}</h2>
                    <p class="text-gray-600">Hopital : {{ $item->hospital->label }}</p>
                    <p class="text-gray-600">Médecin : {{ $item->doctor->user->name }}</p>
                    <p class="text-gray-600">Motif de la consultation : {{ $item->admission->motif_consultation }}</p>
                    <p class="text-gray-600">Mot du medecin : {{ motSortie( $item->registre->issue_consultation)}}</p>
                    <p class="text-gray-600">Documents : </p>
                    <div class="grid grid-cols-2 md:grid-cols-3  gap-4">
                        @if ($item->ordonnance)
                            <div>
                                <a target="_black" href="{{ route('patient.impression', ['ordonnance',$item->ordonnance->id]) }}">
                                    <span
                                        class="inline-flex items-center border border-red-100 rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-600 ring-1 ring-inset ring-red-500/10">
                                        Ordonnance
                                    </span>
                                </a>
                            </div>
                        @endif
                        @if ($item->examen)
                            <div>
                                <a target="_black" href="{{  route('patient.impression', ['examen',$item->examen->id]) }}">
                                    <span
                                        class="inline-flex items-center border border-green-100 rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-600 ring-1 ring-inset ring-green-500/10">
                                        Bulletin d'examen
                                    </span>
                                </a>
                            </div>
                        @endif
                        @if ($item->arret)
                            <div>
                                <a target="_black" href="{{ route('patient.impression', ['arret',$item->arret->id]) }}">
                                    <span
                                        class="inline-flex items-center border border-orange-100 rounded-md bg-orange-50 px-2 py-1 text-xs font-medium text-orange-600 ring-1 ring-inset ring-orange-500/10">
                                        Arrêt de travail
                                    </span>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
            @endforelse

        </div>

    </div>
@endsection
