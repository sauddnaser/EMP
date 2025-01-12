<!DOCTYPE html>
<!--
BePro Team
www.ebepro.com
-->
<html @if (App::isLocale('ar')) direction="rtl" dir="rtl" style="direction: rtl" @else lang="en" @endif>
<!--begin::Head-->
<head>
    <base href=""/>
    <title>{{ env('APP_NAME', 'EMS') }}</title>
    <meta charset="utf-8"/>
    <meta name="description" content="Employee Management System"/>
    <meta name="keywords" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="{{ env('APP_NAME', '') }}"/>
    <meta property="og:url" content="{{ env('APP_URL', '') }}"/>
    <meta property="og:site_name" content="Employee Management System"/>
    <link rel="canonical" href="{{ env('APP_URL', '') }}"/>
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>
    <!--end::Fonts-->


    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('employee-assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('employee-assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <!--end::Global Stylesheets Bundle-->

    @stack('css')
    @livewireStyles

</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"
      data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
      data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
      data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
<!--begin::Theme mode setup on page load-->
<script>var defaultThemeMode = "light";
    var themeMode;
    if (document.documentElement) {
        if (document.documentElement.hasAttribute("data-theme-mode")) {
            themeMode = document.documentElement.getAttribute("data-theme-mode");
        } else {
            if (localStorage.getItem("data-theme") !== null) {
                themeMode = localStorage.getItem("data-theme");
            } else {
                themeMode = defaultThemeMode;
            }
        }
        if (themeMode === "system") {
            themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
        }
        document.documentElement.setAttribute("data-theme", themeMode);
    }</script>
<!--end::Theme mode setup on page load-->
<!--begin::App-->
<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <!--begin::Page-->
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">

        <!--begin::Header-->
        <livewire:layouts.employee.header/>
        <!--end::Header-->

        <!--begin::Wrapper-->
        <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
            <!--begin::Sidebar-->
            <livewire:layouts.employee.sidebar/>
            <!--end::Sidebar-->
            <!--begin::Main-->
            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                <!--begin::Content wrapper-->
                <div class="d-flex flex-column flex-column-fluid">
                    {{ $slot }}
                </div>
                <!--end::Content wrapper-->
                <!--begin::Footer-->
                <livewire:layouts.employee.footer/>
                <!--end::Footer-->
            </div>
            <!--end:::Main-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::App-->


<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
    <span class="svg-icon">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)"
                  fill="currentColor"/>
            <path
                d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                fill="currentColor"/>
        </svg>
    </span>
    <!--end::Svg Icon-->
</div>
<!--end::Scrolltop-->


<!--begin::Javascript-->

<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{ asset('employee-assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('employee-assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->

@livewireScripts

<script src="{{ asset('employee-assets/js/livewire/swal-alert.js') }}"></script>
<script src="{{ asset('employee-assets/js/livewire/modals.js') }}"></script>

@stack('js')

@include('modals.employee')

<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
