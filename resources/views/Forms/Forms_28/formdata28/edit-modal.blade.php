<div class="modal fade editForm28" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit / Update EHS OBSERVATION </h5>
                <button wire:click='clearallValuesandValidation()' type="button" class="close"
                    data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="update" class="row g-3">

                    {{-- formdata_16s detail start --}}
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="project"
                                class="form-label @error('formdata_16s_id_fk') text-danger @enderror">Name
                                @error('formdata_16s_id_fk') <i class="text-danger fas fa-times-circle"></i>@enderror
                            </label>

                            <select wire:model="formdata_16s_id_fk"
                                class="form-control @error('formdata_16s_id_fk') border-danger @enderror">
                                <option selected disabled value="0">Injured Victim Name</option>
                                @foreach ($form16data as $item)
                                    <option value="{{ $item->formdata_16s_id }}">{{ $item->injuredvictim_name }}
                                    </option>
                                @endforeach
                            </select>
                            {{-- {{ $formdata_16s_id_fk }} --}}
                        </div>
                    </div>


                    <div class="col-md-3 col-sm-6">
                        <div class="form-controp">

                            <label for="" class="">Injury To</label>
                            {{-- <input type="text" class="form-control" placeholder="Injury to"
                            wire:model="injury_to_f16.potential_injurytos_other_f16" readonly> --}}
                            <div class="form-control">{{ $injury_to_f16 }}
                                {{ $potential_injurytos_other_f16 ? '- ' . $potential_injurytos_other_f16 : '' }}
                            </div>

                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="form-controp">
                            <label for="" class="">ID Card No</label>
                            {{-- <input type="text" class="form-control" placeholder="Id No." wire:model="eml_id_no_f16"
                                readonly> --}}
                            <div class="form-control"> {{ $eml_id_no_f16 }}</div>
                            {{-- <span class="text-danger">
                                    @error('sproject_location')
                                        {{ $message }}@enderror</span> --}}
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        {{-- add sume content latter --}}
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="form-controp">
                            <label for="" class="">Designation</label>
                            {{-- <input type="text" class="form-control" placeholder="designation"
                                wire:model="designation_f16" readonly> --}}
                            <div class="form-control"> {{ $designation_f16 }}</div>
                            {{-- <span class="text-danger">
                                    @error('sproject_location')
                                        {{ $message }}@enderror</span> --}}
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="form-controp">
                            <label for="" class="">Incident Date</label>
                            {{-- <input type="text" class="form-control" placeholder="Id No."
                                wire:model="doincident_dt_f16" readonly> --}}
                            <div class="form-control"> {{ $doincident_dt_f16 }}</div>
                            {{-- <span class="text-danger">
                                    @error('sproject_location')
                                        {{ $message }}@enderror</span> --}}
                        </div>
                    </div>

                    <hr class="text-secondary w-100">

                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label @error('incident_description') text-danger @enderror"
                                for="incidentDescription">Description Of Incident: (Attach sketch and additional sheets,
                                if necessary) @error('incident_description') <i
                                    class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <textarea wire:model='incident_description'
                                class="form-control @error('incident_description') border-danger @enderror"
                                id="incidentDescription" rows="3" maxlength="500"></textarea>
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="form-group">
                            {{-- <div class="custom-file">
                                <input wire:model='inv_photos' type="file" class="custom-file-input form-control"
                                    id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01"></label>
                            </div> --}}
                            <label for="invPhoto">Click to Upload file <b class="text-danger"> click </b></label>
                            <input type="text" wire:model='imgsId' hidden> {{-- access the img id--}}
                            <input wire:model='inv_photos' type="file" id="invPhoto" hidden>
                            <div class="form-control" style="height: 10rem; overflow-y: auto;">
                                @if (!$inv_photos)
                                    Image priew show hare

                                @endif
                                <div class="row">
                                    @foreach ($inv_photos as $key => $photo)

                                        <div class="col-md-4" style="margin-top: .5rem">
                                            <div class="row">
                                                <div class="col-6">
                                                    <a href="{{ $photo->temporaryUrl() }}" class=" d-block">
                                                        <img src="{{ $photo->temporaryUrl() }}"
                                                            alt="{{ $photo->temporaryUrl() }}" class="img-fluid"
                                                            style="object-fit: contain">
                                                    </a>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="img title"> Image Title</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Img title"
                                                            wire:model='inv_imgTitles.{{ $key }}'>
                                                        <div class="mt-2">
                                                            <input type="button"
                                                                wire:click='removeImg({{ $key }})'
                                                                class="btn btn-outline-danger btn-sm rounded w-100"
                                                                value="remove">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    @endforeach

                                </div>
                            </div>

                        </div>

                        {{-- old img --}}
                        <div class="form-group col-12 {{ count($oldphotosLocation) == 0 ? 'd-none' : '' }}">
                            <label for="" title="image preview">Old imgages preview</label>
                            <div class="form-control" style="height: 10rem; overflow-y: auto;">
                                <div class="row">


                                    @foreach ($oldphotosLocation as $key => $photo)

                                        <div class="col-md-4" style="margin-top: .5rem">
                                            <div class="row">
                                                <div class="col-6">
                                                    <a href="{{ Storage::url($photo) }}" class=" d-block">
                                                        <img src="{{ Storage::url($photo) }}"
                                                            alt="{{ Storage::url($photo) }}" class="img-fluid"
                                                            style="object-fit: contain">
                                                    </a>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="img title"> Image Title</label>
                                                        <input disabled type="text" class="form-control"
                                                            placeholder="Img title"
                                                            wire:model='inv_oldimgTitles.{{ $key }}'>
                                                        {{-- <div class="mt-2">
                                                            <input type="button"
                                                                wire:click='removeImg({{ $key }})'
                                                                class="btn btn-outline-danger btn-sm rounded w-100"
                                                                value="remove">
                                                        </div> --}}
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label @error('coworker_statement') text-danger @enderror"
                                for="coworkerStatement">Statement of Co-Worker(s) @error('coworker_statement')
                                <i class="text-danger fas fa-times-circle"></i>@enderror
                            </label>
                            <textarea wire:model='coworker_statement'
                                class="form-control @error('coworker_statement') border-danger @enderror"
                                id="coworkerStatement" rows="3" maxlength="500"></textarea>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label @error('concernedsupervisor_statement') text-danger @enderror"
                                for="supervisorStatement">Statement of Concerned Supervisor
                                @error('concernedsupervisor_statement')
                                <i class="text-danger fas fa-times-circle"></i>@enderror
                            </label>
                            <textarea wire:model='concernedsupervisor_statement'
                                class="form-control @error('concernedsupervisor_statement') border-danger @enderror"
                                id="supervisorStatement" rows="3" maxlength="500"></textarea>
                        </div>
                    </div>

                    <div class="col-12">
                        {{-- 8.	Immediate causes: What substandard actions & conditions caused or could have caused the event --}}
                        <div class="form-group">
                            <label class="form-label @error('substandaction_id_fk') text-danger @enderror"
                                for="supervisorStatement">Immediate causes: What substandard actions & conditions caused
                                or could have caused the event @error('substandaction_id_fk')<i
                                    class="text-danger fas fa-times-circle"></i>@enderror
                            </label>
                            <div class="row text-center">
                                <div class="col-md-6 col-sm-12 border @error('substandaction_ids') border-danger @enderror">
                                    <label for="actions" class="@error('substandaction_ids') text-danger @enderror"><b><u>SUBSTANDARD
                                                ACTIONS</u></b></label>

                                    <div class="text-justify">
                                        @foreach ($substandactiondata as $item)
                                            {{-- <ul>
                                            <li><input type="checkbox" id="" v></li>
                                        </ul> --}}

                                            <div class="form-check my-1 ml-2">
                                                <input wire:model.defer='substandaction_ids' class="form-check-input"
                                                    type="checkbox" value="{{ $item->substandaction_id }}"
                                                    id="subaction{{ $item->substandaction_id }}_edit">
                                                <label class="ml-3 form-check-label"
                                                    for="subaction{{ $item->substandaction_id }}_edit">
                                                    {{ $item->substandaction_id }}.
                                                    {{ $item->substandaction_description }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 border @error('substandcondition_ids') border-danger @enderror">
                                    <label for="condition" class="@error('substandcondition_ids') text-danger @enderror"><b><u>SUBSTANDARD
                                                CONDITIONS</u></b></label>

                                    <div class="text-justify">
                                        @foreach ($substandconditiondata as $item)
                                            {{-- <ul>
                                                        <li><input type="checkbox" id="" v></li>
                                                    </ul> --}}

                                            <div class="form-check my-1 ml-2">
                                                <input wire:model.defer='substandcondition_ids' class="form-check-input"
                                                    type="checkbox" value="{{ $item->substandcondition_id }}"
                                                    id="subcondition{{ $item->substandcondition_id }}_edit">
                                                <label class="ml-3 form-check-label"
                                                    for="subcondition{{ $item->substandcondition_id }}_edit">
                                                    {{ $item->substandcondition_id }}.
                                                    {{ $item->substandcondition_description }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label @error('root_cause') text-danger @enderror" for="rootCouse">What
                                are the root causes of this Incident @error('root_cause')
                                <i class="text-danger fas fa-times-circle"></i>@enderror
                            </label>
                            <textarea wire:model='root_cause'
                                class="form-control @error('root_cause') border-danger @enderror" id="rootCouse"
                                rows="3" maxlength="500"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label @error('remedial_actions') text-danger @enderror"
                                for="remedialAction">What remedial actions have been taken to prevent recurrence
                                ?@error('remedial_actions')
                                <i class="text-danger fas fa-times-circle"></i>@enderror
                            </label>
                            <textarea wire:model='remedial_actions'
                                class="form-control @error('remedial_actions') border-danger @enderror"
                                id="remedialAction" rows="3" maxlength="500"></textarea>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label @error('comment_remedial_actions') text-danger @enderror"
                                for="commentRemedialAction">Comments on remedial actions taken
                                @error('comment_remedial_actions')
                                <i class="text-danger fas fa-times-circle"></i>@enderror
                            </label>
                            <textarea wire:model='comment_remedial_actions'
                                class="form-control @error('comment_remedial_actions') border-danger @enderror"
                                id="commentRemedialAction" rows="3" maxlength="500"></textarea>
                        </div>
                    </div>


                    <hr class="text-secondary w-100">
                    {{-- last info start --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="siteSefetyName"
                                class="form-label  @error('site_safety_in_charge_name') text-danger @enderror"
                                title="Completed by (Site Engineer) Name">Site Safety In charge Name
                                @error('site_safety_in_charge_name') <i
                                    class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <input wire:model='site_safety_in_charge_name' type="text"
                                class="form-control @error('site_safety_in_charge_name') border-danger @enderror"
                                id="siteSefetyName">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="siteSefetySignature"
                                class="form-label  @error('site_safety_in_charge_signature') text-danger @enderror"
                                title="Completed by (Site Engineer) signature">Signalture
                                @error('site_safety_in_charge_signature') <i
                                    class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <input wire:model='site_safety_in_charge_signature' type="text"
                                class="form-control @error('site_safety_in_charge_signature') border-danger @enderror"
                                id="siteSefetySignature">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectManagerName"
                                class="form-label @error('project_manager') text-danger @enderror"
                                title="Completed by (Site Engineer) Name">Project Manager @error('project_manager')
                                <i class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <input wire:model='project_manager' type="text" class="form-control @error('project_manager') border-danger @enderror""
                                id="projectManagerName">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectManagerSignature"
                                class="form-label  @error('project_manager_signature') text-danger @enderror"
                                title="Completed by (Site Engineer) signature">Signalture
                                @error('project_manager_signature') <i
                                    class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <input wire:model='project_manager_signature' type="text" class="form-control @error('project_manager_signature') border-danger @enderror"
                                id="projectManagerSignature">
                        </div>
                    </div>
                    {{-- last info end --}}

                    <div class="col-12">
                        <div class="form-group">
                            <button wire:click='clearallValuesandValidation()' type="button"
                                class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
