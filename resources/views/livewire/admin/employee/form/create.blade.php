<div>
    <!--begin::Form-->
    <form wire:submit.prevent="save" class="form">
        @csrf
        <!--begin::Scroll-->
        <div class="scroll-y me-n7 pe-7" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
             data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header"
             data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
            <div class="d-flex flex-wrap gap-5 mb-5">
                <!--begin::Input group-->
                <div class="fv-row w-100 flex-md-root">
                    <!--begin::Label-->
                    <label class="required fs-6 fw-semibold mb-2">First Name</label>
                    <!--end::Label-->

                    <!--begin::Input-->
                    <input type="text" wire:model="form.first_name" class="form-control form-control-solid-bg"
                           required/>
                    <!--end::Input-->
                    @error('form.first_name')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="fv-row w-100 flex-md-root">
                    <!--begin::Label-->
                    <label class="required fs-6 fw-semibold mb-2">Last Name</label>
                    <!--end::Label-->

                    <!--begin::Input-->
                    <input type="text" wire:model="form.last_name" class="form-control form-control-solid-bg"
                           required/>
                    <!--end::Input-->
                    @error('form.last_name')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <!--end::Input group-->
            </div>
            <div class="d-flex flex-wrap gap-5 mb-5">
                <!--begin::Input group-->
                <div class="fv-row w-100 flex-md-root">
                    <!--begin::Label-->
                    <label class="required fs-6 fw-semibold mb-2">Department</label>
                    <!--end::Label-->

                    <!--begin::Input-->
                    <select wire:model.live="form.department_id" class="form-control form-control-solid-bg"
                            required>
                        <option label="choose"></option>
                        @foreach($this->Departments as $department)
                            <option value="{{$department->id}}">{{$department->name}}</option>
                        @endforeach
                    </select>
                    <!--end::Input-->
                    @error('form.department_id')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="fv-row w-100 flex-md-root">
                    <!--begin::Label-->
                    <label class="required fs-6 fw-semibold mb-2">
                        Manager
                        <span wire:loading wire:target="form.department_id">
                            <span class="spinner-border spinner-border-sm align-middle"></span>
                        </span>
                    </label>
                    <!--end::Label-->

                    <!--begin::Input-->
                    <select wire:model="form.manager_id" class="form-control form-control-solid-bg"
                            required>
                        <option label="choose"></option>
                        @foreach($this->Mangers as $manger)
                            <option value="{{$manger->id}}">{{$manger->manager_full_name}}</option>
                        @endforeach
                    </select>
                    <!--end::Input-->
                    @error('form.manager_id')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <!--end::Input group-->
            </div>
            <div class="d-flex flex-wrap gap-5 mb-5">
                <!--begin::Input group-->
                <div class="fv-row w-100 flex-md-root">
                    <!--begin::Label-->
                    <label class="required fs-6 fw-semibold mb-2">Birthday</label>
                    <!--end::Label-->

                    <!--begin::Input-->
                    <input type="date" wire:model="form.birthday" class="form-control form-control-solid-bg"
                           required/>
                    <!--end::Input-->
                    @error('form.birthday')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <!--end::Input group-->
            </div>
            <div class="d-flex flex-wrap gap-5 mb-5">
                <!--begin::Input group-->
                <div class="fv-row w-100 flex-md-root">
                    <!--begin::Label-->
                    <label class="required fs-6 fw-semibold mb-2">Email</label>
                    <!--end::Label-->

                    <!--begin::Input-->
                    <input type="email" wire:model="form.email" class="form-control form-control-solid-bg"
                           required/>
                    <!--end::Input-->
                    @error('form.email')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <!--end::Input group-->
            </div>
            <div class="d-flex flex-wrap gap-5 mb-5">
                <!--begin::Input group-->
                <div class="fv-row w-100 flex-md-root">
                    <!--begin::Label-->
                    <label class="required fs-6 fw-semibold mb-2">Phone</label>
                    <!--end::Label-->

                    <!--begin::Input-->
                    <input type="text" wire:model="form.phone" class="form-control form-control-solid-bg"
                           placeholder="+973" required/>
                    <!--end::Input-->
                    @error('form.phone')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <!--end::Input group-->
            </div>

            <div class="d-flex flex-wrap gap-5 mb-5">
                <!--begin::Input group-->
                <div class="fv-row w-100 flex-md-root">
                    <!--begin::Label-->
                    <label class="required fs-6 fw-semibold mb-2">Profile Picture
                        <span wire:loading wire:target="form.profile_image_path">
                            <span class="spinner-border spinner-border-sm align-middle"></span>
                        </span>
                    </label>
                    <!--end::Label-->

                    <!--begin::Input-->
                    <input type="file" wire:model.live="form.profile_image_path" class="form-control form-control-solid-bg"
                          required/>
                    <!--end::Input-->
                    @error('form.profile_image_path')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <!--end::Input group-->
            </div>

            <div class="d-flex flex-wrap gap-5 mb-5">
                <!--begin::Input group-->
                <div class="fv-row w-100 flex-md-root">
                    <!--begin::Label-->
                    <label class="required fs-6 fw-semibold mb-2">Password</label>
                    <!--end::Label-->
                    <div class="input-group mb-5">
                        <!--begin::Input-->
                        <input type="text" wire:model="form.password" class="form-control form-control-solid-bg"
                               required/>
                        <!--end::Input-->

                        <button class="btn btn-primary btn-sm">
                            <i class="fa-solid fa-refresh"></i>
                            generate
                        </button>
                    </div>
                    @error('form.password')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <!--end::Input group-->
            </div>
        </div>
        <!--begin::Modal footer-->
        <div class="modal-footer flex-center">
            <!--begin::Button-->
            <button wire:click="discard" type="button" class="btn btn-light me-3">

                <span wire:loading.remove wire:target="discard">Discard</span>
                <!--begin::Indicator progress-->
                <span wire:loading wire:target="discard">
                    <span class="spinner-border spinner-border-sm align-middle"></span>
                </span>
                <!--end::Indicator progress-->

            </button>
            <!--end::Button-->

            <!--begin::Button-->
            <button type="submit" class="btn btn-primary">
                <span wire:loading.remove wire:target="save">Save</span>
                <span wire:loading wire:target="save">Waiting...</span>
                <!--begin::Indicator progress-->
                <span wire:loading wire:target="save">
                    <span class="spinner-border spinner-border-sm align-middle"></span>
                </span>
                <!--end::Indicator progress-->
            </button>
            <!--end::Button-->
        </div>
        <!--end::Modal footer-->

    </form>
    <!--end::Form-->

</div>
