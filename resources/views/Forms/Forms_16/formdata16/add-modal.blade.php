<div class="modal fade addForm1" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Form-16 Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form wire:submit.prevent="save" class="row g-3">
                    {{-- project detail start --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="project name" class="form-label">Project</label>

                            <select class="form-control">
                                <option selected hidden>Project name</option>
                                @foreach ($prjectData as $item)
                                    <option>{{ $item->sproject_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-controp">
                            <label for="">Location</label>
                            <input type="text" class="form-control" placeholder="Location" wire:model="">
                            {{-- <span class="text-danger"> 
                                @error('injuredvictim_name')
                                    {{ $message }}@enderror</span> --}}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-controp">
                            <label for="">Data/Time</label>
                            <input type="datetime-local" class="form-control" placeholder="1/12/2020" wire:model="">
                            {{-- <span class="text-danger"> 
                                @error('injuredvictim_name')
                                    {{ $message }}@enderror</span> --}}
                        </div>
                    </div>
                    {{-- project detail end --}}
                    {{-- injured to who stuff or contrecter start --}}
                    <div class="col-md-4">
                        <label>Injury To</label>
                        <div class=" form-group">

                            <div class="form-group form-check-inline">
                                <input class="form-check-input" name="injuryto" type="radio" value="T&S Employee"
                                    id="T&S">
                                <label class="form-check-label" for="T&S">
                                    T&S Employee
                                </label>
                            </div>
                            <div class="form-group form-check-inline">
                                <input class="form-check-input" name="injuryto" type="radio" value="Sub-Contractor"
                                    id="Sub">
                                <label class="form-check-label" for="Sub">
                                    Sub-Contractor
                                </label>
                            </div>
                            <div class="form-group form-check-inline">
                                <input class="form-check-input" name="injuryto" type="radio" value="Others" id="Others">
                                <label class="form-check-label" for="Others">
                                    Others
                                </label>
                                {{-- if other than show this input --}}
                                <input type="text" class="mx-1 form-control" placeholder="what is other" hidden>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Injured Victim Name</label>
                            <input type="text" class="form-control" placeholder="Injured Victim Name"
                                wire:model="injuredvictim_name">
                            <span class="text-danger"> @error('injuredvictim_name')
                                    {{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">ID No</label>
                                <input type="text" class="form-control" placeholder="ID No"
                                    wire:model="injuredvictim_name">
                                <span class="text-danger"> @error('injuredvictim_name')
                                        {{ $message }}@enderror</span>
                                </div>
                            </div>
                            {{-- injured to who stuff or contrecter end --}}

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Designation</label>
                                    <input type="text" class="form-control" placeholder="Designation"
                                        wire:model="designation">
                                    <span class="text-danger"> @error('designation') {{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">DOB</label>
                                        <input type="date" class="form-control" placeholder="12/12/2003" wire:model="">
                                        <span class="text-danger">
                                            {{-- @error('age') {{ $message }}@enderror --}}
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Age</label>
                                        <input type="text" class="form-control" placeholder="Age" wire:model="age">
                                        <span class="text-danger">
                                            {{-- @error('age') {{ $message }}@enderror --}}
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="project name" class="form-label">Sex</label>
                                        <select class="form-control">
                                            <option selected hidden>Select</option>
                                            @foreach ($genderData as $item)
                                                <option>{{ $item->gender_description }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Date of joing</label>
                                        <input type="date" class="form-control" placeholder="5/12/2003" wire:model="">
                                        <span class="text-danger">
                                            {{-- @error('age') {{ $message }}@enderror --}}
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <label>Safety Inducted</label>
                                    <div class=" form-group">
                                        <div class="form-group form-check-inline">
                                            <input class="form-check-input" name="injuryto" type="radio" value="YES" id="YES">
                                            <label class="form-check-label" for="YES">
                                                YES
                                            </label>
                                        </div>
                                        <div class="form-group form-check-inline">
                                            <input class="form-check-input" name="injuryto" type="radio" value="NO" id="NO">
                                            <label class="form-check-label" for="NO">
                                                NO
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Marital Status</label>
                                    <div class=" form-group">
                                        <div class="form-group form-check-inline">
                                            <input class="form-check-input" name="maritalStatus" type="radio" value="married"
                                                id="married">
                                            <label class="form-check-label" for="married">
                                                Married
                                            </label>
                                        </div>
                                        <div class="form-group form-check-inline">
                                            <input class="form-check-input" name="maritalStatus" type="radio" value="unmarried"
                                                id="unmarried">
                                            <label class="form-check-label" for="unmarried">
                                                UnMarried
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <label>Was the person on duty</label>
                                    <div class=" form-group">
                                        <div class="form-group form-check-inline">
                                            <input class="form-check-input" name="onDuty" type="radio" value="YES" id="onDutyYES">
                                            <label class="form-check-label" for="onDutyYES">
                                                YES
                                            </label>
                                        </div>
                                        <div class="form-group form-check-inline">
                                            <input class="form-check-input" name="onDuty" type="radio" value="NO" id="onDutyNO">
                                            <label class="form-check-label" for="onDutyNO">
                                                NO
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label title="Was the person authorized to be in the Incident area">Person authorized to be in
                                        Incident..</label>
                                    <div class=" form-group">
                                        <div class="form-group form-check-inline">
                                            <input class="form-check-input" name="auth" type="radio" value="YES" id="authYES">
                                            <label class="form-check-label" for="authYES">
                                                YES
                                            </label>
                                        </div>
                                        <div class="form-group form-check-inline">
                                            <input class="form-check-input" name="auth" type="radio" value="NO" id="authNo">
                                            <label class="form-check-label" for="authNo">
                                                NO
                                            </label>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="presentaddress">Present Address</label>
                                        <textarea class="form-control" placeholder="your present address here"
                                            id="presentaddress"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="permanentaddress">Permanent Address</label>
                                        <textarea class="form-control" placeholder="your Permanent address here"
                                            id="permanentaddress"></textarea>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label title="To whom was the Incident Reported first" for="reportedFirst"
                                            class="form-label">Reported first</label>
                                        <input type="text" class="form-control" id="reportedFirst">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bywhom" class="form-label">By Whom</label>
                                        <input type="text" class="form-control" id="bywhom">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label title="To whom was the Incident Reported first" for="witness1"
                                            class="form-label">Witness (1) Name</label>
                                        <input type="text" class="form-control" id="witness1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="designation1" class="form-label">Designation</label>
                                        <input type="text" class="form-control" id="designation1">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label title="To whom was the Incident Reported first" for="witness2"
                                            class="form-label">Witness (2) Name</label>
                                        <input type="text" class="form-control" id="witness2">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="designation2" class="form-label">Designation</label>
                                        <input type="text" class="form-control" id="designation2">
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <label>Was First Aid given on Site</label>
                                    <div class=" form-group">
                                        <div class="form-group form-check-inline">
                                            <input class="form-check-input" name="firstaid" type="radio" value="YES"
                                                id="wasfirstaidyes">
                                            <label class="form-check-label" for="wasfirstaidyes">
                                                YES
                                            </label>
                                        </div>
                                        <div class="form-group form-check-inline">
                                            <input class="form-check-input" name="firstaid" type="radio" value="NO"
                                                id="wasfirstaidno">
                                            <label class="form-check-label" for="wasfirstaidno">
                                                NO
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="nameofaider" class="form-label">Name of the First Aider</label>
                                        <input type="text" class="form-control" id="nameofaider">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label>Was the victim taken to a Hospital</label>
                                    <div class=" form-group">
                                        <div class="form-group form-check-inline">
                                            <input class="form-check-input" name="takenhospital" type="radio" value="YES"
                                                id="wastakenhospitalyes">
                                            <label class="form-check-label" for="wastakenhospitalyes">
                                                YES
                                            </label>
                                        </div>
                                        <div class="form-group form-check-inline">
                                            <input class="form-check-input" name="takenhospital" type="radio" value="NO"
                                                id="wastakenhospitalno">
                                            <label class="form-check-label" for="wastakenhospitalno">
                                                NO
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="nameofhospital" class="form-label">Name of the Hospital</label>
                                        <input type="text" class="form-control" id="nameofhospital">
                                    </div>
                                </div>


                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label title="State whether the victim is still in the hospital or discharged" for="stillhospital" class="form-label">State whether the victim ...</label>
                                        <input type="text" class="form-control" id="stillhospital">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label title="State whether he returned to work. If so, when" for="returntoworkifdt" class="form-label">State whether the victim ...</label>
                                        <input type="date" class="form-control" id="returntoworkifdt">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label title="Was the victim under the influence of alcohol or any drugs at the time of the Incident">influence of alcohol or any drugs ....</label>
                                    <div class=" form-group">
                                        <div class="form-group form-check-inline">
                                            <input class="form-check-input" name="alcoholordrugs" type="radio" value="YES"
                                                id="alcoholordrugsyes">
                                            <label class="form-check-label" for="alcoholordrugsyes">
                                                YES
                                            </label>
                                        </div>
                                        <div class="form-group form-check-inline">
                                            <input class="form-check-input" name="alcoholordrugs" type="radio" value="NO"
                                                id="alcoholordrugslno">
                                            <label class="form-check-label" for="alcoholordrugsno">
                                                NO
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input " type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Check me out
                                </label>
                            </div>
                        </div> --}}
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
