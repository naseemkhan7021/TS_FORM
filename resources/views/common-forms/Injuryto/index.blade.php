@extends('template.vertical', ['title' => 'T&S Company'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'Forms' , 'active_title' => 'Company' , 'page_title' => 'Company'  ])
        @livewire('common-forms.company')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addCompany').find('span').html('');
         $('.addCompany').find('form')[0].reset();
         $('.addCompany').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addCompany').find('span').html('');
        $('.addCompany').find('form')[0].reset();
        $('.addCompany').modal('hide');

        Swal.fire(
            'Well Done!',
            'New Company Has been Saved Successfully !',
            'success'
            );

        // alert('New Company Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editCompany').find('span').html('');
        $('.editCompany').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editCompany').find('span').html('');
        $('.editCompany').find('form')[0].reset();
        $('.editCompany').modal('hide');

        Swal.fire(
            'Good job!',
            'Company Has been Updated Successfully !',
            'success'
            );
        // alert('Company Has been Updated Successfully');
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
        alert('Company record has been deleted');
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
