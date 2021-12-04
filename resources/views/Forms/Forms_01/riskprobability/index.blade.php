@extends('template.vertical', ['title' => 'Forms - Risk Probability'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Form 01 Risk Probability' , 'page_title' => 'Form 01 Risk Probability'  ])
        @livewire('forms01.risk-probability')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addRiskprobability').find('span').html('');
         $('.addRiskprobability').find('form')[0].reset();
         $('.addRiskprobability').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addRiskprobability').find('span').html('');
        $('.addRiskprobability').find('form')[0].reset();
        $('.addRiskprobability').modal('hide');

        Swal.fire(
            'Well Done!',
            'New Risk Probability Has been Saved Successfully !',
            'success'
            );

        // alert('New administrative control preventive Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editRiskprobability').find('span').html('');
        $('.editRiskprobability').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editRiskprobability').find('span').html('');
        $('.editRiskprobability').find('form')[0].reset();
        $('.editRiskprobability').modal('hide');

        Swal.fire(
            'Good job!',
            'Risk probability Has been Updated Successfully !',
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
        alert('Risk probability record has been deleted');
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
