@extends('template.vertical', ['title' => 'Construction CRM - Leads'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'CRM' , 'active_title' => 'Leads' , 'page_title' => 'Leads - Customer'  ])
        @livewire('crmsales.leads')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>

    window.addEventListener('OpenAddCountryModal', function(){
         $('.addLead').find('span').html('');
        //  $('.addLead').find('form')[0].reset();
         $('.addLead').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addLead').find('span').html('');
        $('.addLead').find('form')[0].reset();
        $('.addLead').modal('hide');
        alert('New Lead Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editLead').find('span').html('');
        $('.editLead').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editLead').find('span').html('');
        $('.editLead').find('form')[0].reset();
        $('.editLead').modal('hide');
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
