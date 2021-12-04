@extends('template.vertical', ['title' => 'Forms - ConsequencesControl'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Form 01 ConsequencesControl' , 'page_title' => 'Form 01 ConsequencesControl'  ])
        @livewire('forms01.consequences-control')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addConsequencesControl').find('span').html('');
         $('.addConsequencesControl').find('form')[0].reset();
         $('.addConsequencesControl').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addConsequencesControl').find('span').html('');
        $('.addConsequencesControl').find('form')[0].reset();
        $('.addConsequencesControl').modal('hide');

        Swal.fire(
            'Well Done!',
            'New ConsequencesControl Has been Saved Successfully !',
            'success'
            );

        // alert('New ConsequencesControl Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editConsequencesControl').find('span').html('');
        $('.editConsequencesControl').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editConsequencesControl').find('span').html('');
        $('.editConsequencesControl').find('form')[0].reset();
        $('.editConsequencesControl').modal('hide');

        Swal.fire(
            'Good job!',
            'ConsequencesControl Has been Updated Successfully !',
            'success'
            );
        // alert('ConsequencesControl Has been Updated Successfully');
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
        alert('ConsequencesControl record has been deleted');
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
