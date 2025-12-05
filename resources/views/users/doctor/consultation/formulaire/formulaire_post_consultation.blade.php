@extends('layouts.dashboard')

@section('content')

    @if ($type == 'arret-travail')

        @include('users.doctor.consultation.formulaire.post-consultation.arret')

    @elseif ($type == 'ordonnance')

        @include('users.doctor.consultation.formulaire.post-consultation.ordonnance')

    @elseif ($type == 'examen')

        @include('users.doctor.consultation.formulaire.post-consultation.examen')

    @else

        <div style="font-size: 20px;">Formulaire introuvable...</div>

    @endif

    <div>ok</div>

@endsection
