@extends('template.vertical', ['title' => 'Construction CRM - Address Type'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
    @livewire('page-title', [ 'sub_title' => 'CRM' , 'active_title' => 'Address Type' , 'page_title' => 'Address Type'  ])
    @livewire('common.addresstype')
    <!-- end page title -->


</div>

@endsection



@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addAddresstype').find('span').html('');
         $('.addAddresstype').find('form')[0].reset();
         $('.addAddresstype').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addAddresstype').find('span').html('');
        $('.addAddresstype').find('form')[0].reset();
        $('.addAddresstype').modal('hide');

        Swal.fire(
            'Well Done!',
            'New Address Type been Saved Successfully !',
            'success'
            );
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editAddresstype').find('span').html('');
        $('.editAddresstype').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editAddresstype').find('span').html('');
        $('.editAddresstype').find('form')[0].reset();
        $('.editAddresstype').modal('hide');

        Swal.fire(
            'Good job!',
            'Address Type Has been Updated Successfully !',
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
                window.livewire.emit('delete',event.detail.addresstype_id);
            }
        })
    })

    window.addEventListener('deleted', function(event){
        alert('Address Type record has been deleted');
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
