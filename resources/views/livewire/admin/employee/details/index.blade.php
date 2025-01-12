<div>
    @livewire('admin.employee.details.toolbar')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            @persist('overview')
            @livewire('admin.employee.details.overview',['employee' => $this->employee])
            @endpersist()

        </div>
    </div>

</div>
