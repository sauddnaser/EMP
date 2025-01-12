<div wire:init="fetch">
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
                                    <img src="{{$employee->image_path}}" alt="image"/>
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Name-->
                                <a href="{{route('manager.employee.details', $employee->id)}}" class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">{{$employee->full_name}}</a>
                                <!--end::Name-->
                                <!--begin::Position-->
                                <div class="fw-semibold text-gray-400 mb-6">{{$employee->department_name}}</div>
                                <!--end::Position-->
                                <!--begin::Info-->
                                <div class="d-flex flex-center flex-wrap mb-5">
                                    <!--begin::Stats-->
                                    <div class="border border-dashed rounded min-w-90px py-3 px-4 mx-2 mb-3">
                                        <div class="fs-6 fw-bold text-gray-700">{{$employee->registrations_count}}</div>
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
