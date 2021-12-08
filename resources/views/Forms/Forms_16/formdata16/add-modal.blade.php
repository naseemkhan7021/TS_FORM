@php
if ($iproject_id_fk) {
    # code...
    $sproject_location_obj = DB::table('projects')
        ->where('iproject_id', '=', $iproject_id_fk)
        ->get();
    $this->sproject_location = $sproject_location_obj[0]->sproject_location;
}
if ($dob_dt) {
    # code...
    # procedural
    $this->age = date_diff(date_create($dob_dt), date_create('today'))->y;
    // echo 'this is => ' . now();
}
@endphp


<div class="modal fade addForm1" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                {{-- @php
                    # object oriented
                @endphp --}}
                <h5 class="modal-title" id="exampleModalLabel">Add New Form-16 Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">

                <form wire:submit.prevent="save" class="row g-3">
                    {{-- project detail start --}}
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="project name" class="form-label">Project</label>

                            <select wire:model="iproject_id_fk" class="form-control">
                                <option selected hidden>Project name</option>
                                @foreach ($prjectData as $item)
                                    <option value="{{ $item->iproject_id }}">{{ $item->sproject_name }}</option>
                                @endforeach
                            </select>
                            {{-- {{ $iproject_id_fk }} --}}
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="form-controp">

                            <label for="">Location</label>
                            <input type="text" class="form-control" placeholder="Location"
                                wire:model="sproject_location" readonly>
                                <span class="text-danger"> 
                                    @error('sproject_location')
                                        {{ $message }}@enderror</span>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="form-controp">
                            <label for="">Data/Time</label>
                            <input type="datetime-local" class="form-control" wire:model="doincident_dt">
                            <span class="text-danger"> 
                                @error('doincident_dt')
                                    {{ $message }}@enderror</span>
                        </div>
                    </div>

                    {{-- project detail end --}}
                    {{-- injured to who stuff or contrecter start --}}
                    <div class="col-md-6 col-sm-6">
                        <label>Injury To</label>
                        <div class="form-group">
                            <div class="d-flex justify-content-between">
                                @foreach ($potentialinjurytotData as $item)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="injuryto" type="radio"
                                            wire:model="potential_injurytos_fk"
                                            value="{{ $item->potential_injurytos_id }}"
                                            id="{{ $item->potential_injurytos_abbr }}">
                                        <label class="form-check-label" for="{{ $item->potential_injurytos_abbr }}">
                                            {{ $item->potential_injurytos_description }}
                                        </label>
                                    </div>
                                @endforeach
                                {{-- if other than show this input --}}
                                <div class="input">
                                    <input type="text" class="mx-1 form-control" placeholder="what is other" hidden>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <label for="">Injured Victim Name</label>
                            <input type="text" class="form-control" placeholder="Injured Victim Name"
                                wire:model="injuredvictim_name">
                            <span class="text-danger"> @error('injuredvictim_name')
                                    {{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <div class="form-group">
                                <label for="">ID No</label>
                                <input type="text" class="form-control" placeholder="ID No" wire:model="eml_id_no">
                                <span class="text-danger">
                                    @error('eml_id_no')
                                        {{ $message }}@enderror</span>
                            </div>

                        </div>
                        {{-- injured to who stuff or contrecter end --}}

                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="">Designation</label>
                                <input type="text" class="form-control" placeholder="Designation"
                                    wire:model="designation">
                                <span class="text-danger"> @error('designation') {{ $message }}@enderror</span>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-6">
                                <div class="form-group">
                                    <label for="">DOB</label>
                                    <input type="date" class="form-control"wire:model="dob_dt">
                                    <span class="text-danger">
                                        @error('dob_dt') {{ $message }}@enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-6">
                                    <div class="form-group">
                                        <label for="">Age</label>
                                        <input type="text" class="form-control" placeholder="Age" wire:model="age" readonly>
                                        <span class="text-danger">
                                            @error('age') {{ $message }}@enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <div class="form-group">
                                            <label for="project name" class="form-label">Sex</label>
                                            <select class="form-control" wire:model="gender_fk">
                                                <option selected hidden>Select gender</option>
                                                @foreach ($genderData as $item)
                                                    <option value="{{ $item->gender_id }}">{{ $item->gender_description }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-sm-6">
                                        <div class="form-group">
                                            <label for="">Date of joing</label>
                                            <input type="date" class="form-control" wire:model="doj_dt">
                                            <span class="text-danger">
                                                @error('doj_dt') {{ $message }}@enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-sm-6">
                                        <label>Safety Inducted</label>
                                        <div class=" form-group">
                                            <div class="form-group form-check-inline">
                                                <input wire:model="safety_inducted" class="form-check-input" name="safetyinducted"
                                                    type="radio" value="1" id="safetyinductedYES">
                                                <label class="form-check-label" for="safetyinductedYES">
                                                    YES
                                                </label>
                                            </div>
                                            <div class="form-group form-check-inline">
                                                <input wire:model="safety_inducted" class="form-check-input" name="safetyinducted"
                                                    type="radio" value="0" id="safetyinductedNO">
                                                <label class="form-check-label" for="safetyinductedNO">
                                                    NO
                                                </label>
                                            </div>
                                            <span class="text-danger">
                                                @error('safety_inducted') {{ $message }}@enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <label>Marital Status</label>
                                        <div class=" form-group">
                                            <div class="form-group form-check-inline">
                                                <input wire:model='married' class="form-check-input" name="maritalStatus" type="radio"
                                                    value="1" id="married">
                                                <label class="form-check-label" for="married">
                                                    Married
                                                </label>
                                            </div>
                                            <div class="form-group form-check-inline">
                                                <input wire:model='married' class="form-check-input" name="maritalStatus" type="radio"
                                                    value="0" id="unmarried">
                                                <label class="form-check-label" for="unmarried">
                                                    UnMarried
                                                </label>
                                            </div>
                                            <span class="text-danger">
                                                @error('married') {{ $message }}@enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-sm-6">
                                        <label>Was the person on duty</label>
                                        <div class=" form-group">
                                            <div class="form-group form-check-inline">
                                                <input wire:model='person_on_duty' class="form-check-input" name="onDuty" type="radio"
                                                    value="1" id="onDutyYES">
                                                <label class="form-check-label" for="onDutyYES">
                                                    YES
                                                </label>
                                            </div>
                                            <div class="form-group form-check-inline">
                                                <input wire:model='person_on_duty' class="form-check-input" name="onDuty" type="radio"
                                                    value="0" id="onDutyNO">
                                                <label class="form-check-label" for="onDutyNO">
                                                    NO
                                                </label>
                                            </div>
                                            <span class="text-danger">
                                                @error('person_on_duty') {{ $message }}@enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <label title="Was the person authorized to be in the Incident area">Person authorized to be in
                                            Incident..</label>
                                        <div class=" form-group">
                                            <div class="form-group form-check-inline">
                                                <input wire:model='person_authorized_2_incident_area' class="form-check-input"
                                                    name="auth" type="radio" value="1" id="authYES">
                                                <label class="form-check-label" for="authYES">
                                                    YES
                                                </label>
                                            </div>
                                            <div class="form-group form-check-inline">
                                                <input wire:model='person_authorized_2_incident_area' class="form-check-input"
                                                    name="auth" type="radio" value="0" id="authNo">
                                                <label class="form-check-label" for="authNo">
                                                    NO
                                                </label>
                                            </div>
                                            <span class="text-danger">
                                                @error('person_authorized_2_incident_area') {{ $message }}@enderror
                                            </span>
                                        </div>
                                    </div>

                                    <hr class="text-secondary w-100">

                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="presentaddress">Present Address</label>
                                            <textarea wire:model='present_address' class="form-control"
                                                placeholder="your present address here" id="presentaddress"></textarea>
                                                <span class="text-danger">
                                                    @error('present_address') {{ $message }}@enderror
                                                </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="permanentaddress">Permanent Address</label>
                                            <textarea wire:model='permanent_address' class="form-control"
                                                placeholder="your Permanent address here" id="permanentaddress"></textarea>
                                                <span class="text-danger">
                                                    @error('permanent_address') {{ $message }}@enderror
                                                </span>
                                        </div>
                                    </div>


                                    <div class="col-md-5 col-sm-6">
                                        <div class="form-group">
                                            <label title="To whom was the Incident Reported first" for="reportedFirst"
                                                class="form-label">Reported First To whom</label>
                                            <input wire:model='first_incident_reported_to' type="text" class="form-control"
                                                id="reportedFirst">
                                                <span class="text-danger">
                                                    @error('first_incident_reported_to') {{ $message }}@enderror
                                                </span>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <label for="bywhom" class="form-label">By Whom</label>
                                            <input wire:model='by_whom' type="text" class="form-control" id="bywhom">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-controp">
                                            <label for="">Reported Data/Time</label>
                                            <input type="datetime-local" class="form-control" wire:model="date_time_reported_dt">
                                            {{-- <span class="text-danger"> 
                                        @error('doincident_dt')
                                            {{ $message }}@enderror</span> --}}
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label title="To whom was the Incident Reported first" for="witness1"
                                                class="form-label">Witness (1) Name</label>
                                            <input wire:model='witness1_name' type="text" class="form-control" id="witness1">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="designation1" class="form-label">Designation</label>
                                            <input wire:model='designation_1' type="text" class="form-control" id="designation1">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label title="To whom was the Incident Reported first" for="witness2"
                                                class="form-label">Witness (2) Name</label>
                                            <input wire:model='witness2_name' type="text" class="form-control" id="witness2">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="designation2" class="form-label">Designation</label>
                                            <input wire:model='designation_2' type="text" class="form-control" id="designation2">
                                        </div>
                                    </div>


                                    <div class="col-md-3 col-sm-6">
                                        <label>Was First Aid given on Site</label>
                                        <div class=" form-group">
                                            <div class="form-group form-check-inline">
                                                <input wire:model='first_aid_given_on_site' class="form-check-input" name="firstaid"
                                                    type="radio" value="1" id="wasfirstaidyes">
                                                <label class="form-check-label" for="wasfirstaidyes">
                                                    YES
                                                </label>
                                            </div>
                                            <div class="form-group form-check-inline">
                                                <input wire:model='first_aid_given_on_site' class="form-check-input" name="firstaid"
                                                    type="radio" value="0" id="wasfirstaidno">
                                                <label class="form-check-label" for="wasfirstaidno">
                                                    NO
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-6">
                                        <div class="form-group">
                                            <label for="nameofaider" class="form-label">Name of the First Aider</label>
                                            <input wire:model='name_first_aider' type="text" class="form-control" id="nameofaider">
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-6">
                                        <label>Was the victim taken to a Hospital</label>
                                        <div class=" form-group">
                                            <div class="form-group form-check-inline">
                                                <input wire:model='victim_taken_hospital' class="form-check-input" name="takenhospital"
                                                    type="radio" value="1" id="wastakenhospitalyes">
                                                <label class="form-check-label" for="wastakenhospitalyes">
                                                    YES
                                                </label>
                                            </div>
                                            <div class="form-group form-check-inline">
                                                <input wire:model='victim_taken_hospital' class="form-check-input" name="takenhospital"
                                                    type="radio" value="0" id="wastakenhospitalno">
                                                <label class="form-check-label" for="wastakenhospitalno">
                                                    NO
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-6">
                                        <div class="form-group">
                                            <label for="nameofhospital" class="form-label">Name of the Hospital</label>
                                            <input wire:model='name_hospital' type="text" class="form-control" id="nameofhospital">
                                        </div>
                                    </div>


                                    <div class="col-md-5 col-sm-6">
                                        <div class="form-group">
                                            {{-- <label title="State whether the victim is still in the hospital or discharged"
                                                for="stillhospital" class="form-label">State whether the victim ...</label>
                                            <input wire:model='victim_hospital_dischaged' type="text" class="form-control"
                                                id="stillhospital"> --}}
                                                <label
                                                title="State whether the victim is still in the hospital or discharged">State whether the victim ...</label>
                                                <div class="form-group form-check-inline">
                                                    <input wire:model='victim_hospital_dischaged' class="form-check-input"
                                                        name="stillhospital" type="radio" value="1" id="stillhospitalyes">
                                                    <label class="form-check-label" for="stillhospitalyes">
                                                        YES
                                                    </label>
                                                </div>
                                                <div class="form-group form-check-inline">
                                                    <input wire:model='victim_hospital_dischaged' class="form-check-input"
                                                        name="stillhospital" type="radio" value="0" id="stillhospitalno">
                                                    <label class="form-check-label" for="stillhospitalno">
                                                        NO
                                                    </label>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="form-group">
                                            <label title="State whether he returned to work. If so, when" for="returntoworkifdt"
                                                class="form-label">State whether the victim ...</label>
                                            <input wire:model='return_to_work' type="date" class="form-control"
                                                id="returntoworkifdt">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-6">
                                        <label
                                            title="Was the victim under the influence of alcohol or any drugs at the time of the Incident">influence
                                            of alcohol or any drugs ....</label>
                                        <div class=" form-group">
                                            <div class="form-group form-check-inline">
                                                <input wire:model='victim_influence_alcohol' class="form-check-input"
                                                    name="alcoholordrugs" type="radio" value="1" id="alcoholordrugsyes">
                                                <label class="form-check-label" for="alcoholordrugsyes">
                                                    YES
                                                </label>
                                            </div>
                                            <div class="form-group form-check-inline">
                                                <input wire:model='victim_influence_alcohol' class="form-check-input"
                                                    name="alcoholordrugs" type="radio" value="0" id="alcoholordrugsno">
                                                <label class="form-check-label" for="alcoholordrugsno">
                                                    NO
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Description of incident, injury in BRIEF (Attach sketches/photos as required) start --}}
                                    <hr class="text-secondary w-100">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label title="Description of incident, injury in brief (Attach sketches/photos as required)"
                                                for="">Description of Incident, injury in brief</label>
                                            <textarea wire:model='description_of_incident' class="form-textarea form-control"
                                                name="descriptionIncidentbrief" minlength="100" id="" rows="3"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label title="Attach sketches/photos" for="browse-injury-photo">Attach
                                                sketches/photos</label>
                                            <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input wire:model='uploaddocuments_fk' type="file" class="custom-file-input"
                                                        id="browse-injury-photo" aria-describedby="inputGroupFileAddon01">
                                                    <label title="Attach sketches/photos" class="custom-file-label"
                                                        for="browse-injury-photo">Upload
                                                        Photo/sketche</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Extent of Injury --}}
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="extentinjury" class="form-label">Extent of Injury</label>
                                            <input wire:model='extend_injury' type="text" class="form-control" id="extentinjury">
                                        </div>
                                    </div>
                                    {{-- Activity --}}
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="activityinjury" class="form-label">Activity</label>
                                            <input wire:model='activity16' type="text" class="form-control" id="activityinjury">
                                        </div>
                                    </div>
                                    {{-- Relevant Risk Assessment & Document Reference No --}}

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="referenceinjury" class="form-label"
                                                title="Relevant Risk Assessment & Document Reference No">Relevant Risk
                                                Assessment...</label>
                                            <input wire:model='relavebt_risk_referenceno' type="text" class="form-control"
                                                id="referenceinjury">
                                        </div>
                                    </div>
                                    {{-- Control measures that were not followed / not available in Risk Assessment --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="controlemeasuresinjury" class="form-label"
                                                title="Control measures that were not followed / not available in Risk Assessment:">Controle
                                                measures that were not followed...</label>
                                            <textarea wire:model='control_measure' name="" id="controlemeasuresinjury"
                                                class="form-control" rows="3" minlength="100"></textarea>
                                        </div>
                                    </div>
                                    {{-- Actions taken to prevent similar incidents in future --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="futreactioninjury" class="form-label"
                                                title="Actions taken to prevent similar incidents in future">Action taken to future
                                                incidents...</label>
                                            <textarea wire:model='actions_taken' name="" id="futreactioninjury"
                                                class="form-control form-input" rows="3" minlength="100"></textarea>
                                        </div>
                                    </div>
                                    {{-- Description of incident, injury in BRIEF (Attach sketches/photos as required) end --}}

                                    <hr class="text-secondary w-100">
                                    {{-- last info start --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="site-engineer-name" class="form-label"
                                                title="Completed by (Site Engineer) Name">Site Engineer Name</label>
                                            <input wire:model='site_enginner_name' type="text" class="form-control"
                                                id="site-engineer-name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="site-engineer-signature" class="form-label"
                                                title="Completed by (Site Engineer) signature">Signalture</label>
                                            <input wire:model='site_enginner_signature' type="text" class="form-control"
                                                id="site-engineer-signature">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="project-manager-name" class="form-label"
                                                title="Completed by (Site Engineer) Name">Project Manager</label>
                                            <input wire:model='project_manager' type="text" class="form-control"
                                                id="project-manager-name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="project-manager-signature" class="form-label"
                                                title="Completed by (Site Engineer) signature">Signalture</label>
                                            <input wire:model='project_manager_signature' type="text" class="form-control"
                                                id="project-manager-signature">
                                        </div>
                                    </div>
                                    {{-- last info end --}}

                                    {{-- only for head Employee --}}
                                    <hr class="text-secondary w-100">
                                    <div class="col-12">
                                        <legend class="w-100"><strong>Distribution To</strong></legend>
                                        <div class="row px-2">
                                            <div class="col-12">
                                                <h4><strong>Project Head</strong></h4>
                                            </div><br><br>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="project-head-name">Name</label>
                                                    <input type="text" class="form-control" id="project-head-name">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="project-head-signature">signature</label>
                                                    <input type="text" class="form-control" id="project-head-signature">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="signature-date">Date</label>
                                                    <input type="date" class="form-control" id="signature-date">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="project-head-remark">Remark</label>
                                                    <input type="text" class="form-control" id="project-head-remark">
                                                </div>
                                            </div>


                                            {{-- Safety Officer --}}
                                            <div class="col-12">
                                                <h4><strong>Safety Officer</strong></h4>
                                            </div><br><br>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="safety-officer-name">Name</label>
                                                    <input type="text" class="form-control" id="safety-officer-name">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="safety-officer-signature">signature</label>
                                                    <input type="text" class="form-control" id="safety-officer-signature">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="safety-officer-signature-date">Date</label>
                                                    <input type="date" class="form-control" id="safety-officer-signature-date">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="safety-officer-remark">Remark</label>
                                                    <input type="text" class="form-control" id="safety-officer-remark">
                                                </div>
                                            </div>


                                            {{-- Dy. Project Manager --}}
                                            <div class="col-12">
                                                <h4><strong>Dy. Project Manager</strong></h4>
                                            </div><br><br>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="project-manager-name">Name</label>
                                                    <input type="text" class="form-control" id="project-manager-name">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="project-manager-signature">signature</label>
                                                    <input type="text" class="form-control" id="project-manager-signature">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="project-manager-signature-date">Date</label>
                                                    <input type="date" class="form-control" id="project-manager-signature-date">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="project-manager-remark">Remark</label>
                                                    <input type="text" class="form-control" id="project-manager-remark">
                                                </div>
                                            </div>



                                            {{-- Site Admin Dept. --}}
                                            <div class="col-12">
                                                <h4><strong>Site Admin Dept.</strong></h4>
                                            </div><br><br>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="site-admin-name">Name</label>
                                                    <input type="text" class="form-control" id="site-admin-name">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="site-admin-signature">signature</label>
                                                    <input type="text" class="form-control" id="site-admin-signature">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="site-admin-signature-date">Date</label>
                                                    <input type="date" class="form-control" id="site-admin-signature-date">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="site-admin-remark">Remark</label>
                                                    <input type="text" class="form-control" id="site-admin-remark">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    {{-- only for head Employee end --}}

                                    <div class="col-12">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
