@extends('template.vertical', ['title' => 'Construction CRM - Lead Follow Up'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'CRM' , 'active_title' => 'Lead Follow Up' , 'page_title' => 'Lead Follow Up'  ])
        @livewire('crmsales.lead-followup')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>

    window.addEventListener('OpenAddCountryModal', function(){
         $('.addLeadfollowup').find('span').html('');
         $('.addLeadfollowup').find('form')[0].reset();
         $('.addLeadfollowup').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addLeadfollowup').find('span').html('');
        $('.addLeadfollowup').find('form')[0].reset();
        $('.addLeadfollowup').modal('hide');
        alert('New Lead Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editLeadfollowup').find('span').html('');
        $('.editLeadfollowup').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editLeadfollowup').find('span').html('');
        $('.editLeadfollowup').find('form')[0].reset();
        $('.editLeadfollowup').modal('hide');
        alert('Lead Has been Updated Successfully');
    });


    window.addEventListener('CutomerActivity', function(event){
        $('.dspLeadTimeLine').find('span').html('');
        // $('.dspLeadTimeLine').find('form')[0].reset();
        $('.dspLeadTimeLine').modal('show');
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
