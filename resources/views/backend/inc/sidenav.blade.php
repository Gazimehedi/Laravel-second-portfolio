<div class="sidebar-scrollbar">

    <!-- sidebar menu -->
    <ul class="nav sidebar-inner" id="sidebar-menu">
        <li class="has-sub active expand">
            <a class="sidenav-item-link" href="javascript:void(0)">
                <i class="mdi mdi-view-dashboard-outline"></i>
                <span class="nav-text">Dashboard</span>
            </a>
        </li>
        <li class="has-sub expend">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                data-target="#dashboard" aria-expanded="false" aria-controls="dashboard">
                <i class="mdi mdi-home-outline"></i>
                <span class="nav-text">Home</span> <b class="caret"></b>
            </a>
            <ul class="collapse show" id="dashboard" data-parent="#sidebar-menu">
                <div class="sub-menu">
                    <li class="">
                        <a class="sidenav-item-link" href="{{route('admin.slider')}}">
                            <span class="nav-text">Home Slider</span>

                        </a>
                    </li>
                    <li class="">
                        <a class="sidenav-item-link" href="{{route('admin.about')}}">
                            <span class="nav-text">Home About</span>

                        </a>
                    </li>
                    <li class="">
                        <a class="sidenav-item-link" href="{{route('admin.service')}}">
                            <span class="nav-text">Home Services</span>

                        </a>
                    </li>
                    <li class="">
                        <a class="sidenav-item-link" href="{{route('admin.portfolio')}}">
                            <span class="nav-text">Home Portfolio</span>

                        </a>
                    </li>
                    <li class="active">
                        <a class="sidenav-item-link" href="{{route('admin.brand')}}">
                            <span class="nav-text">Home Brand</span>

                        </a>
                    </li>
                </div>
            </ul>
        </li>
        <li class="has-sub">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                data-target="#ui-elements" aria-expanded="false" aria-controls="ui-elements">
                <i class="mdi mdi-folder-multiple-outline"></i>
                <span class="nav-text">Contact</span> <b class="caret"></b>
            </a>
            <ul class="collapse" id="ui-elements" data-parent="#sidebar-menu">
                <div class="sub-menu">
                    <li>
                        <a class="sidenav-item-link" href="{{route('admin.contact.profile')}}">
                            <span class="nav-text">Contact Profile</span>

                        </a>
                    </li>
                    <li>
                        <a class="sidenav-item-link" href="{{route('admin.contact.message')}}">
                            <span class="nav-text">Contact Message</span>

                        </a>
                    </li>
                </div>
            </ul>
        </li>
    </ul>

</div>
