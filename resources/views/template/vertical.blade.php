<!DOCTYPE html>
<html lang="en">

<head>
    @include('template.shared/title-meta', ['title' => $title])
    @include('template.shared/head-css')
    {{-- @include('layouts.shared/head-css', ["demo" => "modern"]) --}}
    <link rel="stylesheet" href="{{ asset('sweetalert2/sweetalert2.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/smalllogo.png') }}">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link href="{{ asset('assets/css/loading.css') }} " rel="stylesheet" type="text/css" />
    <!--jQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @livewireStyles()
    @yield('css')
</head>

<body @yield('body-extra')>
    <!-- Begin page -->
    <div id="wrapper">
        @include('template.shared/topbar')

        @include('template.shared/left-sidebar')

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                @yield('content')
            </div>
            <!-- content -->

            @include('template.shared/footer')

            <style>

            </style>
        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    @include('template.shared/right-sidebar')

    @include('template.shared/footer-script')
    <script src="{{ asset('sweetalert2/sweetalert2.min.js') }}"></script>

    @livewireScripts()
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>


    <!--Plugin JavaScript file-->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script> --}}


    <script>
        // if($('#select2-sub_cause').select2() == null){
        //     console.log('this');
        // }


        // $(".js-range-slider").ionRangeSlider({
        //     type: "double",
        //     min: 50,
        //     max: 500,
        //     from: 50,
        //     to: 150,
        //     grid: false,

        //     onStart: function(data) {
        //       // Called right after range slider instance initialised

        //       // console.log(data.input);        // jQuery-link to input
        //       // console.log(data.slider);       // jQuery-link to range sliders container
        //       // console.log(data.min);          // MIN value
        //       // console.log(data.max);          // MAX values
        //       console.log(data.from);
        //       // FROM value.
        //       // $('#iMinBD').val(data.from);
        //       // $('#IMaxBD').val(data.to);


        //       // console.log(data.from_percent); // FROM value in percent
        //       // console.log(data.from_value);   // FROM index in values array (if used)
        //       console.log(data.to); // TO value
        //       // console.log(data.to_percent);   // TO value in percent
        //       // console.log(data.to_value);     // TO index in values array (if used)
        //       // console.log(data.min_pretty);   // MIN prettified (if used)
        //       // console.log(data.max_pretty);   // MAX prettified (if used)
        //       // console.log(data.from_pretty);  // FROM prettified (if used)
        //       // console.log(data.to_pretty);    // TO prettified (if used)
        //     },

        //     onChange: function(data) {
        //       // Called every time handle position is changed

        //       console.log(data.from);
        //       $('#iMinBD').val(data.from);
        //     },

        //     onFinish: function(data) {
        //       // Called then action is done and mouse is released

        //       console.log(data.to);
        //       $('#iMaxBD').val(data.to);
        //     },

        //     onUpdate: function(data) {
        //       // Called then slider is changed using Update public method

        //       // console.log(data.from_percent);
        //     }
        //   });
    </script>


    @yield('scripts')

</body>

</html>
