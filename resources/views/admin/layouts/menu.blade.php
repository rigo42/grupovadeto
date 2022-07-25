<div class="aside-menu flex-column-fluid">
    <!--begin::Aside Menu-->
    <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
        <!--begin::Menu-->
        <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">

            <div class="menu-item">
                <div class="menu-content pt-8 pb-2">
                    <span class="menu-section text-muted text-uppercase fs-8 ls-1">Dasboard</span>
                </div>
            </div>
            <div class="menu-item">
                <a class="menu-link {{ active('admin.dashboard*') }}" href="{{ route('admin.dashboard.general.index') }}">
                    <span class="menu-icon">
                        <i class="fa fa-columns"></i>
                    </span>
                    <span class="menu-title">Dashboard</span>
                </a>
            </div>
            <div class="menu-item">
                <a class="menu-link {{ active('admin.matter*') }}" href="{{ route('admin.matter.index') }}">
                    <span class="menu-icon">
                        <i class="fa fa-book"></i>
                    </span>
                    <span class="menu-title">Materias</span>
                </a>
            </div>
            <div class="menu-item">
                <a class="menu-link {{ active('admin.student*') }}" href="{{ route('admin.student.index') }}">
                    <span class="menu-icon">
                        <i class="fa fa-users"></i>
                    </span>
                    <span class="menu-title">Estudiantes</span>
                </a>
            </div>
            <div class="menu-item">
                <a class="menu-link {{ active('admin.qualification*') }}" href="{{ route('admin.qualification.index') }}">
                    <span class="menu-icon">
                        <i class="fas fa-bookmark"></i>
                    </span>
                    <span class="menu-title">Calificaiones</span>
                </a>
            </div>
        </div>
        <!--end::Menu-->
    </div>
    <!--end::Aside Menu-->
</div>