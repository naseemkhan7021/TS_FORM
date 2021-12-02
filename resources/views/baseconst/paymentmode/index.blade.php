@extends('template.vertical', ['title' => 'Construction CRM - Payment Mode'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'CRM' , 'active_title' => 'Payment Mode' , 'page_title' => 'Payment Mode'  ])
        @livewire('baseconst.paymentmode')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addPaymentmode').find('span').html('');
         $('.addPaymentmode').find('form')[0].reset();
         $('.addPaymentmode').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addPaymentmode').find('span').html('');
        $('.addPaymentmode').find('form')[0].reset();
        $('.addPaymentmode').modal('hide');

        Swal.fire(
            'Well Done!',
            'New Payment Mode been Saved Successfully !',
            'success'
            );
       
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editPaymentmode').find('span').html('');
        $('.editPaymentmode').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editPaymentmode').find('span').html('');
        $('.editPaymentmode').find('form')[0].reset();
        $('.editPaymentmode').modal('hide');

        Swal.fire(
            'Good job!',
            'Payment Mode Has been Updated Successfully !',
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
        alert('Payment Mode record has been deleted');
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
