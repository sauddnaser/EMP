<div>
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Welcome Back,
                </h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a class="text-muted text-hover-primary">Dashboard</a>
                    </li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->

    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Row-->
            <div class="row g-5 g-xl-8">

                <div class="col-xl-4">
                    <!--begin::Statistics Widget 5-->
                    <a class="card bg-primary hoverable card-xl-stretch mb-5 mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="text-white fw-bold fs-2 mb-2 mt-5">{{auth('employee')->user()->total_program}}</div>
                            <div class="fw-semibold text-white">
                                Total Programs
                                <span wire:loading="fetchData" class="spinner-border spinner-border-sm align-middle"></span>
                            </div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>

                <div class="col-xl-4">
                    <!--begin::Statistics Widget 5-->
                    <a class="card bg-success hoverable card-xl-stretch mb-5 mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="text-white fw-bold fs-2 mb-2 mt-5">{{auth('employee')->user()->total_program_completed}}</div>
                            <div class="fw-semibold text-white">
                                Completed Programs
                                <span wire:loading="fetchData"
                                      class="spinner-border spinner-border-sm align-middle"></span>

                            </div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>
                <div class="col-xl-4">
                    <!--begin::Statistics Widget 5-->
                    <a class="card bg-danger hoverable card-xl-stretch mb-5 mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="text-white fw-bold fs-2 mb-2 mt-5">{{auth('employee')->user()->total_program_canceled}}</div>
                            <div class="fw-semibold text-white">
                                Completed Canceled
                                <span wire:loading="fetchData"
                                      class="spinner-border spinner-border-sm align-middle"></span>

                            </div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>

            </div>
            <!--end::Row-->
        </div>
        <!--end::Content container-->
    </div>
</div>
