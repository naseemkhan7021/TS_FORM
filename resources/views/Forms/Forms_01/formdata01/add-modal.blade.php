<div class="modal fade addForm01" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Hira</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="save" class="row g-3">

                    {{-- project detail start --}}
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="project name"
                                class="form-label @error('iproject_id_fk') text-danger @enderror">Project
                                @error('iproject_id_fk') <i
                                    class="text-danger fas fa-times-circle"></i>@enderror</label>

                            <select wire:model="iproject_id_fk" class="form-control">
                                <option selected disabled value="0">Project name</option>
                                @foreach ($prjectData as $item)
                                    <option value="{{ $item->iproject_id }}">{{ $item->sproject_name }}</option>
                                @endforeach
                            </select>
                            {{-- {{ $iproject_id_fk }} --}}
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="form-controp">

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

                    <div class="col-md-3 col-sm-6">
                        <div class="form-controp">
                            <label for="" class="@error('currentData') text-danger @enderror">Data/Time
                                @error('currentData') <i class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <input type="text" class="form-control" wire:model="currentData" readonly>

                        </div>
                    </div>
                    {{-- project detail end --}}

                    {{-- activity --}}
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for="" class="form-label @error('B_activity_id_fk') text-danger @enderror">B_Activity
                                @error('B_activity_id_fk') <i
                                    class="text-danger fas fa-times-circle"></i>@enderror</label>

                            <select wire:model="B_activity_id_fk" class="form-control">
                                <option selected disabled value="0">Select Activity</option>
                                @foreach ($activity01Data as $item)
                                    <option wire:key='Activeity_{{ $item->activity_id }}'
                                        value="{{ $item->activity_id }}">{{ $item->activity_description }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- sub-activity --}}
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for=""
                                class="form-label @error('C_sub_activity_id_fk') text-danger @enderror">C_Sub-Activity
                                @error('C_sub_activity_id_fk') <i
                                    class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <select wire:model="C_sub_activity_id_fk" class="form-control">
                                <option selected disabled value="0">Select Sub Activity</option>
                                @foreach ($subactivity01Data as $item)
                                    <option wire:key='subActiveity_{{ $item->sub_activity_id }}'
                                        value="{{ $item->sub_activity_id }}">{{ $item->sub_activity_description }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- D_routine --}}
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for="" class="form-label @error('D_routine') text-danger @enderror">D_Routine
                                @error('D_routine') <i class="text-danger fas fa-times-circle"></i>@enderror</label>

                            <div class="form-control">
                                <div class="form-check form-check-inline">
                                    <input wire:model='D_routine' value="R" class="form-check-input" name="routine" type="radio" id="routine"
                                        value="option1">
                                    <label class="form-check-label" for="routine">Routine</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input wire:model='D_routine' value="N" class="form-check-input" name="routine" type="radio" id="none-routine"
                                        value="option1">
                                    <label class="form-check-label" for="none-routine">Non-Routine</label>
                                </div>
                            </div>
                        </div>
                    </div>

                     {{-- E_potential_hazard_id_fk --}}
                     <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for=""
                                class="form-label @error('E_potential_hazard_id_fk') text-danger @enderror">E_Potential Hazard
                                @error('E_potential_hazard_id_fk') <i
                                    class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <select wire:model="E_potential_hazard_id_fk" class="form-control">
                                <option selected disabled value="0">Select Potential Hazard</option>
                                @foreach ($potentialHazardData as $item)
                                    <option wire:key='potensialH_{{ $item->potential_hazard_id }}'
                                        value="{{ $item->potential_hazard_id }}">{{ $item->potential_hazard_description }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                     {{-- F_probable_consequence_id_fk --}}
                     <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for=""
                                class="form-label @error('F_probable_consequence_id_fk') text-danger @enderror">F_Probable Consequence
                                @error('F_probable_consequence_id_fk') <i
                                    class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <select wire:model="F_probable_consequence_id_fk" class="form-control">
                                <option selected disabled value="0">Select Probable Consequence</option>
                                @foreach ($probableConsequenceData as $item)
                                    <option wire:key='Probable_Consequences_{{ $item->probable_consequence_id }}'
                                        value="{{ $item->probable_consequence_id }}">{{ $item->probable_consequence_description }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                     {{-- F_probable_consequence_id_fk --}}
                     <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for=""
                                class="form-label @error('F_probable_consequence_id_fk') text-danger @enderror">F_Probable Consequence
                                @error('F_probable_consequence_id_fk') <i
                                    class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <select wire:model="F_probable_consequence_id_fk" class="form-control">
                                <option selected disabled value="0">Select Probable Consequence</option>
                                @foreach ($probableConsequenceData as $item)
                                    <option wire:key='Probable_Consequences_{{ $item->probable_consequence_id }}'
                                        value="{{ $item->probable_consequence_id }}">{{ $item->probable_consequence_description }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                     {{-- H_preventive_incident_control_id_fk --}}
                     <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for=""
                                class="form-label @error('H_preventive_incident_control_id_fk') text-danger @enderror">H_Preventive Incident Control
                                @error('H_preventive_incident_control_id_fk') <i
                                    class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <select wire:model="H_preventive_incident_control_id_fk" class="form-control">
                                <option selected disabled value="0">Select Preventive Incident Control</option>
                                @foreach ($preventiveinciData as $item)
                                    <option wire:key='Probable_Consequences_{{ $item->preventive_incident_control_id }}'
                                        value="{{ $item->preventive_incident_control_id }}">{{ $item->preventive_incident_control_description }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                     {{-- I_consequences_controls_id_fk --}}
                     <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for=""
                                class="form-label @error('I_consequences_controls_id_fk') text-danger @enderror">I_Consequences Controls
                                @error('I_consequences_controls_id_fk') <i
                                    class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <select wire:model="I_consequences_controls_id_fk" class="form-control">
                                <option selected disabled value="0">Select Consequences Controls</option>
                                @foreach ($consequencesCrlData as $item)
                                    <option wire:key='Probable_Consequences_{{ $item->consequences_controls_id }}'
                                        value="{{ $item->consequences_controls_id }}">{{ $item->consequences_controls_description }}
                                    </option>
                                @endforeach
                            </select>
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
