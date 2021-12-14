<div class="modal fade editDepartment" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit / Update  Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <form wire:submit.prevent="update">
                     <input type="hidden" wire:model="cid">
                     <div class="form-group">
                         <label for="">Company Name</label>

                               <select class="form-control" wire:model="upd_ibc_id_fk">

                                @foreach ($companydata as $comdata )
                                    <option value="{{ $comdata->ibc_id }}">{{ $comdata->sbc_company_name }}</option>
                                @endforeach



                         </select>
                         <span class="text-danger"> @error('upd_ibc_id_fk') {{ $message }}@enderror</span>
                     </div>
                     <div class="form-group">
                         <label for="">Department Name</label>
                         <input type="text" class="form-control" placeholder="Department Name" wire:model="upd_sdepartment_name">
                         <span class="text-danger"> @error('upd_sdepartment_name') {{ $message }}@enderror</span>
                     </div>
                     <div class="form-group">
                         <label for="">Department Abbrivation</label>
                         <input type="text" class="form-control" placeholder="Department Abbrivation" wire:model="upd_sdepartment_abbr">
                         <span class="text-danger"> @error('upd_sdepartment_abbr') {{ $message }}@enderror</span>
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
