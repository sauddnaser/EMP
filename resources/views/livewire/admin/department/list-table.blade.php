<div>
    <!--begin::Card-->
    <div wire:init="fetch" class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <h3>Departments</h3>

            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar d-flex gap-3">

                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"/>
                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"/>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <input wire:model="search" type="text" class="form-control form-control-solid w-250px ps-14"
                               placeholder="search"/>
                    </div>
                    <!--end::Search-->

                </div>
                <!--end::Toolbar-->

            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body py-4">

            <div wire:loading.class="table-loading" wire:target="fetch" class="table-responsive">
                <div class="table-loading-message bg-danger text-white">
                    waiting...
                </div>

                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                    <!--begin::Table head-->
                    <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">
                            #
                        </th>
                        <th class="min-w-125px">Name</th>
                        <th class="min-w-125px">Created At</th>
                        <th class="text-end min-w-100px">Operation</th>
                    </tr>
                    <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="text-gray-600 fw-semibold">

                    @if($departments)

                        @forelse($departments as $key => $department)
                            <!--begin::Table row-->
                            <tr>
                                <td>
                                    {{$key+1}}
                                </td>
                                <!--begin::User=-->
                                <td>
                                   {{$department->name}}
                                </td>
                                <!--end::User=-->
                                <!--begin::Role=-->
                                <td>{{ $department->created_at }}</td>
                                <!--end::Role=-->
                                <!--begin::Action=-->
                                <td class="text-end">
                                    <button wire:click="showUpdateDepartmentModal({{$department->id}})" class="btn btn-primary btn-sm">
                                        <i class="fa-solid fa-edit"></i>
                                        Edit
                                    </button>
                                    <button  wire:click="deleteDepartment({{$department->id}})"
                                             wire:confirm="Are you sure you want to delete this department?" class="btn btn-danger btn-sm">
                                        <i class="fa-solid fa-trash"></i>
                                        Delete
                                    </button>
                                </td>
                                <!--end::Action=-->
                            </tr>
                            <!--end::Table row-->
                        @empty
                            <tr>
                                <td colspan="100%">

                                    <div class="d-flex flex-column flex-center">
                                        <img src="{{ asset('admin-assets/media/illustrations/sigma-1/5.png') }}"
                                             class="mw-350px">
                                        <div class="fs-3 fw-bolder text-dark mb-4">No data found.</div>
                                        <div class="fs-6"></div>
                                    </div>


                                </td>
                            </tr>
                        @endforelse

                    @endif

                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>

            @if($departments)
                {{ $departments->links() }}
            @endif

        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->

</div>
