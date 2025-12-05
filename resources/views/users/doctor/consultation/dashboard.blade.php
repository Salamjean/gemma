@extends('layouts.dashboard', ['title' => 'Tableau de bord de la consultation du patient ' . $consultation->patient->user->name . ' ' . $consultation->patient->user->prenom])

@section('content')
    <div class="dashboard">
        <div class="container-full dashboard-consultation">

            @if (\Illuminate\Support\Facades\Auth::user()->doctor->gyneco == 1)
                @include('users.doctor.consultation.dashboard.maternite')
            @else
                @include('users.doctor.consultation.dashboard.autre')
            @endif

        </div>
        <div class="dashboard-tache">
            <h3><u>Tâches effectuées</u></h3>
            @if ($action['bulletin'] > 0)
            <div class="tache-container">
                <div style="margin-right: 10px;font-size:18px;">Consultation</div>
                <div>
                    <a href="#" title="telecharger"><i class="fa fa-print" style="margin-right: 10px; font-size:20px;"></i></a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" style="color: #4DC953; width:30px;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                </div>
            </div>
            @endif
            @if ($action['naissance'] > 0)
            <div class="tache-container">
                <div style="margin-right: 10px;font-size:18px;">Declaration de naissance ({{ $action['naissance'] }})</div>
                <div>
                    <a href="{{ route('doctor.consultation.certificat.naissance', $consultation->patient_id) }}" title="telecharger"><i class="fa fa-print" style="margin-right: 10px; font-size:20px;"></i></a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" style="color: #4DC953; width:30px;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                </div>
            </div>
            @endif
            @if ($action['deces_p'] > 0)
            <div class="tache-container">
                <div style="margin-right: 10px;font-size:18px;">Declaration decès patient</div>
                <div>
                    <a href="#" title="telecharger"><i class="fa fa-print" style="margin-right: 10px; font-size:20px;"></i></a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" style="color: #4DC953; width:30px;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                </div>
            </div>
            @endif
            @if ($action['deces_e'] > 0)
            <div class="tache-container">
                <div style="margin-right: 10px;font-size:18px;">Declaration décès nouveau née ({{ $action['deces_e'] }})</div>
                <div>
                    <a href="#" title="telecharger"><i class="fa fa-print" style="margin-right: 10px; font-size:20px;"></i></a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" style="color: #4DC953; width:30px;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                </div>
            </div>
            @endif
            @if ($action['hospitalisation'] > 0)
            <div class="tache-container">
                <div style="margin-right: 10px;font-size:18px;">Hospitalisation</div>
                <div>
                    <a href="#" title="telecharger"><i class="fa fa-print" style="margin-right: 10px; font-size:20px;"></i></a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" style="color: #4DC953; width:30px;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                </div>
            </div>
            @endif
            @if ($action['observation'] > 0)
            <div class="tache-container">
                <div style="margin-right: 10px;font-size:18px;">Observation</div>
                <div>
                    <a href="#" title="telecharger"><i class="fa fa-print" style="margin-right: 10px; font-size:20px;"></i></a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" style="color: #4DC953; width:30px;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                </div>
            </div>
            @endif
            @if ($action['arret_travail'] > 0)
            <div class="tache-container">
                <div style="margin-right: 10px;font-size:18px;">Arret de travail</div>
                <div>
                    <a href="#" title="telecharger"><i class="fa fa-print" style="margin-right: 10px; font-size:20px;"></i></a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" style="color: #4DC953; width:30px;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                </div>
            </div>
            @endif
            @if ($action['ordonnance'] > 0)
            <div class="tache-container">
                <div style="margin-right: 10px;font-size:18px;">Ordonnance</div>
                <div>
                    <a href="#" title="telecharger"><i class="fa fa-print" style="margin-right: 10px; font-size:20px;"></i></a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" style="color: #4DC953; width:30px;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                </div>
            </div>
            @endif
            @if ($action['examen'] > 0)
            <div class="tache-container">
                <div style="margin-right: 10px;font-size:18px;">Examen</div>
                <div>
                    <a href="#" title="telecharger"><i class="fa fa-print" style="margin-right: 10px; font-size:20px;"></i></a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" style="color: #4DC953; width:30px;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                </div>
            </div>
            @endif
            <div>

            </div>
        </div>
    </div>
    <style>
        .dashboard {
            display: grid;
            gap: 20px;
            grid-template-columns: 70% 30%;
            margin-right: 20px;
        }

        .dashboard-consultation {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px #ccc;
        }

        .dashboard-tache {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            max-height: min-content;
        }

        .container-consultation {
            padding: 20px;
            display: grid;
            grid-column: 1 / 3;
        }

        .title-consultation {
            width: 100%;
            font-size: 24px;

            border-bottom: #ccc solid 2px;
            text-transform: capitalize;
        }

        .section-consultation {
            padding: 10px;
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .section-item {
            padding: 10px;
        }

        .section-item>div>a {
            font-size: 18px;
        }

        .footer-consultation {
            display: flex;
            justify-content: end;
        }


        .footer-consultation>div>a {
            font-size: 18px;
            color: #000000;
            background: #4DC953;
            border-radius: 8px;
            transition: all 0.5s ease-in-out;
            padding: 10px 20px;
        }

        .footer-consultation>div>a:hover {
            font-size: 18px;
            color: #ffffff;
            background: #062B20;
            transition: all 0.3s ease-in-out;
            border-radius: 8px;
            padding: 10px 20px;
        }

        .section-action {
            padding: 5px;
        }

        .tache-container
        {
            display: flex;
            justify-content: space-between;
            padding-bottom: 5px;
        }
    </style>
    <script>

    </script>
@endsection
