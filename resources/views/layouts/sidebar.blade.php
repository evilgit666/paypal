<ul class="metismenu side-nav">

    <li class="side-nav-title side-nav-item">Navigation</li>

    <li class="side-nav-item">
        <a href="{{url('')}}" class="side-nav-link">
            <i class="dripicons-meter"></i>
            <span> Dashboards </span>
        </a>
    </li>

    <li class="side-nav-item">
        <a href="javascript: void(0);" class="side-nav-link">
            <i class="dripicons-view-apps"></i>
            <span> Tools </span>
            <span class="menu-arrow"></span>
        </a>
        <ul class="side-nav-second-level" aria-expanded="false">
            <li>
                <a href="{{url('listtransaction')}}">List Transaction</a>
            </li>
            <li>
                <a href="{{url('checktransaction')}}">Check Transaction</a>
            </li>
            <li>
                <a href="{{url('historyrefund')}}">History Refund</a>
            </li>
        </ul>
    </li>


    <li class="side-nav-item">
        <a href="javascript: void(0);" class="side-nav-link">
            <i class="dripicons-browser"></i>
            <span> Settings </span>
            <span class="menu-arrow"></span>
        </a>
        <ul class="side-nav-second-level" aria-expanded="false">
            <li>
                <a href="{{url('member')}}">Member</a>
            </li>
            <li>
                <a href="{{url('roles')}}">Roles</a>
            </li>
            <li>
                <a href="{{url('paypal_account')}}">Paypal Acount</a>
            </li>
        </ul>
    </li>


</ul>
