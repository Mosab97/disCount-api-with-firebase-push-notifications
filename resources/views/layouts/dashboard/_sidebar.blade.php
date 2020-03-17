<?php
/**
 * Created by PhpStorm.
 * User: Samir
 * Date: 24/01/2019
 * Time: 15:36
 */
?>

<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile">
            <!-- User profile image -->
            <div class="profile-img"><img src="/images/{{ admin()->user()->image_path }}" alt="user"/>
                <!-- this is blinking heartbit-->
                <div class="notify setpos"><span class="heartbit"></span> <span class="point"></span></div>
            </div>
            <!-- User profile text-->
            <div class="profile-text">
                <h5>{{admin()->user()->name}}</h5>


                <a href="{{route('dashboard.logout')}}" class="" data-toggle="tooltip" title="@lang('تسجيل خروج')"><i
                            class="mdi mdi-power"></i></a>
            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>



                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                            class="mdi mdi-account-circle"></i><span
                            class="hide-menu">@lang('المشرفين')</span></a>

                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('dashboard.admins.index') }}"><i
                                    class="mdi mdi-account-circle"></i> @lang('المشرفين') </a></li>
                        <li><a href="{{ route('dashboard.admins.create') }}"><i
                                    class="mdi mdi-plus-circle"></i> @lang('إضافة مشرفين') </a></li>
                    </ul>
                </li>




                <li>

                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                            class="mdi mdi-shopping"></i><span
                            class="hide-menu">@lang('المتاجر')</span></a>

                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('dashboard.markets.index') }}"><i
                                    class="mdi mdi-shopping"></i> @lang('المتاجر') </a></li>
                        <li><a href="{{ route('dashboard.markets.create') }}"><i
                                    class="mdi mdi-plus-circle"></i> @lang('إضافة متجر') </a></li>
                    </ul>

                </li>







                    <li>
                        <a class="has-arrow waves-effect waves-dark"  aria-expanded="false"><i
                                    class="mdi mdi-widgets"></i><span
                                    class="hide-menu">@lang('الأقسام')</span></a>

                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{ route('dashboard.categories.index') }}"><i
                                            class="mdi mdi-widgets"></i> @lang('الأقسام') </a></li>
                            <li><a href="{{ route('dashboard.categories.create') }}"><i
                                            class="mdi mdi-plus-circle"></i> @lang('إضافة قسم') </a></li>
                        </ul>
                    </li>



                <li>

                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                            class="mdi mdi-bullhorn"></i><span
                            class="hide-menu">@lang('الإشعارات')</span></a>

                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('dashboard.notifications.create') }}"><i
                                    class="mdi mdi-send"></i> @lang('إرسال إشعار') </a></li>
                    </ul>

                </li>




            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
