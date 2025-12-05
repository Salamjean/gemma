@extends('layouts.patient', ['title' => 'Liste de vos declarations'])

@section('content')
    <div class="max-w-4xl min-w-max mx-auto bg-white py-16 md:py-8 md:px-16 border-t-4 border-orange-400 md:w-9/12">
        <ul role="list" class="divide-y divide-gray-100">
            @forelse ($declarations as $item)
                <li class="flex justify-between gap-x-6 py-5 p-5 sm:p-2">
                    <div class="flex gap-x-4">
                        <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                            src="{{ asset($item->type == 'death' ? 'assets/uploads/deces.png' : 'assets/uploads/baby.png') }}"
                            alt="">
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm font-semibold leading-6 text-gray-900">
                                @if ($item->type == 'death')
                                    <span class="text-red-600">
                                        Déclaration de décès
                                    </span>
                                @else
                                    <span class="text-green-600">Déclaration de naissance</span>
                                @endif
                            </p>
                            <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                                @if ($item->type == 'death')
                                    @if ($item->deces->person == 'patient')
                                    @else
                                        nouveau née
                                    @endif
                                @else
                                    Nouveau née
                                @endif

                            </p>
                        </div>
                    </div>
                    <div class="mt-1 sm:flex sm:flex-col sm:items-end">
                        <p class="text-sm leading-6 text-gray-900">
                            <a target="_blank" href="{{ route('patient.impression', [$item->type, $item->id]) }}">
                                <img src="{{ asset('assets/uploads/imprimante.png') }}" class="w-5 sm:w-8" alt="imp" >
                            </a>
                        </p>
                        <p class="hidden md:block mt-2 text-xs leading-5 text-gray-500">{{ dateFr($item->created_at) }}</p>
                    </div>
                </li>
            @empty
            @endforelse
        </ul>
    </div>
@endsection
