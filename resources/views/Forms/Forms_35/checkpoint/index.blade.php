@extends('template.vertical', ['title' => 'Forms 35 - Checkpoint'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Form 35 Checkpoint' , 'page_title' => 'Form 35 Checkpoint'  ])
        @livewire('forms35.checkpoint')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addCheckpoint').find('span').html('');
         $('.addCheckpoint').find('form')[0].reset();
         $('.addCheckpoint').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addCheckpoint').find('span').html('');
        $('.addCheckpoint').find('form')[0].reset();
        $('.addCheckpoint').modal('hide');

        Swal.fire(
            'Well Done!',
            'New <b>Checkpoint</b> Has been Saved Successfully !',
            'success'
            );

        // alert('New Checkpoint Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editCheckpoint').find('span').html('');
        $('.editCheckpoint').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editCheckpoint').find('span').html('');
        $('.editCheckpoint').find('form')[0].reset();
        $('.editCheckpoint').modal('hide');

        Swal.fire(
            'Good job!',
            '<b>Checkpoint</b> Has been Updated Successfully !',
            'success'
            );
        // alert('Checkpoint Has been Updated Successfully');
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
                window.livewire.emit('delete',event.detail.id);
            }
        })
    })

    window.addEventListener('deleted', function(event){
        alert('Checkpoint record has been deleted');
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
                window.livewire.emit('deleteCheckedCountries',event.detail.id);
            }
        });
    });

</script>


@endsection
