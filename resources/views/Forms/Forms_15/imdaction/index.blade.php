@extends('template.vertical', ['title' => 'Forms - Imd. Action'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Form 15 Imd. Action' , 'page_title' => 'Form 15 Imd. Action'  ])
        @livewire('forms15.imd-action')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addImdaction').find('span').html('');
         $('.addImdaction').find('form')[0].reset();
         $('.addImdaction').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addImdaction').find('span').html('');
        $('.addImdaction').find('form')[0].reset();
        $('.addImdaction').modal('hide');

        Swal.fire(
            'Well Done!',
            'New <b>Imdaction</b> Has been Saved Successfully !',
            'success'
            );

        // alert('New Imdaction Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editImdaction').find('span').html('');
        $('.editImdaction').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editImdaction').find('span').html('');
        $('.editImdaction').find('form')[0].reset();
        $('.editImdaction').modal('hide');

        Swal.fire(
            'Good job!',
            '<b>Imd. Action</b> Has been Updated Successfully !',
            'success'
            );
        // alert('Imdaction Has been Updated Successfully');
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
        alert('Imd. Action record has been deleted');
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
