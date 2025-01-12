<div>
    @livewire('admin.employee.details.toolbar')

    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            @persist('overview')
            @livewire('admin.employee.details.overview',['employee' => $this->form->employee])
            @endpersist()

            <!--begin::Toolbar-->
            <div class="d-flex flex-wrap flex-stack mb-6">
                <!--begin::Heading-->
                <h3 class="fw-bold my-2">My Projects
                    <span class="fs-6 text-gray-400 fw-semibold ms-1">Active</span></h3>
                <!--end::Heading-->
                <!--begin::Actions-->
                <div class="d-flex flex-wrap my-2">
                    <div class="me-4">
                        <!--begin::Select-->
                        <select wire:model.live="status" class="form-select form-select-sm bg-body border-body w-125px">
                            <option label="choose"></option>
                            @foreach($this->Status as $key => $status)
                                <option value="{{$key}}">{{$status}}</option>
                            @endforeach
                        </select>
                        <!--end::Select-->
                    </div>
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar-->

            <!--begin::Row-->
            <div wire:loading.class="table-loading" class="row g-6 g-xl-9">
                <div class="table-loading-message bg-danger text-white">
                    waiting...
                </div>
                @forelse($this->Programs as $program)
                    <!--begin::Col-->
                    <div class="col-md-6 col-xl-4">
                        <!--begin::Card-->
                        <div class="card border-hover-primary">
                            <!--begin::Card header-->
                            <div class="card-header border-0 pt-9">

                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <span
                                        class="badge badge-light-{{$program->status_color}} fw-bold me-auto px-4 py-3">{{$program->status_name}}</span>
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end:: Card header-->
                            <!--begin:: Card body-->
                            <div class="card-body p-9">
                                <!--begin::Name-->
                                <div class="fs-3 fw-bold text-dark">{{$program->TrainingProgram->name}}</div>
                                <!--end::Name-->
                                <!--begin::Description-->
                                <p class="text-gray-400 fw-semibold fs-5 mt-1 mb-7">{{$program->TrainingProgram->description}}</p>
                                <!--end::Description-->
                                <!--begin::Info-->
                                <div class="d-flex flex-wrap mb-5">
                                    <!--begin::Due-->
                                    <div
                                        class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                                        <div class="fs-6 text-gray-800 fw-bold">{{$program->registration_date}}</div>
                                        <div class="fw-semibold text-gray-400">Start Date</div>
                                    </div>
                                    <!--end::Due-->

                                </div>
                                <!--end::Info-->
                                <!--begin::Progress-->
                                <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip"
                                     title="This project 50% completed">
                                    <div class="bg-primary rounded h-4px" role="progressbar" style="width: 50%"
                                         aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <!--end::Progress-->
                                <!--begin::Users-->
                                <div class="symbol-group symbol-hover">
                                    @forelse($program->TrainingProgram->registrations as $register)
                                        <!--begin::User-->
                                        <a href="{{route('admin.employee.details', $register->employee->id)}}"
                                           class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                           title="{{$register->employee->full_name}}">
                                            <img alt="Pic" src="{{$register->employee->image_path}}"/>
                                        </a>
                                        <!--begin::User-->
                                    @empty
                                    @endforelse

                                </div>
                                <!--end::Users-->
                            </div>
                            <!--end:: Card body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Col-->
                @empty
                @endforelse
            </div>
            <!--end::Row-->
        </div>
    </div>
</div>
