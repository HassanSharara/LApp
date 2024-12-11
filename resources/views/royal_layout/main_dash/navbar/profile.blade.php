<li class="dropdown"><a href="#" data-toggle="dropdown"
                        class="nav-link dropdown-toggle nav-link-lg nav-link-user">


        <img alt="image" src="{{asset('assets/img/users/user-1.png')}}"<?php
        $user=\Illuminate\Support\Facades\Auth::user();?>"
             class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
    <div class="dropdown-menu dropdown-menu-right pullDown">


        <div class="dropdown-title">مرحبا <?php echo e(\Illuminate\Support\Facades\Auth::user()->name); ?></div>
                <div class="dropdown-divider"></div>
                <a class="" href="{{Route('edit_profile')}}"
               ><i class="fas fa-sign-out-alt"></i>
                     تعديل ملفك الشخصي
                </a>


        <div class="dropdown-divider"></div>

        <a class="dropdown-item has-icon text-danger" href=""
           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>
            تسجيل خروج
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>



    </div>
</li>
