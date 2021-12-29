@extends('template.vertical', ['title' => 'Forms 66 - Sub-activity'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS 66' , 'active_title' => 'Form 66 subactivity' , 'page_title' => 'Form 66 Sub-activity'  ])
        @livewire('forms66.sub-activity66')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addSubactivity').find('span').html('');
         $('.addSubactivity').find('form')[0].reset();
         $('.addSubactivity').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addSubactivity').find('span').html('');
        $('.addSubactivity').find('form')[0].reset();
        $('.addSubactivity').modal('hide');

        Swal.fire(
            'Well Done!',
            'New <b>Subactivity</b> Has been Saved Successfully !',
            'success'
            );

        // alert('New Subactivity Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editSubactivity').find('span').html('');
        $('.editSubactivity').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editSubactivity').find('span').html('');
        $('.editSubactivity').find('form')[0].reset();
        $('.editSubactivity').modal('hide');

        Swal.fire(
            'Good job!',
            '<b>Subactivity</b> Has been Updated Successfully !',
            'success'
            );
        // alert('Subactivity Has been Updated Successfully');
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
        alert('Subactivity record has been deleted');
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
