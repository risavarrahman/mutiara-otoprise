<!--  BEGIN NAVBAR  -->
<div class="header-container container-xxl">
    <header class="header navbar navbar-expand-sm expand-header">

        <a href="javascript:void(0);" class="sidebarCollapse">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-menu">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </a>

        <ul class="navbar-item flex-row ms-lg-auto ms-0">
            <li class="nav-item theme-toggle-item">
                <a href="javascript:void(0);" class="nav-link theme-toggle">
                </a>
            </li>

            <li class="nav-item dropdown user-profile-dropdown my-2 order-lg-0 order-1">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar-container text-uppercase fw-bold">
                        {{ Auth::user()->username }}
                    </div>
                </a>

                <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                    <div class="user-profile-section">
                        <div class="media mx-auto">
                            <div class="media-body text-uppercase">
                                <h5> {{ Auth::user()->username }}</h5>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown-item">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); 
																		document.getElementById('logout-form').submit();">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-log-out">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg> <span>Log Out</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>
                </div>

            </li>
        </ul>
    </header>
</div>
<!--  END NAVBAR  -->
