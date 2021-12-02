@extends('template.vertical', ['title' => 'Construction CRM - Secondary Member'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'CRM' , 'active_title' => 'Secondary Member' , 'page_title' => 'Secondary Member '  ])
        @livewire('crmsales.secondary-member')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>

    window.addEventListener('OpenAddCountryModal', function(){
         $('.addSecondaryMember').find('span').html('');
         $('.addSecondaryMember').find('form')[0].reset();
         $('.addSecondaryMember').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addSecondaryMember').find('span').html('');
        $('.addSecondaryMember').find('form')[0].reset();
        $('.addSecondaryMember').modal('hide');
        alert('New Lead Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editSecondaryMember').find('span').html('');
        $('.editSecondaryMember').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editSecondaryMember').find('span').html('');
        $('.editSecondaryMember').find('form')[0].reset();
        $('.editSecondaryMember').modal('hide');
        alert('Lead Has been Updated Successfully');
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
        alert('Lead record has been deleted');
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
