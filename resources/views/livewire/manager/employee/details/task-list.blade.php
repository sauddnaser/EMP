<div>
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Details
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
                        <a href="{{route('admin.employee')}}" class="text-muted text-hover-primary">Employees</a>
                    </li>
                    <!--end::Item-->

                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar d-flex gap-3">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end gap-2" data-kt-user-table-toolbar="base">

                    @if($this->form->employeeTrainingRegistration->status_changed)
                        <!--begin::Add user-->
                        <button wire:click="assignProgramCompleted"
                                wire:confirm="Are you sure assign program completed?" type="button"
                                class="btn btn-primary btn-sm">
                            <i class="fa-solid fa-check"></i>
                            Assign program completed
                        </button>
                        <!--end::Add user-->

                        <!--begin::Add user-->
                        <button wire:click="assignProgramCanceled"
                                wire:confirm="Are you sure assign program canceled?" type="button"
                                class="btn btn-danger btn-sm">
                            <i class="fa-solid fa-cancel"></i>
                            Assign program canceled
                        </button>
                        <!--end::Add user-->
                    @endif



                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Card header-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            @if($this->form->employeeTrainingRegistration->status_changed)

                <form wire:submit="save">
                    @csrf
                    <!--begin::Card-->
                    <div class="card mb-7">
                        <!--begin::Card body-->
                        <div class="card-body">
                            <!--begin::Compact form-->
                            <div class="fv-row w-100 flex-md-root mb-5">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-semibold mb-2">Task Description</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div class="d-flex align-items-center">
                                    <textarea class="form-control form-control-solid-bg ps-10"
                                              wire:model="form.description"></textarea>
                                </div>
                                <!--end::Input-->
                                @error('form.description')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="fv-row w-100 flex-md-root mb-5">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-semibold mb-2">Status</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div class="d-flex align-items-center">
                                    <select class="form-select form-control-solid-bg ps-10" wire:model="form.status">
                                        <option label="choose status"></option>
                                        @foreach($this->Status as $key => $status)
                                            <option value="{{$status->value}}">{{$status->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!--end::Input-->
                                @error('form.due_date')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="fv-row w-100 flex-md-root mb-5">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-semibold mb-2">Due Date</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div class="d-flex align-items-center">
                                    <input type="date" class="form-control form-control-solid-bg ps-10"
                                           wire:model="form.due_date"/>
                                </div>
                                <!--end::Input-->
                                @error('form.due_date')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!--begin:Action-->
                            <div class="d-flex justify-content-start">
                                <button type="submit" class="btn btn-primary me-5">
                                    Save
                                </button>
                            </div>
                            <!--end:Action-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </form>
            @endif

            <!--begin::Row-->
            <div class="row g-5 g-xl-8">
                @foreach($this->form->employeeTrainingRegistration->tasks as $task)
                    <livewire:manager.employee.details.task-item :$task :key="$task->id"/>
                @endforeach
            </div>
            <!--end::Row-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
    @push('js')
        <script>
            Livewire.on('edit-task', (data) => {
                window.scrollTo({
                    top: 0,
                    left: 0,
                    behavior: 'smooth'
                });
            });
        </script>

    @endpush
</div>
