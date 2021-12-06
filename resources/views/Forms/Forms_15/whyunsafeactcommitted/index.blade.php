@extends('template.vertical', ['title' => 'Forms - Potentialhazard'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Form 01 Potentialhazard' , 'page_title' => 'Form 01 Potentialhazard'  ])
        @livewire('forms01.potential-hazard')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addPotentialhazard').find('span').html('');
         $('.addPotentialhazard').find('form')[0].reset();
         $('.addPotentialhazard').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addPotentialhazard').find('span').html('');
        $('.addPotentialhazard').find('form')[0].reset();
        $('.addPotentialhazard').modal('hide');

        Swal.fire(
            'Well Done!',
            'New <b>Potentialhazard</b> Has been Saved Successfully !',
            'success'
            );

        // alert('New Potentialhazard Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editPotentialhazard').find('span').html('');
        $('.editPotentialhazard').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editPotentialhazard').find('span').html('');
        $('.editPotentialhazard').find('form')[0].reset();
        $('.editPotentialhazard').modal('hide');

        Swal.fire(
            'Good job!',
            '<b>Potentialhazard</b> Has been Updated Successfully !',
            'success'
            );
        // alert('Potentialhazard Has been Updated Successfully');
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
        alert('Potentialhazard record has been deleted');
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
