@extends('template.vertical', ['title' => 'Forms 15 - substandaction'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Form 15 substandaction' , 'page_title' => 'Form 15 substandaction'  ])
        @livewire('forms17.substand-actions')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addSubstandaction').find('span').html('');
         $('.addSubstandaction').find('form')[0].reset();
         $('.addSubstandaction').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addSubstandaction').find('span').html('');
        $('.addSubstandaction').find('form')[0].reset();
        $('.addSubstandaction').modal('hide');

        Swal.fire(
            'Well Done!',
            'New <b>Substandaction</b> Has been Saved Successfully !',
            'success'
            );

        // alert('New Substandaction Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editSubstandaction').find('span').html('');
        $('.editSubstandaction').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editSubstandaction').find('span').html('');
        $('.editSubstandaction').find('form')[0].reset();
        $('.editSubstandaction').modal('hide');

        Swal.fire(
            'Good job!',
            '<b>Substandaction</b> Has been Updated Successfully !',
            'success'
            );
        // alert('Substandaction Has been Updated Successfully');
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
        alert('Substandaction record has been deleted');
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
