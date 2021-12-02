@extends('template.vertical', ['title' => 'Construction CRM - Construction Stage'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'CRM Const.' , 'active_title' => 'Construction Stage' , 'page_title' => 'Construction Stage'  ]);
        @livewire('baseconst.constructionstage');
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addConstructionStage').find('span').html('');
         $('.addConstructionStage').find('form')[0].reset();
         $('.addConstructionStage').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addConstructionStage').find('span').html('');
        $('.addConstructionStage').find('form')[0].reset();
        $('.addConstructionStage').modal('hide');

        Swal.fire(
            'Well Done!',
            'New Construction Stage been Saved Successfully !',
            'success'
            );


        
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editConstructionStage').find('span').html('');
        $('.editConstructionStage').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editConstructionStage').find('span').html('');
        $('.editConstructionStage').find('form')[0].reset();
        $('.editConstructionStage').modal('hide');

        Swal.fire(
            'Good job!',
            'Construction Stage Has been Updated Successfully !',
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
        alert('Construction Stage record has been deleted');
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
