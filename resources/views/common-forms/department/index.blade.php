@extends('template.vertical', ['title' => 'T&S Department'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Department' , 'page_title' => 'Department'  ])
        @livewire('common-forms.department')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addDepartment').find('span').html('');
         $('.addDepartment').find('form')[0].reset();
         $('.addDepartment').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addDepartment').find('span').html('');
        $('.addDepartment').find('form')[0].reset();
        $('.addDepartment').modal('hide');

        Swal.fire(
            'Well Done!',
            'New Gender Has been Saved Successfully !',
            'success'
            );

        // alert('New Gender Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editDepartment').find('span').html('');
        $('.editDepartment').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editDepartment').find('span').html('');
        $('.editDepartment').find('form')[0].reset();
        $('.editDepartment').modal('hide');

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
