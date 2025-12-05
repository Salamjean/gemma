@extends('layouts.dashboard',['title' => "Accueil"])

@section('content')

    <div class="row">

        @if(Illuminate\Support\Facades\Auth::user()->role_as == 'super')

            @include('partials.dashboard.super')

        @elseif(Illuminate\Support\Facades\Auth::user()->role_as == 'hospital')

            @include('partials.dashboard.hospital')

        @elseif(Illuminate\Support\Facades\Auth::user()->role_as == 'doctor')

            @include('partials.dashboard.doctor')

        @elseif(Illuminate\Support\Facades\Auth::user()->role_as == 'infirmier')

        @include('partials.dashboard.infirmier')

        @elseif(Illuminate\Support\Facades\Auth::user()->role_as == 'secretariat')

            @include('partials.dashboard.secretariat')

        @elseif(Illuminate\Support\Facades\Auth::user()->role_as == 'cashier')

            @include('partials.dashboard.cashier')

        @elseif(Illuminate\Support\Facades\Auth::user()->role_as == 'pharmacy')

            @include('partials.dashboard.pharmacy')

        @elseif(Illuminate\Support\Facades\Auth::user()->role_as == 'accountant')

            @include('partials.dashboard.accountant')

        @elseif(Illuminate\Support\Facades\Auth::user()->role_as == 'patient')

            <div>salut</div>

        @endif

    </div>

@endsection
