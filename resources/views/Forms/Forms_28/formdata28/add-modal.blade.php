<div class="modal fade addForm28" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New EHS OBSERVATION {{$this->formSRNo}}</h5>
                <button wire:click='clearValuesandValidation()' type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="save" class="row g-3">

                    {{-- project detail start --}}
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="project_name_add"
                                class="form-label @error('iproject_id_fk') text-danger @enderror">Project</label>

                            <select wire:model="iproject_id_fk"
                                class="form-control  @error('iproject_id_fk') border-danger @enderror">
                                <option selected disabled value="0">Select Project</option>
                                @foreach ($projectData as $item)
                                    <option value="{{ $item->iproject_id }}">{{ $item->sproject_name }}</option>
                                @endforeach
                            </select>
                            {{-- {{ $iproject_id_fk }} --}}
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="form-controp">

                            <label for="" class="">Project Location
                            </label>
                            <input type="text" class="form-control" placeholder="Location"
                                wire:model="sproject_location" readonly>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="form-controp">
                            <label for="" class="">Data</label>
                            <input wire:model="date" type="text" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="observer_name_add" class="@error('observer_name') text-danger @enderror">Name Of Observer</label>
                            <input id="observer_name_add" type="text"
                                class="form-control  @error('observer_name') border-danger @enderror"
                                placeholder="Name Of Observer Person" wire:model="observer_name">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="observation_desc_add" class="@error('observation_desc') text-danger @enderror">OBSERVATION</label>
                        <textarea id="observation_desc_add" type="text"
                        class="form-control  @error('observation_desc') border-danger @enderror"
                        placeholder="What you observe" wire:model="observation_desc" rows="1"></textarea>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="location_add" class="@error('location') text-danger @enderror">Location</label>
                            <input id="location_add" type="text"
                                class="form-control  @error('location') border-danger @enderror"
                                placeholder="Name of the location" wire:model="location">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="noticed_time_add" class="@error('noticed_time') text-danger @enderror">Noticed Time</label>
                            <input id="noticed_time_add" type="time"
                                class="form-control  @error('noticed_time') border-danger @enderror"
                                placeholder="Notice time" wire:model="noticed_time">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="recommend_corrective_action_add" class="@error('recommend_corrective_action') text-danger @enderror">Recommend Corrective Action</label>
                            <input id="recommend_corrective_action_add" type="text"
                                class="form-control  @error('recommend_corrective_action') border-danger @enderror"
                                placeholder="Write Corrective Action" wire:model="recommend_corrective_action">
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for=""
                                class="form-label @error('prioritytimescales_id_fk') text-danger @enderror">TimeScale</label>

                            <select wire:model="prioritytimescales_id_fk"
                                class="form-control  @error('prioritytimescales_id_fk') border-danger @enderror">
                                <option selected disabled value="0">Select TimeScale</option>
                                @foreach ($prioritytimescaleData as $item)
                                    <option value="{{ $item->prioritytimescales_id }}">{{ $item->pt_value }}. {{ $item->prioritytimescales_desc }}</option>
                                @endforeach
                            </select>
                            {{-- {{ $prioritytimescales_id_fk }} --}}
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="responsible_person_add" class="@error('responsible_person') text-danger @enderror">Name Of Responsible Person</label>
                            <input id="responsible_person_add" type="text"
                                class="form-control  @error('responsible_person') border-danger @enderror"
                                placeholder="Name Of Observer Person" wire:model="responsible_person">
                        </div>
                    </div>

                    <div class="col-md-3 form-group">
                        <label title="signature of responsible person" class="@error('sign_resp_person') text-danger @enderror">Signature:</label>

                        <div class="form-check form-check-inline form-control border @error('sign_resp_person') border-danger @enderror">
                            <input wire:model='sign_resp_person' class="form-check-input ml-2" type="checkbox" id="completedbysignature_add" value="1">
                            <label class="form-check-label" for="completedbysignature_add">check me verify</label>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="closed_dt_add" class="@error('closed_dt') text-danger @enderror">Close Date/Time</label>
                            {{-- <input type="datetime-local" name="" id=""> --}}
                            <input id="closed_dt_add" type="datetime-local"
                                class="form-control  @error('closed_dt') border-danger @enderror"
                                placeholder="close data and time" wire:model="closed_dt">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="remarks_add" class="@error('remarks') text-danger @enderror">Remark</label>
                            <input id="remarks_add" type="text"
                                class="form-control  @error('remarks') border-danger @enderror"
                                placeholder="Write your remark" wire:model="remarks">
                        </div>
                    </div>

                    <hr class="text-secondary w-100">
                    <div class="col-12">
                        <div class="form-group">
                            <button wire:click='clearValuesandValidation()' type="button" class="btn btn-danger btn-sm"
                                data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
