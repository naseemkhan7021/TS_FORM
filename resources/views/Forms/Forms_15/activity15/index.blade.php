@extends('template.vertical', ['title' => 'Forms 15 - Activity'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Form 15 Activity' , 'page_title' => 'Form 15 Activity'  ])
        @livewire('forms15.activity15')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addActivity15').find('span').html('');
         $('.addActivity15').find('form')[0].reset();
         $('.addActivity15').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addActivity15').find('span').html('');
        $('.addActivity15').find('form')[0].reset();
        $('.addActivity15').modal('hide');

        Swal.fire(
            'Well Done!',
            'New <b>Activity</b> Has been Saved Successfully !',
            'success'
            );

        // alert('New Activity Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editActivity15').find('span').html('');
        $('.editActivity15').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editActivity15').find('span').html('');
        $('.editActivity15').find('form')[0].reset();
        $('.editActivity15').modal('hide');

        Swal.fire(
            'Good job!',
            '<b>Activity</b> Has been Updated Successfully !',
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
