@extends('template.vertical', ['title' => 'Construction CRM - Projects Units'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'CRM' , 'active_title' => 'Projects Units'  , 'page_title' => 'Projects Units'  ])
        @livewire('projcon.projectunit')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>

    window.addEventListener('OpenAddCountryModal', function(){
         $('.addProjectunit').find('span').html('');
         $('.addProjectunit').find('form')[0].reset();
         $('.addProjectunit').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addProjectunit').find('span').html('');
        $('.addProjectunit').find('form')[0].reset();
        $('.addProjectunit').modal('hide');
        alert('New Project Unit Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editProjectunit').find('span').html('');
        $('.editProjectunit').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editProjectunit').find('span').html('');
        $('.editProjectunit').find('form')[0].reset();
        $('.editProjectunit').modal('hide');
        alert('Project Unit Has been Updated Successfully');
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
        alert('Project Unit record has been deleted');
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
