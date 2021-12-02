@extends('template.vertical', ['title' => 'Construction CRM - Qualification'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
    @livewire('page-title', [ 'sub_title' => 'CRM' , 'active_title' => 'Qualification' , 'page_title' => 'Qualification'  ])
    <!-- end page title -->
    @livewire('common.qualification')

</div>

@endsection



@section('scripts')

<script>

    window.addEventListener('OpenAddCountryModal', function(){
         $('.addQualification').find('span').html('');
         $('.addQualification').find('form')[0].reset();
         $('.addQualification').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addQualification').find('span').html('');
        $('.addQualification').find('form')[0].reset();
        $('.addQualification').modal('hide');

        Swal.fire(
            'Well Done!',
            'New Qualification Type been Saved Successfully !',
            'success'
            );
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editQualification').find('span').html('');
        $('.editQualification').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editQualification').find('span').html('');
        $('.editQualification').find('form')[0].reset();
        $('.editQualification').modal('hide');

        Swal.fire(
            'Good job!',
            'Qualification Has been Updated Successfully !',
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
                window.livewire.emit('delete',event.detail.qualification_id);
            }
        })
    })

    window.addEventListener('deleted', function(event){
        alert('Qualification record has been deleted');
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

