@extends('template.vertical', ['title' => 'Forms - Environmental Risk Assessment (ERA) Register'])

@section('content')

    <div class="container-fluid pl-3 pr-3">

        <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Form 66 Environmental Risk Assessment (ERA) Register' , 'page_title' => 'Form 66
        Environmental Risk Assessment (ERA) Register' ])
        @livewire('forms66.formdata66')
        <!-- end page title -->


    </div>

    {{-- script code here --}}


@endsection

@section('scripts')

    <script>
        window.addEventListener('OpenAddCountryModal', function() {
            $('.addForm66').find('span').html('');
            $('.addForm66').find('form')[0].reset();
            $('.addForm66').modal('show');
        });

        window.addEventListener('CloseAddCountryModal', function() {
            $('.addForm66').find('span').html('');
            $('.addForm66').find('form')[0].reset();
            $('.addForm66').modal('hide');

            Swal.fire(
                'Well Done!',
                'New <b>Form66</b> Has been Saved Successfully !',
                'success'
            );

            // alert('New Form66 Has been Saved Successfully');
        });

        window.addEventListener('OpenEditCountryModal', function(event) {
            $('.editForm66').find('span').html('');
            $('.editForm66').modal('show');
        });

        window.addEventListener('CloseEditCountryModal', function(event) {
            $('.editForm66').find('span').html('');
            $('.editForm66').find('form')[0].reset();
            $('.editForm66').modal('hide');

            Swal.fire(
                'Good job!',
                '<b>Form66</b> Has been Updated Successfully !',
                'success'
            );
            // alert('Form66 Has been Updated Successfully');
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
            alert('Form66 record has been deleted');
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
