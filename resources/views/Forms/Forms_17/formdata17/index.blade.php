@extends('template.vertical', ['title' => 'Forms 17 - Form17data'])
@section('content')

    <div class="container-fluid pl-3 pr-3">

        <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Form 17 Form17data' , 'page_title' => 'Form 17
        Form17data' ])
        @livewire('forms17.formdata17')
        <!-- end page title -->


    </div>

    {{-- script code here --}}


@endsection
{{-- <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet" /> --}}

@section('scripts')

    <script>
        window.addEventListener('OpenAddCountryModal', function() {
            $('.addForm17').find('span').html('');
            $('.addForm17').find('form')[0].reset();
            $('.addForm17').modal('show');
        });

        window.addEventListener('CloseAddCountryModal', function() {
            $('.addForm17').find('span').html('');
            $('.addForm17').find('form')[0].reset();
            $('.addForm17').modal('hide');

            Swal.fire(
                'Well Done!',
                'New <b>Form17data</b> Has been Saved Successfully !',
                'success'
            );

            // alert('New Form17data Has been Saved Successfully');
        });

        window.addEventListener('OpenEditCountryModal', function(event) {
            $('.editForm17').find('span').html('');
            $('.editForm17').modal('show');
        });

        window.addEventListener('CloseEditCountryModal', function(event) {
            $('.editForm17').find('span').html('');
            $('.editForm17').find('form')[0].reset();
            $('.editForm17').modal('hide');

            Swal.fire(
                'Good job!',
                '<b>Form17data</b> Has been Updated Successfully !',
                'success'
            );
            // alert('Form17data Has been Updated Successfully');
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
            alert('Form17data record has been deleted');
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
