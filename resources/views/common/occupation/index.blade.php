@extends('template.vertical', ['title' => 'Construction CRM - Occupation'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
    @livewire('page-title', [ 'sub_title' => 'CRM' , 'active_title' => 'Occupation' , 'page_title' => 'Occupation'  ])
    @livewire('common.occupation')
    <!-- end page title -->


</div>

@endsection


@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addOccupation').find('span').html('');
         $('.addOccupation').find('form')[0].reset();
         $('.addOccupation').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addOccupation').find('span').html('');
        $('.addOccupation').find('form')[0].reset();
        $('.addOccupation').modal('hide');

        Swal.fire(
            'Well Done!',
            'New Occupation Type been Saved Successfully !',
            'success'
            );

        
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editOccupation').find('span').html('');
        $('.editOccupation').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editOccupation').find('span').html('');
        $('.editOccupation').find('form')[0].reset();
        $('.editOccupation').modal('hide');

        Swal.fire(
            'Good job!',
            'Occupation Has been Updated Successfully !',
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
                window.livewire.emit('delete',event.detail.occupation_id);
            }
        })
    })

    window.addEventListener('deleted', function(event){
        alert('Occupation record has been deleted');
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
