<div>
    @livewire('manager.employee.details.index',['employee' => $this->employee])
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
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
                                        <th class="min-w-250px">name</th>
                                        <th class="min-w-150px">Status</th>
                                        <th class="min-w-150px">Register Date</th>
                                        <th class="min-w-50px text-end">Details</th>
                                    </tr>
                                    </thead>
                                    <tbody class="fs-6">
                                    @forelse($this->employee->registrations as $program)
                                        <tr>
                                            <td>
                                                {{$program->training_program_name}}
                                            </td>
                                            <td>
                                                <span
                                                    class="badge badge-light-{{$program->status_color}} fw-bold px-4 py-3">{{$program->status}}</span>
                                            </td>
                                            <td>{{$program->registration_date}}</td>

                                            <td class="text-end">
                                                <a href="{{route('manager.employee.tasks', $program->id)}}"
                                                        class="btn btn-primary btn-sm">
                                                    <i class="fa-solid fa-edit"></i>
                                                    view
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                    </tbody>
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table container-->
                        </div>
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
        </div>
    </div>
</div>
