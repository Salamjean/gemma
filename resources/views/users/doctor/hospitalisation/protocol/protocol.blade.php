@extends('layouts.dashboard', ['title' => 'Prescription de protocole therapeutique ' . $type])

@section('content')
    @if ($type == 'externe')
        @include('users.doctor.hospitalisation.protocol.form_externe')
    @else
        @include('users.doctor.hospitalisation.protocol.form_interne')
    @endif
@endsection
