@extends('template.vertical', ['title' => 'Forms - administrative control mitigative'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Form 01 Administrative Control Mitigative' , 'page_title' => 'Form 01 Administrative Control Mitigative'  ])
        @livewire('forms01.administrative-control-mitigative')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addAdministrativeControlMitigative').find('span').html('');
         $('.addAdministrativeControlMitigative').find('form')[0].reset();
         $('.addAdministrativeControlMitigative').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addAdministrativeControlMitigative').find('span').html('');
        $('.addAdministrativeControlMitigative').find('form')[0].reset();
        $('.addAdministrativeControlMitigative').modal('hide');

        Swal.fire(
            'Well Done!',
            'New Administrative Control <b>Mitigative</b> Has been Saved Successfully !',
            'success'
            );

        // alert('New administrative control mitigative Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editAdministrativeControlMitigative').find('span').html('');
        $('.editAdministrativeControlMitigative').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editAdministrativeControlMitigative').find('span').html('');
        $('.editAdministrativeControlMitigative').find('form')[0].reset();
        $('.editAdministrativeControlMitigative').modal('hide');

        Swal.fire(
            'Good job!',
            'Administrative Control <b>Mitigative</b> Has been Updated Successfully !',
            'success'
            );
        // alert('administrative control mitigative Has been Updated Successfully');
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
        alert('Administrative Control Mitigative record has been deleted');
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
