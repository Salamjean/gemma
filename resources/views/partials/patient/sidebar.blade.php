<div class="w-full md:w-2/12 md:fixed ">
    <div class="bg-white p-3 border-t-4 border-green-400">
        <div class="image overflow-hidden">
            @if (Illuminate\Support\Facades\Auth::user()->patient->img_url != null)
                <img class="h-auto w-full mx-auto " src="{{ asset('assets/uploads/patient/' . Illuminate\Support\Facades\Auth::user()->patient->img_url) }}">
            @else
                <img class="h-auto w-full mx-auto " src="{{ asset('assets/images/avatar/4.jpg') }}" alt="avatar">
            @endif
        </div>
        <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{ Illuminate\Support\Facades\Auth::user()->name }}
            {{ Illuminate\Support\Facades\Auth::user()->prenom }}</h1>
        <h3 class="text-gray-600 font-lg text-semibold leading-6">{{ Illuminate\Support\Facades\Auth::user()->patient->profession }}</h3>
        <p class="text-sm text-gray-500 hover:text-gray-600 leading-6">{{ Illuminate\Support\Facades\Auth::user()->patient->address }}</p>
        <ul
            class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
            <li class="flex items-center py-3">
                <span>Status</span>
                <span class="ml-auto"><span
                        class="bg-green-500 py-1 px-2 rounded text-white text-sm">Active</span></span>
            </li>
            <li class="flex items-center py-3">
                <span>Date de création</span>
                <span class="ml-auto">{{ dateFr(Illuminate\Support\Facades\Auth::user()->patient->created_at) }}</span>
            </li>
        </ul>
    </div>
    <div class="my-4"></div>

</div>
