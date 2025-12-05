@extends('layouts.dashboard', ['title' => 'Dashboard'])

@section('content')
    <div class="box ">
        <div class="box-header">
            <div class="d-flex justify-content-between">
                <div class="">
                    <h4 class="box-title">Vos permissions</h4>
                </div>
            </div>
        </div>
        <br /><br />
        <div class="box-body">
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-hover display nowrap margin-top-10 w-p100">
                    <thead>
                        <tr>
                            <th class="bb-2">Code</th>
                            <th class="bb-2">Type d'utilisateur</th>
                            <th class="bb-2">Nom & Prénoms</th>
                            <th class="bb-2">Date</th>
                            <th class="bb-2">Date fin</th>
                            <th class="bb-2">Status</th>

                            <th class="bb-2 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $item)
                            <tr>
                                <td><b>{{ $item->code }}</b></td>
                                <td>
                                    @if ($item->type === 'doctor')
                                        Docteur
                                    @elseif ($item->type === 'cashier')
                                        Caissier
                                    @elseif ($item->type === 'male_nurse')
                                        Infirmier
                                    @elseif ($item->type === 'secretariat')
                                        Secretaire
                                    @elseif ($item->type === 'accountant')
                                        Comptable
                                    @elseif ($item->type === 'pharmacy')
                                        Pharmacie
                                    @endif
                                </td>

                                <td>
                                    {{ $item->user->name }}
                                </td>

                                <td>
                                    {{ dateNumberFr($item->beging_date) }}
                                </td>

                                <td>
                                    {{ dateNumberFr($item->end_date) }}
                                </td>


                                <td class="">
                                    @if ($item->status == 'pending')
                                        <span class="badge badge-warning">En attente</span>
                                    @elseif($item->status == 'agree')
                                        <span class="badge badge-success">Accordée</span> <br>
                                    @elseif($item->status == 'reject')
                                        <span class="badge badge-danger">Refusée</span> <br>
                                    @endif
                                </td>

                                <td class="text-center">
                                    <button type="button" id="menu" title="Menu" data-bs-toggle="modal"
                                        class="btn btn-sm btn-warning editBtn" data-bs-target="#editModal"
                                        data-bs-user="{{ $item->user->name }}"
                                        data-bs-description="{{ $item->description }}"
                                        data-bs-beging_date="{{ $item->beging_date }}"
                                        data-bs-end_date="{{ $item->end_date }}" data-bs-status="{{ $item->status }}"
                                        data-bs-_url="{{ $item->_url }}">
                                        <span class="fa-solid fa-eye "></span>
                                    </button>
                                    @if ($item->status == 'pending')
                                        <a href="{{ route('permission.update', [$item->id, 'agree']) }}">
                                            <span class="btn btn-sm btn-success">Accorder</span>
                                        </a>
                                        <a href="{{ route('permission.update', [$item->id, 'reject']) }}">
                                            <span class="btn btn-sm btn-danger">Rejeter</span>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="user" class="form-label">Nom</label>
                                <input type="text" id="user" name="user"
                                    class="bg-white form-control @error('label') is-invalid @enderror"
                                    value="{{ old('user') }}" autocomplete="user" autofocus readonly>

                            </div>
                        </div>
                        <div class="col-md-2">

                            <a href="#" class="btn btn-sm btn-info" id="download" download style="display:none;">
                                <span class="fa-solid fa-print"></span>
                            </a>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="beging_date" class="form-label">Date début</label>
                                <input type="date" id="beging_date" name="beging_date"
                                    class="bg-white form-control @error('label') is-invalid @enderror"
                                    value="{{ old('beging_date') }}" autocomplete="beging_date" autofocus readonly>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="end_date" class="form-label">Date fin<span
                                        class="text-danger fw-bold">*</span></label>
                                <input type="date" id="end_date" name="end_date"
                                    class="bg-white form-control @error('label') is-invalid @enderror"
                                    value="{{ old('end_date') }}" autocomplete="end_date" autofocus readonly>

                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description" class="form-label">Description<span
                                        class="text-danger fw-bold">*</span></label>
                                <textarea class="form-control bg-white" name="description" id="description" rows="10" readonly></textarea>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $(".editBtn").click(function() {

                var description = $(this).data('bs-description');
                var beging_date = $(this).data('bs-beging_date');
                var end_date = $(this).data('bs-end_date');
                var user = $(this).data('bs-user');

                var _url = $(this).data('bs-_url');
                console.log(_url)
                if (_url) {
                    $('#download').attr('href', '../assets/uploads/permission/' + _url).show();
                } else {
                    $('#download').hide();
                }

                $('#description').val(description);
                $('#beging_date').val(beging_date);
                $('#end_date').val(end_date);
                $('#user').val(user);


            });
        });
    </script>
@endsection
