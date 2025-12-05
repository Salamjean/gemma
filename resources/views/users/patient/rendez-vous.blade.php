@extends('layouts.patient', ['title' => 'Liste des rendez vous'])

@section('content')
    <div class="max-w-4xl min-w-max mx-auto bg-white py-16 md:py-8 md:px-16 border-t-4 border-orange-400 md:w-9/12">
        <ul role="list" class="divide-y divide-gray-100">
            @forelse ($rendez as $item)
                <li class="flex justify-between gap-x-6 py-5 p-5 sm:p-4">
                    <div class="flex gap-x-4">
                        <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                            src="{{ asset($item->image) }}"
                            alt="rdv{{ $item->id }}">
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm font-semibold leading-6 text-gray-900">
                                {{ $item->title }}
                            </p>
                            <p class="mt-1 truncate text-xs leading-5 text-gray-500 uppercase">
                              date du rendez-vous : {{ dateCompletFr(\Carbon\Carbon::createFromFormat('d/m/Y', $item->date)) }}
                            </p>
                        </div>
                    </div>
                    <div class="mt-1 sm:flex sm:flex-col sm:items-end">
                        <p class="text-sm leading-6 text-gray-900 relative">
                            @if (\Carbon\Carbon::createFromFormat('d/m/Y', $item->date) > date('Y-m-d'))
                                 <div class="w-4 h-4 bg-green-500 rounded-full border-2 border-white"></div>
                            @else
                              <div class="w-4 h-4 bg-red-500 rounded-full border-2 border-white"></div>
                            @endif
                        </p>
                        <p class="hidden md:block mt-2 text-xs leading-5 text-gray-500">{{ dateCompletFr($item->created_at) }} <br>
                            <span class="ml-10">à  {{ heureFr($item->created_at) }}</span>
                        </p>
                    </div>
                </li>
            @empty
            @endforelse
        </ul>
    </div>
@endsection