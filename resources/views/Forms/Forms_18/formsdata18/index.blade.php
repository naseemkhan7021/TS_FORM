@extends('template.vertical', ['title' => 'Forms 18 - FIRE EXTINGUISHER INSPECTION REPORT'])
@section('content')

    <div class="container-fluid pl-3 pr-3">

        <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Form 18 FIRE EXTINGUISHER INSPECTION REPORT' , 'page_title' => 'Form 18 -
        FIRE EXTINGUISHER INSPECTION REPORT' ])
        @livewire('forms18.formdata18')
        <!-- end page title -->


    </div>

    {{-- script code here --}}


@endsection
{{-- <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet" /> --}}

@section('scripts')

    <script>
        window.addEventListener('OpenAddCountryModal', function() {
            $('.addFormdata18').find('span').html('');
            $('.addFormdata18').find('form')[0].reset();
            $('.addFormdata18').modal('show');
        });

        window.addEventListener('CloseAddCountryModal', function() {
            $('.addFormdata18').find('span').html('');
            $('.addFormdata18').find('form')[0].reset();
            $('.addFormdata18').modal('hide');

            Swal.fire(
                'Well Done!',
                'New <b>FIRE EXTINGUISHER INSPECTION REPORT</b> Has been Saved Successfully !',
                'success'
            );

            // alert('New FIRE EXTINGUISHER INSPECTION REPORT Has been Saved Successfully');
        });

        window.addEventListener('OpenEditCountryModal', function(event) {
            $('.editFormdata18').find('span').html('');
            $('.editFormdata18').modal('show');
        });

        window.addEventListener('CloseEditCountryModal', function(event) {
            $('.editFormdata18').find('span').html('');
            $('.editFormdata18').find('form')[0].reset();
            $('.editFormdata18').modal('hide');

            Swal.fire(
                'Good job!',
                '<b>FIRE EXTINGUISHER INSPECTION REPORT</b> Has been Updated Successfully !',
                'success'
            );
            // alert('FIRE EXTINGUISHER INSPECTION REPORT Has been Updated Successfully');
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
                    window.livewire.emit('delete', event.detail.id);
                }
            })
        })

        window.addEventListener('deleted', function(event) {
            alert('FIRE EXTINGUISHER INSPECTION REPORT record has been deleted');
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
