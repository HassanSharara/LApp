<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href=""> <img alt="image" src="{{asset('assets/img/logo.png')}}" class="header-logo" /> <span
                    class="logo-name"></span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
                <a href="{{Route('home')}}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>

            </li>

                                    <!-- <li class="dropdown">
                                        <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                                data-feather="briefcase"></i><span>الدول والمحافظات</span></a>
                                        <ul class="dropdown-menu">
                                            <li><a class="nav-link" href="{{Route('create_country')}}">انشاء دولة جديدة </a></li>
                                            <li><a class="nav-link" href="{{Route('Countries')}}">جميع الدول</a></li>

                                        </ul>
                                    </li> -->
                                   @can("categories")
                                   <li class="dropdown">
                                    <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                            data-feather="list"></i><span>التخصصات والاقسام</span></a>
                                    <ul class="dropdown-menu">
                                        <li><a class="nav-link" href="{{Route('create_category')}}">انشاء تخصص جديد </a></li>
                                        <li><a class="nav-link" href="{{Route('categories')}}">جميع التخصصات</a></li>

                                    </ul>
                                </li>
                                   @endcan

                                    @can("banners")
                                    <li class="dropdown">
                                        <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                                data-feather="maximize"></i><span> البانرات </span></a>
                                        <ul class="dropdown-menu">
                                            <li><a class="nav-link" href="{{Route('create_banner')}}">انشاء بانر جديد </a></li>
                                            <li><a class="nav-link" href="{{Route('banners')}}">جميع البانرات</a></li>

                                        </ul>
                                    </li>

                                    @endcan

                                   @can("notifications")
                                   <li class="dropdown">
                                    <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                            data-feather="bell"></i><span>الاشعارات </span></a>
                                    <ul class="dropdown-menu">
                                        <li><a class="nav-link" href="{{Route('create_notifications')}}">انشاء اشعار جديد </a></li>
                                        <li><a class="nav-link" href="{{Route('all_notifications')}}">جميع الاشعارات</a></li>

                                    </ul>
                                    </li>
                                   @endcan


                                    @can("roles")
                                    <li class="dropdown">
                                        <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                                data-feather="users"></i><span>الموظفين  </span></a>
                                        <ul class="dropdown-menu">
                                            <li><a class="nav-link" href="{{Route('all_employees')}}">جميع الموظفين</a></li>

                                        </ul>
                                    </li> 
                                    @endcan
                                    <!-- <li class="dropdown">
                <a href="{{Route('app_monitor')}}" class="nav-link"><i data-feather="monitor"></i><span>نظام مراقبة الاخطاء</span></a>

            </li> -->
         
            {{--                        <li class="dropdown">--}}
            {{--                            <a href="#" class="menu-toggle nav-link has-dropdown"><i--}}
            {{--                                    data-feather="briefcase"></i><span>الاقسام الفرعية للمتجر</span></a>--}}
            {{--                            <ul class="dropdown-menu">--}}
            {{--                                <li><a class="nav-link" href="">انشاء قسم فرعي جديد</a></li>--}}

            {{--                                <li><a class="nav-link" href="">جميع الاقسام الفرعية</a></li> </ul>--}}
            {{--                        </li>--}}

            {{--                        <li class="dropdown">--}}
            {{--                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>المنتجات</span></a>--}}
            {{--                            <ul class="dropdown-menu">--}}
            {{--                                <li><a class="nav-link" href="">اضف منتج جديد</a></li>--}}
            {{--                                <li><a class="nav-link" href="">المنتجات المباعة</a></li>--}}
            {{--                                <li><a class="nav-link" href="">المنتجات الغير مباعة</a></li>--}}
            {{--                            </ul>--}}
            {{--                        </li>--}}
            {{--                        <li class="dropdown">--}}
            {{--                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="user"></i><span>الزبائن</span></a>--}}
            {{--                            <ul class="dropdown-menu">--}}
            {{--                                <li><a class="nav-link" href="">جميع الزبائن</a></li>--}}
            {{--                                <li><a class="nav-link" href="">الزبائن المحظورة</a></li>--}}
            {{--                                <li><a class="nav-link" href="">الزبائن ذو المشتريات الاعلى</a></li>--}}
            {{--                            </ul>--}}
            {{--                        </li>--}}

            {{--                        <li class="dropdown">--}}
            {{--                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>الرسائل</span></a>--}}
            {{--                            <ul class="dropdown-menu">--}}
            {{--                                <li><a class="nav-link" href="">جميع الرسائل</a></li>--}}
            {{--                                <li><a class="nav-link" href="">الرسائل المقروئة</a></li>--}}
            {{--                                <li><a class="nav-link" href="">الرسائل الغير مقروئة</a></li>--}}
            {{--                            </ul>--}}
            {{--                        </li>--}}
            {{--                        <li class="dropdown">--}}
            {{--                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="sliders"></i><span>الاموال</span></a>--}}
            {{--                            <ul class="dropdown-menu">--}}
            {{--                                <li><a class="nav-link" href="">جميع الرسائل</a></li>--}}
            {{--                                <li><a class="nav-link" href="">الرسائل المقروئة</a></li>--}}
            {{--                                <li><a class="nav-link" href="">الرسائل الغير مقروئة</a></li>--}}
            {{--                            </ul>--}}
            {{--                        </li>--}}
            {{--                        <li class="dropdown">--}}
            {{--                            <a href="" class="nav-link"><i data-feather="settings"></i><span>اعدادات التطبيق</span></a>--}}
            {{--                        </li>--}}
            {{--                        <li class="menu-header">UI Elements</li>--}}
            {{--                        <li class="dropdown">--}}
            {{--                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Basic--}}
            {{--                  Components</span></a>--}}
            {{--                            <ul class="dropdown-menu">--}}
            {{--                                <li><a class="nav-link" href="alert.html">Alert</a></li>--}}
            {{--                                <li><a class="nav-link" href="badge.html">Badge</a></li>--}}
            {{--                                <li><a class="nav-link" href="breadcrumb.html">Breadcrumb</a></li>--}}
            {{--                                <li><a class="nav-link" href="buttons.html">Buttons</a></li>--}}
            {{--                                <li><a class="nav-link" href="collapse.html">Collapse</a></li>--}}
            {{--                                <li><a class="nav-link" href="dropdown.html">Dropdown</a></li>--}}
            {{--                                <li><a class="nav-link" href="checkbox-and-radio.html">Checkbox &amp; Radios</a></li>--}}
            {{--                                <li><a class="nav-link" href="list-group.html">List Group</a></li>--}}
            {{--                                <li><a class="nav-link" href="media-object.html">Media Object</a></li>--}}
            {{--                                <li><a class="nav-link" href="navbar.html">Navbar</a></li>--}}
            {{--                                <li><a class="nav-link" href="pagination.html">Pagination</a></li>--}}
            {{--                                <li><a class="nav-link" href="popover.html">Popover</a></li>--}}
            {{--                                <li><a class="nav-link" href="progress.html">Progress</a></li>--}}
            {{--                                <li><a class="nav-link" href="tooltip.html">Tooltip</a></li>--}}
            {{--                                <li><a class="nav-link" href="flags.html">Flag</a></li>--}}
            {{--                                <li><a class="nav-link" href="typography.html">Typography</a></li>--}}
            {{--                            </ul>--}}
            {{--                        </li>--}}
            {{--                        <li class="dropdown">--}}
            {{--                            <a href="#" class="menu-toggle nav-link has-dropdown"><i--}}
            {{--                                    data-feather="shopping-bag"></i><span>Advanced</span></a>--}}
            {{--                            <ul class="dropdown-menu">--}}
            {{--                                <li><a class="nav-link" href="avatar.html">Avatar</a></li>--}}
            {{--                                <li><a class="nav-link" href="card.html">Card</a></li>--}}
            {{--                                <li><a class="nav-link" href="modal.html">Modal</a></li>--}}
            {{--                                <li><a class="nav-link" href="sweet-alert.html">Sweet Alert</a></li>--}}
            {{--                                <li><a class="nav-link" href="toastr.html">Toastr</a></li>--}}
            {{--                                <li><a class="nav-link" href="empty-state.html">Empty State</a></li>--}}
            {{--                                <li><a class="nav-link" href="multiple-upload.html">Multiple Upload</a></li>--}}
            {{--                                <li><a class="nav-link" href="pricing.html">Pricing</a></li>--}}
            {{--                                <li><a class="nav-link" href="tabs.html">Tab</a></li>--}}
            {{--                            </ul>--}}
            {{--                        </li>--}}
            {{--                        <li><a class="nav-link" href="blank.html"><i data-feather="file"></i><span>Blank Page</span></a></li>--}}
            {{--                        <li class="menu-header"></li>--}}
            {{--                        <li class="dropdown">--}}
            {{--                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="layout"></i><span>Forms</span></a>--}}
            {{--                            <ul class="dropdown-menu">--}}
            {{--                                <li><a class="nav-link" href="basic-form.html">Basic Form</a></li>--}}
            {{--                                <li><a class="nav-link" href="forms-advanced-form.html">Advanced Form</a></li>--}}
            {{--                                <li><a class="nav-link" href="forms-editor.html">Editor</a></li>--}}
            {{--                                <li><a class="nav-link" href="forms-validation.html">Validation</a></li>--}}
            {{--                                <li><a class="nav-link" href="form-wizard.html">Form Wizard</a></li>--}}
            {{--                            </ul>--}}
            {{--                        </li>--}}
            {{--                        <li class="dropdown">--}}
            {{--                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="grid"></i><span>Tables</span></a>--}}
            {{--                            <ul class="dropdown-menu">--}}
            {{--                                <li><a class="nav-link" href="basic-table.html">Basic Tables</a></li>--}}
            {{--                                <li><a class="nav-link" href="advance-table.html">Advanced Table</a></li>--}}
            {{--                                <li><a class="nav-link" href="datatables.html">Datatable</a></li>--}}
            {{--                                <li><a class="nav-link" href="export-table.html">Export Table</a></li>--}}
            {{--                                <li><a class="nav-link" href="editable-table.html">Editable Table</a></li>--}}
            {{--                            </ul>--}}
            {{--                        </li>--}}
            {{--                        <li class="dropdown">--}}
            {{--                            <a href="#" class="menu-toggle nav-link has-dropdown"><i--}}
            {{--                                    data-feather="pie-chart"></i><span>Charts</span></a>--}}
            {{--                            <ul class="dropdown-menu">--}}
            {{--                                <li><a class="nav-link" href="chart-amchart.html">amChart</a></li>--}}
            {{--                                <li><a class="nav-link" href="chart-apexchart.html">apexchart</a></li>--}}
            {{--                                <li><a class="nav-link" href="chart-echart.html">eChart</a></li>--}}
            {{--                                <li><a class="nav-link" href="chart-chartjs.html">Chartjs</a></li>--}}
            {{--                                <li><a class="nav-link" href="chart-sparkline.html">Sparkline</a></li>--}}
            {{--                                <li><a class="nav-link" href="chart-morris.html">Morris</a></li>--}}
            {{--                            </ul>--}}
            {{--                        </li>--}}
            {{--                        <li class="dropdown">--}}
            {{--                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="feather"></i><span>Icons</span></a>--}}
            {{--                            <ul class="dropdown-menu">--}}
            {{--                                <li><a class="nav-link" href="icon-font-awesome.html">Font Awesome</a></li>--}}
            {{--                                <li><a class="nav-link" href="icon-material.html">Material Design</a></li>--}}
            {{--                                <li><a class="nav-link" href="icon-ionicons.html">Ion Icons</a></li>--}}
            {{--                                <li><a class="nav-link" href="icon-feather.html">Feather Icons</a></li>--}}
            {{--                                <li><a class="nav-link" href="icon-weather-icon.html">Weather Icon</a></li>--}}
            {{--                            </ul>--}}
            {{--                        </li>--}}
            {{--                        <li class="menu-header">Media</li>--}}
            {{--                        <li class="dropdown">--}}
            {{--                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="image"></i><span>Gallery</span></a>--}}
            {{--                            <ul class="dropdown-menu">--}}
            {{--                                <li><a class="nav-link" href="light-gallery.html">Light Gallery</a></li>--}}
            {{--                                <li><a href="gallery1.html">Gallery 2</a></li>--}}
            {{--                            </ul>--}}
            {{--                        </li>--}}
            {{--                        <li class="dropdown">--}}
            {{--                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="flag"></i><span>Sliders</span></a>--}}
            {{--                            <ul class="dropdown-menu">--}}
            {{--                                <li><a href="carousel.html">Bootstrap Carousel.html</a></li>--}}
            {{--                                <li><a class="nav-link" href="owl-carousel.html">Owl Carousel</a></li>--}}
            {{--                            </ul>--}}
            {{--                        </li>--}}
            {{--                        <li><a class="nav-link" href="timeline.html"><i data-feather="sliders"></i><span>Timeline</span></a></li>--}}
            {{--                        <li class="menu-header">Maps</li>--}}
            {{--                        <li class="dropdown">--}}
            {{--                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="map"></i><span>Google--}}
            {{--                  Maps</span></a>--}}
            {{--                            <ul class="dropdown-menu">--}}
            {{--                                <li><a href="gmaps-advanced-route.html">Advanced Route</a></li>--}}
            {{--                                <li><a href="gmaps-draggable-marker.html">Draggable Marker</a></li>--}}
            {{--                                <li><a href="gmaps-geocoding.html">Geocoding</a></li>--}}
            {{--                                <li><a href="gmaps-geolocation.html">Geolocation</a></li>--}}
            {{--                                <li><a href="gmaps-marker.html">Marker</a></li>--}}
            {{--                                <li><a href="gmaps-multiple-marker.html">Multiple Marker</a></li>--}}
            {{--                                <li><a href="gmaps-route.html">Route</a></li>--}}
            {{--                                <li><a href="gmaps-simple.html">Simple</a></li>--}}
            {{--                            </ul>--}}
            {{--                        </li>--}}
            {{--                        <li><a class="nav-link" href="vector-map.html"><i data-feather="map-pin"></i><span>Vector--}}
            {{--                  Map</span></a></li>--}}
            {{--                        <li class="menu-header">Pages</li>--}}
            {{--                        <li class="dropdown">--}}
            {{--                            <a href="#" class="menu-toggle nav-link has-dropdown"><i--}}
            {{--                                    data-feather="user-check"></i><span>Auth</span></a>--}}
            {{--                            <ul class="dropdown-menu">--}}
            {{--                                <li><a href="auth-login.html">Login</a></li>--}}
            {{--                                <li><a href="auth-register.html">Register</a></li>--}}
            {{--                                <li><a href="auth-forgot-password.html">Forgot Password</a></li>--}}
            {{--                                <li><a href="auth-reset-password.html">Reset Password</a></li>--}}
            {{--                                <li><a href="subscribe.html">Subscribe</a></li>--}}
            {{--                            </ul>--}}
            {{--                        </li>--}}
            {{--                        <li class="dropdown">--}}
            {{--                            <a href="#" class="menu-toggle nav-link has-dropdown"><i--}}
            {{--                                    data-feather="alert-triangle"></i><span>Errors</span></a>--}}
            {{--                            <ul class="dropdown-menu">--}}
            {{--                                <li><a class="nav-link" href="errors-503.html">503</a></li>--}}
            {{--                                <li><a class="nav-link" href="errors-403.html">403</a></li>--}}
            {{--                                <li><a class="nav-link" href="errors-404.html">404</a></li>--}}
            {{--                                <li><a class="nav-link" href="errors-500.html">500</a></li>--}}
            {{--                            </ul>--}}
            {{--                        </li>--}}
            {{--                        <li class="dropdown">--}}
            {{--                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="anchor"></i><span>Other--}}
            {{--                  Pages</span></a>--}}
            {{--                            <ul class="dropdown-menu">--}}
            {{--                                <li><a class="nav-link" href="create-post.html">Create Post</a></li>--}}
            {{--                                <li><a class="nav-link" href="posts.html">Posts</a></li>--}}
            {{--                                <li><a class="nav-link" href="profile.html">Profile</a></li>--}}
            {{--                                <li><a class="nav-link" href="contact.html">Contact</a></li>--}}
            {{--                                <li><a class="nav-link" href="invoice.html">Invoice</a></li>--}}
            {{--                            </ul>--}}
            {{--                        </li>--}}

        </ul>
    </aside>
</div>
