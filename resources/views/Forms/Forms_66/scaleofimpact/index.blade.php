@extends('template.vertical', ['title' => 'Forms - Scale of Impact'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Form 66 Scale of Impact' , 'page_title' => 'Form 66 Scale of Impact'  ])
        @livewire('forms66.scale-of-impact')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addScaleofimpact').find('span').html('');
         $('.addScaleofimpact').find('form')[0].reset();
         $('.addScaleofimpact').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addScaleofimpact').find('span').html('');
        $('.addScaleofimpact').find('form')[0].reset();
        $('.addScaleofimpact').modal('hide');

        Swal.fire(
            'Well Done!',
            'New <b>Scale of Impact</b> Has been Saved Successfully !',
            'success'
            );

        // alert('New administrative control preventive Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editScaleofimpact').find('span').html('');
        $('.editScaleofimpact').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editScaleofimpact').find('span').html('');
        $('.editScaleofimpact').find('form')[0].reset();
        $('.editScaleofimpact').modal('hide');

        Swal.fire(
            'Good job!',
            '<b>Scale of Impact</b> Has been Updated Successfully !',
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
        alert('Scale of Impact record has been deleted');
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
