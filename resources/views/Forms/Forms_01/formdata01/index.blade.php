@extends('template.vertical', ['title' => 'Forms - Hira'])

@section('content')

    <div class="container-fluid pl-3 pr-3">

        <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Form 01 Hira' , 'page_title' => 'Form 01
        Hira' ])
        @livewire('forms01.formdata01')
        <!-- end page title -->


    </div>

    {{-- script code here --}}


@endsection

@section('scripts')

    <script>
        window.addEventListener('OpenAddCountryModal', function() {
            $('.addForm01').find('span').html('');
            $('.addForm01').find('form')[0].reset();
            $('.addForm01').modal('show');
        });

        window.addEventListener('CloseAddCountryModal', function() {
            $('.addForm01').find('span').html('');
            $('.addForm01').find('form')[0].reset();
            $('.addForm01').modal('hide');

            Swal.fire(
                'Well Done!',
                'New <b>Form01</b> Has been Saved Successfully !',
                'success'
            );

            // alert('New Form01 Has been Saved Successfully');
        });

        window.addEventListener('OpenEditCountryModal', function(event) {
            $('.editForm01').find('span').html('');
            $('.editForm01').modal('show');
        });

        window.addEventListener('CloseEditCountryModal', function(event) {
            $('.editForm01').find('span').html('');
            $('.editForm01').find('form')[0].reset();
            $('.editForm01').modal('hide');

            Swal.fire(
                'Good job!',
                '<b>Form01</b> Has been Updated Successfully !',
                'success'
            );
            // alert('Form01 Has been Updated Successfully');
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
            alert('Form01 record has been deleted');
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
