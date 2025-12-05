
<li class="treeview">
    
    <a href="#" class="{{ routeActive(['accountant.recette.today','accountant.recette.historique']) }}">
        <i class="fa-solid {{ routeActive(['accountant.recette.today','accountant.recette.historique']) }} fa-id-card">
            <span class="path1"></span><span class="path2"></span>
        </i>
        <span>Recette</span>
        <span class="pull-right-container">
            <i class="fa-solid fa-angle-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li>
            <a href="{{ route('accountant.recette.du_jour') }}" class="{{ routeActive('accountant.recette.du_jour') }}">
                <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Recette du jour
            </a>
        </li>
        <li>
            <a href="{{ route('accountant.recette.historique') }}" class="{{ routeActive('accountant.recette.historique') }}">
                <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Historique
            </a>
        </li>
    </ul>
</li>
<li class="treeview">
    
    <a href="#" class="{{ routeActive(['accountant.assurance.today','accountant.assurance.index']) }}">
        <i class="fa-solid {{ routeActive(['accountant.assurance.today','accountant.assurance.index']) }} fa-shield">
            <span class="path1"></span><span class="path2"></span>
        </i>
        <span>Assurance</span>
        <span class="pull-right-container">
            <i class="fa-solid fa-angle-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li>
            <a href="{{ route('accountant.assurance.today') }}" class="{{ routeActive('accountant.assurance.today') }}">
                <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Assurance du jour
            </a>
        </li>
        <li>
            <a href="{{ route('accountant.assurance.index') }}" class="{{ routeActive('accountant.assurance.index') }}">
                <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Historique
            </a>
        </li>
    </ul>
</li>

