<div wire:init="fetch">
    <!--begin::Form-->
    <form wire:submit="getProgramList">
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
                               wire:model.live.debounce.500ms="search"
                               placeholder="Search"/>
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
            <h3 class="fw-bold me-5 my-1">{{count($programs) ? $programs->total() : 0}} Items Found
                <span class="text-gray-400 fs-6">by Recent Updates ↓</span></h3>
        </div>
        <!--end::Title-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Tab Content-->
    <div class="tab-content">
        <!--begin::Card-->
        <div class="card card-flush">
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <div wire:loading.class="table-loading" class="row g-6 g-xl-9">
                    <div class="table-loading-message bg-danger text-white">
                        waiting...
                    </div>
                    <!--begin::Table container-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table id="kt_project_users_table"
                               class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold">
                            <thead class="fs-7 text-gray-400 text-uppercase">
                            <tr>
                                <th class="min-w-150px">name</th>
                                <th class="min-w-150px">status</th>
                                <th class="min-w-50px">tasks</th>
                                <th class="min-w-100px">start_at</th>
                                <th class="min-w-100px">end_at</th>
                                <th class="min-w-150px">Completion rate</th>
                                <th class="min-w-50px"></th>
                                <th class="min-w-50px text-end">Details</th>
                            </tr>
                            </thead>
                            <tbody class="fs-6">
                            @forelse($programs as $program)
                                <tr>
                                    <td>
                                        {{$program->training_program_name}}
                                    </td>
                                    <td>
                                        {{$program->status}}
                                    </td>
                                    <td>
                                        <span
                                            class="badge badge-light-primary fw-bold px-4 py-3">{{$program->total_tasks}}</span>
                                    </td>

                                    <td>{{$program->training_program_start_date}}</td>
                                    <td>{{$program->training_program_end_date}}</td>

                                    <td>
                                        <div class="progress" style="background: rgba(127, 99, 244, .1)">
                                            <div class="progress-bar  progress-animated bg-primary"
                                                 style="width: {{$program->completion_rate}}%"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-primary">{{$program->completion_rate}}%</span>
                                    </td>

                                    <td class="text-end">
                                        <a href="{{route('employee.programs.task', $program->id)}}"
                                           class="btn btn-primary btn-sm">
                                            <i class="fa-solid fa-eye"></i>
                                            View
                                        </a>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                            </tbody>
                        </table>
                        <!--end::Table-->
                        <div class="d-flex flex-stack flex-wrap pt-10">
                            @if(count($programs))
                                <div class="fs-6 fw-semibold text-gray-700">
                                    Showing {{ $programs->firstItem() }} to {{ $programs->lastItem() }}
                                    of {{ $programs->total() }} entries
                                </div>
                            @endif
                        </div>
                        <!--end::Pagination-->
                        @if(count($programs))
                            {{ $programs->links() }}
                        @endif
                    </div>
                    <!--end::Table container-->
                </div>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>

    <!--end::Tab Content-->
</div>
