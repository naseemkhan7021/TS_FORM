@extends('template.vertical', ['title' => 'Forms - Administrative Control Preventive'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Form 01 Administrative Control Preventive' , 'page_title' => 'Form 01 Administrative Control Preventive'  ])
        @livewire('forms01.administrative-control-preventive')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addAdministrativeControlPreventive').find('span').html('');
         $('.addAdministrativeControlPreventive').find('form')[0].reset();
         $('.addAdministrativeControlPreventive').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addAdministrativeControlPreventive').find('span').html('');
        $('.addAdministrativeControlPreventive').find('form')[0].reset();
        $('.addAdministrativeControlPreventive').modal('hide');

        Swal.fire(
            'Well Done!',
            'New Administrative Control <b>Preventive</b> Has been Saved Successfully !',
            'success'
            );

        // alert('New administrative control preventive Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editAdministrativeControlPreventive').find('span').html('');
        $('.editAdministrativeControlPreventive').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editAdministrativeControlPreventive').find('span').html('');
        $('.editAdministrativeControlPreventive').find('form')[0].reset();
        $('.editAdministrativeControlPreventive').modal('hide');

        Swal.fire(
            'Good job!',
            'Administrative Control <b>Preventive</b> Has been Updated Successfully !',
            'success'
            );
        // alert('administrative control preventive Has been Updated Successfully');
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
        alert('administrative control preventive record has been deleted');
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
