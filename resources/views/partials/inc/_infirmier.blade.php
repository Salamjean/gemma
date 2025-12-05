@if (\Illuminate\Support\Facades\Auth::user()->infirmier->serviceHospital->service->id == 4)

<li class="treeview">

    <a href="#"
        class="{{ routeActive(['infirmier.care.new', 'infirmier.care.cours', 'infirmier.care.history']) }}">
        <i
            class="fa-solid {{ routeActive(['infirmier.care.new', 'infirmier.care.cours', 'infirmier.care.history']) }} fa-thermometer-half">
            <span class="path1"></span><span class="path2"></span><span class="path3"></span>
        </i>
        <span>Soins infirmier</span>
        <span class="pull-right-container">
            <i class="fa-solid fa-angle-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li>
            <a href="{{ route('infirmier.care.new') }}" class="{{ routeActive('infirmier.care.new') }}">
                <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Nouvelles
            </a>
        </li>

        <li>
            <a href="{{ route('infirmier.care.history') }}"
                class="{{ routeActive('infirmier.care.history') }}">
                <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Historique
            </a>
        </li>
    </ul>
</li>

@else
<li class="treeview">

    <a href="#"
        class="{{ routeActive(['infirmier.consultation.today', 'infirmier.consultation.cours', 'infirmier.consultation.history']) }}">
        <i
            class="fa-solid {{ routeActive(['infirmier.consultation.today', 'infirmier.consultation.cours', 'infirmier.consultation.history']) }} fa-thermometer-half">
            <span class="path1"></span><span class="path2"></span><span class="path3"></span>
        </i>
        <span>Consultations</span>
        <span class="pull-right-container">
            <i class="fa-solid fa-angle-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li>
            <a href="{{ route('infirmier.consultation.today') }}" class="{{ routeActive('infirmier.consultation.today') }}">
                <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Nouvelles
            </a>
        </li>

        <li>
            <a href="{{ route('infirmier.consultation.history') }}"
                class="{{ routeActive('infirmier.consultation.history') }}">
                <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Historique
            </a>
        </li>
    </ul>
</li>

@endif
