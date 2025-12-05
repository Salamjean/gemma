@extends('layouts.dashboard',['title' => "Liste des patients"])

@section('content')
<div class="row justify-content-center">
    <div class="col-12">
      <div class="box">

        <div class="box-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-hover display nowrap margin-top-10 w-p100">
                    <thead>
                        <tr>
                            <th class="bb-2">CodePatient</th>
                            <th class="bb-2">Photo</th>
                            <th class="bb-2">Nom&Prenoms</th>
                            <th class="bb-2">Genre</th>
                            <th class="bb-2">Age</th>
                            <th class="bb-2">Pays de naissance</th>
                            <th class="bb-2">N°Piece</th>
                            <th class="bb-2 text-center">Address</th>
                            <th class="bb-2 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($patients as $patient)
                            @php
                                $age = \Carbon\Carbon::createFromFormat('d/m/Y', $patient->birth_date)->diffInYears(\Carbon\Carbon::now());
                            @endphp
                            <tr>
                                <td><b><i>{{ $patient->code_patient }}</i></b></td>
                                <td>
                                    @if($patient->gender == 'masculin')
                                        <img src="{{ asset('assets/images/avatar/6.png') }}" class="avatar avatar-lg rounded10" alt="Photo de profil"/>
                                    @elseif($patient->gender == 'feminin')
                                        <img src="{{ asset("assets/images/avatar/2.png")}}" class="avatar avatar-lg rounded10" alt="Photo de profil"/>
                                    @else
                                        <img src="{{ asset("assets/uploads/patient/$patient->img_url")}}" class="avatar avatar-lg rounded10" alt="Photo de profil"/>
                                    @endif
                                </td>
                                <td><i>{{ $patient->user->name }} {{ $patient->user->prenom }}</i></td>
                                <td>{{ $patient->gender }}</td>
                                <td>{{ $age }} ans</td>
                                <td>{{ $patient->country }}</td>
                                <td>{{ $patient->numero_identite }}</td>
                                <td>{{ $patient->currentResidence->name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('hospital.patient.detail', $patient->id) }}" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Détail">
                                        Détail
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
          </div>
      </div>
    </div>
</div>
@endsection
