<div wire:init="fetch">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Programs
                </h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{route('admin.dashboard')}}" class="text-muted text-hover-primary">Dashboard</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="" class="text-muted text-hover-primary">Programs</a>
                    </li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <div class="card-toolbar d-flex gap-3">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <!--begin::Add user-->
                    <button wire:click="showManagerAddEmployeeProgramModal" type="button" class="btn btn-primary btn-sm"
                            data-bs-toggle="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                      transform="rotate(-90 11.364 20.364)" fill="currentColor"/>
                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor"/>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        Add Employee
                    </button>
                    <!--end::Add user-->
                </div>
                <!--end::Toolbar-->
            </div>
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Form-->
            <form wire:submit="getEmployeeList">
                <!--begin::Card-->
                <div class="card mb-7">
                    <!--begin::Card body-->
                    <div class="card-body">
                        <!--begin::Compact form-->
                        <div class="d-flex align-items-center">
                            <!--begin::Input group-->
                            <div class="position-relative w-md-400px me-md-2">
                                <i class="ki-outline ki-magnifier fs-3 text-gray-500 position-absolute top-50 translate-middle ms-6"></i>
                                <input type="text" class="form-control form-control-solid ps-10"
                                       wire:model.live.debounce.500ms="search" placeholder="Search"/>
                            </div>
                            <!--end::Input group-->
                            <!--begin:Action-->
                            <div class="d-flex align-items-center">
                                <button type="submit" class="btn btn-primary me-5">Search</button>
                            </div>
                            <!--end:Action-->
                        </div>
                        <!--end::Compact form-->

                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </form>
            <!--end::Form-->
            <!--begin::Toolbar-->
            <div class="d-flex flex-wrap flex-stack pb-7">
                <!--begin::Title-->
                <div class="d-flex flex-wrap align-items-center my-1">
                    <h3 class="fw-bold me-5 my-1">{{count($employees) ? $employees->total() : 0}} Items Found
                        <span class="text-gray-400 fs-6">by Recent Updates ↓</span></h3>
                </div>
                <!--end::Title-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Tab Content-->
            <div class="tab-content">

                <div wire:loading.class="table-loading" class="row g-6 g-xl-9">
                    <div class="table-loading-message bg-danger text-white">
                        waiting...
                    </div>
                    <div class="row g-6 mb-6 g-xl-9 mb-xl-9">
                        @forelse($employees as $employee)
                            <!--begin::Col-->
                            <div class="col-md-6 col-xxl-4">
                                <!--begin::Card-->
                                <div class="card">
                                    <!--begin::Card body-->
                                    <div class="card-body d-flex flex-center flex-column py-9 px-5">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-65px symbol-circle mb-5">
                                            <img src="{{$employee->Employee->image_path}}" alt="image"/>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Name-->
                                        <a href="{{route('manager.employee.details', $employee->Employee->id)}}"
                                           class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">{{$employee->Employee->full_name}}</a>
                                        <!--end::Name-->
                                        <!--begin::Position-->
                                        <div
                                            class="fw-semibold text-gray-400 mb-6">{{$employee->Employee->department_name}}</div>
                                        <!--end::Position-->
                                        <!--begin::Info-->
                                        <div class="d-flex flex-center flex-wrap mb-5">
                                            <!--begin::Stats-->
                                            <div class="border border-dashed rounded min-w-90px py-3 px-4 mx-2 mb-3">
                                                <div
                                                    class="fs-6 fw-bold text-gray-700">{{$employee->Employee->total_program}}</div>
                                                <div class="fw-semibold text-gray-400">Programs</div>
                                            </div>
                                            <!--end::Stats-->

                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--begin::Card body-->
                                </div>
                                <!--begin::Card-->
                            </div>
                            <!--end::Col-->
                        @empty
                        @endforelse
                        <div class="d-flex flex-stack flex-wrap pt-10">
                            @if(count($employees))
                                <div class="fs-6 fw-semibold text-gray-700">
                                    Showing {{ $employees->firstItem() }} to {{ $employees->lastItem() }}
                                    of {{ $employees->total() }} entries
                                </div>
                            @endif
                        </div>
                        <!--end::Pagination-->
                        @if(count($employees))
                            {{ $employees->links() }}
                        @endif
                    </div>
                </div>

            </div>
            <!--end::Tab Content-->
        </div>
    </div>
</div>
