@extends('admin.layouts.main')

@section('head')
    <title>Dashboard</title>
@endsection

@section('toolbar')
<!--begin::Container-->
<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
    <!--begin::Page title-->
    <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
         <!--begin::Title-->
         <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Dashboard</h1>
         <!--end::Title-->
         <!--begin::Separator-->
         <span class="h-20px border-gray-300 border-start mx-4"></span>
         <!--end::Separator-->
         <!--begin::Breadcrumb-->
         <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
             <!--begin::Item-->
             <li class="breadcrumb-item text-muted">General</li>
             <!--end::Item-->
         </ul>
         <!--end::Breadcrumb-->
     </div>
     <!--end::Page title-->
 </div>
 <!--end::Container-->
@endsection

@section('content')
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
       <!--begin::Row-->
       <div class="row g-5 g-xl-8">
            <div class="col-xl-6">
                <!--begin::Statistics Widget 1-->
                <div class="card bgi-no-repeat card-xl-stretch mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body">
                        <a href="#" class="card-title fw-bolder text-muted text-hover-primary fs-4">Materias</a>
                        <div class="fw-bolder text-primary my-6">{{ $matters }}</div>
                        <p class="text-dark-75 fw-bold fs-5 m-0">Total de materias registradas en sistema</p>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Statistics Widget 1-->
            </div> 
            <div class="col-xl-6">
                <!--begin::Statistics Widget 1-->
                <div class="card bgi-no-repeat card-xl-stretch mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body">
                        <a href="#" class="card-title fw-bolder text-muted text-hover-primary fs-4">Estudiantes</a>
                        <div class="fw-bolder text-primary my-6">{{ $students }}</div>
                        <p class="text-dark-75 fw-bold fs-5 m-0">Total de estudiantes registrados en sistema</p>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Statistics Widget 1-->
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
@endsection