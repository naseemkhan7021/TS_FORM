@extends('template.vertical', ['title' => 'Forms - NEARMISS REPORTING'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Form 15 - NEARMISS REPORTING' , 'page_title' => 'Form 15 - NEARMISS REPORTING'  ])
        @livewire('forms15.formdata15')
    <!-- end page title --> 


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addNearmissreporting').find('span').html('');
         $('.addNearmissreporting').find('form')[0].reset();
         $('.addNearmissreporting').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addNearmissreporting').find('span').html('');
        $('.addNearmissreporting').find('form')[0].reset();
        $('.addNearmissreporting').modal('hide');

        Swal.fire(
            'Well Done!',
            'New Nearmiss reporting Has been Saved Successfully !',
            'success'
            );

        // alert('New Nearmissreporting Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editNearmissreporting').find('span').html('');
        $('.editNearmissreporting').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editNearmissreporting').find('span').html('');
        $('.editNearmissreporting').find('form')[0].reset();
        $('.editNearmissreporting').modal('hide');

        Swal.fire(
            'Good job!',
            '<b>Nearmiss reporting</b> Has been Updated Successfully !',
            'success'
            );
        // alert('Nearmissreporting Has been Updated Successfully');
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
        alert('<b>Nearmiss reporting</b> record has been deleted');
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
