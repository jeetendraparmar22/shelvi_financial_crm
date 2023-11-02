<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-logo">
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('assets/img/logo.svg') }}" class="img-fluid logo" alt />
            </a>
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('assets/img/logo-small.svg') }}" class="img-fluid logo-small" alt />
            </a>
        </div>
    </div>
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"><span>Main</span></li>
                <li>
                    <a href="{{ route('dashboard') }}" class="active"><i class="fe fe-home"></i> <span> Dashboard</span>
                    </a>
                </li>
            </ul>
            <ul>
                <li class="menu-title"><span>Details</span></li>
                <li>
                    <a href="{{ route('user-form') }}"><i class="fe fe-file"></i> <span>Application Form</span></a>
                </li>
                <li>
                    <a href="{{ route('user-list') }}"><i class="fe fe-user"></i> <span>Customers-List</span></a>
                </li>

                <li>
                    <a href="{{ route('user-register') }}"><i class="fe fe-file-text"></i> <span>Register
                            User</span></a>
                </li>

            </ul>

        </div>
    </div>
</div>
