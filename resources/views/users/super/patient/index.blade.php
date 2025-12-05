@extends('layouts.dashboard',['title' => "Liste des patients"])

@push('css')
    @livewireStyles()
@endpush
@section('content')
<div class="row justify-content-center">
    <div class="col-12">
      <div class="box">
        <div class="box-header">
              <div class="row">
                <div class="col-xs-12  col-xl-9 col-lg-9 col-md-9 col-sm-9">
                    <h4 class="box-title">PATIENTS</h4>
                </div>
              </div>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-hover display nowrap margin-top-10 w-p100">
                    <thead>
                        <tr>
                            <th class="bb-2">CodePatient</th>
                            <th class="bb-2">Photo</th>
                            <th class="bb-2">Nom&Prenoms</th>
                            <th class="bb-2">Genre</th>
                            <th class="bb-2">Date de naissance</th>
                            <th class="bb-2">Pays de naissance</th>
                            <th class="bb-2">N°Piece</th>
                            <th class="bb-2 text-center">Résidence</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($patients as $patient)
                           {{--  @php
                                $dateNaissance = Carbon\Carbon::parse($patient->birth_date);
                                $age = $dateNaissance->diffInYears(Carbon\Carbon::now());
                            @endphp --}}
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
                                <td>{{ $patient->birth_date }}</td>
                                <td>{{ $patient->country }}</td>
                                <td>{{ $patient->numero_identite }}</td>
                                <td>{{ $patient->currentResidence->name }}</td>
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
@push('js')
    @livewireScripts()
    <script src="{{ asset('assets/vendor_plugins/iCheck/icheck.min.js') }}"></script>
    <script src="{{ asset('assets/src/js/pages/advanced-form-element.js') }}"></script>
@endpush
