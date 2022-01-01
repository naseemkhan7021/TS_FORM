<div class="modal fade addForm16" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                {{-- @php
                    # object oriented
                @endphp --}}
                <h5 class="modal-title" id="exampleModalLabel">Add New Form-16 Data</h5>
                <button wire:click='clearValidationf()' type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                {{-- <div class="text-center bg-danger"><h5 class="text-white">{{$this->message}}</h5></div> --}}
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
                            <label for="" class="@error('doincident_dt') text-danger @enderror">Data/Time
                                @error('doincident_dt') <i class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <input type="text" class="form-control" wire:model="doincident_dt" disabled>

                        </div>
                    </div>

                    {{-- project detail end --}}


                    {{-- injured to who stuff or contrecter start --}}
                    <div class="col-md-6 col-sm-6">
                        <label class="@error('potential_injurytos_fk') text-danger @enderror">Injury To
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

                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <label for="" class="@error('injuredvictim_name') text-danger @enderror">Injured Victim Name
                                @error('injuredvictim_name') <i
                                    class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <input type="text" class="form-control" placeholder="Injured Victim Name"
                                wire:model="injuredvictim_name">
                            {{-- <span class="text-danger"> @error('injuredvictim_name')
                                    {{ $message }}@enderror</span> --}}
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <div class="form-group">
                            <label for="" class="@error('eml_id_no') text-danger @enderror">ID No @error('eml_id_no') <i
                                    class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <input type="text" class="form-control" placeholder="ID No" wire:model="eml_id_no">
                            {{-- <span class="text-danger">
                                    @error('eml_id_no')
                                        {{ $message }}@enderror</span> --}}
                        </div>

                    </div>
                    {{-- injured to who stuff or contrecter end --}}

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="" class="@error('designation') text-danger @enderror">Designation
                                @error('designation') <i class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <input type="text" class="form-control" placeholder="Designation"
                                wire:model="designation">
                            {{-- <span class="text-danger"> @error('designation') {{ $message }}@enderror</span> --}}
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <div class="form-group">
                            <label for="" class="@error('dob_dt') text-danger @enderror">DOB @error('dob_dt') <i
                                    class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <input type="date" class="form-control" max="{{now()->subYear(18)->format(env('DATE_FORMAT_YMD'))}}" wire:model="dob_dt">
                            {{-- ******* now()->subYear(18)->format(env('DATE_FORMAT_YMD')) --> this for req 18 age  *****--}}
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <div class="form-group">
                            <label for="" class=" @error('age') text-danger @enderror">Age @error('age') <i
                                    class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <input type="text" class="form-control" placeholder="Age" wire:model="age" readonly>
                            {{-- <span class="text-danger">
                                            @error('age') {{ $message }}@enderror
                                            </span> --}}
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <div class="form-group">
                            <label for="project name" class="form-label @error('gender_fk') text-danger @enderror">Sex
                                @error('gender_fk') <i class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <select class="form-control" wire:model="gender_fk">
                                <option selected disabled>Select gender</option>
                                @foreach ($genderData as $item)
                                    <option value="{{ $item->gender_id }}">{{ $item->gender_description }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2 col-sm-6">
                        <div class="form-group">
                            <label for="" class=" @error('doj_dt') text-danger @enderror">Date of joing @error('doj_dt')
                                <i class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <input type="date" class="form-control" wire:model="doj_dt">
                            {{-- <span class="text-danger">
                                                @error('doj_dt') {{ $message }}@enderror
                                            </span> --}}
                        </div>
                    </div>

                    <div class="col-md-2 col-sm-6">
                        <label class=" @error('safety_inducted') text-danger @enderror">Safety Inducted
                            @error('safety_inducted') <i class="text-danger fas fa-times-circle"></i>@enderror</label>
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
                            {{-- <span class="text-danger">
                                                @error('safety_inducted') {{ $message }}@enderror
                                            </span> --}}
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label class=" @error('married') text-danger @enderror">Marital Status @error('married') <i
                                class="text-danger fas fa-times-circle"></i>@enderror</label>
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
                            {{-- <span class="text-danger">
                                                @error('married') {{ $message }}@enderror
                                            </span> --}}
                        </div>
                    </div>

                    <div class="col-md-2 col-sm-6">
                        <label class=" @error('person_on_duty') text-danger @enderror">Was the person on duty
                            @error('person_on_duty') <i class="text-danger fas fa-times-circle"></i>@enderror</label>
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
                            {{-- <span class="text-danger">
                                                @error('person_on_duty') {{ $message }}@enderror
                                            </span> --}}
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label title="Was the person authorized to be in the Incident area"
                            class=" @error('person_authorized_2_incident_area') text-danger @enderror">Person authorized
                            to be in
                            Incident.. @error('person_authorized_2_incident_area') <i
                                class="text-danger fas fa-times-circle"></i>@enderror</label>
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
                            {{-- <span class="text-danger">
                                                @error('person_authorized_2_incident_area') {{ $message }}@enderror
                                            </span> --}}
                        </div>
                    </div>

                    <hr class="text-secondary w-100">

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="presentaddress"
                                class=" @error('present_address') text-danger @enderror">Present Address
                                @error('present_address') <i
                                    class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <textarea wire:model='present_address' class="form-control"
                                placeholder="your present address here" id="presentaddress"></textarea>
                            {{-- <span class="text-danger">
                                                    @error('present_address') {{ $message }}@enderror
                                                </span> --}}
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="permanentaddress"
                                class=" @error('permanent_address') text-danger @enderror">Permanent Address
                                @error('permanent_address') <i
                                    class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <textarea wire:model='permanent_address' class="form-control"
                                placeholder="your Permanent address here" id="permanentaddress"></textarea>
                            {{-- <span class="text-danger">
                                                    @error('permanent_address') {{ $message }}@enderror
                                                </span> --}}
                        </div>
                    </div>


                    <div class="col-md-5 col-sm-6">
                        <div class="form-group">
                            <label title="To whom was the Incident Reported first" for="reportedFirst"
                                class="form-label @error('first_incident_reported_to') text-danger @enderror">Reported
                                First To whom @error('first_incident_reported_to') <i
                                    class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <input wire:model='first_incident_reported_to' type="text" class="form-control"
                                id="reportedFirst">
                            {{-- <span class="text-danger">
                                                    @error('first_incident_reported_to') {{ $message }}@enderror
                                                </span> --}}
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <label for="bywhom" class="form-label @error('by_whom') text-danger @enderror">By Whom
                                @error('by_whom') <i class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <input wire:model='by_whom' type="text" class="form-control" id="bywhom">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-controp">
                            <label for="" class=" @error('date_time_reported_dt') text-danger @enderror">Reported
                                Data/Time @error('date_time_reported_dt') <i
                                    class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <input type="datetime-local" class="form-control" wire:model="date_time_reported_dt">
                            <span class="text-danger">
                                {{-- @error('date_time_reported_dt')
                                            {{ $message }}@enderror</span> --}}
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label title="To whom was the Incident Reported first" for="witness1"
                                class="form-label @error('witness1_name') text-danger @enderror">Witness (1) Name
                                @error('witness1_name') <i
                                    class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <input wire:model='witness1_name' type="text" class="form-control" id="witness1">
                            {{-- @error('witness1_name')
                                            {{ $message }}@enderror</span> --}}
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="designation1"
                                class="form-label @error('designation_1') text-danger @enderror">Designation
                                @error('designation_1') <i
                                    class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <input wire:model='designation_1' type="text" class="form-control" id="designation1">
                            {{-- @error('designation_1')
                                            {{ $message }}@enderror</span> --}}
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label title="To whom was the Incident Reported first" for="witness2"
                                class="form-label @error('witness2_name') text-danger @enderror">Witness (2) Name
                                @error('witness2_name') <i
                                    class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <input wire:model='witness2_name' type="text" class="form-control" id="witness2">
                            {{-- @error('witness2_name')
                                            {{ $message }}@enderror</span> --}}
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="designation2"
                                class="form-label @error('designation_2') text-danger @enderror">Designation
                                @error('designation_2') <i
                                    class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <input wire:model='designation_2' type="text" class="form-control" id="designation2">
                            {{-- @error('designation_2')
                                            {{ $message }}@enderror</span> --}}
                        </div>
                    </div>


                    <div class="col-md-3 col-sm-6">
                        <label class=" @error('first_aid_given_on_site') text-danger @enderror">Was First Aid given on
                            Site @error('first_aid_given_on_site') <i
                                class="text-danger fas fa-times-circle"></i>@enderror</label>
                        <div class=" form-group">
                            <div class="form-group form-check-inline">
                                <input wire:click="$set('firstaidgivenonsite', 'Yes')"
                                    wire:model='first_aid_given_on_site' class="form-check-input" name="firstaid"
                                    type="radio" value="1" id="wasfirstaidyes">
                                <label class="form-check-label" for="wasfirstaidyes">
                                    YES
                                </label>
                            </div>
                            <div class="form-group form-check-inline">
                                <input wire:click="$set('firstaidgivenonsite', 'No')"
                                    wire:model='first_aid_given_on_site' class="form-check-input" name="firstaid"
                                    type="radio" value="0" id="wasfirstaidno">
                                <label class="form-check-label" for="wasfirstaidno">
                                    NO
                                </label>
                            </div>
                            {{-- <span class="text-danger">
                                                @error('first_aid_given_on_site') {{ $message }}@enderror
                                            </span> --}}
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for="nameofaider"
                                class="form-label @error('name_first_aider') text-danger @enderror">Name of the First
                                Aider @error('name_first_aider') <i
                                    class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <input {{ $firstaidgivenonsite == 'No' ? 'disabled' : '' }} wire:model='name_first_aider'
                                type="text" class="form-control" id="nameofaider">
                            {{-- <span class="text-danger">
                                                @error('name_first_aider') {{ $message }}@enderror
                                            </span> --}}
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <label class="@error('victim_taken_hospital') text-danger @enderror">Was the victim taken to a
                            Hospital @error('victim_taken_hospital') <i
                                class="text-danger fas fa-times-circle"></i>@enderror</label>
                        <div class=" form-group">
                            <div class="form-group form-check-inline">
                                <input wire:click="$set('showhospital', 'Yes')" wire:model='victim_taken_hospital'
                                    class="form-check-input" name="takenhospital" type="radio" value="1"
                                    id="wastakenhospitalyes">
                                <label class="form-check-label" for="wastakenhospitalyes">
                                    YES
                                </label>
                            </div>
                            <div class="form-group form-check-inline">
                                <input wire:click="$set('showhospital', 'No')" wire:model='victim_taken_hospital'
                                    class="form-check-input" name="takenhospital" type="radio" value="0"
                                    id="wastakenhospitalno">
                                <label class="form-check-label" for="wastakenhospitalno">
                                    NO
                                </label>
                            </div>
                            {{-- <span class="text-danger">
                                                @error('victim_taken_hospital') {{ $message }}@enderror
                                            </span> --}}
                        </div>
                    </div>

                    {{-- if other than show this input --}}

                    {{-- $show --}}
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for="nameofhospital"
                                class="form-label @error('name_hospital') text-danger @enderror">Name of the
                                Hospital
                                @error('name_hospital') <i
                                    class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <input {{ $showhospital == 'No' ? 'disabled' : '' }} wire:model='name_hospital'
                                type="text" class="form-control " id="nameofhospital">
                            <span class="text-danger">
                                @error('name_hospital') {{ $message }}@enderror
                                </span>
                            </div>
                        </div>
                        {{-- @endif --}}



                        <div class="col-md-2 col-sm-6">
                            <div class="form-group">
                                {{-- <label title="State whether the victim is still in the hospital or discharged"
                                                for="stillhospital" class="form-label">State whether the victim ...</label>
                                            <input wire:model='victim_hospital_dischaged' type="text" class="form-control"
                                                id="stillhospital"> --}}
                                <label title="State whether the victim is still in the hospital or discharged"
                                    class="@error('victim_hospital_dischaged') text-danger @enderror">State whether the
                                    victim..@error('victim_hospital_dischaged') <i
                                        class="text-danger fas fa-times-circle"></i>@enderror</label>
                                <div class="form-group">

                                    <div class="form-group form-check-inline">
                                        <input wire:click="$set('victimDischargeorNot', 'Yes')"
                                            wire:model='victim_hospital_dischaged' class="form-check-input"
                                            name="stillhospital" type="radio" value="1" id="stillhospitalyes">
                                        <label class="form-check-label" for="stillhospitalyes">
                                            YES
                                        </label>
                                    </div>
                                    <div class="form-group form-check-inline">
                                        <input wire:click="$set('victimDischargeorNot', 'No')"
                                            wire:model='victim_hospital_dischaged' class="form-check-input"
                                            name="stillhospital" type="radio" value="0" id="stillhospitalno">
                                        <label class="form-check-label" for="stillhospitalno">
                                            NO
                                        </label>
                                    </div>
                                </div>
                                {{-- <span class="text-danger">
                                                    @error('victim_hospital_dischaged') {{ $message }}@enderror
                                                </span> --}}
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label title="State whether he returned to work. If so, when" for="returntoworkifdt"
                                    class="form-label @error('return_to_work') text-danger @enderror">State whether the
                                    victim... @error('return_to_work') <i
                                        class="text-danger fas fa-times-circle"></i>@enderror</label>
                                <input {{ $victimDischargeorNot == 'No' ? 'disabled' : '' }} wire:model='return_to_work'
                                    type="date" class="form-control" id="returntoworkifdt">
                                {{-- <span class="text-danger">
                                                    @error('return_to_work') {{ $message }}@enderror
                                                </span> --}}
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <label
                                title="Was the victim under the influence of alcohol or any drugs at the time of the Incident"
                                class="@error('victim_influence_alcohol') text-danger @enderror">influence
                                of alcohol or any drugs .... @error('victim_influence_alcohol') <i
                                    class="text-danger fas fa-times-circle"></i>@enderror</label>
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
                                {{-- <span class="text-danger">
                                                @error('victim_influence_alcohol') {{ $message }}@enderror
                                            </span> --}}
                            </div>
                        </div>
                        {{-- Description of incident, injury in BRIEF (Attach sketches/photos as required) start --}}
                        <hr class="text-secondary w-100">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label title="Description of incident, injury in brief (Attach sketches/photos as required)"
                                    for="" class=" @error('description_of_incident') text-danger @enderror">Description of
                                    Incident, injury in brief @error('description_of_incident') <i
                                        class="text-danger fas fa-times-circle"></i>@enderror</label>
                                <textarea wire:model='description_of_incident' class="form-textarea form-control"
                                    name="descriptionIncidentbrief" maxlength="100" id="" rows="3"></textarea>
                                {{-- <span class="text-danger">
                                                    @error('description_of_incident') {{ $message }}@enderror
                                                </span> --}}
                            </div>
                        </div>


                        {{-- Extent of Injury --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="extentinjury"
                                    class="form-label @error('extend_injury') text-danger @enderror">Extent of Injury
                                    @error('extend_injury') <i
                                        class="text-danger fas fa-times-circle"></i>@enderror</label>
                                <input wire:model='extend_injury' type="text" class="form-control" id="extentinjury">
                                {{-- <span class="text-danger">
                                                @error('extend_injury') {{ $message }}@enderror
                                            </span> --}}
                            </div>
                        </div>
                        {{-- Activity --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="activityinjury"
                                    class="form-label @error('activity16') text-danger @enderror">Activity
                                    @error('activity16') <i class="text-danger fas fa-times-circle"></i>@enderror</label>
                                <input wire:model='activity16' type="text" class="form-control" id="activityinjury">
                                {{-- <span class="text-danger">
                                                @error('activity16') {{ $message }}@enderror
                                            </span> --}}
                            </div>
                        </div>
                        {{-- Relevant Risk Assessment & Document Reference No --}}

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="referenceinjury"
                                    class="form-label @error('relavebt_risk_referenceno') text-danger @enderror"
                                    title="Relevant Risk Assessment & Document Reference No">Relevant Risk
                                    Assessment... @error('relavebt_risk_referenceno') <i
                                        class="text-danger fas fa-times-circle"></i>@enderror</label>
                                <input wire:model='relavebt_risk_referenceno' type="text" class="form-control"
                                    id="referenceinjury">
                                {{-- <span class="text-danger">
                                                    @error('relavebt_risk_referenceno') {{ $message }}@enderror
                                                </span> --}}
                            </div>
                        </div>
                        {{-- Control measures that were not followed / not available in Risk Assessment --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="controlemeasuresinjury"
                                    class="form-label @error('control_measure') text-danger @enderror"
                                    title="Control measures that were not followed / not available in Risk Assessment:">Controle
                                    measures that were not followed... @error('control_measure') <i
                                        class="text-danger fas fa-times-circle"></i>@enderror</label>
                                <textarea wire:model='control_measure' name="" id="controlemeasuresinjury"
                                    class="form-control" rows="3" maxlength="100"></textarea>
                                {{-- <span class="text-danger">
                                                    @error('control_measure') {{ $message }}@enderror
                                                </span> --}}
                            </div>
                        </div>
                        {{-- Actions taken to prevent similar incidents in future --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="futreactioninjury"
                                    class="form-label  @error('actions_taken') text-danger @enderror"
                                    title="Actions taken to prevent similar incidents in future">Action taken to future
                                    incidents... @error('actions_taken') <i
                                        class="text-danger fas fa-times-circle"></i>@enderror</label>
                                <textarea wire:model='actions_taken' name="" id="futreactioninjury"
                                    class="form-control form-input" rows="3" maxlength="100"></textarea>
                                {{-- <span class="text-danger">
                                                    @error('actions_taken') {{ $message }}@enderror
                                                </span> --}}
                            </div>
                        </div>
                        {{-- Description of incident, injury in BRIEF (Attach sketches/photos as required) end --}}

                        <hr class="text-secondary w-100">
                        {{-- last info start --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="site-engineer-name"
                                    class="form-label  @error('site_enginner_name') text-danger @enderror"
                                    title="Completed by (Site Engineer) Name">Site Engineer Name
                                    @error('site_enginner_name') <i
                                        class="text-danger fas fa-times-circle"></i>@enderror</label>
                                <input wire:model='site_enginner_name' type="text" class="form-control"
                                    id="site-engineer-name">
                                {{-- <span class="text-danger">
                                                    @error('site_enginner_name') {{ $message }}@enderror
                                                </span> --}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="site-engineer-signature"
                                    class="form-label  @error('site_enginner_signature') text-danger @enderror"
                                    title="Completed by (Site Engineer) signature">Signalture
                                    @error('site_enginner_signature') <i
                                        class="text-danger fas fa-times-circle"></i>@enderror</label>
                                <input wire:model='site_enginner_signature' type="text" class="form-control"
                                    id="site-engineer-signature">
                                {{-- <span class="text-danger">
                                                    @error('site_enginner_signature') {{ $message }}@enderror
                                                </span> --}}
                            </div>
                        </div>

                        {{-- img upload start --}}
                        <div class="col-md-12">
                            <hr class="text-secondary w-100">
                            <legend class="w-100"><strong>Upload Imgs</strong></legend>
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label title="Attach sketches/photos" for="browse-injury-photo">Attach
                                            sketches/photos</label>
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <input wire:model='photos' type="file" class="custom-file-input"
                                                    id="browse-injury-photo" aria-describedby="inputGroupFileAddon01">
                                                <label title="Attach sketches/photos" class="custom-file-label"
                                                    for="browse-injury-photo">Upload
                                                    Photo/sketche</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="browse-injury-photo" class="form-labeltext-danger"
                                            title="Attach Name ">Attach Name</label>
                                        <input type="text" class="form-control" id="browse-injury-photo">

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">

                                    <div class="row">
                                            <div class="col-md-12">    
                                                <label for="" title="image preview">imgages preview</label>
                                            </div>
                                            @foreach ($photos as $key => $photo)
                                                <div class="col-md-3 img mb-4" style="height: 12rem">
                                                    {{-- {{$key}} --}}
                                                    <a href="{{ $photo->temporaryUrl() }}" class="h-100 d-block">
                                                        <img src="{{ $photo->temporaryUrl() }}"
                                                            alt="{{ $photo->temporaryUrl() }}" class="w-100 h-100"
                                                            style="object-fit: contain">
                                                    </a>
                                                </div>

                                                <div class="col-md-3 mb-4">
                                                    <div class="form-group">
                                                        <label for="img title"> Image Title</label>
                                                        <input type="text" class="form-control" placeholder="Img title" wire:model='imgTitles.{{$key}}'>
                                                    </div>
                                                    <input type="button" wire:click='removeImg({{ $key }})'  class="btn btn-outline-danger btn-sm rounded w-100" value="remove">
                                                    {{-- <button wire:click='removeImg({{ $key }})' type=""
                                                        class="btn btn-outline-danger btn-sm rounded w-100">remove</button> --}}
                                                </div>

                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- img upload end --}}

                        {{-- hare we are add the fieldset --}}
                        {{-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="project-manager-name"
                                    class="form-label @error('project_manager') text-danger @enderror"
                                    title="Completed by (Site Engineer) Name">Project Manager @error('project_manager') <i
                                        class="text-danger fas fa-times-circle"></i>@enderror</label>
                                <input wire:model='project_manager' type="text" class="form-control"
                                    id="project-manager-name"> --}}
                        {{-- <span class="text-danger">
                                                    @error('project_manager') {{ $message }}@enderror
                                                </span> --}}
                        {{-- </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="project-manager-signature"
                                    class="form-label  @error('project_manager_signature') text-danger @enderror"
                                    title="Completed by (Site Engineer) signature">Signalture
                                    @error('project_manager_signature') <i
                                        class="text-danger fas fa-times-circle"></i>@enderror</label>
                                <input wire:model='project_manager_signature' type="text" class="form-control"
                                    id="project-manager-signature"> --}}
                        {{-- <span class="text-danger">
                                                    @error('project_manager_signature') {{ $message }}@enderror
                                                </span> --}}
                        {{-- </div>
                        </div> --}}
                        {{-- last info end --}}

                        {{-- only for head Employee --}}
                        {{-- <hr class="text-secondary w-100"> --}}
                        {{-- <div class="col-12">
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
                                </div> --}}


                        {{-- Safety Officer --}}
                        {{-- <div class="col-12">
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
                                </div> --}}


                        {{-- Dy. Project Manager --}}
                        {{-- <div class="col-12">
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
                                </div> --}}



                        {{-- Site Admin Dept. --}}
                        {{-- <div class="col-12">
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
                            </div> --}}

                        {{-- </div> --}}
                        {{-- only for head Employee end --}}
                        <br>
                        <br>
                        <br>
                        <div class="col-12">
                            <div class="form-group">
                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" wire:click='clearValidationf()'>Close</button>
                                <button type="submit" class="btn btn-primary btn-sm">Save</button>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
