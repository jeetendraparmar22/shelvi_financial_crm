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
    <div class="sidebar-inner slimscroll" style="background: rgb(40, 36, 61);">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"><span>Menu</span></li>
                <li>
                    <a href="{{ route('dashboard') }}" class="active"><i class="fe fe-home"></i> <span> Dashboard</span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('customers.create') }}"><i class="fe fe-file"></i> <span>Application
                            Form</span></a>
                </li>
                <li>
                    <a href="{{ route('customers.index') }}"><i class="fe fe-file-text"></i> <span> Loan
                            Application-List</span></a>
                </li>

                @if (auth()->user()->user_type == 'admin')
                    <li>
                        <a href="{{ route('users.index') }}"><i class="fe fe-user"></i> <span> User
                                List</span></a>
                    </li>
                @endif

                <li>
                    <a href="{{ url('dealer-case') }}"><i class="fe fe-user"></i> <span> PDD List</span></a>
                </li>

                <li>
                    <a href="{{ url('payload') }}"><i class="fe fe-file"></i> <span>Payment</span></a>
                </li>
            </ul>

        </div>
    </div>
</div>
