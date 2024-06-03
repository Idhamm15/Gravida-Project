<!-- Sidebar -->
<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{url ('user.png')}}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ Auth::user()->fullname }}
                            <span class="user-level">{{ Auth::user()->role }}</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <ul class="nav nav-primary">

                @if(Auth::user()->role === 'ADMIN' || Auth::user()->role === 'SUPER ADMIN')
                <li class="nav-item">
                    <a data-toggle="collapse" href="#sidebarLayouts">
                        <i class="fas fa-th-list"></i>
                        <p>Artikel</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="sidebarLayouts">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="/admin/artikel/kelola-artikel">
                                    <span class="sub-item">Kelola Artikel</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>  
                @endif

                <li class="mx-4 mt-2">
                    <a href="#" class="btn btn-primary btn-block" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); 
                        document.getElementById('logout-form').submit();">
                    <span class="btn-label mr-2"> 
                        <i class="fa fa-sign-out">
                    </i> 
                    </span>
                    Logout
                    </a> 
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none; ">
                    @csrf
                </form>	
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->