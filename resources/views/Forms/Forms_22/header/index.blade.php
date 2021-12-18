@extends('template.vertical', ['title' => 'Forms 22 - Header'])
@section('content')

    <div class="container-fluid pl-3 pr-3">

        <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Form 22 Header' , 'page_title' => 'Form 22
        Header' ])
        @livewire('forms22.headers')
        <!-- end page title -->


    </div>

    {{-- script code here --}}


@endsection
{{-- <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet" /> --}}

@section('scripts')

    <script>
        window.addEventListener('OpenAddCountryModal', function() {
            $('.addHeader22').find('span').html('');
            $('.addHeader22').find('form')[0].reset();
            $('.addHeader22').modal('show');
        });

        window.addEventListener('CloseAddCountryModal', function() {
            $('.addHeader22').find('span').html('');
            $('.addHeader22').find('form')[0].reset();
            $('.addHeader22').modal('hide');

            Swal.fire(
                'Well Done!',
                'New <b>Header</b> Has been Saved Successfully !',
                'success'
            );

            // alert('New Header Has been Saved Successfully');
        });

        window.addEventListener('OpenEditCountryModal', function(event) {
            $('.editHeader22').find('span').html('');
            $('.editHeader22').modal('show');
        });

        window.addEventListener('CloseEditCountryModal', function(event) {
            $('.editHeader22').find('span').html('');
            $('.editHeader22').find('form')[0].reset();
            $('.editHeader22').modal('hide');

            Swal.fire(
                'Good job!',
                '<b>Header</b> Has been Updated Successfully !',
                'success'
            );
            // alert('Header Has been Updated Successfully');
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
            alert('Header record has been deleted');
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
