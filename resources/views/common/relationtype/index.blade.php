@extends('template.vertical', ['title' => 'Construction CRM - Relation Type'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
    @livewire('page-title', [ 'sub_title' => 'CRM' , 'active_title' => 'Relation Type' , 'page_title' => 'Relation Type'  ])
    <!-- end page title -->
    @livewire('common.relationtype')

</div>

@endsection


@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addRelationtype').find('span').html('');
         $('.addRelationtype').find('form')[0].reset();
         $('.addRelationtype').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addRelationtype').find('span').html('');
        $('.addRelationtype').find('form')[0].reset();
        $('.addRelationtype').modal('hide');

        Swal.fire(
            'Well Done!',
            'New Relationship Type been Saved Successfully !',
            'success'
            );

        
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editRelationtype').find('span').html('');
        $('.editRelationtype').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editRelationtype').find('span').html('');
        $('.editRelationtype').find('form')[0].reset();
        $('.editRelationtype').modal('hide');

        Swal.fire(
            'Good job!',
            'Relationship Type Has been Updated Successfully !',
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
                window.livewire.emit('delete',event.detail.relationtype_id);
            }
        })
    })

    window.addEventListener('deleted', function(event){
        alert('Relation Type record has been deleted');
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


