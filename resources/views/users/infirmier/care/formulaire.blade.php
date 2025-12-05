@extends('layouts.dashboard', ['title' => 'Soins infirmier'])

@section('content')
    @include('users.infirmier.care.formulaire.en-tete')

    @if ($care->admission->prestationHospital->prestationService->libelle === 'Pansement')
        @include('users.infirmier.care.formulaire.pansement')
    @endif

    @if ($care->admission->prestationHospital->prestationService->libelle === 'Injection')
        @include('users.infirmier.care.formulaire.injection')
    @endif

    @if ($care->admission->prestationHospital->prestationService->libelle === 'Soins')
        @include('users.infirmier.care.formulaire.soins')
    @endif

@endsection
