<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title> {{ config('app.name', 'SASTL') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="StigmaCode" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        @include('layouts.includes.components.styles')
    </head>
    <body class="loading" data-layout-mode="detached" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": true}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>
        <div id="wrapper">
        @include('layouts.includes.topbar')
        @include('layouts.includes.left_sidebar')
            <div class="content-page">
                <div class="content">
                @yield('content')
                @stack('modals')
                </div>
                @include('layouts.includes.footer')
            </div>
        </div>
        @include('layouts.includes.rightbar')
        <div class="rightbar-overlay"></div>
        @include('layouts.includes.components.scripts')
    </body>
</html>
