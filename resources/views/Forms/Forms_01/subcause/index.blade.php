@extends('template.vertical', ['title' => 'Forms - Subcause'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Form 01 Subcause' , 'page_title' => 'Form 01 Subcause'  ])
        @livewire('forms01.subcause')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addSubcause').find('span').html('');
         $('.addSubcause').find('form')[0].reset();
         $('.addSubcause').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addSubcause').find('span').html('');
        $('.addSubcause').find('form')[0].reset();
        $('.addSubcause').modal('hide');

        Swal.fire(
            'Well Done!',
            'New Subcause Has been Saved Successfully !',
            'success'
            );

        // alert('New Subcause Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editSubcause').find('span').html('');
        $('.editSubcause').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editSubcause').find('span').html('');
        $('.editSubcause').find('form')[0].reset();
        $('.editSubcause').modal('hide');

        Swal.fire(
            'Good job!',
            '<b>Subcause</b> Has been Updated Successfully !',
            'success'
            );
        // alert('Subcause Has been Updated Successfully');
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
        alert('<b>Subcause</b> record has been deleted');
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
