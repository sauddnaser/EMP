<div>
    <div>
        <!--begin::Form-->
        <form wire:submit.prevent="login" class="form w-100" novalidate="novalidate">
            <!--begin::Icon-->
            <div class="text-center mb-5">
                <img alt="Logo" class="mh-150px" src="{{asset('admin-assets/media/logos/ems-logo.png')}}" />
            </div>
            <!--end::Icon-->
            <!--begin::Heading-->
            <div class="text-center mb-11">
                <!--begin::Title-->
                <h1 class="text-white fw-bolder mb-3">Sign In</h1>
                <!--end::Title-->
                <!--begin::Subtitle-->
                <div class="text-gray-400 fw-semibold fs-6">Employee Management System - HR</div>
                <!--end::Subtitle=-->
            </div>
            <!--begin::Heading-->

            <!--begin::Input group=-->
            <div class="fv-row mb-8">
                <!--begin::Username-->
                <input wire:model.defer="email" type="text" placeholder="Username" name="username" autocomplete="off" class="form-control bg-transparent" />
                <!--end::Username-->
                @error('email')
                <div class="fv-plugins-message-container text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <!--end::Input group=-->
            <div class="fv-row mb-3">
                <!--begin::Password-->
                <input wire:model.defer="password" type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent" />
                <!--end::Password-->
                @error('password')
                <div class="fv-plugins-message-container text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <!--end::Input group=-->
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                <div></div>
            </div>
            <!--end::Wrapper-->
            <!--begin::Submit button-->
            <div class="d-grid mb-10">
                <button type="submit" class="btn btn-primary">
                    <!--begin::Indicator label-->
                    <span wire:loading.remove>Sign In</span>
                    <!--end::Indicator label-->
                    <!--begin::Indicator progress-->
                    <span wire:loading>
                    Please wait...
					<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                </span>
                    <!--end::Indicator progress-->
                </button>
            </div>
            <!--end::Submit button-->
        </form>
        <!--end::Form-->
    </div>

</div>
