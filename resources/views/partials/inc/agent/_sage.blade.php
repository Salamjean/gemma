
<li class="treeview">
    <a href="#" class="{{ routeActive(['doctor.consultation.today', 'doctor.consultation.cours', 'doctor.consultation.history']) }}">
        <i class="fa-solid {{ routeActive(['doctor.consultation.today', 'doctor.consultation.cours', 'doctor.consultation.history']) }} fa-thermometer-half">
            <span class="path1"></span><span class="path2"></span><span class="path3"></span>
        </i>
        <span>Consultations</span>
        <span class="pull-right-container">
            <i class="fa-solid fa-angle-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li>
            <a href="{{ route('doctor.consultation.today') }}"  class="{{routeActive('doctor.consultation.today')}}">
                <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Nouvelles
            </a>
        </li>

        <li>
            <a href="{{ route('doctor.consultation.history') }}" class="{{routeActive('doctor.consultation.history')}}">
                <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Historique
            </a>
        </li>
    </ul>
</li>

<li>
    <a href="{{ route('doctor.suivie.suivie')}}" class="{{routeActive('doctor.suivie.suivie')}}">
        <i class="fa-solid fa-person-pregnant"></i>
        <span>Suivie mère enfant</span>
        <span class="pull-right-container">
            <i class="fa-solid fa-angle-right"></i>
        </span>
    </a>
</li>


