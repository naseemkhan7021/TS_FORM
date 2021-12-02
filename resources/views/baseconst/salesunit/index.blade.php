@extends('template.vertical', ['title' => 'Construction CRM - Sales Unit'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'CRM' , 'active_title' => 'Sales Unit' , 'page_title' => 'Sales Unit'  ])
        @livewire('baseconst.salesunit')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addSalesunit').find('span').html('');
         $('.addSalesunit').find('form')[0].reset();
         $('.addSalesunit').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addSalesunit').find('span').html('');
        $('.addSalesunit').find('form')[0].reset();
        $('.addSalesunit').modal('hide');

        Swal.fire(
            'Well Done!',
            'New Sales Unit been Saved Successfully !',
            'success'
            );
       
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editSalesunit').find('span').html('');
        $('.editSalesunit').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editSalesunit').find('span').html('');
        $('.editSalesunit').find('form')[0].reset();
        $('.editSalesunit').modal('hide');

        Swal.fire(
            'Good job!',
            'Sales Unit Has been Updated Successfully !',
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
                window.livewire.emit('delete',event.detail.salesunit_id);
            }
        })
    })

    window.addEventListener('deleted', function(event){
        alert('Sales Unit record has been deleted');
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
