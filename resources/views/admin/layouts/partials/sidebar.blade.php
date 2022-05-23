<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100" style="margin-top: 45px;">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>

                <li>
                    <a href="{{ route('admin.home') }}" class="waves-effect">
                        <i class="ti-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-email"></i>
                        <span>Pengajuan Surat</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.submissions.pending') }}">
                                <span class="badge badge-pill badge-primary float-right">{{ PendingSubmissions()->count() }}</span>
                                Menunggu Persetujuan </a></li>
                        <li><a href="{{ route('admin.submissions.approved') }}">
                            <span class="badge badge-pill badge-primary float-right">{{ ApprovedSubmissions()->count() }}</span>
                            Disetujui</a></li>
                        <li><a href="{{ route('admin.submissions.rejected') }}">
                            <span class="badge badge-pill badge-primary float-right">{{ RejectedSubmissions()->count() }}</span>
                            Ditolak</a></li>
                        <li class="{{CheckRole::STAFF() ?: 'd-none'}}"><a href="{{ route('admin.submissions.letter-out') }}">
                            <span class="badge badge-pill badge-primary float-right">{{ !empty($data) ?? $data->count() }}</span>
                            Surat Keluar</a></li>
                    </ul>
                </li>

                @if (CheckRole::ADMIN())
                <li class="menu-title">Master</li>
                
                    <li>
                        <a href="{{ route('admin.data.index') }}" class=" waves-effect">
                            <i class="ti-user"></i>
                            <span>User</span>
                        </a>
                    </li>
                <li class="#">
                    <a href="{{ route('admin.users.index') }}" class=" waves-effect">
                        <i class="ti-agenda"></i>
                        <span>PT/PN</span>
                        
                    </a>
                </li>
                <li #>
                    <a href="{{ route('admin.letters.index') }}" class=" waves-effect">
                        <i class="ti-receipt"></i>
                        <span>Daftar Surat</span>
                    </a>
                </li>
                <li #>
                    <a href="{{ route('admin.signatories.index') }}" class=" waves-effect">
                        <i class="ti-receipt"></i>
                        <span>Penandatangan</span>
                    </a>
                </li>
                @endif

                {{-- <li>
                    <a href="{{ route('admin.helpers') }}" class=" waves-effect">
                        <i class="ti-hand-point-right"></i>
                        <span>Helpers</span>
                    </a>
                </li> --}}
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
