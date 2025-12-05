
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
<li class="treeview">
    <a href="#" class="{{ routeActive(['doctor.examen.today', 'doctor.examen.cours', 'doctor.examen.history']) }}">
        <i class="fa-solid {{ routeActive(['doctor.examen.today', 'doctor.examen.cours', 'doctor.examen.history']) }} fa-shield-alt">
            <span class="path1"></span><span class="path2"></span><span class="path3"></span>
        </i>
        <span>Examens</span>
        <span class="pull-right-container">
            <i class="fa-solid fa-angle-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li>
            <a href="{{ route('doctor.examen.today') }}" class="{{routeActive('doctor.examen.today')}}">
                <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>En cours
            </a>
        </li>

        <li>
            <a href="{{ route('doctor.examen.history') }}" class="{{routeActive('doctor.examen.history')}}">
                <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Historique
            </a>
        </li>
    </ul>
</li>


