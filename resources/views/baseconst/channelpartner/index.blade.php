@extends('template.vertical', ['title' => 'Construction CRM - Channel Partner'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'CRM' , 'active_title' => 'Channel Partner' , 'page_title' => 'Channel Partner'  ])
        @livewire('baseconst.channelpartner')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addChannelPartner').find('span').html('');
         $('.addChannelPartner').find('form')[0].reset();
         $('.addChannelPartner').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addChannelPartner').find('span').html('');
        $('.addChannelPartner').find('form')[0].reset();
        $('.addChannelPartner').modal('hide');

        Swal.fire(
            'Well Done!',
            'New Channel Partner been Saved Successfully !',
            'success'
            );
        
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editChannelPartner').find('span').html('');
        $('.editChannelPartner').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editChannelPartner').find('span').html('');
        $('.editChannelPartner').find('form')[0].reset();
        $('.editChannelPartner').modal('hide');

        Swal.fire(
            'Good job!',
            'Channel Partner Has been Updated Successfully !',
            'success'
            );

       

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
        alert('Channel Partner record has been deleted');
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
