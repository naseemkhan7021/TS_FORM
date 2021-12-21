@extends('template.vertical', ['title' => 'T&S - Section Form'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Section Form' , 'page_title' => 'Section Form'  ])
        @livewire('forms00.formdata00')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addFormdata').find('span').html('');
         $('.addFormdata').find('form')[0].reset();
         $('.addFormdata').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addFormdata').find('span').html('');
        $('.addFormdata').find('form')[0].reset();
        $('.addFormdata').modal('hide');

        Swal.fire(
            'Well Done!',
            'New <b>Section Form</b> Has been Saved Successfully !',
            'success'
            );

        // alert('New Activity Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editFormdata').find('span').html('');
        $('.editFormdata').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editFormdata').find('span').html('');
        $('.editFormdata').find('form')[0].reset();
        $('.editFormdata').modal('hide');

        Swal.fire(
            'Good job!',
            '<b>Section Form</b> Has been Updated Successfully !',
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
        alert('Section Form record has been deleted');
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
