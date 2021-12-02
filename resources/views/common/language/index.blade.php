@extends('template.vertical', ['title' => 'Construction CRM - Language'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
    @livewire('page-title', [ 'sub_title' => 'CRM' , 'active_title' => 'Language' , 'page_title' => 'Language'  ])
    <!-- end page title -->
    @livewire('common.language')

</div>

@endsection



@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addLanguage').find('span').html('');
         $('.addLanguage').find('form')[0].reset();
         $('.addLanguage').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addLanguage').find('span').html('');
        $('.addLanguage').find('form')[0].reset();
        $('.addLanguage').modal('hide');

        Swal.fire(
            'Well Done!',
            'New Language been Saved Successfully !',
            'success'
            );
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editLanguage').find('span').html('');
        $('.editLanguage').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editLanguage').find('span').html('');
        $('.editLanguage').find('form')[0].reset();
        $('.editLanguage').modal('hide');
        
        Swal.fire(
            'Good job!',
            'Language Has been Updated Successfully !',
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
                window.livewire.emit('delete',event.detail.language_id);
            }
        })
    })

    window.addEventListener('deleted', function(event){
        alert('Language record has been deleted');
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

