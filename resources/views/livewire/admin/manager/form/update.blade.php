<div>
    <form wire:submit.prevent="save" class="form">
        @csrf

        <div class="d-flex flex-wrap gap-5 mb-5">
            <!--begin::Input group-->
            <div class="fv-row w-100 flex-md-root">
                <!--begin::Label-->
                <label class="required fs-6 fw-semibold mb-2">First Name</label>
                <!--end::Label-->

                <!--begin::Input-->
                <input type="text" wire:model.live="form.first_name" class="form-control form-control-solid-bg"/>
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
                <input type="text" wire:model="form.last_name" class="form-control form-control-solid-bg"/>
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
                <select wire:model="form.department_id" class="form-control form-control-solid-bg">
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
        </div>
        <div class="d-flex flex-wrap gap-5 mb-5">
            <!--begin::Input group-->
            <div class="fv-row w-100 flex-md-root">
                <!--begin::Label-->
                <label class="required fs-6 fw-semibold mb-2">Email</label>
                <!--end::Label-->

                <!--begin::Input-->
                <input type="email" wire:model="form.email" class="form-control form-control-solid-bg"/>
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
                       placeholder="+973"/>
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
                <label class="required fs-6 fw-semibold mb-2">Profile Picture</label>
                <!--end::Label-->

                <!--begin::Input-->
                <input type="file" wire:model="form.profile_image_path" class="form-control form-control-solid-bg"
                       placeholder="+973"/>
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
                <label class="fs-6 fw-semibold mb-2">Rest Password</label>
                <!--end::Label-->

                <!--begin::Input-->
                <input type="text" wire:model="form.rest_password" class="form-control form-control-solid-bg"/>
                <!--end::Input-->
                @error('form.rest_password')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <!--end::Input group-->
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
                <span wire:loading.remove>Save</span>
                <span wire:loading>Waiting...</span>
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
</div>
