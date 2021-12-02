@extends('template.vertical', ['title' => 'Construction CRM - Payment Template'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'CRM' , 'active_title' => 'Payment Template' , 'page_title' => 'Payment Template'  ])
        @livewire('baseconst.paymenttemplate')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addPaymentTemplate').find('span').html('');
         $('.addPaymentTemplate').find('form')[0].reset();
         $('.addPaymentTemplate').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addPaymentTemplate').find('span').html('');
        $('.addPaymentTemplate').find('form')[0].reset();
        $('.addPaymentTemplate').modal('hide');

        Swal.fire(
            'Well Done!',
            'New Payment Schedule been Saved Successfully !',
            'success'
            );

      
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editPaymentTemplate').find('span').html('');
        $('.editPaymentTemplate').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editPaymentTemplate').find('span').html('');
        $('.editPaymentTemplate').find('form')[0].reset();
        $('.editPaymentTemplate').modal('hide');

        Swal.fire(
            'Good job!',
            'Payment Schedule Has been Updated Successfully !',
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
                window.livewire.emit('delete',event.detail.channelpartner_id);
            }
        })
    })

    window.addEventListener('deleted', function(event){
        alert('Payment Schedule Template record has been deleted');
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
