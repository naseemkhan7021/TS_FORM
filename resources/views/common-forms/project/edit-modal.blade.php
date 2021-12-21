<div class="modal fade editProject" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit / Update  Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <form wire:submit.prevent="update">
                     <input type="hidden" wire:model="cid">

                     <div class="form-group">
                        <label for="">Company</label>
                        <select class="form-control" wire:model="upd_ibc_id_fk">
                            <option value="">No selected</option>
                            @foreach ($companydata as $comdata )
                                <option value="{{ $comdata->ibc_id }}">{{ $comdata->sbc_company_name }}</option>
                            @endforeach



                        </select>
                        <span class="text-danger"> @error('upd_ibc_id_fk') {{ $message }} @enderror</span>
                    </div>



                    <div class="form-group">
                        <label for="">Department</label>
                        <select class="form-control" wire:model="upd_idepartment_id_fk">
                            <option value="">No selected</option>
                            @foreach ($formsDepartment as $deptdata )
                                <option value="{{ $deptdata->idepartment_id }}">{{ $deptdata->sdepartment_name }}</option>
                            @endforeach


                        </select>
                        <span class="text-danger"> @error('upd_idepartment_id_fk') {{ $message }} @enderror</span>
                    </div>


                     <div class="form-group">
                         <label for="">Project Description</label>
                         <input type="text" class="form-control" placeholder="Project Description" wire:model="upd_sproject_name">
                         <span class="text-danger"> @error('upd_sproject_name') {{ $message }}@enderror</span>
                     </div>
                     <div class="form-group">
                         <label for="">Project Abbrivation</label>
                         <input type="text" class="form-control" placeholder="Project Abbrivation" wire:model="upd_sproject_abbr">
                         <span class="text-danger"> @error('upd_sproject_abbr') {{ $message }}@enderror</span>
                     </div>
                     <div class="form-group">
                        <label for="">Project Location</label>
                        <input type="text" class="form-control" placeholder="Project Location" wire:model="upd_sproject_location">
                        <span class="text-danger"> @error('upd_sproject_location') {{ $message }}@enderror</span>
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
