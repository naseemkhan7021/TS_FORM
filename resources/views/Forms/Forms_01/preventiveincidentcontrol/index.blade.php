@extends('template.vertical', ['title' => 'Forms - Preventive Incident Control'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Form 01 Preventive Incident Control' , 'page_title' => 'Form 01 Preventive Incident Control'  ])
        @livewire('forms01.preventive-incident-control')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addPreventiveincidentcontrol').find('span').html('');
         $('.addPreventiveincidentcontrol').find('form')[0].reset();
         $('.addPreventiveincidentcontrol').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addPreventiveincidentcontrol').find('span').html('');
        $('.addPreventiveincidentcontrol').find('form')[0].reset();
        $('.addPreventiveincidentcontrol').modal('hide');

        Swal.fire(
            'Well Done!',
            'New <b>Preventive Incident Control</b> Has been Saved Successfully !',
            'success'
            );

        // alert('New Preventiveincidentcontrol Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editPreventiveincidentcontrol').find('span').html('');
        $('.editPreventiveincidentcontrol').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editPreventiveincidentcontrol').find('span').html('');
        $('.editPreventiveincidentcontrol').find('form')[0].reset();
        $('.editPreventiveincidentcontrol').modal('hide');

        Swal.fire(
            'Good job!',
            '<b>Preventive Incident Control</b> Has been Updated Successfully !',
            'success'
            );
        // alert('Preventiveincidentcontrol Has been Updated Successfully');
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
        alert('Preventive Incident Control record has been deleted');
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
