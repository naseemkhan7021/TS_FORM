<div class="modal fade addForm01" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Hazard Identification & Risk Assessment (Hira) Register</h5>
                <button wire:click='clearValuesandValidation()' type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div  wire:loading.delay.longest>
                    <div class="spinner-border text-primary m-auto d-block" role="status">
                        <span class="sr-only m-auto">Loading...</span>
                    </div>
                </div>
                <form wire:submit.prevent="save" class="row g-3">

                    {{-- project detail start --}}
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="project name"
                                class="form-label @error('iproject_id_fk') text-danger @enderror">Project</label>

                            <select wire:model="iproject_id_fk" class="form-control @error('iproject_id_fk') border border-danger @enderror">
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
                                wire:model="sproject_location" readonly>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="form-controp">
                            <label for="" class="">Data/Time</label>
                            <input type="text" class="form-control" wire:model="currentData" readonly>

                        </div>
                    </div>
                    {{-- project detail end --}}

                    {{-- activity --}}
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for="" class="form-label @error('B_activity_id_fk') text-danger @enderror">B_Activity</label>

                            <select wire:model="B_activity_id_fk" class="form-control  @error('B_activity_id_fk') border border-danger @enderror">
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
                                class="form-label @error('C_sub_activity_id_fk') text-danger @enderror">C_Sub-Activity</label>
                            <select wire:model="C_sub_activity_id_fk" class="form-control @error('C_sub_activity_id_fk') border border-danger @enderror">
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
                            <label for="" class="form-label @error('D_routine') text-danger @enderror">D_Routine</label>

                            <div class="form-control">
                                <div class="form-check form-check-inline">
                                    <input checked wire:model='D_routine' value="R" class="form-check-input"
                                        name="routine" type="radio" id="routine">
                                    <label class="form-check-label" for="routine">Routine</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input wire:model='D_routine' value="N" class="form-check-input" name="routine"
                                        type="radio" id="none-routine">
                                    <label class="form-check-label" for="none-routine">Non-Routine</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- E_potential_hazard_id_fk --}}
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for=""
                                class="form-label @error('E_potential_hazard_id_fk') text-danger @enderror">E_Potential</label>
                            <select wire:model="E_potential_hazard_id_fk" class="form-control @error('E_potential_hazard_id_fk') border border-danger @enderror">
                                <option selected disabled value="0">Select Potential Hazard</option>
                                @foreach ($potentialHazardData as $item)
                                    <option wire:key='potensialH_{{ $item->potential_hazard_id }}'
                                        value="{{ $item->potential_hazard_id }}">
                                        {{ $item->potential_hazard_description }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- F_probable_consequence_id_fk --}}
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for=""
                                class="form-label @error('F_probable_consequence_id_fk') text-danger @enderror">F_Probable</label>
                            <select wire:model="F_probable_consequence_id_fk" class="form-control @error('F_probable_consequence_id_fk') border border-danger @enderror">
                                <option selected disabled value="0">Select Probable Consequence</option>
                                @foreach ($probableConsequenceData as $item)
                                    <option wire:key='Probable_Consequences_{{ $item->probable_consequence_id }}'
                                        value="{{ $item->probable_consequence_id }}">
                                        {{ $item->probable_consequence_description }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- G_causes_id_fk    ****** yaha couses ayega ****** --}}
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for=""
                                class="form-label @error('G_causes_id_fk') text-danger @enderror">G_Causes</label>
                            <select wire:model="G_causes_id_fk"
                                class="form-control @error('G_causes_id_fk') border border-danger @enderror">
                                <option selected disabled value="0">Select Causes</option>
                                @foreach ($cause01Data as $item)
                                    <option wire:key='Causes_{{ $item->causes_id }}'
                                        value="{{ $item->causes_id }}">
                                        {{ $item->causes_description }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- G1_sub_causes_id_fk --}}
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <div class="">
                                <label for=""
                                    class="form-label @error('G1_sub_causes_id_fks') text-danger @enderror">G1_Sub_Causes</label>
                                <select size="1" name="sub_cause" data-placeholder="Select Sub Causes"
                                    wire:model='G1_sub_causes_id_fks'
                                    class="form-control custom-select @error('G1_sub_causes_id_fks') border border-danger @enderror"
                                    id="select2-dropdown" multiple>
                                    {{-- <option selected disabled value="0">Select Sub Causes</option> --}}
                                    @foreach ($subcause01Data as $item)
                                        <option wire:key='Sub_Causes_{{ $item->sub_causes_id }}'
                                            value="{{ $item->sub_causes_id }}">
                                            {{ $item->sub_causes_description }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- H_preventive_incident_control_id_fk --}}
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for=""
                                class="form-label @error('H_preventive_incident_control_id_fk') text-danger @enderror">H_Preventive</label>
                            <select wire:model="H_preventive_incident_control_id_fk" class="form-control @error('H_preventive_incident_control_id_fk') border border-danger @enderror">
                                <option selected disabled value="0">Select Preventive Incident Control</option>
                                @foreach ($preventiveinciData as $item)
                                    <option
                                        wire:key='Preventive_Incident_{{ $item->preventive_incident_control_id }}'
                                        value="{{ $item->preventive_incident_control_id }}">
                                        {{ $item->preventive_incident_control_description }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- I_consequences_controls_id_fk --}}
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for=""
                                class="form-label @error('I_consequences_controls_id_fk') text-danger @enderror">I_Consequences</label>
                            <select wire:model="I_consequences_controls_id_fk"
                                class="form-control  @error('I_consequences_controls_id_fk') border border-danger @enderror">
                                <option selected disabled value="0">Select Consequences Controls</option>
                                @foreach ($consequencesCrlData as $item)
                                    <option wire:key='Consequences_Controls_{{ $item->consequences_controls_id }}'
                                        value="{{ $item->consequences_controls_id }}">
                                        {{ $item->consequences_controls_description }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- J_risk_probability_id_fk --}}
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for=""
                                class="form-label @error('J_risk_probability_id_fk') text-danger @enderror">J_Risk
                                Probability</label>
                            <select wire:model="J_risk_probability_id_fk"
                                class="form-control @error('J_risk_probability_id_fk') border border-danger @enderror">
                                <option selected disabled value="0">Select Risk Probability Number</option>

                                @foreach ($riskPorbabilityData as $item)
                                    <option wire:key='jRisk_Probability_{{ $item->risk_probability_id }}'
                                        value="{{ $item->risk_probability_id }}">
                                        {{ $item->risk_probability_description }} -
                                        {{ $item->risk_probability_value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- K_risk_consequence_id_fk --}}
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for=""
                                class="form-label @error('K_risk_consequence_id_fk') text-danger @enderror">K_Risk
                                Consequence</label>
                            <select wire:model="K_risk_consequence_id_fk"
                                class="form-control @error('K_risk_consequence_id_fk') border border-danger @enderror">
                                <option selected disabled value="0">Select Risk Consequence Number</option>
                                @foreach ($riskConsequenceData as $item)
                                    <option wire:key='rRisk_Consequences_{{ $item->risk_consequence_id }}'
                                        value="{{ $item->risk_consequence_id }}">
                                        {{ $item->risk_consequence_description }} -
                                        {{ $item->risk_consequence_value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- L_duration_of_exposure_id_fk --}}
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for=""
                                class="form-label @error('L_duration_of_exposure_id_fk') text-danger @enderror">L_Duration
                                Of Exposure</label>
                            <select wire:model="L_duration_of_exposure_id_fk"
                                class="form-control @error('L_duration_of_exposure_id_fk') border border-danger @enderror">
                                <option selected disabled value="0">Select Risk Duration Number</option>
                                @foreach ($durationOfExpData as $item)
                                    <option wire:key='lRisk_Duration_{{ $item->duration_of_exposure_id }}'
                                        value="{{ $item->duration_of_exposure_id }}">
                                        {{ $item->duration_of_exposure_description }} -
                                        {{ $item->duration_of_exposure_value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    {{-- M_any_legal_obligation_to_the_risk_assessment --}}
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label title="Any Legal Obligation To The Risk Assessment " for=""
                                class="form-label @error('M_any_legal_obligation_to_the_risk_assessment') text-danger @enderror">M_Any
                                Legal...</label>

                            <div class="form-control">
                                <div class="form-check form-check-inline">
                                    <input wire:model='M_any_legal_obligation_to_the_risk_assessment' value="YES"
                                        class="form-check-input" name="legal-obligation" type="radio"
                                        id="legal-obligation-ys">
                                    <label class="form-check-label" for="legal-obligation-ys">YES</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input checked wire:model='M_any_legal_obligation_to_the_risk_assessment' value="NO"
                                        class="form-check-input" name="legal-obligation" type="radio"
                                        id="legal-obligation-n">
                                    <label class="form-check-label" for="legal-obligation-n">NO</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- N_risk_quantum --}}
                    <div class="col-md-1 col-sm-6">
                        <div class="form-controp">
                            <label for="" title="Risk_Quantum" class="@error('N_risk_quantum') text-danger @enderror"> N_RQ...</label>
                            <input type="text" class="form-control @error('N_risk_quantum') border border-danger @enderror" wire:model="N_risk_quantum" readonly>
                        </div>
                    </div>

                    {{-- O_risk_acceptable_non_acceptable --}}
                    <div class="col-md-2 col-sm-6">
                        <div class="form-controp">
                            <label for="" title="Risk Acceptable / Non Acceptable"
                                class="@error('O_risk_acceptable_non_acceptable') text-danger @enderror"> O_Risk
                                Acceptable/Non...
                                @error('O_risk_acceptable_non_acceptable') <i
                                    class="text-danger fas fa-times-circle"></i>@enderror</label>
                            {{-- <div
                                class="form-control text-white {{ $this->N_risk_quantum && $this->N_risk_quantum > 29 ? 'btn-danger' : 'btn-success' }} ">
                                <span class="">
                                    {{ $this->O_risk_acceptable_non_acceptable }}
                                </span>
                            </div> --}}
                            <input type="text" class="form-control text-white {{ $this->N_risk_quantum && $this->N_risk_quantum > 29 ? 'bg-danger' : 'bg-success' }}" readonly value="{{$this->O_risk_acceptable_non_acceptable}}">
                        </div>
                    </div>

                    <hr class="text-secondary w-100">


                    {{-- if not Acceptable --}}
                    {{-- {{$this->ifnotAcceptable ? 'd-block' : 'd-none'}} <-- this code will use after cunfirm from T&S --}} 
                    <div class="col-12" >
                        <h5><strong>If Not Acceptable</strong></h5>
                        <div class="row g-3 ">
                            {{-- P_no_of_person_believed_to_be_affected --}}
                            <div class="col-md-1">
                                <div class="form-controp">
                                    <label for=""
                                        title="For Non acceptable risk, No. of person believed to be affected "
                                        class="">
                                        P_No.OfPe...</label>
                                    <input type="text"
                                        class="form-control danger "
                                        wire:model="P_no_of_person_believed_to_be_affected">
                                </div>
                            </div>

                            {{-- Q_actions_as_per_hierarchy_of_control  here will see --}}

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" title="Actions_As_Per_Hierarchy_Of_Control">Q_Actions_As...</label>
                                    <div class="form-control">
                                        @foreach ($referGuidewordData as $item)
                                            
                                        <div class="form-check form-check-inline">
                                            <input wire:model='Q_actions_as_per_hierarchy_of_control' class="form-check-input" type="checkbox" id="action_hirarchy_{{$item->refer_guidewords_id}}" 
                                            value="{{$item->refer_guidewords_id}}">
                                            <label title="{{$item->refer_guidewords_desc}}" class="form-check-label" for="action_hirarchy_{{$item->refer_guidewords_id}}">{{$item->refer_guidewords_abbr}}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>

                            {{-- R_risk_probability --}}
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                    <label for=""
                                        class="form-label">R_Risk
                                        Probability</label>
                                    <select wire:model="R_risk_probability"
                                        class="form-control">
                                        <option selected disabled value="0">Select Risk Probability Number</option>

                                        @foreach ($riskPorbabilityData as $item)
                                            <option wire:key='rR_Probability_{{ $item->risk_probability_id }}'
                                                value="{{ $item->risk_probability_id }}">
                                                {{ $item->risk_probability_description }} -
                                                {{ $item->risk_probability_value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- S_risk_consequence --}}
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                    <label for=""
                                        class="form-label">S_Risk
                                        Consequence</label>
                                    <select wire:model="S_risk_consequence"
                                        class="form-control">
                                        <option selected disabled value="0">Select Risk Consequence Number</option>
                                        @foreach ($riskConsequenceData as $item)
                                            <option wire:key='sRisk_Consequences_{{ $item->risk_consequence_id }}'
                                                value="{{ $item->risk_consequence_id }}">
                                                {{ $item->risk_consequence_description }} -
                                                {{ $item->risk_consequence_value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- T_duration --}}
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                    <label for=""
                                        class="form-label">T_Duration
                                        Of Exposure</label>
                                    <select wire:model="T_duration"
                                        class="form-control ">
                                        <option selected disabled value="0">Select Risk Duration Number</option>
                                        @foreach ($durationOfExpData as $item)
                                            <option wire:key='tRisk_Durations_{{ $item->duration_of_exposure_id }}'
                                                value="{{ $item->duration_of_exposure_id }}">
                                                {{ $item->duration_of_exposure_description }} -
                                                {{ $item->duration_of_exposure_value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- U_risk_quantum --}}
                            <div class="col-md-1 col-sm-6">
                                <div class="form-group">
                                    <label title="Risk Quantum" for=""
                                        class=" ">
                                        U_R.Q...</label>
                                    <input type="text" class="form-control" wire:model="U_risk_quantum" readonly>
                                </div>
                            </div>

                            {{-- V_risk_acceptable_non_acceptable --}}
                            <div class="col-md-2 col-sm-6">
                                <div class="form-controp">
                                    <label for="" title="Risk Acceptable / Non Acceptable"
                                        class="">
                                        V_Risk
                                        Acceptable/Non...</label>
                                    {{-- <div
                                        class="form-control text-white {{ $this->U_risk_quantum && $this->U_risk_quantum > 29 ? 'btn-danger' : 'btn-success' }} ">
                                        <span class="">
                                            {{ $this->V_risk_acceptable_non_acceptable }}
                                        </span>
                                    </div> --}}
                                    <input type="text" class="form-control text-white {{ $this->U_risk_quantum && $this->U_risk_quantum > 29 ? 'bg-danger' : 'bg-success' }}" readonly value="{{$this->V_risk_acceptable_non_acceptable}}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="text-secondary w-100">
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for=""
                                class="form-label @error('administrative_control_preventive_id_fk') text-danger @enderror">Administrative_Control_Preventive</label>
                            <select  wire:model="administrative_control_preventive_id_fk"
                                class="form-control @error('administrative_control_preventive_id_fk') border border-danger @enderror ">
                                <option selected disabled value="0">Select Administrative Ctr Pre</option>
                                @foreach ($adminstrativeCtrPreData as $item)
                                    <option wire:key='tRisk_Durations_{{ $item->administrative_control_preventive_id }}'
                                        value="{{ $item->administrative_control_preventive_id }}">
                                        {{ $item->administrative_control_preventive_description }} -
                                        {{ $item->administrative_control_preventive_value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for=""
                                class="form-label @error('administrative_control_mitigative_id_fk') text-danger @enderror">Administrative_Control_Mitigative</label>
                            <select  wire:model="administrative_control_mitigative_id_fk"
                                class="form-control @error('administrative_control_mitigative_id_fk') border border-danger @enderror ">
                                <option selected disabled value="0">Select Administrative Ctr Pre</option>
                                @foreach ($adminstrativeCtrMitData as $item)
                                    <option wire:key='tRisk_Durations_{{ $item->administrative_control_mitigative_id }}'
                                        value="{{ $item->administrative_control_mitigative_id }}">
                                        {{ $item->administrative_control_mitigative_description }} -
                                        {{ $item->administrative_control_mitigative_value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for=""
                                class="form-label @error('engineering_control_id_fk') text-danger @enderror">Engineering Control</label>
                            <select  wire:model="engineering_control_id_fk"
                                class="form-control @error('engineering_control_id_fk') border border-danger @enderror">
                                <option selected disabled value="0">Select Administrative Ctr Pre</option>
                                @foreach ($engineeringCtrData as $item)
                                    <option wire:key='tRisk_Durations_{{ $item->engineering_control_id }}'
                                        value="{{ $item->engineering_control_id }}">
                                        {{ $item->engineering_control_description }} -
                                        {{ $item->engineering_control_value }}
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
