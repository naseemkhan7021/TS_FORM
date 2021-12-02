@extends('template.vertical', ['title' => 'Construction CRM - Lead Status'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'CRM' , 'active_title' => 'Lead Status' , 'page_title' => 'Lead Status'  ])
        @livewire('baseconst.leadstatus')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addLeadStatus').find('span').html('');
         $('.addLeadStatus').find('form')[0].reset();
         $('.addLeadStatus').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addLeadStatus').find('span').html('');
        $('.addLeadStatus').find('form')[0].reset();
        $('.addLeadStatus').modal('hide');

        Swal.fire(
            'Well Done!',
            'New Lead Status been Saved Successfully !',
            'success'
            );
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editLeadStatus').find('span').html('');
        $('.editLeadStatus').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editLeadStatus').find('span').html('');
        $('.editLeadStatus').find('form')[0].reset();
        $('.editLeadStatus').modal('hide');

        Swal.fire(
            'Good job!',
            'Lead Status Has been Updated Successfully !',
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
        alert('Lead Status record has been deleted');
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
