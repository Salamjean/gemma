@extends('layouts.dashboard', ['title' => "Carte Patient"])

@section('content')
    <!-- REUSE Inner Card Logic with Page Mode -->
    @include('users.secretariat.patient.card_inner', ['mode' => 'page'])
@endsection