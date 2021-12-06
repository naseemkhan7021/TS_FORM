@extends('template.vertical', ['title' => 'Forms - Duration Of Exposure'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Form 01 Duration Of Exposure' , 'page_title' => 'Form 01 Duration Of Exposure'  ])
        @livewire('forms01.duration-of-exposure')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addDurationofexposure').find('span').html('');
         $('.addDurationofexposure').find('form')[0].reset();
         $('.addDurationofexposure').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addDurationofexposure').find('span').html('');
        $('.addDurationofexposure').find('form')[0].reset();
        $('.addDurationofexposure').modal('hide');

        Swal.fire(
            'Well Done!',
            'New <b>Duration Of Exposure</b> Has been Saved Successfully !',
            'success'
            );

        // alert('New administrative control preventive Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editDurationofexposure').find('span').html('');
        $('.editDurationofexposure').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editDurationofexposure').find('span').html('');
        $('.editDurationofexposure').find('form')[0].reset();
        $('.editDurationofexposure').modal('hide');

        Swal.fire(
            'Good job!',
            '<b>Duration Of Exposure</b> Has been Updated Successfully !',
            'success'
            );
        // alert('administrative control preventive Has been Updated Successfully');
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
        alert('duration of exposure record has been deleted');
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
