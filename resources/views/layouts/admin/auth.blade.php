<!DOCTYPE html>
<!--
BePro Team
www.ebepro.com
-->
<html lang="en">
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
    <link href="{{ asset('admin-assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    @livewireStyles

</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="app-blank app-blank">
<!--begin::Theme mode setup on page load-->
<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-theme-mode")) { themeMode = document.documentElement.getAttribute("data-theme-mode"); } else { if ( localStorage.getItem("data-theme") !== null ) { themeMode = localStorage.getItem("data-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-theme", themeMode); }</script>
<!--end::Theme mode setup on page load-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root" id="kt_app_root">
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Body-->
        <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
            <!--begin::Form-->
            <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                <!--begin::Wrapper-->
                <div class="w-lg-500px p-10">
                    {{ $slot }}
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Form-->
        </div>
        <!--end::Body-->
        <!--begin::Aside-->

    </div>
    <!--end::Authentication - Sign-in-->
</div>
<!--end::Root-->
<!--begin::Javascript-->



<script>var hostUrl = "admin-assets/";</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{ asset('admin-assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('admin-assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->

@livewireScripts

@stack('js')

<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
