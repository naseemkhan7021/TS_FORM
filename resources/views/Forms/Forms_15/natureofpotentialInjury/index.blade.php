@extends('template.vertical', ['title' => 'Forms - Nature Of Potential Injuries'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Form 15 Nature Of Potential Injuries' , 'page_title' => 'Form 15 Nature Of Potential Injuries'  ])
        @livewire('forms15.nature-of-potential-injury')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addNatureofpotentialinjury').find('span').html('');
         $('.addNatureofpotentialinjury').find('form')[0].reset();
         $('.addNatureofpotentialinjury').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addNatureofpotentialinjury').find('span').html('');
        $('.addNatureofpotentialinjury').find('form')[0].reset();
        $('.addNatureofpotentialinjury').modal('hide');

        Swal.fire(
            'Well Done!',
            'New <b>Natureofpotentialinjury</b> Has been Saved Successfully !',
            'success'
            );

        // alert('New Natureofpotentialinjury Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editNatureofpotentialinjury').find('span').html('');
        $('.editNatureofpotentialinjury').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editNatureofpotentialinjury').find('span').html('');
        $('.editNatureofpotentialinjury').find('form')[0].reset();
        $('.editNatureofpotentialinjury').modal('hide');

        Swal.fire(
            'Good job!',
            '<b>Nature Of Potential Injuries</b> Has been Updated Successfully !',
            'success'
            );
        // alert('Natureofpotentialinjury Has been Updated Successfully');
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
        alert('Nature Of Potential Injuries record has been deleted');
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
