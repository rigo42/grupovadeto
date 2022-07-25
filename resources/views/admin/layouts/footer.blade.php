<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
    <!--begin::Container-->
    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
        <!--begin::Copyright-->
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted fw-bold me-1">{{ date('Y') }} ©</span>
            <a href="{{ route('admin.dashboard.general.index') }}" target="_blank" class="text-gray-800 text-hover-primary">{{ config('app.name') }}</a>
        </div>
        <!--end::Copyright-->
        <!--begin::Menu-->
        <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
            <li class="menu-item">
                <a target="_blank" href="https://www.grupovadeto.com/" class="menu-link px-2">Prueba tecnica: Grupo Vadeto</a>
            </li>
            <li class="menu-item">
                <a href="mailto:rigoberto.villa42@gmail.com" target="_blank" class="menu-link px-2">Contactame para retroalimentación</a>
            </li>
        </ul>
        <!--end::Menu-->
    </div>
    <!--end::Container-->
</div>