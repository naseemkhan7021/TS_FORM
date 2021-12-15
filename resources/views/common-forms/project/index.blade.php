@extends('template.vertical', ['title' => 'T&S Projects'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Projects' , 'page_title' => 'Projects'  ])
        @livewire('common-forms.projects')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addGender').find('span').html('');
         $('.addGender').find('form')[0].reset();
         $('.addGender').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addGender').find('span').html('');
        $('.addGender').find('form')[0].reset();
        $('.addGender').modal('hide');

        Swal.fire(
            'Well Done!',
            'New Gender Has been Saved Successfully !',
            'success'
            );

        // alert('New Gender Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editGender').find('span').html('');
        $('.editGender').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editGender').find('span').html('');
        $('.editGender').find('form')[0].reset();
        $('.editGender').modal('hide');

        Swal.fire(
            'Good job!',
            'Gender Has been Updated Successfully !',
            'success'
            );
        // alert('Gender Has been Updated Successfully');
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
        alert('Gender record has been deleted');
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
