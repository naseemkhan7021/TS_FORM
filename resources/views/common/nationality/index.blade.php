@extends('template.vertical', ['title' => 'Construction CRM - Nationality'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
    @livewire('page-title', [ 'sub_title' => 'CRM' , 'active_title' => 'Nationality' , 'page_title' => 'Nationality'  ])
    @livewire('common.nationality')
    <!-- end page title -->

</div>

@endsection



@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addNationality').find('span').html('');
         $('.addNationality').find('form')[0].reset();
         $('.addNationality').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addNationality').find('span').html('');
        $('.addNationality').find('form')[0].reset();
        $('.addNationality').modal('hide');

        Swal.fire(
            'Well Done!',
            'New Nationality Type been Saved Successfully !',
            'success'
            );

       
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editNationality').find('span').html('');
        $('.editNationality').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editNationality').find('span').html('');
        $('.editNationality').find('form')[0].reset();
        $('.editNationality').modal('hide');

        Swal.fire(
            'Good job!',
            'Nationality Has been Updated Successfully !',
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
                window.livewire.emit('delete',event.detail.nationality_id);
            }
        })
    })

    window.addEventListener('deleted', function(event){
        alert('Nationality record has been deleted');
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
