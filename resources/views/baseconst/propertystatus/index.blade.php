@extends('template.vertical', ['title' => 'Construction CRM - Property Status'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'CRM' , 'active_title' => 'Property Status' , 'page_title' => 'Property Status'  ])
        @livewire('baseconst.propertystatus')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addPropertyStatus').find('span').html('');
         $('.addPropertyStatus').find('form')[0].reset();
         $('.addPropertyStatus').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addPropertyStatus').find('span').html('');
        $('.addPropertyStatus').find('form')[0].reset();
        $('.addPropertyStatus').modal('hide');
        
        Swal.fire(
            'Well Done!',
            'New Property Status been Saved Successfully !',
            'success'
            );

        
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editPropertyStatus').find('span').html('');
        $('.editPropertyStatus').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editPropertyStatus').find('span').html('');
        $('.editPropertyStatus').find('form')[0].reset();
        $('.editPropertyStatus').modal('hide');

        Swal.fire(
            'Good job!',
            'Property Status Has been Updated Successfully !',
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
                window.livewire.emit('delete',event.detail.propertystatus_id);
            }
        })
    })

    window.addEventListener('deleted', function(event){
        alert('Property Status record has been deleted');
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
