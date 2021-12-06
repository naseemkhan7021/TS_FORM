@extends('template.vertical', ['title' => 'Forms - Imd. Corrections'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Form 15 Imd. Corrections' , 'page_title' => 'Form 15 Imd. Corrections'  ])
        @livewire('forms15.imd-correction')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addImdcorrection').find('span').html('');
         $('.addImdcorrection').find('form')[0].reset();
         $('.addImdcorrection').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addImdcorrection').find('span').html('');
        $('.addImdcorrection').find('form')[0].reset();
        $('.addImdcorrection').modal('hide');

        Swal.fire(
            'Well Done!',
            'New <b>Imdcorrection</b> Has been Saved Successfully !',
            'success'
            );

        // alert('New Imdcorrection Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editImdcorrection').find('span').html('');
        $('.editImdcorrection').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editImdcorrection').find('span').html('');
        $('.editImdcorrection').find('form')[0].reset();
        $('.editImdcorrection').modal('hide');

        Swal.fire(
            'Good job!',
            '<b>Imd. Corrections</b> Has been Updated Successfully !',
            'success'
            );
        // alert('Imdcorrection Has been Updated Successfully');
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
        alert('Imd. Corrections record has been deleted');
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
