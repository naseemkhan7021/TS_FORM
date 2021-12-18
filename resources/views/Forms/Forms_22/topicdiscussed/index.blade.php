@extends('template.vertical', ['title' => 'Forms 22 - Topic Discussed'])
@section('content')

    <div class="container-fluid pl-3 pr-3">

        <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Form 22 Topic Discussed' , 'page_title' => 'Form 22
        Topic Discussed' ])
        @livewire('forms22.topic-discusseds')
        <!-- end page title -->


    </div>

    {{-- script code here --}}


@endsection
{{-- <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet" /> --}}

@section('scripts')

    <script>
        window.addEventListener('OpenAddCountryModal', function() {
            $('.addTopicdiscussed').find('span').html('');
            $('.addTopicdiscussed').find('form')[0].reset();
            $('.addTopicdiscussed').modal('show');
        });

        window.addEventListener('CloseAddCountryModal', function() {
            $('.addTopicdiscussed').find('span').html('');
            $('.addTopicdiscussed').find('form')[0].reset();
            $('.addTopicdiscussed').modal('hide');

            Swal.fire(
                'Well Done!',
                'New <b>Topic Discussed</b> Has been Saved Successfully !',
                'success'
            );

            // alert('New Topic Discussed Has been Saved Successfully');
        });

        window.addEventListener('OpenEditCountryModal', function(event) {
            $('.editTopicdiscussed').find('span').html('');
            $('.editTopicdiscussed').modal('show');
        });

        window.addEventListener('CloseEditCountryModal', function(event) {
            $('.editTopicdiscussed').find('span').html('');
            $('.editTopicdiscussed').find('form')[0].reset();
            $('.editTopicdiscussed').modal('hide');

            Swal.fire(
                'Good job!',
                '<b>Topic Discussed</b> Has been Updated Successfully !',
                'success'
            );
            // alert('Topic Discussed Has been Updated Successfully');
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
            alert('Topic Discussed record has been deleted');
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
