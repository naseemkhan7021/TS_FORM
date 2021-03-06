@extends('template.vertical', ['title' => 'T&S Document Series'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'Document Series' , 'page_title' => 'Document Series'  ])
        @livewire('common-forms.documents')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addDocument').find('span').html('');
         $('.addDocument').find('form')[0].reset();
         $('.addDocument').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addDocument').find('span').html('');
        $('.addDocument').find('form')[0].reset();
        $('.addDocument').modal('hide');

        Swal.fire(
            'Well Done!',
            'New Document Series Has been Saved Successfully !',
            'success'
            );

        // alert('New Document Series Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editDocument').find('span').html('');
        $('.editDocument').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editDocument').find('span').html('');
        $('.editDocument').find('form')[0].reset();
        $('.editDocument').modal('hide');

        Swal.fire(
            'Good job!',
            'Document Series Has been Updated Successfully !',
            'success'
            );
        // alert('Document Series Has been Updated Successfully');
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
        alert('Document Series record has been deleted');
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
