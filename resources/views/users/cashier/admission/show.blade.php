@extends('layouts.dashboard', ['title' => 'Paiement Admission'])

@section('content')
    @if ($payment->type == 'admission')
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="row">


                            <div class="d-flex justify-content-end" style="gap: 10px">
                                <a href="{{ route('cashier.admission.list') }}" class="btn btn-primary btn-md shadow"><i class="fa fa-list-ul" aria-hidden="true"></i>&nbsp;Liste des admissions</a>
                            </div>
                        </div>
                    </div>

                    <div class="box-body fs-14">
                        <h4 class="box-title text-primary mb-0"><i class="fa-solid fa-building-user"></i> Details admission <span class="text-dark">&bull;&bull;&bull; {{ $payment->admission->code_admission }}</span></h4>
                        <hr class="my-15">
                        <div class="row">

                            <div class="col-md-12 py-10">
                                <center>
                                    <div class="form-label">
                                        <h3>
                                            <span style="color: blue;">{{ $payment->admission->patient->code_patient }} </span>| {{ $payment->admission->patient->user->name }} {{ $payment->admission->patient->user->prenom }}
                                        </h3>
                                    </div>
                                </center>
                                    <br>
                                <center>
                                    <div class="form-label"><strong>Montant à payer</strong><br> <span id="solde"
                                            style="font-size: 20px; color:red;"></span></div>
                                </center>
                                <br>
                                <h4 class="box-title text-primary pt-10"><i class="fa fa-superpowers"></i> Assurance
                                </h4>
                                <hr class="my-0"><br>
                                <form class="form"
                                    action="{{ route('cashier.payment.validated', $payment->id) }}"
                                    method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="assure" class="form-label fw-bold">Etes vous assuré ? :
                                                    <span class="danger">*</span></label>
                                                <select class="form-select text-uppercase" id="assure" name="assure"
                                                    style="width: 100%;" required>
                                                    <option value="" disabled selected>Selectionner</option>
                                                    <option value="1">Oui</option>
                                                    <option value="0">Non</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row" id="assureOK">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="type" class="form-label">Assurance<span
                                                        class="text-danger fw-bold">*</span></label>
                                                <select class="form-select text-uppercase" id="type" name="type"
                                                    style="width: 100%;">
                                                    <option value="">Selectionner</option>
                                                    @foreach ($assurances as $item)
                                                        <option data-solde="{{ $payment->admission->prix }}"
                                                            data-info="{{ $item->reduction * 100 }}"
                                                            value="{{ $item->id }}">{{ $item->libelle }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="amount" class="form-label">% </label>
                                                <input class="form-control" type="text" id="amount" name="amount"
                                                    disabled>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="no_assurance"
                                                    class="form-label @error('no_assurance') is-invalid @enderror">N° Assurance<span class="text-danger fw-bold">*</span></label>
                                                <input class="form-control" type="text" id="no_assurance"
                                                    name="no_assurance">
                                                @error('no_assurance')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>

                                    <!-- /.box-body -->
                                    <div class="box-footer text-end" style="margin-top: 10px">

                                        <button type="submit" class="btn btn-success">
                                            <i class="ti-save-alt"></i> Valider le paiement
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.box -->
        </div>
    @else
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="row">


                            <div class="d-flex justify-content-end" style="gap: 10px">
                                <a href="{{ route('cashier.admission.list') }}" class="btn btn-primary btn-md shadow">Aller
                                    à la
                                    liste du jour</a>
                            </div>
                        </div>
                    </div>

                    <div class="box-body fs-14">
                        <h4 class="box-title text-primary mb-0"><i class="fa-solid fa-building-user"></i> Details
                            hospitalisation<span class="text-lowercase" style="color:brown;"></span></h4>
                        <hr class="my-15">
                        <div class="row">

                            <div class="col-md-12 py-10">
                                <div class="form-label"><strong>Hospitalisation N° :</strong>
                                    {{ $payment->hospitalisation->code }}</div>
                                <div class="form-label"><strong>Ref Patient :</strong>
                                    {{ $payment->hospitalisation->consultation->patient->code_patient }}
                                </div>
                                <div class="form-label"><strong>Nom :</strong>
                                    {{ $payment->hospitalisation->consultation->patient->user->name }}
                                    {{ $payment->hospitalisation->consultation->patient->user->prenom }}</div><br>
                                <center>
                                    <div class="form-label"><strong>Montant à payer :</strong> <span id="solde"
                                            style="font-size: 20px; color:red;"></span></div>
                                </center>
                                <br>
                                <h4 class="box-title text-primary pt-10"><i class="fa fa-superpowers"></i> Assurance
                                </h4>
                                <hr class="my-0"><br>
                                <form class="form"
                                    action="{{ route('cashier.payment.validated', $payment->id) }}"
                                    method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label for="assure" class="form-label fw-bold">Etes vous assuré ? :
                                                    <span class="danger">*</span></label>
                                                <select class="form-select text-uppercase" id="assure" name="assure"
                                                    style="width: 100%;" required>
                                                    <option value="" disabled selected>Selectionner</option>
                                                    <option value="1">Oui</option>
                                                    <option value="0">Non</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row" id="assureOK">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="type" class="form-label">Assurance<span
                                                        class="text-danger fw-bold">*</span></label>
                                                <select class="form-select text-uppercase" id="type" name="type"
                                                    style="width: 100%;">
                                                    <option value="">Selectionner</option>
                                                    @foreach ($assurances as $item)
                                                        <option data-solde="{{ $payment->prix }}"
                                                            data-info="{{ $item->reduction * 100 }}"
                                                            value="{{ $item->id }}">{{ $item->libelle }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="amount" class="form-label">Pourcentage </label>
                                                <input class="form-control" type="text" id="amount" name="amount"
                                                    disabled>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="no_assurance"
                                                    class="form-label @error('no_assurance') is-invalid @enderror">Numéro
                                                    d'assurance<span class="text-danger fw-bold">*</span></label>
                                                <input class="form-control" type="text" id="no_assurance"
                                                    name="no_assurance">
                                                @error('no_assurance')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>

                                    <!-- /.box-body -->
                                    <div class="box-footer text-end" style="margin-top: 10px">

                                        <button type="submit" class="btn btn-success">
                                            <i class="ti-save-alt"></i> Valider le paiement
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.box -->
        </div>
    @endif

    <script>
        const assure = document.getElementById('assure');
        const assureOK = document.getElementById('assureOK');
        var solde = '{{ $payment->prix }}'
        document.getElementById('solde').innerHTML = solde + ' FCFA';


        assureOK.style.display = 'none';

        assure.addEventListener('change', function(e) {

            if (assure.value == "0") {

                assureOK.style.display = 'none';
                document.getElementById('type').required = false
                document.getElementById('no_assurance').required = false

            }

            if (assure.value == "1") {

                assureOK.style.display = 'flex';
                document.getElementById('type').required = true
                document.getElementById('no_assurance').required = true

            }
        });

        document.getElementById('type').addEventListener('change', function(e) {

            const selectedOption = this.options[this.selectedIndex];
            document.getElementById('amount').value = selectedOption.getAttribute('data-info');
            var ne = parseInt('{{ $payment->prix }}') - ((parseInt(selectedOption.getAttribute(
                    'data-info')) /
                100) * parseInt('{{ $payment->prix }}'));
            document.getElementById('solde').innerHTML = ne + ' FCFA';


        })
    </script>
@endsection
