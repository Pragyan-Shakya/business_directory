@section('style')

@endsection
<div class="sidebar">
    <div class="bar-head">
        <div class="logo"> <a href="#" class="link">NoticeBank</a> <a href="#" class="link-mobile">NB</a> </div>
    </div>
    <div class="widget left-menu">
        <button type="button" class="navbar-toggle" id="navigation-toogle"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <ul class="nav-side">
            <li class="{{ Request::is('dashboard')?'active':'' }}"> <a href="{{ route('user.index') }}"><i class="nav-icon ion-android-color-palette"></i><span class="nav-label">Dashboard</span></a> </li>
            <li><a class="label">USER</a></li>
            <li class="{{ Request::is('dashboard/profile*')?'active':'' }}"> <a href="{{ route('user.profile.index') }}"><i class="nav-icon ion-person"></i><span class="nav-label">Profile</span></a> </li>
            @if($user->hasCompany())
                <li ><a class="label">COMPANY</a></li>
                <li class="{{ Request::is('dashboard/company*')?'active':'' }}"> <a href="{{ route('user.company.edit', Auth()->user()->id) }}"><i class="nav-icon ion-android-clipboard"></i><span class="nav-label">Company Profile</span></a> </li>
                <li class="{{ Request::is('dashboard/gallery*')?'active':'' }}"> <a href="{{ route('user.gallery.index') }}"><i class="nav-icon ion-plus"></i><span class="nav-label">Gallery</span></a> </li>
                <li> <a href="admin_5.php"><i class="nav-icon ion-android-star"></i><span class="nav-label">Reviews</span></a> </li>
                <li class="has_submenu"> <a href="#"><i class="nav-icon ion-flag"></i><span class="nav-label">Support</span></a>
                    <ul>
                        <li> <a href="#"><i class="nav-icon ion-person"></i><span class="nav-label">Sub Example 1</span></a> </li>
                        <li> <a href="#"><i class="nav-icon ion-person"></i><span class="nav-label">Sub Example 2</span></a> </li>
                    </ul>
                </li>
            @endif
            <li> <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="nav-icon ion-android-exit"></i><span class="nav-label">Log Out</span></a> </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </ul>
    </div>
    <div class="copyright" style="text-align: center;">
        NoticeBank&#169;{{ date('Y') }}.
        <br> Developed By <a href="//nextaussietech.com" target="_blank">Next Aussie Tech Pvt. Ltd</a>
    </div>
</div>