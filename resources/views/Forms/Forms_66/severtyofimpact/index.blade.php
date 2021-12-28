@extends('template.vertical', ['title' => 'Forms - Severty of Impact'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Form 66 Severty of Impact' , 'page_title' => 'Form 66 Severty of Impact'  ])
        @livewire('forms66.severty-of-impact')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addSevertyofimpact').find('span').html('');
         $('.addSevertyofimpact').find('form')[0].reset();
         $('.addSevertyofimpact').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addSevertyofimpact').find('span').html('');
        $('.addSevertyofimpact').find('form')[0].reset();
        $('.addSevertyofimpact').modal('hide');

        Swal.fire(
            'Well Done!',
            'New <b>Severty of Impact</b> Has been Saved Successfully !',
            'success'
            );

        // alert('New administrative control preventive Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editSevertyofimpact').find('span').html('');
        $('.editSevertyofimpact').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editSevertyofimpact').find('span').html('');
        $('.editSevertyofimpact').find('form')[0].reset();
        $('.editSevertyofimpact').modal('hide');

        Swal.fire(
            'Good job!',
            '<b>Severty of Impact</b> Has been Updated Successfully !',
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
        alert('Severty of Impact record has been deleted');
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
