<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin - @yield('title')</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&amp;display=swap" rel="stylesheet">
    <script src="{{ asset('lib/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <link href="{{ asset('lib/sweetalert2/sweetalert2.all.min.js') }}" rel="stylesheet">
    <link href="{{ asset('lib/admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/admin/css/customizer.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css'])

    @stack('admin.head')
    <!-- Styles -->
    @livewireStyles

</head>
<body class="font-sans text-base font-normal text-gray-600" cz-shortcut-listen="true">
<div x-data="{ open: false }" class="wrapper overflow-x-hidden bg-gray-100 dark:bg-gray-900 dark:bg-opacity-40">
    @livewire('admin.sidebar')
    @livewire('admin.navigation')
    <div x-bind:aria-expanded="open"
         :class="{'ltr:ml-64 ltr:-mr-64 md:ltr:ml-0 md:ltr:mr-0 rtl:mr-64 rtl:-ml-64 md:rtl:mr-0 md:rtl:ml-0': open, 'ltr:ml-0 ltr:mr-0 md:ltr:ml-64 rtl:mr-0 rtl:ml-0 md:rtl:mr-64': !(open) }"
         class="flex flex-col ltr:ml-64 rtl:mr-64 min-h-screen transition-all duration-500 ease-in-out">
        {{ $slot }}
    </div>
    @livewire('admin.footer')
</div>

<div class="jvm-tooltip"></div>



@stack('admin.script-bottom')
@livewireScripts

<script src="{{asset('lib/admin/vendors/alpinejs/dist/cdn.min.js') }}"></script>
<script src="{{asset('lib/admin/vendors/@yaireo/tagify/dist/tagify.min.js') }}"></script>
<script src="{{asset('lib/admin/vendors/pristinejs/dist/pristine.min.js') }}"></script>
<script src="{{asset('lib/admin/vendors/simple-datatables/dist/umd/simple-datatables.js') }}"></script>
<script src="{{asset('lib/admin/js/demo.js') }}"></script>
<script src="{{asset('lib/admin/vendors/chart.js/dist/chart.min.js') }}"></script>
<script src="{{asset('lib/admin/js/chart/cms.js') }}"></script>
<script src="{{asset('lib/admin/vendors/jsvectormap/dist/js/jsvectormap.min.js') }}"></script>
<script src="{{asset('lib/admin/vendors/jsvectormap/dist/maps/world.js') }}"></script>
<script src="{{asset('lib/admin/js/vendor.js') }}"></script>
<script src="{{asset('lib/admin/js/customizer.js') }}"></script>


</body>
</html>
