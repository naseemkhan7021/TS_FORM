@extends('template.vertical', ['title' => 'T&S - Default Data '])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Default Data' , 'page_title' => 'Default Data'  ])
        @livewire('common-forms.defaultdata')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addDefaultdata').find('span').html('');
         $('.addDefaultdata').find('form')[0].reset();
         $('.addDefaultdata').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addDefaultdata').find('span').html('');
        $('.addDefaultdata').find('form')[0].reset();
        $('.addDefaultdata').modal('hide');

        Swal.fire(
            'Well Done!',
            'New Defaultdata Has been Saved Successfully !',
            'success'
            );

        // alert('New Defaultdata Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editDefaultdata').find('span').html('');
        $('.editDefaultdata').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editDefaultdata').find('span').html('');
        $('.editDefaultdata').find('form')[0].reset();
        $('.editDefaultdata').modal('hide');

        Swal.fire(
            'Good job!',
            'Defaultdata Has been Updated Successfully !',
            'success'
            );
        // alert('Defaultdata Has been Updated Successfully');
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
                window.livewire.emit('delete',event.detail.id);
            }
        })
    })

    window.addEventListener('deleted', function(event){
        alert('Defaultdata record has been deleted');
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
                window.livewire.emit('deleteCheckedCountries',event.detail.idefault_id);
            }
        });
    });

</script>


@endsection
