@extends('layouts.patient', ['title' => 'Tableau de bord'])

@section('content')
    <div class="w-full md:w-9/12 mx-2  h-screen">

        <div class="bg-white p-3 shadow-sm rounded-sm border-t-4 border-yellow-400">
            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                <span clas="text-green-500">
                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </span>
                <span class="tracking-wide">A propos</span>
            </div>
            <div class="text-gray-700">
                <div class="grid md:grid-cols-2 text-sm">
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-semibold">Nom</div>
                        <div class="px-4 py-2">{{ $patient->user->name }}</div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-semibold">Prénom</div>
                        <div class="px-4 py-2">{{ $patient->user->prenom }}</div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-semibold">Genre</div>
                        <div class="px-4 py-2">{{ $patient->gender }}</div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-semibold">Contact</div>
                        <div class="px-4 py-2">{{ $patient->telephone }}</div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-semibold">Adresse actuelle</div>
                        <div class="px-4 py-2">{{ $patient->currentResidence->name }}</div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-semibold">Adresse permanente</div>
                        <div class="px-4 py-2">{{ $patient->habitualResidence->name }}</div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-semibold">Email.</div>
                        <div class="px-4 py-2">
                            <a class="text-blue-800"
                                href="mailto:{{ $patient->user->email }}">{{ $patient->user->email }}</a>
                        </div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-semibold">Née le.</div>
                        <div class="px-4 py-2">{{ dateFr($patient->birth_date) }}</div>
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <div>
                    <a href="{{  route('patient.setting') }}"
                        class="block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">Voir
                        plus d'information</a>
                </div>
            </div>
        </div>

        <div class="my-4"></div>

        <div class="bg-white p-3 shadow-sm rounded-sm border-t-4 border-teal-400 mb-5">

            <div class="grid grid-cols-2">
                <div>
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>

                        </span>
                        <span class="tracking-wide">Dernieres consultations</span>
                    </div>
                    <ul class="list-inside space-y-2">
                        @forelse ($consultations as $item)
                            <li>
                                <div class="text-teal-600">{{ $item->admission->type_admission }}</div>
                                <div class="text-gray-500 text-xs">{{ dateCompletFr($item->created_at) }}</div>
                            </li>
                        @empty
                            <li>
                                <div class="text-teal-600">Vide.</div>

                            </li>
                        @endforelse
                    </ul>
                </div>
                <div>
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                        <span clas="text-green-500">
                            <svg class="h-5 fill-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </span>
                        <span class="tracking-wide">Déclarations</span>
                    </div>
                    <ul class="list-inside space-y-2">
                        @forelse ($declarations as $item)
                            <li>
                                <div class="text-teal-600">
                                    {{ $item->type == 'death' ? 'Déclaration de décès' : 'Déclaration de naissance' }}
                                </div>
                                <div class="text-gray-500 text-xs">{{ dateCompletFr($item->created_at) }}</div>
                            </li>
                        @empty
                            <li>
                                <div class="text-teal-600">Vide.</div>

                            </li>
                        @endforelse

                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection