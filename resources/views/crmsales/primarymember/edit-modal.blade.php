

<style>
    .modal-dialog #addLead {
        border: 2mm solid green;
        webkit-border-radius: 10px;
        moz-border-radius: 10px;
        border-radius: 10px;

    }
    input[type='date'] {
    width: 11rem;
}
.img-fluid-2{
    max-width: 70%;
    height: auto;
}
.required:after {
    content:" *";
    color: red;
  }

</style>

{{-- <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
<script>
    var picker = new Pikaday({ field: document.getElementById('upd_dtStart') });
</script> --}}

{{-- modal-dialog-centered --}}

<div class="modal fade editPrimaryMember " wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document" id="editPrimaryMember">
        <div class="modal-content" >
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit / Update Primary Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="update" >
                    <input type="hidden" wire:model="cid">

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="" class='required'>Member First Name</label>
                                <input type="text" class="form-control" placeholder="First Name" wire:model.lazy="upd_sMember_FirstName" autocomplete="false">
                                <span class="text-danger"> @error('upd_sMember_FirstName') {{ $message }}@enderror</span>
                            </div>

                            <div class="col">
                                <label for="" class='required'>Member Middle Name </label>
                                <input type="text" class="form-control" placeholder="Middle Date" wire:model="upd_sMember_MiddleName" autocomplete="false">
                                <span class="text-danger"> @error('upd_sMember_MiddleName') {{ $message }}@enderror</span>
                            </div>

                            <div class="col">
                                <label for="">Member last Name</label>
                                <input type="text" class="form-control" placeholder="last Name" wire:model="upd_sMember_LastName" autocomplete="false">
                                <span class="text-danger"> @error('upd_sMember_LastName') {{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-3">
                                <label for="">Gender</label>
                                <select wire:model="upd_iGenderID_FK" class="form-control">
                                    <option value="0" hidden>GENDER SELECTED</option>
                                    @foreach($genderdata as $gd)
                                        <option value="{{ $gd->gender_id }}">{{ $gd->gender_description }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"> @error('iGenderID_FK') {{ $message }}@enderror</span>
                            </div>



                        </div>
                    </div>



                    {{ $upd_sMember_Fullname }}

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for=""> Full Name : {{  $upd_sMember_FirstName }} {{  $upd_sMember_MiddleName }} {{  $upd_sMember_LastName }} </label> <br>
                                <label wire:model="upd_sMember_Fullname" ><span class="text-red-600"> {{  $upd_sMember_Fullname }} </span></label>

                                {{-- <input wire:model="sMember_Fullname" value='{{  $sMember_FirstName }} {{  $sMember_MiddleNam }} {{  $sMember_LastName }} ' type="text" class="form-control" placeholder="Full Name" autocomplete="off" > --}}
                                <span class="text-danger"> @error('upd_sMember_Fullname') {{ $message }}@enderror</span>
                            </div>


                            <div class="col-md-3">
                                <label for="">Email ID </label>
                                <input wire:model="upd_sEmailID1" type="email" class="form-control" placeholder="Email ID" >
                                <span class="text-danger"> @error('upd_sEmailID1') {{ $message }}@enderror</span>
                            </div>

                            <div class="col">
                                <label for="">Mobile No</label>
                                <input type="text" class="form-control" placeholder="Mobile No" wire:model="upd_sMobileNo1">
                                <span class="text-danger"> @error('upd_sMobileNo1') {{ $message }}@enderror</span>
                            </div>



                        </div>
                    </div>





                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Date Of Birth </label> <br>
                                <input wire:model="upd_dtDOB" type="date" class="form-control" autocomplete="off" >
                                <span class="text-danger"> @error('upd_dtDOB') {{ $message }}@enderror</span>
                            </div>


                            <div class="col-md-3">
                                <label for="">Date of Booking  </label>
                                <input wire:model="upd_dtDOBK" type="date" class="form-control" placeholder="Date of Booking" >
                                <span class="text-danger"> @error('upd_dtDOBK') {{ $message }}@enderror</span>
                            </div>

                            <div class="col">
                                <label for="">Unit No</label>
                                {{-- <input type="text" class="form-control" placeholder="Unit No" wire:model="iPurchased_unitID_FK"> --}}


                                <select wire:model="upd_iPurchased_unitID_FK" class="form-control">
                                    <option value="0" hidden>NO UNIT SELECTED</option>
                                    @foreach($projectunits as $pju)
                                        <option value="{{ $pju->iID }}">{{ $pju->sManagementUnitID }} </option>
                                    @endforeach
                                </select>
                                <span class="text-danger"> @error('upd_iPurchased_unitID_FK') {{ $message }}@enderror</span>
                            </div>

                            <div class="col">
                                <label for="">Occupation</label>
                                <input type="text" class="form-control" placeholder="Occupation" wire:model="upd_sOccupation">
                                <span class="text-danger"> @error('upd_sOccupation') {{ $message }}@enderror</span>
                            </div>


                        </div>
                    </div>





                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">

                                <label for="" class='required'>Aadhaar Card </label> <br>
                                <input wire:model="upd_sAadhaarCard" type="text" class="form-control" placeholder="1234-1234-1234-1234" autocomplete="off" >
                                <span class="text-danger"> @error('upd_sAadhaarCard') {{ $message }}@enderror</span>

                                <label for="">Aadhaar Card Photo  </label>
                                <input wire:model="upd_sAadhaarCard_Photo" type="file" class="form-control"  >
                                <span class="text-danger"> @error('upd_sAadhaarCard_Photo') {{ $message }}@enderror</span>

                                {{-- {{ $upd_sAadhaarCard_Photo }} --}}
                            </div>

                            <div class="col-md-3  overflow-hidden text-center">
                                @if ($old_sAadhaarCard_Photo)
                                <div class="p-2 border border-success" style="cursor: pointer">
                                    <label for="" class='text-success'>old AadharCard photo</label>
                                    <img src="{{ Storage::url($old_sAadhaarCard_Photo) }}" class="img-fluid-2" >


                                </div>

                                @endif
                                @if ($upd_sAadhaarCard_Photo)
                                <div class="p-2 border border-danger mt-2" style="cursor: pointer">
                                    <label for="" class="text-danger">new AadharCard photo</label>
                                    <img src="{{ $upd_sAadhaarCard_Photo->temporaryUrl() }}" class="img-fluid-2">
                                </div>
                                @endif
                            </div>

                            {{-- <div class="col-md-3 overflow-hidden text-center">

                                @if ($upd_sAadhaarCard_Photo)
                                        <img src="{{ Storage::url($upd_sAadhaarCard_Photo) }}" class="img-fluid-2" >

                                    @endif
                            </div> --}}

                            {{-- <div class="col-md-3">
                                <label for="">Aadhaar Card Photo  </label>
                                <input wire:model="sEmailID1" type="file" class="form-control" placeholder="Upload photo" >
                                <span class="text-danger"> @error('sEmailID1') {{ $message }}@enderror</span>
                            </div> --}}

                            <div class="col-md-3  ">

                                <label for="" class='required'>Pan Card</label>
                                <input type="text" class="form-control" placeholder="WERXXX23" wire:model="upd_sPanCard">
                                <span class="text-danger"> @error('upd_sPanCard') {{ $message }}@enderror</span>

                                <label for="">Pan Card Photo</label>
                                <input type="file" class="form-control" placeholder="upload photo" wire:model="upd_sPanCard_Photo">
                                <span class="text-danger"> @error('upd_sPanCard_Photo') {{ $message }}@enderror</span>

                                {{-- {{ $upd_sPanCard_Photo }} --}}
                            </div>

                            {{-- <div class="col-md-3  overflow-hidden text-center">
                                @if ($upd_sPanCard_Photo)
                                    <img src="{{ $upd_sPanCard_Photo }}" class="img-fluid-2" >
                                    <img src="{{ Storage::url($upd_sPanCard_Photo) }}" class="img-fluid-2" >
                                @endif
                            </div> --}}

                            <div class="col-md-3  overflow-hidden text-center">
                                @if ($old_sPanCard_Photo)
                                <div class="p-2 border border-success" style="cursor: pointer">
                                    <label for="" class='text-success'>old PandCard photo</label>
                                    <img src="{{ Storage::url($old_sPanCard_Photo) }}" class="img-fluid-2" >

                                </div>
                                @endif
                                @if ($upd_sPanCard_Photo)
                                <div class="p-2 border border-danger mt-2" style="cursor: pointer">
                                    <label for="" class="text-danger">new PandCard photo</label>
                                    <img src="{{ $upd_sPanCard_Photo->temporaryUrl() }}" class="img-fluid-2">
                                </div>
                                @endif
                            </div>


                        </div>
                    </div>




                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-9">
                                <label for="">Residential Address </label>
                                <input wire:model="upd_sResidentialAddress1" type="text" class="form-control" placeholder="Residential Address"  autocomplete="off" >
                                <span class="text-danger"> @error('upd_sResidentialAddress1') {{ $message }}@enderror</span>
                            </div>


                            <div class="col-md-3">
                                <label for="">City  </label>
                                <input wire:model="upd_sCity" type="text" class="form-control" placeholder="City" >
                                <span class="text-danger"> @error('upd_sCity') {{ $message }}@enderror</span>
                            </div>


                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-9">
                            <label for="">Residential Address </label>
                            <input wire:model="upd_sResidentialAddress2" type="text" class="form-control" placeholder="Residential Address"  autocomplete="off" >
                            <span class="text-danger"> @error('upd_sResidentialAddress2') {{ $message }}@enderror</span>
                            </div>


                            <div class="col-md-3">
                                <label for="">Pin Code  </label>
                                <input wire:model="upd_sPinCode" type="text" class="form-control" placeholder="400 001" >
                                <span class="text-danger"> @error('upd_sPinCode') {{ $message }}@enderror</span>
                            </div>

                        </div>
                    </div>


                <br>






                    <div class="form-group">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
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
    field: document.getElementById('upd_dtStart'),
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

