@extends('layouts.dashboard',['title' => "Liste des Consultation"])

@section('content')
  @if(auth()->user()->role_as == 'super')

    <div class="row">
        <div class="col-12  ">
          <div class="box">
            <div class="box-header">
              <div class="row">
                  <div class="col-xs-12  col-xl-9 col-lg-9 col-md-9 col-sm-9">
                      <h4 class="box-title">Liste des consultations</h4>
                  </div>
              </div>
            </div>
            <br /><br />
            <div class="box-body">
              <div class="table-responsive">
                  <table id="example" class="table table-striped table-hover display nowrap margin-top-10 w-p100">
                      <thead>
                          <tr>
                              <th class="bb-2">N°</th>
                              <th class="bb-2">Code</th>
                              <th class="bb-2">Date consultation</th>
                              <th class="bb-2">Code Patient</th>
                              <th class="bb-2">Nom du Patient</th>
                              <th class="bb-2">Docteur</th>
                              <th class="bb-2">Statut</th>
                          </tr>
                      </thead>
                      <tbody>
                            @forelse ($consultations as $item )
                            <tr>
                                <td class="text-dark fw-bold fs-6">#{{ $loop->index + 1 }}</td>
                                <td class="text-dark fw-bold fs-6">{{ $item->code_consultation ?? null }}</td>
                                <td>
                                    {{ formatDate($item->date_consultation) }}
                                </td>
                                <td class="text-dark fw-bold fs-6">
                                    {{ $item->patient->code_patient }}
                                </td>
                                <td>
                                    {{ $item->patient->user->name }} {{ $item->patient->user->prenom }}
                                </td>
                                <td><span class="badge badge-primary">{{ $item->doctor->user->name }}</span></td>
                                <td>
                                    @if ($item->status == 1)
                                    <span class="badge badge-success">Terminé</span>
                                    @else
                                    <span class="badge badge-warning">En cours</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">Aucune donnée disponible dans le tableau</td>
                                </tr>
                            @endforelse
                     </tbody>
                    </table>
              </div>
            </div>
          </div>
        </div>
    </div>
  @endif


@endsection