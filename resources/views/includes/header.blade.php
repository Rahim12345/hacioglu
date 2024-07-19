<!-- Page header starts -->
<div class="page-header mb-3">
    <div class="toggle-sidebar" id="toggle-sidebar">
        <i class="bi bi-list"></i>
    </div>
    @if(auth()->user()->role_id == 3)
        <a href="{{ '/admin/sale?receipt_no='.time() }}" class="btn btn-primary">Yeni
            satış</a>
    @endif

    <!-- Header actions ccontainer start -->
    <div class="header-actions-container">

        <!-- Search container start -->
        <div class="search-container me-4 d-xl-block d-lg-none"></div>

        <!-- Header profile start -->
        <div class="header-profile d-flex align-items-center">
            <div class="dropdown">
                <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                    <span
                        class="user-name d-none d-md-block"
                        id="fullNameHeader">{{ auth()->user()->name . ' '. auth()->user()->last_name }}</span>
                    <span class="avatar">
                        <img
                            src="{{ auth()->user()->avatar ? asset('files/avatars/'.auth()->user()->avatar) : asset('back/assets/images/profile.jpg') }}"
                            id="headerAvatar" alt=""/>
                        <span class="status online"></span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userSettings">
                    <div class="header-profile-actions">
                        <a href="{{ route('account.settings') }}">Hesab ayarları</a>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">Hesabdan
                            çıx</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header profile end -->

    </div>
    <!-- Header actions ccontainer end -->

</div>
<!-- Page header ends -->
