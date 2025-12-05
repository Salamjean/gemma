<div class="row">
    <div class="col-xl-4 col-lg-6 col-12">
        <div class="box bg-success-light">
            <div class="box-body text-center">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="p-5 w-100 h-100">
                        <img src="{{ asset('assets/icons/admission_money.png') }}" class="" alt="icon">
                    </div>
                    <div class="text-end">
                        <h2 class="mb-0 fw-900 text-success fs-24">
                            {{ \App\Models\Admission::where('hospital_id', \Illuminate\Support\Facades\Auth::user()->accountant->hospital_id)->where('date_paiement', date('Y-m-d'))->where('statut_paiement', '1')->sum('montant') }}
                            FCFA</h2>
                        <p class="text-fade mt-5 mb-0 text-success">Somme percue de la journée</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-12">
        <div class="box bg-success-light">
            <div class="box-body text-center">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="p-5 w-100 h-100">
                        <img src="{{ asset('assets/icons/protect.png') }}" class="" alt="doctor">
                    </div>
                    <div class="text-end">
                        <h2 class="mb-0 fw-900 text-success fs-24">
                            {{ \App\Models\Assurance::where('hospital_id', \Illuminate\Support\Facades\Auth::user()->accountant->hospital_id)->where('date', date('Y-m-d'))->sum('prix') }}
                            FCFA</h2>
                        <p class="text-fade mt-5 mb-0 text-success">Sommes des assurances</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-12">
        <div class="box bg-success-light">
            <div class="box-body text-center">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="p-5 w-100 h-100">
                        <img src="{{ asset('assets/icons/admission_valid.png') }}" class="" alt="secretariat">
                    </div>
                    <div class="text-end">
                        <h2 class="mb-0 fw-600 text-success">
                            {{ \App\Models\Consultation::whereDate('date_consultation', date('Y-m-d'))->where('hospital_id', \Illuminate\Support\Facades\Auth::user()->accountant->hospital_id)->count() }}
                        </h2>
                        <p class="text-fade mt-5 mb-0 text-success">Nombre de consultation de la journée</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row pt-35" style="display: flex; justify-content:center;">
    <div class="" style="width: 50%;">
        <canvas id="admission"></canvas>
    </div>
    <div class="" style="width: 50%;">
        <canvas id="admissionTOtal"></canvas>
    </div>
</div>
<script src="{{ asset('js/chart.min.js') }}"></script>
<script>
    (async function() {

        const dataMP = [
            @foreach ($dataMontantPercue as $key => $item)
                {
                    year: "{{ chartDayFrensh($key) }}",
                    count: {{ $item }}
                },
            @endforeach
        ];

        const dataMN = [
            @foreach ($dataMontantNormal as $key => $item)
                {
                    year: "{{ chartDayFrensh($key) }}",
                    count: {{ $item }}
                },
            @endforeach
        ];

        const dataMA = [
            @foreach ($dataMontantAssurance as $key => $item)
                {
                    year: "{{ chartDayFrensh($key) }}",
                    count: {{ $item }}
                },
            @endforeach
        ];

        new Chart(
            document.getElementById('admission'), {
                type: 'line',
                data: {
                    labels: dataMP.map(row => row.year),
                    datasets: [{
                            label: 'Somme percue',
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 205, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(201, 203, 207, 0.2)',
                                'rgba(97,255,19,0.2)',
                                'rgba(0,0,0,0.2)',
                                'rgba(4,28,62,0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 205, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                            ],
                            borderColor: [
                                'rgb(255, 99, 132)',
                                'rgb(255, 159, 64)',
                                'rgb(255, 205, 86)',
                                'rgb(75, 192, 192)',
                                'rgb(54, 162, 235)',
                                'rgb(153, 102, 255)',
                                'rgb(201, 203, 207)',
                                'rgba(97,255,19,1)',
                                'rgba(0,0,0,1)',
                                'rgba(4,28,62,1)',
                                'rgb(255, 99, 132)',
                                'rgb(255, 159, 64)',
                                'rgb(255, 205, 86)',
                                'rgb(75, 192, 192)',
                                'rgb(54, 162, 235)',
                            ],
                            borderWidth: 1,
                            data: dataMP.map(row => row.count)
                        },
                      
                        {
                            label: 'Montant assurance',
                            backgroundColor: [
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(201, 203, 207, 0.2)',
                                'rgba(97,255,19,0.2)',
                                'rgba(0,0,0,0.2)',
                                'rgba(4,28,62,0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 205, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(201, 203, 207, 0.2)',
                                'rgba(97,255,19,0.2)',
                                'rgba(0,0,0,0.2)',
                                'rgba(4,28,62,0.2)',
                            ],
                            borderColor: [
                                'rgb(153, 102, 255)',
                                'rgb(201, 203, 207)',
                                'rgba(97,255,19,1)',
                                'rgba(0,0,0,1)',
                                'rgba(4,28,62,1)',
                                'rgb(255, 99, 132)',
                                'rgb(255, 159, 64)',
                                'rgb(255, 205, 86)',
                                'rgb(75, 192, 192)',
                                'rgb(54, 162, 235)',
                                'rgb(153, 102, 255)',
                                'rgb(201, 203, 207)',
                                'rgba(97,255,19,1)',
                                'rgba(0,0,0,1)',
                                'rgba(4,28,62,1)',
                            ],
                            borderWidth: 1,
                            data: dataMA.map(row => row.count)
                        },

                    ]
                }
            }
        );

        new Chart(
            document.getElementById('admissionTOtal'), {
                type: 'line',
                data: {
                    labels: dataMN.map(row => row.year),
                    datasets: [
                        {
                            label: 'Montant normal',
                            backgroundColor: [
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(201, 203, 207, 0.2)',
                                'rgba(97,255,19,0.2)',
                                'rgba(0,0,0,0.2)',
                                'rgba(4,28,62,0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 205, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(201, 203, 207, 0.2)',
                                'rgba(97,255,19,0.2)',
                                'rgba(0,0,0,0.2)',
                                'rgba(4,28,62,0.2)',
                            ],
                            borderColor: [
                                'rgb(153, 102, 255)',
                                'rgb(201, 203, 207)',
                                'rgba(97,255,19,1)',
                                'rgba(0,0,0,1)',
                                'rgba(4,28,62,1)',
                                'rgb(255, 99, 132)',
                                'rgb(255, 159, 64)',
                                'rgb(255, 205, 86)',
                                'rgb(75, 192, 192)',
                                'rgb(54, 162, 235)',
                                'rgb(153, 102, 255)',
                                'rgb(201, 203, 207)',
                                'rgba(97,255,19,1)',
                                'rgba(0,0,0,1)',
                                'rgba(4,28,62,1)',
                            ],
                            borderWidth: 1,
                            data: dataMN.map(row => row.count)
                        },


                    ]
                }
            }
        );

    })();
</script>
