<div class="modal fade editDefaultdata" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit / Update defaultdata</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <form wire:submit.prevent="update">
                     
                    <div class="form-group">
                        <label for="" class="@error('ibc_id_fk') table-danger @enderror ">Company</label>
                        <select class="form-control @error('ibc_id_fk') border border-danger @enderror " wire:model="ibc_id_fk">
                            <option value="" hidden>No selected</option>
                            @foreach ($companyData as $key => $item )
                                <option wire:key={{$item->ibc_id}} value="{{ $item->ibc_id }}">{{ $item->sbc_company_name }}</option>
                            @endforeach

                        </select>
                    </div>



                    <div class="form-group">
                        <label for="" class="@error('idepartment_id_fk') table-danger @enderror ">Department</label>
                        <select class="form-control @error('idepartment_id_fk') border border-danger @enderror " wire:model="idepartment_id_fk">
                            <option value="" hidden>No selected</option>
                            @foreach ($departmentData as $key => $item )
                                <option wire:key={{$item->idepartment_id}} value="{{ $item->idepartment_id }}">{{ $item->sdepartment_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="" class="@error('iproject_id_fk') table-danger @enderror ">Project</label>
                        <select class="form-control @error('iproject_id_fk') border border-danger @enderror " wire:model="iproject_id_fk">
                            <option value="" hidden>No selected</option>
                            @foreach ($projectData as $key => $item )
                                <option wire:key={{$item->iproject_id}} value="{{ $item->iproject_id }}">{{ $item->sproject_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="" class="@error('description') table-danger @enderror ">Description</label>
                        <textarea class="form-control" wire:model='description' rows="5"></textarea>
                    </div>

                    <hr class="text-secondary w-100">

                    <div class="form-group">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save Change</button>
                    </div>
                 </form>
            </div>
        </div>
    </div>
</div>
