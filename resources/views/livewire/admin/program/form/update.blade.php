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
                    <label class="required fs-6 fw-semibold mb-2">Name</label>
                    <!--end::Label-->

                    <!--begin::Input-->
                    <input type="text" wire:model="form.name" class="form-control form-control-solid-bg"
                           required/>
                    <!--end::Input-->
                    @error('form.name')
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
                    <select wire:model="form.department_id" class="form-control form-control-solid-bg"
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
            </div>
            <div class="d-flex flex-wrap gap-5 mb-5">
                <!--begin::Input group-->
                <div class="fv-row w-100 flex-md-root">
                    <!--begin::Label-->
                    <label class="required fs-6 fw-semibold mb-2">start at</label>
                    <!--end::Label-->

                    <!--begin::Input-->
                    <input type="date" wire:model="form.start_date" class="form-control form-control-solid-bg"
                           required/>
                    <!--end::Input-->
                    @error('form.start_at')
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
                    <label class="required fs-6 fw-semibold mb-2">end at</label>
                    <!--end::Label-->

                    <!--begin::Input-->
                    <input type="date" wire:model="form.end_date" class="form-control form-control-solid-bg" required/>
                    <!--end::Input-->
                    @error('form.end_at')
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
                    <label class="required fs-6 fw-semibold mb-2">description</label>
                    <!--end::Label-->
                    <div class="input-group mb-5">
                        <!--begin::Input-->
                        <textarea type="text" wire:model="form.description" class="form-control form-control-solid-bg">
                        </textarea>
                        <!--end::Input-->
                    </div>
                    @error('form.description')
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
                <span wire:loading.remove>Save</span>
                <span wire:loading>Waiting...</span>
                <!--begin::Indicator progress-->
                <span wire:loading>
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
