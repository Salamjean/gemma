<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\PrestationService;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Hospital;
use App\Models\Pharmacy;
use App\Models\Service;
use App\Models\Caissiere;
use App\Models\Infirmier;
use App\Models\TypeAgent;
use App\Models\Accountant;
use App\Models\Secretaire;
use App\Models\TypeDoctor;
use App\Models\Bed;
use App\Models\Bedroom;
use App\Models\Departement;
use App\Models\Availability;
use App\Models\Bandage;
use App\Models\Care;
use App\Models\DrugHospital;
use App\Models\Injection;
use App\Models\PassagePatient;
use App\Models\PrestationDoctor;
use App\Models\PrestationHospital;
use App\Models\TypeAssurance;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ServiceHospital;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /** Creer la table Region, Ville et commune ***/
        $region = file_get_contents(database_path('tables/sql/regions.sql'));
        $communes = file_get_contents(database_path('tables/sql/sub_prefectures.sql'));
        $villes = file_get_contents(database_path('tables/sql/departments.sql'));
        $drugs = file_get_contents(database_path('tables/sql/drugs.sql'));
        DB::unprepared($region);
        DB::unprepared($villes);
        DB::unprepared($communes);
        DB::unprepared($drugs);

        $admins = Admin::all();

        if (count($admins) == 0) {

            //super admin
            $user = User::create([
                "name" => "Super",
                "email" => "super@gmail.com",
                "role_as" => "super",
                "password" => Hash::make('1234')
            ]);

            Admin::create([
                "user_id" => $user->id,
                "contact" => "2707000000",
                "address" => "Abidjan Plateau",
                "img_url" => null,
                "status" => "0"
            ]);

            //departement
            $services = [
                'Urgence' => [
                    'Consultation d\'urgence'
                ],

                "Gynécologie-Obstétrique" => [
                    "Consultation prénatale",
                    "Consultation postnatale",
                    "Suivi de grossesse",
                    "Accouchement",
                ],

                "Consultation Générale" => [
                    "Consultation générale",
                ],

                "Consultation pediatrique" => [
                    "Consultation pediatrique",
                ],

                "Soins infirmier" => [
                    "Pansement",
                    "Injection",
                    "Soins",
                ],

            ];

            foreach ($services as $key => $consultation) {
                $data = new Service();
                $data->libelle = $key;
                $data->save();

                foreach ($consultation as $item) {
                    $con = new PrestationService();
                    $con->service_id = $data->id;
                    $con->libelle = $item;
                    $con->save();
                }
            }

            //injections
            $injections = [
                ['injection', 'Injection intraveineuse directe (IVD)'],
                ['injection', 'Injection intraveineuse lente (IVL)'],
                ['injection', 'Injection intramusculaire (IM)'],
                ['injection', 'Injection sous-cutanée (SC)'],
                ['injection', 'Injection intradermique (IDM)'],
                ['injection', 'Injection d’allergènes'],
                ['injection', 'Injection d\'un implant sous-cutané'],
                ['injection', 'Injection par voie rectale'],
                ['vaccin', 'Vaccination contre la grippe saisonnière'],
                ['vaccin', 'Vaccination contre la diphtérie'],
                ['vaccin', 'Vaccination contre le tétanos'],
                ['vaccin', 'Vaccination contre la poliomyélite'],
                ['vaccin', 'Vaccination contre la coqueluche'],
                ['vaccin', 'Vaccination contre les papillomavirus humains'],
                ['vaccin', 'Vaccination contre les infections invasives à pneumocoque'],
                ['vaccin', 'Vaccination contre le virus de l\'hépatite A'],
                ['vaccin', 'Vaccination contre le virus de l\'hépatite B'],
                ['vaccin', 'Vaccination contre le méningocoque de sérogroupe A'],
                ['vaccin', 'Vaccination contre le méningocoque de sérogroupe B'],
                ['vaccin', 'Vaccination contre le méningocoque de sérogroupe C'],
                ['vaccin', 'Vaccination contre le méningocoque de sérogroupe Y'],
                ['vaccin', 'Vaccination contre le méningocoque de sérogroupe W'],
                ['vaccin', 'Vaccination contre la rage'],
            ];


            foreach ($injections as $key => $injection) {
                $data = new Injection();
                $data->type = $injection[0];
                $data->name = $injection[1];
                $data->save();
            }

            $pansements = [
                ['pansement courants', 'Pansement de stomies'],
                ['pansement courants', 'Pansement de trachéotomie'],
                ['pansement courants', 'Ablation de fils ou d\'agrafes, ≥ dix'],
                ['pansement courants', 'Ablation de fils ou d\'agrafes, > dix'],
                ['pansement courants', 'Pansement de plaies opératoires étendues ou multiples'],
                ['pansement courants', 'Pansement postopératoire d’exérèses multiples de varices et/ou de ligatures multiples de veines perforantes avec ou sans stripping'],
                ['pansement courants', 'Pansement de plaies'],
                ['pansement courants', 'Pansement de dermabrasion'],

                ['pansement lourd et complexe', 'Pansement de brûlure étendue ou de plaie chimique ou thermique étendue'],
                ['pansement lourd et complexe', 'Pansement de brûlure suite à radiothérapie'],
                ['pansement lourd et complexe', 'Pansement d\'ulcère étendu ou de greffe cutanée'],
                ['pansement lourd et complexe', 'Pansement d\'amputation nécessitant détersion, épluchage et régularisation'],
                ['pansement lourd et complexe', 'Pansement de fistule digestive'],
                ['pansement lourd et complexe', 'Pansement pour pertes de substance traumatique ou néoplasique'],
                ['pansement lourd et complexe', 'Pansement nécessitant un méchage ou une irrigation'],
                ['pansement lourd et complexe', 'Pansement d\'escarre profonde et étendue atteignant les muscles ou les tendons'],
                ['pansement lourd et complexe', 'Pansement chirurgical avec matériel d\'ostéosynthèse extériorisé'],
                ['pansement lourd et complexe', 'Pansement d’ulcère ou de greffe cutanée, avec pose de compression'],
            ];

            foreach ($pansements as $key => $pansement) {
                $data = new Bandage();
                $data->type = $pansement[0];
                $data->name = $pansement[1];
                $data->save();
            }

            $soins = [
                ['soins portant sur l\'appareil respiratoire', 'Séance d\'aérosol'],
                ['soins portant sur l\'appareil respiratoire', 'Lavage d\'un sinus'],
                ['soins portant sur l\'appareil respiratoire', 'Lavage auriculaire'],
                ['soins portant sur l\'appareil respiratoire', 'Lavage nasale'],
                ['soins portant sur l\'appareil genito-urinaire', 'Injection vaginale'],
                ['soins portant sur l\'appareil genito-urinaire', 'Soins gynécologiques au décours immédiat d\'un traitement par curiethérapie'],
                ['soins portant sur l\'appareil genito-urinaire', 'Cathétérisme urétral chez la femme'],
                ['soins portant sur l\'appareil genito-urinaire', 'Cathétérisme urétral chez l\'homme'],
                ['soins portant sur l\'appareil genito-urinaire', 'Changement de sonde urinaire chez la femme'],
                ['soins portant sur l\'appareil genito-urinaire', 'Changement de sonde urinaire chez l\'homme'],
                ['soins portant sur l\'appareil genito-urinaire', 'Cathétérisme urétral ou sondage chez l\'enfant de moins de cinq ans'],
                ['soins portant sur l\'appareil genito-urinaire', 'Instillation et/ou lavage vésical (sonde en place)'],
                ['soins portant sur l\'appareil genito-urinaire', 'Pose isolée d\'un étui pénien, une fois par vingt-quatre heures'],
                ['soins portant sur l\'appareil genito-urinaire', 'Retrait de sonde urinaire'],

                ['soins portant sur l\'appareil digestif', 'Soins de bouche'],
                ['soins portant sur l\'appareil digestif', 'Lavement évacuateur ou médicamenteux'],
                ['soins portant sur l\'appareil digestif', 'Extraction de fécalome ou extraction manuelle des selles'],
            ];

            foreach ($soins as $key => $soin) {
                $data = new Care();
                $data->type = $soin[0];
                $data->name = $soin[1];
                $data->save();
            }

            //type agent of hospital
            TypeAgent::create(["libelle" => "Médecin"]);
            TypeAgent::create(["libelle" => "Sage femme"]);

            //hospital
            $user = User::create([
                "name" => "Hopital",
                "email" => "hopital@gmail.com",
                "role_as" => "hospital",
                "password" => Hash::make('1234'),
            ]);

            $hospital = Hospital::create([
                "user_id" => $user->id,
                "reference" => "HO-4589",
                "nom_direction_generale" => "MARAHOUE",
                "district_sanitaire" => "BONON",
                "contact" => "2707000030",
                'label' => "HOSPITAL GEMMA",
                "localite" => "1",
                "img_url" => null,
                "status" => "0"
            ]);

            $ServiceHospital = [
                '1' => [
                    ['1', '1000'],
                ],
                '2' => [
                    ['2', '27000'],
                    ['3', '33000'],
                    ['4', '100000'],
                    ['5', '5000'],
                ],
                '3' => [
                    ['6', '1000'],
                ],
                '4' => [
                    ['7', '1000'],
                ],
                '5' => [
                    ['8', '1500'],
                    ['9', '1000'],
                    ['10', '1200'],
                ],
            ];

            foreach ($ServiceHospital as $key => $value) {
                $dep = new ServiceHospital();
                $dep->hospital_id = $hospital->id;
                $dep->service_id = $key;
                $dep->save();

                foreach ($value as $key2 => $serv) {
                    $service = new PrestationHospital();
                    $service->service_hospital_id = $dep->id;
                    $service->prix = $serv[1];
                    $service->prestation_service_id = $serv[0];
                    $service->save();
                }
            }

            $bedrooms = [
                [
                    'type' => 'collective',
                    'number' => 'A1',
                    'price' => '15000',
                    'hospital_id' => 1,
                    'beds' => [
                        ['1', '15000'],
                        ['2', '15000'],
                        ['3', '15000'],
                        ['4', '15000'],
                    ],
                ],
                [
                    'type' => 'collective',
                    'number' => 'A2',
                    'price' => '25000',
                    'hospital_id' => 1,
                    'beds' => [
                        ['1', '25000'],
                        ['2', '25000'],
                    ],
                ],
                [
                    'type' => 'individual',
                    'number' => 'RUCHE',
                    'price' => '80000',
                    'hospital_id' => 1,
                    'beds' => [
                        ['1', '80000'],
                    ],
                ],
                [
                    'type' => 'individual',
                    'number' => 'VIP',
                    'price' => '150000',
                    'hospital_id' => 1,
                    'beds' => [
                        ['1', '150000'],
                    ],
                ],
            ];

            foreach ($bedrooms as $key => $bedroom) {
                $chb = new Bedroom();
                $chb -> type = $bedroom['type'];
                $chb -> number = $bedroom['number'];
                $chb -> price = $bedroom['price'];
                $chb -> hospital_id = $bedroom['hospital_id'];
                $chb -> save();

                foreach($bedroom['beds'] as $keyy => $bed){
                    $lit = new Bed();
                    $lit -> bedroom_id = $chb->id;
                    $lit -> number = $bed[0];
                    $lit -> price = $bed[1];
                    $lit -> save();
                }
            }

            $i = 0;

            $drugs = [];

            while($i < 100)
            {

                $drugs[$i] = [1, $i+1, 1, 500 + $i * 100, 5000];
                $i++;
            }

            foreach($drugs as $key => $drug)
            {
                $mdoc = new DrugHospital();
                $mdoc -> hospital_id = $drug[0];
                $mdoc -> pharmacy_id = $drug[2];
                $mdoc -> drug_id = $drug[1];
                $mdoc -> price = $drug[3];
                $mdoc -> quantity = $drug[4];
                $mdoc -> save();
            }



            $typeDoctor = ['Chirurgien', 'Pédiatre', 'Gynécologue'];

            foreach ($typeDoctor as $key => $value) {
                TypeDoctor::create([
                    "label" => $value,
                    "hospital_id" => $hospital->id,
                ]);
            }

            $user = User::create([
                "name" => "Dr KOUA",
                "email" => "doctor1@gmail.com",
                "role_as" => "doctor",
                "password" => Hash::make('1234'),
            ]);

            $doctor = Doctor::create([
                "user_id" => $user->id,
                "matricule" => 'MS' . rand(111, 999999),
                "hospital_id" => $hospital->id,
                "type_name" => 'specialiste',
                "type_agent_id" => 1,
                "chief" => 1,
                "type_doctor_id" => 2,
                "service_hospital_id" => 2,
                "contact" => "2707000080",
                "address" => "Abidjan,Marcory",
                "status" => "0"
            ]);

            PrestationDoctor::create([
                'doctor_id' => $doctor->id,
                'prestation_hospital_id' => 2,
            ]);

            PrestationDoctor::create([
                'doctor_id' => $doctor->id,
                'prestation_hospital_id' => 3,
            ]);

            PrestationDoctor::create([
                'doctor_id' => $doctor->id,
                'prestation_hospital_id' => 4,
            ]);

            Availability::create([
                'user_id' => $user->id,
                'days' => json_encode(["0"]),
                'hour_start' => json_encode(["11:15",  "00:00", "00:00", "00:00", "00:00", "00:00", "00:00"]),
            ]);

            //agent 2 > sage femme
            $user = User::create([
                "name" => "Miss Kouame",
                "email" => "sage@gmail.com",
                "role_as" => "doctor",
                "password" => Hash::make('1234'),
            ]);

            $doctor = Doctor::create([
                "user_id" => $user->id,
                "matricule" => 'SG' . rand(111, 999999),
                "hospital_id" => $hospital->id,
                "type_agent_id" => 2,
                "type_doctor_id" => null,
                "service_hospital_id" => 1,
                "gyneco" => 1,
                "contact" => "2707000080",
                "address" => "Abidjan,Marcory",
                "status" => "0"
            ]);

            PrestationDoctor::create([
                'doctor_id' => $doctor->id,
                'prestation_hospital_id' => 1,
            ]);

            Availability::create([
                'user_id' => $user->id,
                'days' => json_encode(["1"]),
                'hour_start' => json_encode([  "00:00", "11:15", "00:00", "00:00", "00:00", "00:00", "00:00"]),
            ]);

            //agent 4 > doctor
            $user = User::create([
                "name" => "Dr CAMARA",
                "email" => "doctor2@gmail.com",
                "role_as" => "doctor",
                "password" => Hash::make('1234'),
            ]);

            $doctor = Doctor::create([
                "user_id" => $user->id,
                "matricule" => 'MS' . rand(111, 999999),
                "hospital_id" => $hospital->id,
                "type_name" => 'specialiste',
                "type_agent_id" => 1,
                "type_doctor_id" => 3,
                "service_hospital_id" => 3,
                "gyneco" => 1,
                "contact" => "2707000080",
                "address" => "Abidjan,Marcory",
                "status" => "0"
            ]);

            PrestationDoctor::create([
                'doctor_id' => $doctor->id,
                'prestation_hospital_id' => 6,
            ]);

            Availability::create([
                'user_id' => $user->id,
                'days' => json_encode(["2"]),
                'hour_start' => json_encode(["00:00","00:00", "11:15", "00:00", "00:00", "00:00", "00:00"]),
            ]);

            //agent 5 > doctor
            $user = User::create([
                "name" => "Dr Serie",
                "email" => "doctor3@gmail.com",
                "role_as" => "doctor",
                "password" => Hash::make('1234'),
            ]);

            $doctor = Doctor::create([
                "user_id" => $user->id,
                "matricule" => 'MG' . rand(111, 999999),
                "hospital_id" => $hospital->id,
                "type_name" => 'generaliste',
                "type_agent_id" => 1,
                "service_hospital_id" => 3,
                "contact" => "2707000080",
                "address" => "Abidjan,Marcory",
                "status" => "0"
            ]);

            PrestationDoctor::create([
                'doctor_id' => $doctor->id,
                'prestation_hospital_id' => 6,
            ]);


            Availability::create([
                'user_id' => $user->id,
                'days' => json_encode(["3"]),
                'hour_start' => json_encode(["00:00", "00:00","00:00", "11:15", "00:00", "00:00", "00:00"]),
            ]);

            //agent 6 > doctor
            $user = User::create([
                "name" => "Dr GNEPROU",
                "email" => "doctor4@gmail.com",
                "role_as" => "doctor",
                "password" => Hash::make('1234'),
            ]);

            $doctor = Doctor::create([
                "user_id" => $user->id,
                "matricule" => 'MG' . rand(111, 999999),
                "hospital_id" => $hospital->id,
                "type_name" => 'generaliste',
                "type_agent_id" => 1,
                "service_hospital_id" => 4,
                "contact" => "2702000080",
                "address" => "Abidjan,Marcory",
                "status" => "0"
            ]);

            PrestationDoctor::create([
                'doctor_id' => $doctor->id,
                'prestation_hospital_id' => 7,
            ]);


            Availability::create([
                'user_id' => $user->id,
                'days' => json_encode(["3","4"]),
                'hour_start' => json_encode(["00:00", "00:00", "00:00", "11:15", "11:15", "00:00", "00:00"]),
            ]);

            //infirmier 1
            $user = User::create([
                "name" => "Miss Marlene",
                "email" => "infirmier@gmail.com",
                "role_as" => "infirmier",
                "password" => Hash::make('1234'),
            ]);

            Infirmier::create([
                "user_id" => $user->id,
                "matricule" => 'INF' . rand(111, 999999),
                "hospital_id" => $hospital->id,
                "service_hospital_id" => 2,
                "contact" => "2707000080",
                "address" => "Abidjan,Marcory",
                "status" => "0"
            ]);

            Availability::create([
                'user_id' => $user->id,
                'days' => json_encode(["4"]),
                'hour_start' => json_encode(["00:00", "00:00", "00:00", "00:00", "11:15", "00:00", "00:00"]),
            ]);

            //infirmier 2
            $user = User::create([
                "name" => "Miss Kouadio",
                "email" => "infirmier2@gmail.com",
                "role_as" => "infirmier",
                "password" => Hash::make('1234'),
            ]);

            Infirmier::create([
                "user_id" => $user->id,
                "matricule" => 'INF' . rand(111, 999999),
                "hospital_id" => $hospital->id,
                "service_hospital_id" => 4,
                "contact" => "2707000080",
                "address" => "Abidjan,Marcory",
                "status" => "0"
            ]);

            Availability::create([
                'user_id' => $user->id,
                'days' => json_encode(["4", "5", "6"]),
                'hour_start' => json_encode(["00:00", "00:00", "00:00", "00:00", "11:15", "11:15", "11:15"]),
            ]);

            //infirmier 3
            $user = User::create([
                "name" => "Miss Rosette",
                "email" => "infirmier3@gmail.com",
                "role_as" => "infirmier",
                "password" => Hash::make('1234'),
            ]);

            Infirmier::create([
                "user_id" => $user->id,
                "matricule" => 'INF' . rand(111, 999999),
                "hospital_id" => $hospital->id,
                "contact" => "2707000080",
                "service_hospital_id" => 5,
                "address" => "Abidjan,Marcory",
                "status" => "0"
            ]);

            Availability::create([
                'user_id' => $user->id,
                'days' => json_encode(["5"]),
                'hour_start' => json_encode(["00:00", "00:00", "00:00", "00:00", "00:00", "11:15", "00:00"]),
            ]);

            //phamarcie
            $user = User::create([
                "name" => "Mr Akouman",
                "email" => "phamarcie@gmail.com",
                "role_as" => "pharmacy",
                "password" => Hash::make('1234'),
            ]);

            Pharmacy::create([
                "user_id" => $user->id,
                "matricule" => 'PH' . rand(111, 999999),
                "hospital_id" => $hospital->id,
                "contact" => "2707000080",
                "address" => "Abidjan,Marcory",
                "status" => "0"
            ]);

            Availability::create([
                'user_id' => $user->id,
                'days' => json_encode(["6"]),
                'hour_start' => json_encode(["00:00", "00:00", "00:00", "00:00", "00:00", "00:00", "11:00"]),
            ]);

            //secretaire
            $user = User::create([
                "name" => "Mlle Diane",
                "email" => "secretaire@gmail.com",
                "role_as" => "secretariat",
                "password" => Hash::make('1234'),
            ]);

            $secretaire = Secretaire::create([
                "user_id" => $user->id,
                "matricule" => "CI509666",
                "hospital_id" => $hospital->id,
                "numero_piece" => "CI89912PL8963",
                "contact" => "2707000080",
                "address" => "Abidjan,Marcory",
                "status" => "0"
            ]);

            Availability::create([
                'user_id' => $user->id,
                'days' => json_encode(["0"]),
                'hour_start' => json_encode(["00:00", "00:00", "00:00", "00:00", "00:00", "00:00", "00:00"]),
            ]);

            //comptable
            $user = User::create([
                "name" => "Mme aimer",
                "email" => "comptable@gmail.com",
                "role_as" => "accountant",
                "password" => Hash::make('1234'),
            ]);

            Accountant::create([
                "user_id" => $user->id,
                "matricule" => "COMPT599666",
                "hospital_id" => $hospital->id,
                "type_piece" => "CNI",
                "numero_piece" => "CI894500BZ8044",
                "contact" => "2707001080",
                "address" => "Abidjan,treichville",
                "img_url" => null,
                "status" => "0"
            ]);

            Availability::create([
                'user_id' => $user->id,
                'days' => json_encode(["1", "5"]),
                'hour_start' => json_encode(["00:00", "00:00", "00:00", "00:00", "00:00", "00:00", "00:00"]),
            ]);

            //caissiere
            $user = User::create([
                "name" => "Mme Olive",
                "email" => "caisse@gmail.com",
                "role_as" => "cashier",
                "password" => Hash::make('1234'),
            ]);

            Caissiere::create([
                "user_id" => $user->id,
                "matricule" => "CI599666",
                "hospital_id" => $hospital->id,
                "type_piece" => "CNI",
                "numero_piece" => "CI894500BZ8044",
                "contact" => "2707001080",
                "address" => "Abidjan,treichville",
                "img_url" => null,
                "status" => "0"
            ]);

            Availability::create([
                'user_id' => $user->id,
                'days' => json_encode(["0"]),
                'hour_start' => json_encode(["00:00", "00:00", "00:00", "00:00", "00:00", "00:00", "00:00"]),
            ]);

            //patient femme
            $user = User::create([
                "prenom" => "Olive",
                "name" => "Dion",
                "email" => "patientf@gmail.com",
                "password" => Hash::make('1234'),
            ]);

            $code = 225;
            $dataNaissRef = dateNaiss('12/07/1989');
            $countNaissRef = countNaiss('12/07/1989');

            Patient::create([
                'user_id' => $user->id,
                'secretaire_id' => $secretaire->id,
                'hospital_id' => $secretaire->hospital->id,
                'type_assurance_id' =>  null,
                "gender" => 'feminin',
                'code_patient' => "DM$dataNaissRef$countNaissRef$code",
                'birth_date' => '12/07/1989',
                'lieu_de_naissance_id' => 1,
                'country' => 'Côte d\'Ivoire',
                'residence_habituelle_id' => 1,
                'residence_actuelle_id' => 1,
                'ethnie' => 'Senoufo',
                'telephone' => '0704051152',
                'nbre_enfant' => 0,
                'nom_personne_cas_urgence' => "Jean Marc",
                'telephone_personne_cas_urgence' => "0701622222",
                'lien_personne_cas_urgence' => "Marie",
                'status' => 1,
            ]);

            //passage hopital
            $passage  = new PassagePatient();
            $passage -> libelle = 'Création de compte';
            $passage -> hospital_id = 1;
            $passage -> patient_id = 1;
            $passage -> date = date('Y-m-d');
            $passage -> save();

            $dataNaissRef = dateNaiss('12/07/1989');
            $countNaissRef = countNaiss('12/07/1989');

            //patient homme
            $user = User::create([
                "prenom" => "Louis",
                "name" => "Fonsi",
                "email" => "patienth@gmail.com",
                "password" => Hash::make('1234'),
            ]);

            Patient::create([
                'user_id' => $user->id,
                'secretaire_id' => $secretaire->id,
                'hospital_id' => $secretaire->hospital->id,
                'type_assurance_id' =>  null,
                "gender" => 'masculin',
                'code_patient' => "DM$dataNaissRef$countNaissRef$code",
                'birth_date' => '12/07/1989',
                'lieu_de_naissance_id' => 1,
                'ethnie' => 'Brazil',
                'country' => 'Côte d\'Ivoire',
                'residence_habituelle_id' => 1,
                'residence_actuelle_id' => 1,
                'telephone' => '0707267572',
                'nbre_enfant' => 1,
                'nom_personne_cas_urgence' => "Jean Marc",
                'telephone_personne_cas_urgence' => "0701622222",
                'lien_personne_cas_urgence' => "Marie",
                'status' => 1,
            ]);

            //passage hopital
            $passage  = new PassagePatient();
            $passage->libelle = 'Création de compte';
            $passage->hospital_id = 1;
            $passage->patient_id = 2;
            $passage->date = date('Y-m-d');
            $passage->save();


            //type assurance
            TypeAssurance::create([
                "libelle" => "CMU",
                "reduction" => "0.3",
                "hospital_id" => $hospital->id,
                "reference" => rand(0, 100000),
                "description" => "Couverture Maladie Universelle",
            ]);
            TypeAssurance::create([
                "libelle" => "Assurance Privée (AP)",
                "reduction" => "0.45",
                "reference" => rand(0, 100000),
                "hospital_id" => $hospital->id,
                "description" => "Assurance privée",
            ]);
            TypeAssurance::create([
                "libelle" => "CMU + Assurance Privée (AP)",
                "reduction" => "0.1",
                "reference" => rand(0, 100000),
                "hospital_id" => $hospital->id,
                "description" => "CMU+AP",
            ]);
        }
    }
}
