@extends('template.vertical', ['title' => 'T&S All Documents'])

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
        @livewire('page-title', [ 'sub_title' => 'FORMS' , 'active_title' => 'All Documents' , 'page_title' => 'All Documents'  ])
        @livewire('common-forms.documents-all')
    <!-- end page title -->


</div>

{{-- script code here  --}}


@endsection

@section('scripts')

<script>
    window.addEventListener('OpenAddCountryModal', function(){
         $('.addDocumentA').find('span').html('');
         $('.addDocumentA').find('form')[0].reset();
         $('.addDocumentA').modal('show');
    });

    window.addEventListener('CloseAddCountryModal', function(){
        $('.addDocumentA').find('span').html('');
        $('.addDocumentA').find('form')[0].reset();
        $('.addDocumentA').modal('hide');

        Swal.fire(
            'Well Done!',
            'New Document Has been Saved Successfully !',
            'success'
            );

        // alert('New Document Has been Saved Successfully');
    });

    window.addEventListener('OpenEditCountryModal', function(event){
        $('.editDocumentA').find('span').html('');
        $('.editDocumentA').modal('show');
    });

    window.addEventListener('CloseEditCountryModal', function(event){
        $('.editDocumentA').find('span').html('');
        $('.editDocumentA').find('form')[0].reset();
        $('.editDocumentA').modal('hide');

        Swal.fire(
            'Good job!',
            'Document Has been Updated Successfully !',
            'success'
            );
        // alert('Document Has been Updated Successfully');
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
        alert('Document record has been deleted');
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
                window.livewire.emit('deleteCheckedCountries',event.detail.id);
            }
        });
    });

</script>


@endsection
