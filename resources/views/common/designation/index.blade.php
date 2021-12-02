@extends('template.vertical', ['title' => 'Construction CRM - Designation'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
    @livewire('page-title', [ 'sub_title' => 'CRM' , 'active_title' => 'Designation' , 'page_title' => 'Designation'  ])
    <!-- end page title -->
    @livewire('common.designation')

</div>

@endsection


@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addDesignation').find('span').html('');
         $('.addDesignation').find('form')[0].reset();
         $('.addDesignation').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addDesignation').find('span').html('');
        $('.addDesignation').find('form')[0].reset();
        $('.addDesignation').modal('hide');

        Swal.fire(
            'Well Done!',
            'New Designation been Saved Successfully !',
            'success'
            );


        
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editDesignation').find('span').html('');
        $('.editDesignation').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editDesignation').find('span').html('');
        $('.editDesignation').find('form')[0].reset();
        $('.editDesignation').modal('hide');

        Swal.fire(
            'Good job!',
            'Designation Has been Updated Successfully !',
            'success'
            );
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
        alert('Designation record has been deleted');
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
