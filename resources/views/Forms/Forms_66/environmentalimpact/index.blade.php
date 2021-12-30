@extends('template.vertical', ['title' => 'Forms - Environmental Impact'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Form 66 Environmental Impact' , 'page_title' => 'Form 66 Environmental Impact'  ])
        @livewire('forms66.environmental-impact')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addEnvironmentalImpact').find('span').html('');
         $('.addEnvironmentalImpact').find('form')[0].reset();
         $('.addEnvironmentalImpact').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addEnvironmentalImpact').find('span').html('');
        $('.addEnvironmentalImpact').find('form')[0].reset();
        $('.addEnvironmentalImpact').modal('hide');

        Swal.fire(
            'Well Done!',
            'New <b>Environmental Impact</b> Has been Saved Successfully !',
            'success'
            );

        // alert('New administrative control preventive Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editEnvironmentalImpact').find('span').html('');
        $('.editEnvironmentalImpact').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editEnvironmentalImpact').find('span').html('');
        $('.editEnvironmentalImpact').find('form')[0].reset();
        $('.editEnvironmentalImpact').modal('hide');

        Swal.fire(
            'Good job!',
            '<b>Environmental Impact</b> Has been Updated Successfully !',
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
                window.livewire.emit('delete',event.detail.id);
            }
        })
    })

    window.addEventListener('deleted', function(event){
        alert('Environmental Impact record has been deleted');
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
