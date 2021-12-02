@extends('template.vertical', ['title' => 'Construction CRM - Projects Wings'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'CRM' , 'active_title' => 'Project Wings & Floors' , 'page_title' => 'Project Wings & Floors'  ])
        @livewire('projcon.projectwings')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>

    window.addEventListener('OpenAddCountryModal', function(){
         $('.addProjectwings').find('span').html('');
         $('.addProjectwings').find('form')[0].reset();
         $('.addProjectwings').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addProjectwings').find('span').html('');
        $('.addProjectwings').find('form')[0].reset();
        $('.addProjectwings').modal('hide');
        alert('New Project Wings Has been Saved Successfully');
    });


    window.addEventListener('OpenUnitGenerateModal', function(event){
        $('.getProjectwings').find('span').html('');
        $('.genProjectwings').modal('show');
    });

    window.addEventListener('OpenUnitGenerateModal', function(event){
        $('.getProjectwings').find('span').html('');
        $('.getProjectwings').find('form')[0].reset();
        $('.getProjectwings').modal('hide');
        alert('Project Units Generated has been Updated Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editProjectwings').find('span').html('');
        $('.editProjectwings').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editProjectwings').find('span').html('');
        $('.editProjectwings').find('form')[0].reset();
        $('.editProjectwings').modal('hide');
        alert('Project Wings Has been Updated Successfully');
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
        alert('Project Wings record has been deleted');
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
