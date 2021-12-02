@extends('template.vertical', ['title' => 'Forms - Activity'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Form 01 Activity' , 'page_title' => 'Form 01 Activity'  ])
        @livewire('forms01.activity')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addActivity').find('span').html('');
         $('.addActivity').find('form')[0].reset();
         $('.addActivity').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addActivity').find('span').html('');
        $('.addActivity').find('form')[0].reset();
        $('.addActivity').modal('hide');

        Swal.fire(
            'Well Done!',
            'New Activity Has been Saved Successfully !',
            'success'
            );

        // alert('New Activity Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editActivity').find('span').html('');
        $('.editActivity').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editActivity').find('span').html('');
        $('.editActivity').find('form')[0].reset();
        $('.editActivity').modal('hide');

        Swal.fire(
            'Good job!',
            'Activity Has been Updated Successfully !',
            'success'
            );
        // alert('Activity Has been Updated Successfully');
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
        alert('Activity record has been deleted');
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
