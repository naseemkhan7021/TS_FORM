<div class="modal fade addProject" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div  wire:loading.delay.longest>
                    <div class="spinner-border text-primary m-auto d-block" role="status">
                        <span class="sr-only m-auto">Loading...</span>
                    </div>
                </div>
                <form wire:submit.prevent="save">


                    <div class="form-group">
                        <label for="">Company</label>
                        <select class="form-control" wire:model="ibc_id_fk">
                            <option value="">No selected</option>
                            @foreach ($companydata as $comdata)
                                <option value="{{ $comdata->ibc_id }}">{{ $comdata->sbc_company_name }}</option>
                            @endforeach

                        </select>
                        <span class="text-danger"> @error('ibc_id_fk') {{ $message }} @enderror</span>
                    </div>



                    <div class="form-group">
                        <label for="">Department</label>
                        <select class="form-control" wire:model="idepartment_id_fk">
                            <option value="">No selected</option>
                            @foreach ($formsDepartment as $deptdata)
                                <option value="{{ $deptdata->idepartment_id }}">{{ $deptdata->sdepartment_name }}
                                </option>
                            @endforeach

                        </select>
                        <span class="text-danger"> @error('idepartment_id_fk') {{ $message }} @enderror</span>
                    </div>


                    <div class="form-group">
                        <label for="">Project Description</label>
                        <input type="text" class="form-control" placeholder="Project Description"
                            wire:model="sproject_name">
                        <span class="text-danger"> @error('sproject_name') {{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="">Project Abbrivation</label>
                            <input type="text" class="form-control" placeholder="Project Abbrivation"
                                wire:model="sproject_abbr">
                            <span class="text-danger"> @error('sproject_abbr') {{ $message }}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="">Project Location</label>
                                <input type="text" class="form-control" placeholder="Project Location"
                                    wire:model="sproject_location">
                                <span class="text-danger"> @error('sproject_location') {{ $message }}@enderror</span>
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
