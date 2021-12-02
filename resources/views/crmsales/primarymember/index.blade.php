@extends('template.vertical', ['title' => 'Construction CRM - Primary Member'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'CRM' , 'active_title' => 'Primary Member' , 'page_title' => 'Primary Member '  ])
        @livewire('crmsales.primary-member')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>

    window.addEventListener('OpenAddCountryModal', function(){
         $('.addPrimaryMember').find('span').html('');
         $('.addPrimaryMember').find('form')[0].reset();
         $('.addPrimaryMember').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addPrimaryMember').find('span').html('');
        $('.addPrimaryMember').find('form')[0].reset();
        $('.addPrimaryMember').modal('hide');
        alert('New Primary member Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editPrimaryMember').find('span').html('');
        $('.editPrimaryMember').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editPrimaryMember').find('span').html('');
        $('.editPrimaryMember').find('form')[0].reset();
        $('.editPrimaryMember').modal('hide');
        alert('Primary member Has been Updated Successfully');
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
                window.livewire.emit('delete',event.detail.ProjectID);
            }
        })
    })

    window.addEventListener('deleted', function(event){
        alert('Primery member record has been deleted');
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
