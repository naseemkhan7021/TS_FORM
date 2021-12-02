@extends('template.vertical', ['title' => 'Construction CRM - Lead Source'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'CRM' , 'active_title' => 'Lead Source' , 'page_title' => 'Lead Source'  ])
        @livewire('baseconst.leadsource')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addLeadSource').find('span').html('');
         $('.addLeadSource').find('form')[0].reset();
         $('.addLeadSource').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addLeadSource').find('span').html('');
        $('.addLeadSource').find('form')[0].reset();
        $('.addLeadSource').modal('hide');

        Swal.fire(
            'Well Done!',
            'New Lead Source been Saved Successfully !',
            'success'
            );
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editLeadSource').find('span').html('');
        $('.editLeadSource').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editLeadSource').find('span').html('');
        $('.editLeadSource').find('form')[0].reset();
        $('.editLeadSource').modal('hide');

        Swal.fire(
            'Good job!',
            'Lead Source Has been Updated Successfully !',
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
        alert('Lead Source record has been deleted');
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
