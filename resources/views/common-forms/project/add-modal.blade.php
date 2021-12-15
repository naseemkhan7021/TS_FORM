<div class="modal fade addProject" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <form wire:submit.prevent="save">


                    <div class="form-group">
                        <label for="">Company</label>
                        <select class="form-control" wire:model="ibc_id_fk">
                            <option value="">No selected</option>
                            @foreach ($companydata as $comdata )
                                <option value="{{ $comdata->ibc_id }}">{{ $comdata->sbc_company_name }}</option>
                            @endforeach

                        </select>
                        <span class="text-danger"> @error('ibc_id_fk') {{ $message }} @enderror</span>
                    </div>



                    <div class="form-group">
                        <label for="">Department</label>
                        <select class="form-control" wire:model="ibc_id_fk">
                            <option value="">No selected</option>
                            @foreach ($companydata as $comdata )
                                <option value="{{ $comdata->ibc_id }}">{{ $comdata->sbc_company_name }}</option>
                            @endforeach

                        </select>
                        <span class="text-danger"> @error('ibc_id_fk') {{ $message }} @enderror</span>
                    </div>


                     <div class="form-group">
                         <label for="">Project Description</label>
                         <input type="text" class="form-control" placeholder="Project Description" wire:model="Project_description">
                         <span class="text-danger"> @error('Project_description') {{ $message }}@enderror</span>
                     </div>
                     <div class="form-group">
                         <label for="">Project Abbrivation</label>
                         <input type="text" class="form-control" placeholder="Project Abbrivation" wire:model="Project_abbr">
                         <span class="text-danger"> @error('Project_abbr') {{ $message }}@enderror</span>
                     </div>
                     <div class="form-group">
                        <label for="">Project Location</label>
                        <input type="text" class="form-control" placeholder="Project Location" wire:model="upd_Project_abbr">
                        <span class="text-danger"> @error('upd_Project_abbr') {{ $message }}@enderror</span>
                    </div>

                     <div class="form-group">
                         <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary btn-sm">Save</button>
                     </div>
                 </form>

            </div>
        </div>
    </div>
</div>
