@extends('template.vertical', ['title' => 'Forms 15 - substandcondition'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Form 15 substandcondition' , 'page_title' => 'Form 15 substandcondition'  ])
        @livewire('forms17.substand-condition')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addSubstandcondition').find('span').html('');
         $('.addSubstandcondition').find('form')[0].reset();
         $('.addSubstandcondition').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addSubstandcondition').find('span').html('');
        $('.addSubstandcondition').find('form')[0].reset();
        $('.addSubstandcondition').modal('hide');

        Swal.fire(
            'Well Done!',
            'New <b>Substandcondition</b> Has been Saved Successfully !',
            'success'
            );

        // alert('New Substandcondition Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editSubstandcondition').find('span').html('');
        $('.editSubstandcondition').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editSubstandcondition').find('span').html('');
        $('.editSubstandcondition').find('form')[0].reset();
        $('.editSubstandcondition').modal('hide');

        Swal.fire(
            'Good job!',
            '<b>Substandcondition</b> Has been Updated Successfully !',
            'success'
            );
        // alert('Substandcondition Has been Updated Successfully');
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
        alert('Substandcondition record has been deleted');
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
