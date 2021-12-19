@extends('template.vertical', ['title' => 'Forms 22 - Participants'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Form 22 Participants' , 'page_title' => 'Form 22 Participants'  ])
        @livewire('forms22.participants')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addParticipants').find('span').html('');
         $('.addParticipants').find('form')[0].reset();
         $('.addParticipants').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addParticipants').find('span').html('');
        $('.addParticipants').find('form')[0].reset();
        $('.addParticipants').modal('hide');

        Swal.fire(
            'Well Done!',
            'New <b>Participants</b> Has been Saved Successfully !',
            'success'
            );

        // alert('New Participants Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editParticipants').find('span').html('');
        $('.editParticipants').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editParticipants').find('span').html('');
        $('.editParticipants').find('form')[0].reset();
        $('.editParticipants').modal('hide');

        Swal.fire(
            'Good job!',
            '<b>Participants</b> Has been Updated Successfully !',
            'success'
            );
        // alert('Participants Has been Updated Successfully');
    });

    window.addEventListener('SwalConfirm', function(event){
        swal.fire({
            title:event.detail.title,
            imageWidth:48,
            imageHeight:48,
            html:event.detail.html,
            showCloseButton:true,
            showCancelButton:true,
            cancelButtonText:'Cancel',
            confirmButtonText:'Yes, Delete',
            cancelButtonColor:'#d33',
            confirmButtonColor:'#3085d6',
            width:300,
            allowOutsideClick:false
        }).then(function(result){
            if(result.value){
                window.livewire.emit('delete',event.detail.gender_id);
            }
        })
    })

    window.addEventListener('deleted', function(event){
        alert('Participants record has been deleted');
    });

    window.addEventListener('swal:deleteCountries', function(event){

        swal.fire({
            title:event.detail.title,
            html:event.detail.html,
            showCloseButton:true,
            showCancelButton:true,
            cancelButtonText:'No',
            confirmButtonText:'Yes',
            cancelButtonColor:'#d33',
            confirmButtonColor:'#3085d6',
            width:300,
            allowOutsideClick:false
        }).then(function(result){
            if(result.value){
                window.livewire.emit('deleteCheckedCountries',event.detail.checkedIDs);
            }
        });
    });

</script>


@endsection
