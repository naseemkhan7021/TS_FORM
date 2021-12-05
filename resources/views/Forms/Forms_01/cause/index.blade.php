@extends('template.vertical', ['title' => 'Forms - Causes'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Form 01 Causes' , 'page_title' => 'Form 01 Causes'  ])
        @livewire('forms01.cause')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addCause').find('span').html('');
         $('.addCause').find('form')[0].reset();
         $('.addCause').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addCause').find('span').html('');
        $('.addCause').find('form')[0].reset();
        $('.addCause').modal('hide');

        Swal.fire(
            'Well Done!',
            'New Cause Has been Saved Successfully !',
            'success'
            );

        // alert('New Cause Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editCause').find('span').html('');
        $('.editCause').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editCause').find('span').html('');
        $('.editCause').find('form')[0].reset();
        $('.editCause').modal('hide');

        Swal.fire(
            'Good job!',
            '<b>Cause</b> Has been Updated Successfully !',
            'success'
            );
        // alert('Cause Has been Updated Successfully');
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
        alert('<b>Cause</b> record has been deleted');
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
