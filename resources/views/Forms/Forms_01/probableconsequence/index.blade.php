@extends('template.vertical', ['title' => 'Forms - Probable Consequence'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Form 01 Probable Consequence' , 'page_title' => 'Form 01 Probable Consequence'  ])
        @livewire('forms01.probable-consequence')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addProbableconsequence').find('span').html('');
         $('.addProbableconsequence').find('form')[0].reset();
         $('.addProbableconsequence').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addProbableconsequence').find('span').html('');
        $('.addProbableconsequence').find('form')[0].reset();
        $('.addProbableconsequence').modal('hide');

        Swal.fire(
            'Well Done!',
            'New Probableconsequence Has been Saved Successfully !',
            'success'
            );

        // alert('New Probableconsequence Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editProbableconsequence').find('span').html('');
        $('.editProbableconsequence').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editProbableconsequence').find('span').html('');
        $('.editProbableconsequence').find('form')[0].reset();
        $('.editProbableconsequence').modal('hide');

        Swal.fire(
            'Good job!',
            'Probableconsequence Has been Updated Successfully !',
            'success'
            );
        // alert('Probableconsequence Has been Updated Successfully');
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
        alert('Probableconsequence record has been deleted');
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
