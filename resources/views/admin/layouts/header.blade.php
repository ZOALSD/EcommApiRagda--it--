<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{ app('l') }}" dir="{{ app('dir') }}">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>{{ !empty($title) ? $title : trans('admin.dashboard') }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    @php
    $path =path();
    @endphp


    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
        type="text/css" />
    <link href="{{ url($path) }}/design/admin_panel/assets/global/plugins/font-awesome/css/font-awesome.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ url($path) }}/design/admin_panel/assets/global/plugins/simple-line-icons/simple-line-icons.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ url($path) }}/design/admin_panel/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css"
        rel="stylesheet" type="text/css" />
    <link
        href="{{ url($path) }}/design/admin_panel/assets/global/plugins/bootstrap-switch/css/bootstrap-switch{{ app('direction') }}.min.css"
        rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link
        href="{{ url($path) }}/design/admin_panel/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ url($path) }}/design/admin_panel/assets/global/plugins/morris/morris.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ url($path) }}/design/admin_panel/assets/global/plugins/fullcalendar/fullcalendar.min.css"
        rel="stylesheet" type="text/css" />
    <link
        href="{{ url($path) }}/design/admin_panel/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"
        rel="stylesheet" type="text/css" />
    <link
        href="{{ url($path) }}/design/admin_panel/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"
        rel="stylesheet" type="text/css" />
    <link
        href="{{ url($path) }}/design/admin_panel/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"
        rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{ url($path) }}/design/admin_panel/assets/global/css/components{{ app('direction') }}.min.css"
        rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{ url($path) }}/design/admin_panel/assets/global/css/plugins{{ app('direction') }}.min.css"
        rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->

    <link href="{{ url($path) }}/design/admin_panel/assets/layouts/layout4/css/layout{{ app('direction') }}.min.css"
        id="stylelink1" rel="stylesheet" type="text/css" />
    <link href="{{ url($path) }}/design/admin_panel/assets/layouts/layout4/css/themes/default.css" id="stylelink2"
        rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{ url($path) }}/design/admin_panel/assets/layouts/layout4/css/custom.css" id="stylelink3"
        rel="stylesheet" type="text/css" />

    {{--
    @if (session('theme') == 1)
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{ url('design/admin_panel') }}/assets/layouts/layout4/css/layout{{ app('direction') }}.min.css"
            id="stylelink1" rel="stylesheet" type="text/css" />
        <link
            href="{{ url('design/admin_panel') }}/assets/layouts/layout4/css/themes/default{{ app('direction') }}.min.css"
            id="stylelink2" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{ url('design/admin_panel') }}/assets/layouts/layout4/css/custom{{ app('direction') }}.min.css"
            id="stylelink3" rel="stylesheet" type="text/css" />
        @elseif(session('theme') == 2)
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{ url('design/admin_panel') }}/assets/layouts/layout/css/layout{{ app('direction') }}.min.css"
            id="stylelink1" rel="stylesheet" type="text/css" />
        <link
            href="{{ url('design/admin_panel') }}/assets/layouts/layout/css/themes/default{{ app('direction') }}.min.css"
            id="stylelink2" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{ url('design/admin_panel') }}/assets/layouts/layout/css/custom{{ app('direction') }}.min.css"
            id="stylelink3" rel="stylesheet" type="text/css" />

        @elseif(session('theme') == 3)

        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{ url('design/admin_panel') }}/assets/layouts/layout2/css/layout{{ app('direction') }}.min.css"
            id="stylelink1" rel="stylesheet" type="text/css" />
        <link
            href="{{ url('design/admin_panel') }}/assets/layouts/layout2/css/themes/default{{ app('direction') }}.min.css"
            id="stylelink2" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{ url('design/admin_panel') }}/assets/layouts/layout2/css/custom{{ app('direction') }}.min.css"
            id="stylelink3" rel="stylesheet" type="text/css" />

        @else
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{ url('design/admin_panel') }}/assets/layouts/layout4/css/layout{{ app('direction') }}.min.css"
            id="stylelink1" rel="stylesheet" type="text/css" />
        <link
            href="{{ url('design/admin_panel') }}/assets/layouts/layout4/css/themes/default{{ app('direction') }}.min.css"
            id="stylelink2" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{ url('design/admin_panel') }}/assets/layouts/layout4/css/custom{{ app('direction') }}.min.css"
            id="stylelink3" rel="stylesheet" type="text/css" />

    @endif
    --}}
    <script src="{{ url($path) }}/design/admin_panel/assets/global/plugins/jquery.min.js" type="text/javascript">
    </script>
    <!-- END THEME LAYOUT STYLES -->
    @if (!empty(setting()->icon))
        <link rel="shortcut icon" href="{{ it()->url(setting()->icon) }}" />
    @endif
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <!-- END CORE PLUGINS -->

    <link href="{{ url($path) }}/design/admin_panel/assets/global/plugins/datatables/datatables.min.css"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ url($path) }}/design/admin_panel/assets/global/css/components-rtl.min.css">
    <link rel="stylesheet" href="{{ url($path) }}/design/admin_panel/assets/global/css/plugins-rtl.min.css">
    <link
        href="{{ url($path) }}/design/admin_panel/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css"
        rel="stylesheet" type="text/css" />
    @if (app('l') != 'ar')
        <link
            href="{{ url($path) }}/design/admin_panel/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css"
            rel="stylesheet" type="text/css" />
    @endif

    <style type="text/css">
        .table-responsive {
            padding-top: 70px;
        }

    </style>

    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="{{ url($path) }}/css/load.css">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    @livewireStyles

</head>
<!-- END HEAD -->

<script>
    window.onload = (event) => {
        document.getElementById("loader").style.display = "none";
    };

</script>

<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">


    <div id="loader"></div>
