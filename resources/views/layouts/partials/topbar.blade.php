<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <div class="navbar-brand-box">
                <a href="index" class="logo logo-dark">
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/letter/badilum-new.png') }}" alt="" style="width: 90%;margin-top: 70px;">
                    </span>
                </a>

                <a href="index" class="logo logo-light">
                    <span class="logo-lg">
                        <img style="width: 90%;margin-top: 40px;" src="{{ asset('assets/images/letter/badilum-new.png') }}" alt="">
                    </span>
                </a>
            </div>
            <button type="button" style="margin-top: 70px;" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>
        </div>

        <div class="d-flex">


            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ asset(auth()->user()->photo) }}"
                        alt="{{ asset(auth()->user()->name) }}">
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a class="dropdown-item d-block" href="{{ route('account.password') }}"><i
                            class="mdi mdi-shield-lock-outline font-size-17 align-middle mr-1"></i> Ganti Password</a>
                    <a class="dropdown-item" href="{{ route('account.logs') }}"><i
                            class="mdi mdi-folder-text-outline font-size-17 align-middle mr-1"></i> Log Activity</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="javascript:void();"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-logout font-size-17 align-middle mr-1 text-danger"></i>
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="mdi mdi-settings-outline"></i>
                </button>
            </div>

        </div>
    </div>
</header>