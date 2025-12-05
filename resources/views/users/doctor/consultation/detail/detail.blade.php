@extends('layouts.', ['title' => $data[1]])

@section('content')
    @if ($data[0] == 'curative' || $data[0] == 'pre-natale' || $data[0] == 'post-natale' || $data[0] == 'accouchement')
        @if ($consultation->hospitalisation)
            <a style="margin: 10px;" href="{{ route('hospital.hospitalisation.detail', $consultation->hospitalisation->id) }}" class="btn btn-info" >Patient Hospitalisé</a>
        @endif

        @if ($consultation->observation)
            <a style="margin: 10px;" href="{{ route('hospital.observation.detail', $consultation->observation->id) }}" class="btn btn-info" >Observation</a>
        @endif
    @endif
    @if ($data[0] == 'curative')
        @include('users.doctor.consultation.detail.form.currative')
    @elseif ($data[0] == 'pre-natale')
        @include('users.doctor.consultation.detail.form.pre-natale')
    @elseif ($data[0] == 'post-natale')
        @include('users.doctor.consultation.detail.form.post-natale')
    @elseif ($data[0] == 'accouchement')
        @include('users.doctor.consultation.detail.form.accouchement')
    @else
        <div style="font-size: 20px;">Détail introuvable...</div>
    @endif
@endsection