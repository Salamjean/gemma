<li>
    <a href="{{ route("pharmacy.drug.index") }}" class="{{ routeActive('pharmacy.drug.index') }}">
        <i class="fa-solid fa-id-card">
            <span class="path1"></span><span class="path2"></span>
        </i>
        <span>Liste des medicaments</span>
    </a>
</li>
<li class="treeview">
    <a href="#"
        class="{{ routeActive(['pharmacy.payment.pending', 'pharmacy.payment.history']) }}">
        <i
            class="fa-solid {{ routeActive(['pharmacy.payment.pending', 'pharmacy.payment.history']) }} fa-thermometer-half">
            <span class="path1"></span><span class="path2"></span><span class="path3"></span>
        </i>
        <span>Paiements</span>
        <span class="pull-right-container">
            <i class="fa-solid fa-angle-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li>
            <a href="{{ route('pharmacy.payment.pending') }}"
                class="{{ routeActive('pharmacy.payment.pending') }}">
                <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Nouvelles
            </a>
        </li>

        <li>
            <a href="{{ route('pharmacy.payment.history') }}"
                class="{{ routeActive('pharmacy.payment.history') }}">
                <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Historique
            </a>
        </li>
    </ul>
</li>
