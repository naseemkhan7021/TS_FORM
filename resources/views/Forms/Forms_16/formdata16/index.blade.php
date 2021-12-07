@extends('template.vertical', ['title' => 'Forms 16 - Form16data'])
@section('content')

    <div class="container-fluid pl-3 pr-3">

        <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Form 16 Form16data' , 'page_title' => 'Form 16
        Form16data' ])
        @livewire('forms16.formdata16')
        <!-- end page title -->


    </div>

    {{-- script code here --}}


@endsection
{{-- <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet" /> --}}

@section('scripts')

    <script>
        window.addEventListener('OpenAddCountryModal', function() {
            $('.addForm1').find('span').html('');
            $('.addForm1').find('form')[0].reset();
            $('.addForm1').modal('show');
        });

        window.addEventListener('CloseAddCountryModal', function() {
            $('.addForm1').find('span').html('');
            $('.addForm1').find('form')[0].reset();
            $('.addForm1').modal('hide');

            Swal.fire(
                'Well Done!',
                'New <b>Form16data</b> Has been Saved Successfully !',
                'success'
            );

            // alert('New Form16data Has been Saved Successfully');
        });

        window.addEventListener('OpenEditCountryModal', function(event) {
            $('.editForm1').find('span').html('');
            $('.editForm1').modal('show');
        });

        window.addEventListener('CloseEditCountryModal', function(event) {
            $('.editForm1').find('span').html('');
            $('.editForm1').find('form')[0].reset();
            $('.editForm1').modal('hide');

            Swal.fire(
                'Good job!',
                '<b>Form16data</b> Has been Updated Successfully !',
                'success'
            );
            // alert('Form16data Has been Updated Successfully');
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
            alert('Form16data record has been deleted');
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
