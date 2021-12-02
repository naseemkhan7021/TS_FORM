<style>
    .modal-dialog #addLead {
        border: 2mm solid green;
        webkit-border-radius: 10px;
        moz-border-radius: 10px;
        border-radius: 10px;

    }

    /* input[type='date'] {
        width: 11rem;
    } */

    .img-fluid-2 {
        max-width: 70%;
        height: auto;
    }

    .required:after {
        content: " *";
        color: red;
    }

</style>

{{-- modal-dialog-centered --}}

<div class="modal fade editSecondaryMember" wire:ignore.self tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document" id="editSecondaryMember">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit / Update Secondary Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form wire:submit.prevent="update" autocomplete="off">
                    <input type="hidden" wire:model="cid">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="">Primary Member Name</label>
                                <input wire:model="primarymember_name" type="text" class="form-control" style="color:red;font-weight:bolder;" value = ''
                                readonly
                                placeholder="Primary Member Name">

                                {{-- <select wire:model='upd_iMemberID_FK' class="form-control" readonly>
                                    <option value="0" hidden>SELECT PRIMERY MEMBER NAME</option>
                                    @foreach ($primerymemberdata as $pd)
                                        <option value="{{ $pd->iMemberID }}">{{ $pd->sMember_FullName }} &ThinSpace;&ThickSpace; {{ $pd->sManagementUnitID }}  </option>
                                    @endforeach
                                </select> --}}
                            </div>
                            <div class="col-2">
                                <label for="relationship">Relationship</label>
                                <select wire:model='upd_iRelationTypeID_FK' name="upd_relationship" id="upd_relationship" class="form-control">
                                    <option value="0">SELECT RELATION TYPE</option>
                                    @foreach ( $relationtype as $rt )
                                        <option value="{{ $rt->relationtype_id }}">{{ $rt->relationtype_description }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- @livewire('show-post', ['post' => $post]) --}}
                            {{-- @php $iMemberID = $upd_iMemberID_FK; @endphp --}}
                            {{-- {{ $this->bookingdate }}
                            {{ $this->flatno }}
                            {{ $this->upd_iMemberID_FK }} --}}
                            {{-- @livewire('get-booking-date', [ 'iMemberID' => $this->upd_iMemberID_FK ] ) --}}

                            <div class="col-md-2">
                                <label for="">Date of Booking </label>
                                <input wire:model="bookingdate" type="text" class="form-control" style="color:red;font-weight:bolder;" value = ''
                                    readonly
                                    placeholder="Date of Booking">
                                <span class="text-danger"> @error('bookingdate') {{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-2">
                                <label for="">Unit No </label>
                                <input wire:model="flatno" type="text" class="form-control" style="color:red;font-weight:bolder;" value = ''
                                    readonly
                                    placeholder="">
                                <span class="text-danger"> @error('flatno') {{ $message }}@enderror</span>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">

                            <div class="col">
                                <label for="">Member First Name</label>
                                <input type="text" class="form-control" placeholder="First Name"
                                    wire:model.lazy="upd_sSecondary_FirstName" autocomplete="false">
                                <span class="text-danger"> @error('upd_sSecondary_FirstName')
                                        {{ $message }}@enderror</span>
                                </div>

                                <div class="col">
                                    <label for="">Member Middle Name </label>
                                    <input type="text" class="form-control" placeholder="Middle Date"
                                        wire:model="upd_sSecondary_MiddleName" autocomplete="false">
                                    <span class="text-danger"> @error('upd_sSecondary_MiddleName')
                                            {{ $message }}@enderror</span>
                                    </div>



                                    <div class="col">
                                        <label for="">Member last Name</label>
                                        <input type="text" class="form-control" placeholder="last Name"
                                            wire:model="upd_sSecondary_LastName" autocomplete="false">
                                        <span class="text-danger"> @error('upd_sSecondary_LastName')
                                                {{ $message }}@enderror</span>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="">Gender</label>
                                            <select wire:model="upd_iGenderID_FK" class="form-control">
                                                <option value="0" hidden>GENDER SELECTED</option>
                                                @foreach ($genderdata as $gd)
                                                    <option value="{{ $gd->gender_id }}">{{ $gd->gender_description }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger"> @error('upd_iGenderID_FK') {{ $message }}@enderror</span>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">Member Full Name </label> <br>
                                                <label wire:model="upd_sSecondary_FullName"><span class="text-red-600">
                                                        {{ $upd_sSecondary_FirstName }} {{ $upd_sSecondary_MiddleName }}
                                                        {{ $upd_sSecondary_LastName }} </span></label>

                                                {{-- <input wire:model="sSecondary_FullName" value='{{  $sMember_FirstName }} {{  $sMember_MiddleNam }} {{  $sMember_LastName }} ' type="text" class="form-control" placeholder="Full Name" autocomplete="off" > --}}
                                                <span class="text-danger"> @error('upd_sSecondary_FullName')
                                                        {{ $message }}@enderror</span>
                                                </div>


                                                <div class="col-md-3">
                                                    <label for="">Email ID </label>
                                                    <input wire:model="upd_sEmailID1_sc" type="email" class="form-control"
                                                        placeholder="Email ID">
                                                    <span class="text-danger"> @error('upd_sEmailID1_sc') {{ $message }}@enderror</span>
                                                    </div>

                                                    <div class="col">
                                                        <label for="">Mobile No</label>
                                                        <input type="text" class="form-control" placeholder="Mobile No"
                                                            wire:model="upd_sMobileNo1_sc">
                                                        <span class="text-danger"> @error('upd_sMobileNo1_sc') {{ $message }}@enderror</span>
                                                        </div>



                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="">Date Of Birth </label> <br>
                                                            <input wire:model="upd_dtDOB_sc"  type="date" class="form-control" autocomplete="off">
                                                            <span class="text-danger"> @error('upd_dtDOB_sc') {{ $message }}@enderror</span>
                                                            </div>


                                                            {{-- <div class="col-md-3">
                                                                <label for="">Date of Booking </label>
                                                                <input wire:model="upd_dtDOBK" type="date" class="form-control"
                                                                    placeholder="Date of Booking">
                                                                <span class="text-danger"> @error('upd_dtDOBK') {{ $message }}@enderror</span>
                                                                </div> --}}

                                                                {{-- <div class="col">
                                                                    <label for="">Unit No</label>
                                                                     <input type="text" class="form-control" placeholder="Unit No" wire:model="iPurchased_unitID_FK">

                                                                    <select wire:model="upd_iPurchased_unitID_FK" class="form-control">
                                                                        <option value="0" hidden>NO UNIT SELECTED</option>
                                                                        @foreach ($projectunits as $pju)
                                                                            <option value="{{ $pju->iID }}">{{ $pju->sManagementUnitID }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <span class="text-danger"> @error('upd_iPurchased_unitID_FK')
                                                                            {{ $message }}@enderror</span>
                                                                    </div> --}}

                                                                    <div class="col-md-3">
                                                                        <label for="">Occupation</label>
                                                                        <input type="text" class="form-control" placeholder="Occupation"
                                                                            wire:model="upd_sOccupation_sc">
                                                                        <span class="text-danger"> @error('upd_sOccupation_sc') {{ $message }}@enderror</span>
                                                                        </div>


                                                                    </div>
                                                                </div>



                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-3">

                                                                            <label for="" class='required'>Aadhaar Card </label> <br>
                                                                            <input wire:model="upd_sAadhaarCard_sc" type="text" class="form-control"
                                                                                placeholder="1234-1234-1234-1234" autocomplete="off">
                                                                            <span class="text-danger"> @error('upd_sAadhaarCard_sc')
                                                                                    {{ $message }}@enderror</span>

                                                                                <label for="">Aadhaar Card Photo </label>
                                                                                <input wire:model="upd_sAadhaarCard_Photo_sc"  type="file" class="form-control">
                                                                                <span class="text-danger"> @error('upd_sAadhaarCard_Photo_sc')
                                                                                        {{ $message }}@enderror</span>

                                                                                </div>

                                                                                <div class="col-md-3  overflow-hidden text-center">
                                                                                    @if ($old_sAadhaarCard_Photo_sc)
                                                                                    <div class="p-2 border border-success" style="cursor: pointer">
                                                                                        <label for="" class='text-success'>old AadharCard photo</label>
                                                                                        <img src="{{ Storage::url($old_sAadhaarCard_Photo_sc) }}" class="img-fluid-2" >


                                                                                    </div>

                                                                                    @endif
                                                                                    @if ($upd_sAadhaarCard_Photo_sc)
                                                                                    <div class="p-2 border border-danger mt-2" style="cursor: pointer">
                                                                                        <label for="" class="text-danger">new AadharCard photo</label>
                                                                                        <img src="{{ $upd_sAadhaarCard_Photo_sc->temporaryUrl() }}" class="img-fluid-2">
                                                                                    </div>
                                                                                    @endif
                                                                                </div>

                                                                                <div class="col-md-3  ">

                                                                                    <label for="" class='required'>Pan Card</label>
                                                                                    <input type="text" class="form-control" placeholder="WERXXX23" wire:model="upd_sPanCard_sc">
                                                                                    <span class="text-danger"> @error('upd_sPanCard_sc') {{ $message }}@enderror</span>

                                                                                        <label for="">Pan Card Photo</label>
                                                                                        <input type="file" class="form-control" placeholder="upload photo"
                                                                                            wire:model="upd_sPanCard_Photo_sc" >
                                                                                        <span class="text-danger"> @error('upd_sPanCard_Photo_sc')
                                                                                                {{ $message }}@enderror</span>

                                                                                        </div>

                                                                                        <div class="col-md-3  overflow-hidden text-center">
                                                                                            @if ($old_sPanCard_Photo_sc)
                                                                                            <div class="p-2 border border-success" style="cursor: pointer">
                                                                                                <label for="" class='text-success'>old PandCard photo</label>
                                                                                                <img src="{{ Storage::url($old_sPanCard_Photo_sc) }}" class="img-fluid-2" >

                                                                                            </div>
                                                                                            @endif
                                                                                            @if ($upd_sPanCard_Photo_sc)
                                                                                            <div class="p-2 border border-danger mt-2" style="cursor: pointer">
                                                                                                <label for="" class="text-danger">new PandCard photo</label>
                                                                                                <img src="{{ $upd_sPanCard_Photo_sc->temporaryUrl() }}" class="img-fluid-2">
                                                                                            </div>
                                                                                            @endif
                                                                                        </div>


                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="row">
                                                                                        <div class="col-md-9">
                                                                                            <label for="">Residential Address </label>
                                                                                            <input wire:model="upd_sResidentialAddress1_sc" type="text" class="form-control"
                                                                                                placeholder="Residential Address" autocomplete="off">
                                                                                            <span class="text-danger"> @error('upd_sResidentialAddress1_sc')
                                                                                                    {{ $message }}@enderror</span>
                                                                                            </div>


                                                                                            <div class="col-md-3">
                                                                                                <label for="">City </label>
                                                                                                <input wire:model="upd_sCity_sc" type="text" class="form-control" placeholder="City">
                                                                                                <span class="text-danger"> @error('upd_sCity_sc') {{ $message }}@enderror</span>
                                                                                                </div>


                                                                                            </div>
                                                                                        </div>


                                                                                        <div class="form-group">
                                                                                            <div class="row">
                                                                                                <div class="col-md-9">
                                                                                                    <label for="">Residential Address </label>
                                                                                                    <input wire:model="upd_sResidentialAddress2_sc" type="text" class="form-control"
                                                                                                        placeholder="Residential Address" autocomplete="off">
                                                                                                    <span class="text-danger"> @error('upd_sResidentialAddress2_sc')
                                                                                                            {{ $message }}@enderror</span>
                                                                                                    </div>


                                                                                                    <div class="col-md-3">
                                                                                                        <label for="">Pin Code </label>
                                                                                                        <input wire:model="upd_sPinCode_sc" type="text" class="form-control" placeholder="400 001">
                                                                                                        <span class="text-danger"> @error('upd_sPinCode_sc') {{ $message }}@enderror</span>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                </div>

                                                                                                <div class="form-group">
                                                                                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                                                                                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                                                                                                </div>

                                                                                            </form>

                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                            <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>

                                                                            <script>
                                                                                // var picker = new Pikaday({ field: document.getElementById('datepicker') });

                                                                                var picker = new Pikaday({
                                                                                    field: document.getElementById('dtfollowdate'),
                                                                                    format: 'Y-m-d',
                                                                                    toString(date, format) {
                                                                                        // you should do formatting based on the passed format,
                                                                                        // but we will just return 'D/M/YYYY' for simplicity
                                                                                        const day = date.getDate();
                                                                                        const month = date.getMonth() + 1;
                                                                                        const year = date.getFullYear();
                                                                                        return `${year}-${month}-${day}`;
                                                                                    },
                                                                                    parse(dateString, format) {
                                                                                        // dateString is the result of `toString` method
                                                                                        const parts = dateString.split('/');
                                                                                        const day = parseInt(parts[0], 10);
                                                                                        const month = parseInt(parts[1], 10) - 1;
                                                                                        const year = parseInt(parts[2], 10);
                                                                                        return new Date(year, month, day);
                                                                                    }
                                                                                });
                                                                            </script>
