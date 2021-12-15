{{-- <div>
    img data is -> {{$imgdata}} 
</div> --}}
<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" >
    Launch static backdrop modal
  </button> --}}
  
  <!-- Modal -->
  <div class="modal fade {{$imgdata ? 'show d-block' : ''}}" id="imgview" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Img prv</h5>
          <button wire:click="$set('showimg','')" type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
          <img style="height: 100%; width: 100%; object-fit: contain;" src="{{Storage::url($imgdata)}}" alt="{{Storage::url($imgdata)}}">
          {{-- img data is -> {{$imgdata}} --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="$set('showimg','')">Close</button>
          {{-- <button type="button" class="btn btn-primary">Understood</button> --}}
        </div>
      </div>
    </div>
  </div>