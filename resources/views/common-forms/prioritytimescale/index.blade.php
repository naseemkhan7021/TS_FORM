@extends('template.vertical', ['title' => 'T&S Priority 2 Timescale'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'Forms' , 'active_title' => 'Priority 2 Timescale' , 'page_title' => 'Priority 2 Timescale'  ])
        @livewire('common-forms.prioritytimescale')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addPrioritytimescale').find('span').html('');
         $('.addPrioritytimescale').find('form')[0].reset();
         $('.addPrioritytimescale').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addPrioritytimescale').find('span').html('');
        $('.addPrioritytimescale').find('form')[0].reset();
        $('.addPrioritytimescale').modal('hide');

        Swal.fire(
            'Well Done!',
            'New Potential Injury To Has been Saved Successfully !',
            'success'
            );

        // alert('New Company Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editPrioritytimescale').find('span').html('');
        $('.editPrioritytimescale').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editPrioritytimescale').find('span').html('');
        $('.editPrioritytimescale').find('form')[0].reset();
        $('.editPrioritytimescale').modal('hide');

        Swal.fire(
            'Good job!',
            'Potential Injury To Has been Updated Successfully !',
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
