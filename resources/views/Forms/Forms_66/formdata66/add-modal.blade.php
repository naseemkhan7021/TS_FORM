<div class="modal fade addForm66" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Data</h5>
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
                            <label for="project name"
                                class="form-label @error('iproject_id_fk') text-danger @enderror">Project</label>

                            <select wire:model.defer="iproject_id_fk"
                                class="form-control @error('iproject_id_fk') border border-danger @enderror">
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

                            <label for="" class="">Location</label>
                            <input type="text" class="form-control" placeholder="Location"
                                wire:model.defer="sproject_location" readonly>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="form-controp">
                            <label for="" class="">Data/Time</label>
                            <input type="text" class="form-control" wire:model.defer="currentDate" readonly>

                        </div>
                    </div>
                    {{-- project detail end --}}

                    {{-- activity --}}
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for=""
                                class="form-label @error('B_activity_id_fk') text-danger @enderror">B_Activity</label>

                            <select wire:model.defer="B_activity_id_fk"
                                class="form-control  @error('B_activity_id_fk') border border-danger @enderror">
                                <option selected disabled value="0">Select Activity</option>
                                @foreach ($activityData as $item)
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
                                class="form-label @error('C_sub_activity_id_fk') text-danger @enderror">C_Sub-Activity</label>
                            <select wire:model.defer="C_sub_activity_id_fk"
                                class="form-control @error('C_sub_activity_id_fk') border border-danger @enderror">
                                <option selected disabled value="0">Select Sub Activity</option>
                                @foreach ($subactivityData as $item)
                                    <option wire:key='subActiveity_{{ $item->sub_activity_id }}'
                                        value="{{ $item->sub_activity_id }}">{{ $item->sub_activity_description }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- D_environmental_aspect --}}
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for="environmental_aspect_add"
                                class="@error('D_environmental_aspect') text-danger @enderror">D_Environmental_Aspect</label>
                            <textarea wire:model.defer='D_environmental_aspect' name="environmental_aspect"
                                id="environmental_aspect_add"
                                class="form-control @error('D_environmental_aspect') border border-danger @enderror"
                                rows="1"></textarea>
                        </div>
                    </div>


                    {{-- E_environmental_impact_id_fk --}}
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for=""
                                class="form-label @error('E_environmental_impact_id_fk') text-danger @enderror">E_Environmental_Impact</label>
                            <select wire:model.defer="E_environmental_impact_id_fk"
                                class="form-control @error('E_environmental_impact_id_fk') border border-danger @enderror">
                                <option selected disabled value="0">Select Environmetal impact</option>
                                @foreach ($environmetalimpactData as $item)
                                    <option wire:key='environmental_{{ $item->environmental_impact_id }}_add'
                                        value="{{ $item->environmental_impact_id }}">
                                        {{ $item->environmental_impact_value }}.
                                        {{ $item->environmental_impact_description }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- F_condition_of_impact --}}
                    <div class="col-md-2 col-sm-6">
                        <div class="form-group">
                            <label for=""
                                class="form-label @error('F_condition_of_impact') text-danger @enderror">F_condition of
                                impact</label>

                            <div class="form-control @error('F_condition_of_impact') border border-danger @enderror">
                                <div class="form-check form-check-inline">
                                    <input checked wire:model.defer='F_condition_of_impact' value="A" class="form-check-input"
                                        name="routine" type="radio" id="condImpactA_add">
                                    <label class="form-check-label" for="condImpactA_add">A</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input wire:model.defer='F_condition_of_impact' value="N" class="form-check-input"
                                        name="routine" type="radio" id="condImpactN_add">
                                    <label class="form-check-label" for="condImpactN_add">N</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input wire:model.defer='F_condition_of_impact' value="E" class="form-check-input"
                                        name="routine" type="radio" id="condImpactE_add">
                                    <label class="form-check-label" for="condImpactE_add">E</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- G_existing_controls_as_per_hierarchy --}}
                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <label title="G_existing_controls_as_per_hierarchy" for="existing_controls_add"
                                class="@error('G_existing_controls_as_per_hierarchy') text-danger @enderror">G_existing_...</label>
                            <textarea wire:model.defer='G_existing_controls_as_per_hierarchy' name="existing_controls"
                                id="existing_controls_add"
                                class="form-control @error('G_existing_controls_as_per_hierarchy') border border-danger @enderror"
                                rows="1"></textarea>
                        </div>
                    </div>


                    {{-- H_organization_requirement_id_fk --}}
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for=""
                                class="form-label @error('H_organization_requirement_id_fk') text-danger @enderror">H_Organization_Requirement</label>
                            <select wire:model.defer="H_organization_requirement_id_fk"
                                class="form-control @error('H_organization_requirement_id_fk') border border-danger @enderror">
                                <option selected disabled value="0">Select Organization Requirement</option>
                                @foreach ($organizationrequirementData as $item)
                                    <option wire:key='orgrequirement_{{ $item->organization_requirement_id }}_add'
                                        value="{{ $item->organization_requirement_id }}">
                                        {{ $item->organization_requirement_value }}.
                                        {{ $item->organization_requirement_description }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="col-md-3 col-sm-6"></div>

                    {{-- I_scale_of_impact_id_fk --}}
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for=""
                                class="form-label @error('I_scale_of_impact_id_fk') text-danger @enderror">I_Scale_Of_Impact</label>
                            <select wire:model="I_scale_of_impact_id_fk"
                                class="form-control @error('I_scale_of_impact_id_fk') border border-danger @enderror">
                                <option selected disabled value="0">Select Scale of Impact Number</option>

                                @foreach ($scaleimpacttData as $item)
                                    <option wire:key='scale_impact_{{ $item->scale_of_impact_id }}'
                                        value="{{ $item->scale_of_impact_id }}">
                                        {{ $item->scale_of_impact_description }} -
                                        {{ $item->scale_of_impact_value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- J_severty_of_impact_id_fk --}}
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for=""
                                class="form-label @error('J_severty_of_impact_id_fk') text-danger @enderror">J_Severty_Of_Impact</label>
                            <select wire:model="J_severty_of_impact_id_fk"
                                class="form-control @error('J_severty_of_impact_id_fk') border border-danger @enderror">
                                <option selected disabled value="0">Select Severty Impact Number</option>
                                @foreach ($severtyimpactData as $item)
                                    <option wire:key='severty_impact_{{ $item->severty_of_impact_id }}'
                                        value="{{ $item->severty_of_impact_id }}">
                                        {{ $item->severty_of_impact_description }} -
                                        {{ $item->severty_of_impact_value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- K_duration_of_impact_id_fk --}}
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for=""
                                class="form-label @error('K_duration_of_impact_id_fk') text-danger @enderror">K_Duration_Of_Impact</label>
                            <select wire:model="K_duration_of_impact_id_fk"
                                class="form-control @error('K_duration_of_impact_id_fk') border border-danger @enderror">
                                <option selected disabled value="0">Select Duration of Impact Number</option>
                                @foreach ($durationoimpactData as $item)
                                    <option wire:key='duration_impact_{{ $item->duration_of_impact_id }}'
                                        value="{{ $item->duration_of_impact_id }}">
                                        {{ $item->duration_of_impact_description }} -
                                        {{ $item->duration_of_impact_value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- L_consequence --}}
                    <div class="col-md-1 col-sm-6">
                        <div class="form-controp">
                            <label for="" title="L_consequence" class="@error('L_consequence') text-danger @enderror">
                                L_Coqc...</label>
                            <input type="text"
                                class="form-control @error('L_consequence') border border-danger @enderror"
                                wire:model="L_consequence" readonly>
                        </div>
                    </div>

                    {{-- P1_cut_off_value --}}
                    <div class="col-md-2 col-sm-6">
                        <div class="form-controp">
                            <label for="" title="P1_Cut_Off_Value" class="@error('P1_cut_off_value') text-danger @enderror">
                                P1_cutOff...</label>
                            <input type="text"
                                class="form-control @error('P1_cut_off_value') border border-danger @enderror"
                                wire:model.defer="P1_cut_off_value" readonly>
                        </div>
                    </div>

                    {{-- M_probability_id_fk --}}
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for=""
                                class="form-label @error('M_probability_id_fk') text-danger @enderror">M_Probability</label>
                            <select wire:model="M_probability_id_fk"
                                class="form-control @error('M_probability_id_fk') border border-danger @enderror">
                                <option selected disabled value="0">Select Probability Number</option>
                                @foreach ($probabilityData as $item)
                                    <option wire:key='probability_{{ $item->probability_id }}'
                                        value="{{ $item->probability_id }}">
                                        {{ $item->probability_description }} -
                                        {{ $item->probability_value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- N_impact_score --}}
                    <div class="col-md-1 col-sm-6">
                        <div class="form-controp">
                            <label for="" title="N_Impact_Score" class="@error('N_impact_score') text-danger @enderror">
                                N_imcS...</label>
                            <input type="text"
                                class="form-control @error('N_impact_score') border border-danger @enderror"
                                wire:model.defer="N_impact_score" readonly>
                        </div>
                    </div>


                    {{-- O_significance_score_level --}}
                    <div class="col-md-2 col-sm-6">
                        <div class="form-controp">
                            <label for="" title="Significance / NonSignificance"
                                class="@error('O_significance_score_level') text-danger @enderror"> O_signifi/Non...
                                @error('O_significance_score_level') <i
                                    class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <input type="text"
                                class="form-control text-white  {{ $this->O_significance_score_level && $this->O_significance_score_level == 'Nonsignificant' ? 'bg-success' : 'bg-danger' }}"
                                readonly value="{{ $this->O_significance_score_level }}">
                        </div>
                    </div>

                    {{-- P_additional_control --}}
                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <label title="P_additional_control" for="additionControl_add"
                                class="@error('P_additional_control') text-danger @enderror">P_addition_...</label>
                            <textarea wire:model.defer='P_additional_control' name="additionControl" id="additionControl_add"
                                class="form-control @error('P_additional_control') border border-danger @enderror"
                                rows="1"></textarea>
                        </div>
                    </div>

                    {{-- Q_risk_rating_priority --}}
                    <div class="col-md-2 col-sm-6">
                        <div class="form-controp">
                            <label for="" title="Q_Risk_Rating_Priority"
                                class="@error('Q_risk_rating_priority') text-danger @enderror">Q_Risk_Rating..
                                @error('Q_risk_rating_priority') <i
                                    class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <input type="text"
                                class="form-control text-white  {{ $this->L_consequence && $this->L_consequence != '' ? 'bg-danger' : '' }}"
                                readonly value="{{ $this->Q_risk_rating_priority }}">
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
