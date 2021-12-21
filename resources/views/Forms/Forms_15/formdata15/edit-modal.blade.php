<div class="modal fade editNearmissreporting" wire:ignore.self tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit / Update Nearmiss Reporting</h5>
                <button wire:click='clearValuesandValidation()' type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
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
                            <label for="" class="@error('doincident_dt') text-danger @enderror">Data/Time
                                @error('doincident_dt') <i class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <input type="text" class="form-control" wire:model="doincident_dt" readonly>

                        </div>
                    </div>

                    {{-- project detail end --}}


                    {{-- injured to who stuff or contrecter start --}}
                    <div class="col-md-6 col-sm-6">
                        <label class="@error('potential_injurytos_fk') text-danger @enderror">Potential Injury to
                            @error('potential_injurytos_fk') <i
                                class="text-danger fas fa-times-circle"></i>@enderror</label>
                        <div class="form-group">
                            <div class="d-flex justify-content-between">
                                @foreach ($potentialinjurytotData as $item)
                                    <div class="form-check form-check-inline">
                                        <input
                                            wire:click="$set('showOtherInput', '{{ $item->potential_injurytos_abbr }}')"
                                            class="form-check-input" name="injuryto" type="radio"
                                            wire:model="potential_injurytos_fk"
                                            value="{{ $item->potential_injurytos_id }}"
                                            id="{{ $item->potential_injurytos_abbr }}">
                                        <label class="form-check-label" for="{{ $item->potential_injurytos_abbr }}">
                                            {{ $item->potential_injurytos_description }}
                                        </label>
                                    </div>
                                @endforeach
                                {{-- if other than disabled this input --}}
                                <div class="input">
                                    <input wire:model='potential_injurytos_other'
                                        {{ $showOtherInput != 'OT' ? 'disabled' : '' }} type="text"
                                        class="mx-1 form-control border" placeholder="what is other">
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- injured to who stuff or contrecter end --}}

                    <div class="col-md-3">

                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for="" class="@error('report_no') text-danger @enderror">Report No
                                @error('report_no') <i class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <input type="text" class="form-control  @error('report_no') border-danger @enderror" placeholder="ID No" wire:model="report_no">
                        </div>
                    </div>

                    {{-- Nature of Potential Injury start --}}
                    <div class="col-12 form-group">
                        <label for="" class="@error('nature_of_potential_injuries_ids') text-danger @enderror"><strong>Nature of Potential Injury:</strong> ( Tick ✓ in the Boxes ) @error('nature_of_potential_injuries_ids') <i class="text-danger fas fa-times-circle"></i>@enderror</label>

                        <div class="row">
                            @foreach ($NatureofpotentialData as $index => $item)
                                <div class="col-md-4 mt-2">
                                    <div class="form-check form-check-inline">
                                        <input wire:model='nature_of_potential_injuries_ids' class="form-check-input"
                                            type="checkbox" id="nature_{{ $item->nature_of_potential_injuries_id }}"
                                            value="{{ $item->nature_of_potential_injuries_id }}">
                                        <label class="form-check-label"
                                            for="nature_{{ $item->nature_of_potential_injuries_id }}">{{ $item->nature_of_potential_injuries_description }}</label>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-md-4 mt-2">
                                <div class="form-check form-check-inline w-100">
                                    {{-- <label class="form-check-label" for="otherNatrue"> </label> --}}
                                    <input wire:model='nature_of_potential_injuries_other'
                                        class="form-check-input form-control " type="text" id="otherNatrue"
                                        placeholder="Details if required:">
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Nature of Potential Injury end --}}


                    {{-- Activity: ( Tick ✓ in the Boxes ) start --}}
                    <div class="col-12 form-group">
                        <label for="" class="@error('activity15s_ids') text-danger @enderror"><strong>Activity:</strong> ( Tick ✓ in the Boxes ) @error('activity15s_ids') <i class="text-danger fas fa-times-circle"></i>@enderror</label>

                        <div class="row">
                            @foreach ($activityData as $index => $item)
                                <div class="col-md-3">
                                    <div class="form-check form-check-inline">
                                        <input wire:model='activity15s_ids' class="form-check-input" type="checkbox"
                                            id="activity_{{ $item->activity15s_id }}"
                                            value="{{ $item->activity15s_id }}">
                                        <label class="form-check-label"
                                            for="activity_{{ $item->activity15s_id }}">{{ $item->activity15s_description }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- Activity: end --}}

                    {{-- Details of Nearmiss start --}}
                    <div class="col-12 form-group">
                        <label for="details" class="@error('details_of_nearmiss') text-danger @enderror"><strong>Details of Nearmiss:</strong></label>
                        <textarea wire:model='details_of_nearmiss' id="details" class="form-control @error('details_of_nearmiss') border-danger @enderror"
                            rows="5"></textarea>
                    </div>
                    {{-- Details of Nearmiss end --}}


                    {{-- Cause: ( Tick ✓ in the Boxes ) start --}}
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="supervisorStatement"><strong>Cause:</strong> ( Tick ✓ in
                                the Boxes )</label>
                            <div class="row text-center">
                                <div class="col-md-6 col-sm-12">
                                    <label for=""
                                        class="@error('imdcause15s_ids') text-danger @enderror"><strong>Immediate
                                            Cause</strong></label>

                                    <div class="text-justify border @error('imdcause15s_ids') border-danger @enderror"">
                                          @foreach ($imdcauseData as $index=> $item)

                                        <div class="form-check my-1 ml-2">
                                            <input wire:model='imdcause15s_ids' class="form-check-input" type="checkbox"
                                                value="{{ $item->cause15s_id }}"
                                                id="imdcouses_{{ $item->cause15s_id }}_edit">
                                            <label class="ml-3 form-check-label"
                                                for="imdcouses_{{ $item->cause15s_id }}_edit">
                                                {{ $item->cause15s_id }}.
                                                {{ $item->cause15s_description }}
                                            </label>
                                        </div>
                                        @endforeach

                                        <div class="form-check form-check-inline my-1 ml-4">
                                            <input wire:model='imdcause15s_other' class="form-control "
                                                type="text" id="otherNatrue" placeholder="Details if required:">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="" class="@error('contributing_causes_ids') text-danger @enderror">
                                        <strong>Contributing Cause</strong></label>

                                    <div class="text-justify border @error('contributing_causes_ids') border-danger @enderror"">
                                          @foreach ($contributcauseData as $index=>
                                        $item)

                                        <div class="form-check my-1 ml-2">
                                            <input wire:model='contributing_causes_ids' class="form-check-input"
                                                type="checkbox" value="{{ $item->contributing_causes_id }}"
                                                id="subcondition{{ $item->contributing_causes_id }}_edit">
                                            <label class="ml-3 form-check-label"
                                                for="subcondition{{ $item->contributing_causes_id }}_edit">
                                                {{ $item->contributing_causes_id }}.
                                                {{ $item->contributing_causes_description }}
                                            </label>
                                        </div>
                                        @endforeach
                                        <div class="form-check form-check-inline my-1 ml-4">
                                            <input wire:model='contributing_causes_other'
                                                class="form-check-input form-control " type="text" id="otherNatrue"
                                                placeholder="Details if required:">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Cause: end --}}

                    {{-- Why was the unsafe act committed:  start --}}

                    <div class="col-12 form-group">
                        <label for="" class="@error('whyunsafeact_committeds_ids') text-danger @enderror"><strong>Why was the unsafe act committed:</strong> ( Tick ✓ in the Boxes )@error('whyunsafeact_committeds_ids') <i class="text-danger fas fa-times-circle"></i>@enderror</label>

                        <div class="row">
                            @foreach ($whyunsafeactcommittedsData as $index => $item)
                                <div class="col-md-4 mt-2">
                                    <div class="form-check form-check-inline">
                                        <input wire:model='whyunsafeact_committeds_ids' class="form-check-input"
                                            type="checkbox" id="whyunsafeact_{{ $item->whyunsafeact_committeds_id }}"
                                            value="{{ $item->whyunsafeact_committeds_id }}">
                                        <label class="form-check-label"
                                            for="whyunsafeact_{{ $item->whyunsafeact_committeds_id }}">{{ $item->whyunsafeact_committeds_description }}</label>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-md-7 mt-2">
                                <div class="form-check form-check-inline w-100">
                                    <input wire:model='whyunsafeact_committeds_other'
                                        class="form-check-input form-control " type="text" id="otherNatrue"
                                        placeholder="Details if required:">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Why was the unsafe act committed:  end --}}

                    {{-- Immediate Corrective Action to be taken: : ( Tick ✓ in the Boxes ) start --}}
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="supervisorStatement"><strong>Immediate Corrective Action
                                    to be taken:</strong> ( Tick ✓ in
                                the Boxes )</label>
                            <div class="row text-center">
                                <div class="col-md-6 col-sm-12">
                                    <label for=""
                                        class="@error('imd_actions_ids') text-danger @enderror"><strong>Immediate
                                            Cause</strong></label>

                                    <div class="text-justify border @error('imd_actions_ids') border-danger @enderror"">
                                          @foreach ($imdactionData as $index=> $item)

                                        <div class="form-check my-1 ml-2">
                                            <input wire:model='imd_actions_ids' class="form-check-input" type="checkbox"
                                                value="{{ $item->imd_actions_id }}"
                                                id="imdactions_{{ $item->imd_actions_id }}_edit">
                                            <label class="ml-3 form-check-label"
                                                for="imdactions_{{ $item->imd_actions_id }}_edit">
                                                {{ $item->imd_actions_id }}.
                                                {{ $item->imd_actions_description }}
                                            </label>
                                        </div>
                                        @endforeach


                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="" class="@error('imd_corrections_ids') text-danger @enderror">
                                        <strong>Contributing Cause</strong></label>

                                    <div class="text-justify border @error('imd_corrections_ids') border-danger @enderror"">
                                          @foreach ($imdcorrectionData as $index=>
                                        $item)

                                        <div class="form-check my-1 ml-2">
                                            <input wire:model='imd_corrections_ids' class="form-check-input"
                                                type="checkbox" value="{{ $item->imd_corrections_id }}"
                                                id="imdcorrections_{{ $item->imd_corrections_id }}_edit">
                                            <label class="ml-3 form-check-label"
                                                for="imdcorrections_{{ $item->imd_corrections_id }}_edit">
                                                {{ $item->imd_corrections_id }}.
                                                {{ $item->imd_corrections_description }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Immediate Corrective Action to be taken: : end --}}


                    {{-- Further recommended action: start --}}
                    <div class="col-12 form-group">
                        <label for="furtheraction"><strong>Further recommended action:</strong></label>
                        <textarea wire:model='further_recommended_action' id="furtheraction" class="form-control border @error('further_recommended_action') border-danger @enderror"
                            rows="5"></textarea>
                    </div>
                    {{-- Further recommended action: end --}}


                    {{-- Completed by :  start --}}
                    <div class="col-4 form-group">
                        <label for="completedbyname">Completed by - Name:</label>
                        <input type="text" wire:model='completed_by_name' id="completedbyname"
                            class="form-control border @error('completed_by_name') border-danger @enderror">
                    </div>
                    <div class="col-4 form-group">
                        <label for="completedbysignature">Signature:</label>

                        <div class="form-check form-check-inline form-control border @error('completed_by_signature') border-danger @enderror">
                            <input wire:model='completed_by_signature' class="form-check-input ml-2" type="checkbox" id="completedbysignature" value="1">
                            <label class="form-check-label" for="completedbysignature">check me verify</label>
                        </div>
                    </div>
                    <div class="col-4 form-group">
                        <label for="completedbydate">Date:</label>
                        <input type="date" wire:model='completed_date' id="completedbydate"
                            class="form-control border @error('completed_date') border-danger @enderror">
                    </div>
                    {{-- Completed by :  end --}}




                    <hr class="text-secondary w-100">

                    <div class="col-12">
                        <div class="form-group">
                            <button wire:click='clearValuesandValidation()' type="button" class="btn btn-danger btn-sm"
                                data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
