@extends('template.vertical', ['title' => 'Forms 35 - Form35data'])
@section('content')

    <div class="container-fluid pl-3 pr-3">

        <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Form 35 Form35data' , 'page_title' => 'Form 35
        Form35data' ])
        @livewire('forms35.formdata35')
        <!-- end page title -->


    </div>

    {{-- script code here --}}


@endsection
{{-- <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet" /> --}}

@section('scripts')

    <script>
        window.addEventListener('OpenAddCountryModal', function() {
            $('.addForm35').find('span').html('');
            $('.addForm35').find('form')[0].reset();
            $('.addForm35').modal('show');
        });

        window.addEventListener('CloseAddCountryModal', function() {
            $('.addForm35').find('span').html('');
            $('.addForm35').find('form')[0].reset();
            $('.addForm35').modal('hide');

            Swal.fire(
                'Well Done!',
                'New <b>Form35data</b> Has been Saved Successfully !',
                'success'
            );

            // alert('New Form35data Has been Saved Successfully');
        });

        window.addEventListener('OpenEditCountryModal', function(event) {
            $('.editForm35').find('span').html('');
            $('.editForm35').modal('show');
        });

        window.addEventListener('CloseEditCountryModal', function(event) {
            $('.editForm35').find('span').html('');
            $('.editForm35').find('form')[0].reset();
            $('.editForm35').modal('hide');

            Swal.fire(
                'Good job!',
                '<b>Form35data</b> Has been Updated Successfully !',
                'success'
            );
            // alert('Form35data Has been Updated Successfully');
        });
    
        window.addEventListener('SwalConfirm', function(event) {
            swal.fire({
                title: event.detail.title,
                imageWidth: 48,
                imageHeight: 48,
                html: event.detail.html,
                showCloseButton: true,
                showCancelButton: true,
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Yes, Delete',
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                width: 300,
                allowOutsideClick: false
            }).then(function(result) {
                if (result.value) {
                    window.livewire.emit('delete', event.detail.gender_id);
                }
            })
        })

        window.addEventListener('deleted', function(event) {
            alert('Form35data record has been deleted');
        });

        window.addEventListener('swal:deleteCountries', function(event) {

            swal.fire({
                title: event.detail.title,
                html: event.detail.html,
                showCloseButton: true,
                showCancelButton: true,
                cancelButtonText: 'No',
                confirmButtonText: 'Yes',
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                width: 300,
                allowOutsideClick: false
            }).then(function(result) {
                if (result.value) {
                    window.livewire.emit('deleteCheckedCountries', event.detail.checkedIDs);
                }
            });
        });
    </script>


@endsection