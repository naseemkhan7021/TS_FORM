@extends('template.vertical', ['title' => 'Forms - Contributing cause'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Form 15 Contributing cause' , 'page_title' => 'Form 15 Contributing cause'  ])
        @livewire('forms15.contributing-cause')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addcontributingcause').find('span').html('');
         $('.addcontributingcause').find('form')[0].reset();
         $('.addcontributingcause').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addcontributingcause').find('span').html('');
        $('.addcontributingcause').find('form')[0].reset();
        $('.addcontributingcause').modal('hide');

        Swal.fire(
            'Well Done!',
            'New Contributingcause Has been Saved Successfully !',
            'success'
            );

        // alert('New Cause Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editcontributingcause').find('span').html('');
        $('.editcontributingcause').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editcontributingcause').find('span').html('');
        $('.editcontributingcause').find('form')[0].reset();
        $('.editcontributingcause').modal('hide');

        Swal.fire(
            'Good job!',
            '<b>Contributingcause</b> Has been Updated Successfully !',
            'success'
            );
        // alert('Cause Has been Updated Successfully');
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
        alert('<b>Contributingcause</b> record has been deleted');
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
