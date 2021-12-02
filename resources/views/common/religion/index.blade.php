@extends('template.vertical', ['title' => 'Construction CRM - Religion'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
    @livewire('page-title', [ 'sub_title' => 'CRM' , 'active_title' => 'Religion' , 'page_title' => 'Religion'  ])
    @livewire('common.religion')
    <!-- end page title -->


</div>

@endsection



@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addReligion').find('span').html('');
         $('.addReligion').find('form')[0].reset();
         $('.addReligion').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addReligion').find('span').html('');
        $('.addReligion').find('form')[0].reset();
        $('.addReligion').modal('hide');

        Swal.fire(
            'Well Done!',
            'New Religion been Saved Successfully !',
            'success'
            );

    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editReligion').find('span').html('');
        $('.editReligion').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editReligion').find('span').html('');
        $('.editReligion').find('form')[0].reset();
        $('.editReligion').modal('hide');

        Swal.fire(
            'Good job!',
            'Religion Has been Updated Successfully !',
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
        alert('Religion record has been deleted');
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

