@extends('template.vertical', ['title' => 'Forms - Organization Requirement'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Form 66 Organization Requirement' , 'page_title' => 'Form 66 Organization Requirement'  ])
        @livewire('forms66.organization-requirement')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addOrganizationrequirment').find('span').html('');
         $('.addOrganizationrequirment').find('form')[0].reset();
         $('.addOrganizationrequirment').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addOrganizationrequirment').find('span').html('');
        $('.addOrganizationrequirment').find('form')[0].reset();
        $('.addOrganizationrequirment').modal('hide');

        Swal.fire(
            'Well Done!',
            'New <b>Organization Requirment</b> Has been Saved Successfully !',
            'success'
            );

        // alert('New administrative control preventive Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editOrganizationrequirment').find('span').html('');
        $('.editOrganizationrequirment').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editOrganizationrequirment').find('span').html('');
        $('.editOrganizationrequirment').find('form')[0].reset();
        $('.editOrganizationrequirment').modal('hide');

        Swal.fire(
            'Good job!',
            '<b>Organization Requirment</b> Has been Updated Successfully !',
            'success'
            );
        // alert('administrative control preventive Has been Updated Successfully');
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
        alert('Organization Requirment record has been deleted');
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
