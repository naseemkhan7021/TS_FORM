<div class="modal fade editCompany" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit / Update  Company</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <form wire:submit.prevent="update">
                     <input type="hidden" wire:model="cid">
                     {{-- <div class="form-group">
                         <label for="">Continent</label>
                         <select class="form-control" wire:model="upd_continent">
                               <option value="">No selected</option>
                               @foreach ($continents as $continent)
                                   <option value="{{ $continent->id }}">{{ $continent->continent_name }}</option>
                               @endforeach

                         </select>
                         <span class="text-danger"> @error('upd_continent') {{ $message }}@enderror</span>
                     </div> --}}
                     <div class="form-group">
                         <label for="">Company Name</label>
                         <input type="text" class="form-control" placeholder="Company Description" wire:model="upd_sbc_company_name">
                         <span class="text-danger"> @error('upd_sbc_company_name') {{ $message }}@enderror</span>
                     </div>
                     <div class="form-group">
                         <label for="">Company Abbrivation</label>
                         <input type="text" class="form-control" placeholder="Company Abbrivation" wire:model="upd_sbc_abbr">
                         <span class="text-danger"> @error('upd_sbc_abbr') {{ $message }}@enderror</span>
                     </div>

                     <div class="form-group">
                        <label for="">License Valid Till </label>
                        <input type="text" class="form-control" placeholder="License Valid Till" wire:model="upd_validupto_dt">
                        <span class="text-danger"> @error('upd_validupto_dt') {{ $message }}@enderror</span>
                    </div>


                     <div class="form-group">
                         <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
                     </div>
                 </form>

            </div>
        </div>
    </div>
</div>
