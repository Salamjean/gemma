@extends('layouts.dashboard', ['title' => 'Liste des consultations'])

@section('content')
    <div class="box">
        <div class="box-header">
            <div class="row">
                <div class="col-xs-12  col-xl-9 col-lg-9 col-md-9 col-sm-9">
                    <h4 class="box-title">Vos consultations du jour en cours</h4>
                </div>
            </div>
        </div>
        <br /><br />
        <div class="box-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-hover display nowrap margin-top-10 w-p100">
                    <thead>
                        <tr>
                            <th class="bb-2">Reference</th>
                            <th class="bb-2">Nom du Patient</th>
                            <th class="bb-2">Motif</th>
                            <th class="bb-2">Status</th>
                            <th class="bb-2 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($consultations as $item)
                            <tr>
                                <td><b>{{ $item->patient->code_patient }}</b></td>
                                <td>
                                    {{ $item->patient->user->name }}&nbsp; {{ $item->patient->user->prenom }}
                                </td>
                                <td class="" style="width: 200px;">
                                    {{ $item->prestationHospital->prestationService->libelle }}

                                </td>

                                <td class="">
                                    @if ($item->status == 0)
                                        <span class="badge badge-danger">En attente</span>
                                    @else
                                        <span class="badge badge-success">Terminée</span> <br>

                                    @endif
                                </td>

                                <td class="text-center">

                                    @if ($item->status == 0)
                                        <a href="{{ route('doctor.consultation.formulaire', $item->id) }}"
                                            class="btn btn-sm btn-info" id="menu" title="Menu">
                                            <span class="">Commencer la consultation</span>

                                        </a>

                                    @else
                                        <a href="{{ route('doctor.consultation.detail', $item->id) }}" class="btn btn-sm btn-info"
                                            title="detail consultation">
                                            <span class="">Détail</span>
                                        </a>
                                    @endif
                                    <a href="javascript:void(0)"
                                        onclick="openCardModal('{{ route('doctor.consultation.patient.card', $item->patient->id) }}')"
                                        class="btn btn-sm btn-warning" title="Carte numérique"><i
                                            class="fa-solid fa-id-card"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        (function ($) {
            "use strict";

            $('#menu').on('click', function (e) {




            });




        })(jQuery);
    </script>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function openCardModal(url) {
            Swal.fire({
                html: '<div id="swal-card-container" style="min-height: 600px; overflow: hidden;"></div>',
                width: '1500px',
                maxWidth: '95vw',
                padding: '2em',
                background: 'transparent',
                showConfirmButton: false,
                showCloseButton: true,
                didOpen: () => {
                    Swal.getPopup().style.overflow = 'hidden';
                    Swal.showLoading();
                    fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                        .then(response => {
                            if (!response.ok) throw new Error("Network response was not ok");
                            return response.text();
                        })
                        .then(html => {
                            Swal.hideLoading();
                            const container = document.getElementById('swal-card-container');
                            container.innerHTML = html;

                            const scripts = container.querySelectorAll("script");
                            scripts.forEach(oldScript => {
                                const newScript = document.createElement("script");
                                Array.from(oldScript.attributes).forEach(attr => newScript.setAttribute(attr.name, attr.value));
                                newScript.appendChild(document.createTextNode(oldScript.innerHTML));
                                oldScript.parentNode.replaceChild(newScript, oldScript);
                            });
                        })
                        .catch(err => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Erreur',
                                text: 'Impossible de charger la carte.',
                                confirmButtonColor: '#3596f7'
                            });
                            console.error(err);
                        });
                }
            });
        }
    </script>
@endpush