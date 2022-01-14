<div class="modal fade editForm35" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit / Update Investigation</h5>
                <button wire:click='clearValidationf()' type="button" class="close"
                    data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="update" class="row g-3">

                    {{-- project detail start --}}
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="project name"
                                class="form-label @error('iproject_id_fk') text-danger @enderror">Project
                                @error('iproject_id_fk') <i
                                    class="text-danger fas fa-times-circle"></i>@enderror</label>

                            <select wire:model="iproject_id_fk" class="form-control">
                                <option selected disabled value="0">Project name</option>
                                @foreach ($projectData as $item)
                                    <option value="{{ $item->iproject_id }}">{{ $item->sproject_name }}</option>
                                @endforeach
                            </select>
                            {{-- {{ $iproject_id_fk }} --}}
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">

                            <label for="" class=" @error('sproject_location') text-danger @enderror">Location
                                @error('sproject_location') <i
                                    class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <input type="text" class="form-control" placeholder="Location"
                                wire:model="sproject_location" readonly>
                            {{-- <span class="text-danger"> 
                                    @error('sproject_location')
                                        {{ $message }}@enderror</span> --}}
                        </div>
                    </div>

                    <div class="col-md-2 col-sm-6">
                        <div class="form-group">
                            <label for="" class="@error('fille_date') text-danger @enderror">Data/Time
                                @error('fille_date') <i class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <input type="date" class="form-control" wire:model="fille_date" readonly>

                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="add_parmitNo" class="@error('parmitNo') text-danger @enderror">Permit No
                            </label>
                            <input id="add_parmitNo" type="text"
                                class="form-control @error('parmitNo') border border-danger @enderror"
                                placeholder="Permit No" wire:model="parmitNo">
                        </div>
                    </div>

                    {{-- exact_location_nature_of_work_ids --}}
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <div class="">
                                <label for="" title="Exact Location Nature Of Work to be carried out"
                                    class="form-label @error('exact_location_nature_of_work_ids') text-danger @enderror">Nature Of
                                    Work</label>
                                <select size="4" data-placeholder="Select Activity" wire:model='exact_location_nature_of_work_ids'
                                    class="form-control custom-select @error('exact_location_nature_of_work_ids') border border-danger @enderror"
                                    multiple>
                                    @foreach ($activity01Data as $item)
                                        <option wire:key='add_activity_{{ $item->activity_id }}'
                                            value="{{ $item->activity_id }}">
                                            {{ $item->activity_description }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            {{-- dow --> Date Of Work --}}
                            <label for="add_dow" class="@error('working_dt') text-danger @enderror">Date of Working
                                @error('working_dt') <i class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <input id="add_dow" type="date" class="form-control" wire:model="working_dt">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <label for="" class="@error('working_t_F' && 'working_t_F') text-danger @enderror">Time of
                                working </label>

                            <div class="form-inline">
                                <b class="text-dark">From</b><input id="" type="time"
                                    class="form-control mx-2 @error('working_t_F') border border-danger @enderror"
                                    wire:model="working_t_F">
                                <b class="text-dark">To</b><input id="" type="time"
                                    class="form-control mx-2 @error('working_t_F') border border-danger @enderror"
                                    wire:model="working_t_T">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5"></div>

                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <label for="add_nameofcontractor" title="Name of Contractor"
                                class="@error('contractor_name') text-danger @enderror">Name of Contractor</label>
                            <input id="add_nameofcontractor" type="text"
                                class="form-control @error('contractor_name') border border-danger @enderror"
                                wire:model="contractor_name">

                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <label for="add_nameofsupervisor" title="Name of Supervisor"
                                class="@error('supervisor_name') text-danger @enderror">Name of Supervisor</label>
                            <input id="add_nameofsupervisor" type="text"
                                class="form-control @error('supervisor_name') border border-danger @enderror"
                                wire:model="supervisor_name">

                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <label for="add_noofpopworking" title="No. of people working"
                                class="@error('no_of_people_working') text-danger @enderror">No. of people
                                working</label>
                            <input id="add_noofpopworking" type="number"
                                class="form-control @error('no_of_people_working') border border-danger @enderror"
                                wire:model="no_of_people_working">

                        </div>
                    </div>
                    <div class="col-md-12">
                        <h5>To carry out work, the following points are to be checked:</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row justify-content-between ">
                                    <div class="col-md-6">
                                        <h4>Checkpoints</h4>
                                    </div>
                                    <div class="col-md-3">
                                        <h4>Y/N</h4>
                                    </div>
                                    <div class="col-md-3">
                                        <h4>Remark</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row justify-content-between ">
                                    <div class="col-md-6">
                                        <h4>Checkpoints</h4>
                                    </div>
                                    <div class="col-md-3">
                                        <h4>Y/N</h4>
                                    </div>
                                    <div class="col-md-3">
                                        <h4>Remark</h4>
                                    </div>
                                </div>
                            </div>
                            @foreach ($checkpointData as $index => $item)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{-- <div class="form-inline my-1 ml-2"> --}}
                                        <div class="row justify-content-between ">

                                            <div class="col-md-6">
                                                <label
                                                    class="ml-3 form-check-label @error('form35_checkpoint_ids') text-danger @enderror"
                                                    for="add_point_{{ $item->form35_checkpoints_id }}_add">
                                                    {{ $item->form35_checkpoints_desc }}
                                                </label>
                                            </div>
                                            <div class="col-md-3">
                                                <input wire:model='form35_checkpoint_ids' class="m-0 form-check-input"
                                                    type="checkbox" value="{{ $item->form35_checkpoints_id }}"
                                                    id="add_point_{{ $item->form35_checkpoints_id }}_add">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" placeholder="remark" class="form-control"
                                                    wire:model='form35_checkpoint_remarks.{{ $index }}'>

                                                    {{-- <input type="text" class="form-control" placeholder="Img title" wire:model='imgTitles.{{$key}}'> --}}
                                            </div>
                                        </div>
                                        {{-- </div> --}}

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>


                    <hr class="text-secondary w-100">

                    <div class="col-12">
                        <div class="form-group">
                            <button wire:click='clearValidationf()' type="button"
                                class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-sm">Save Change</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
