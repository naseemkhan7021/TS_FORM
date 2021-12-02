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
.img-fluid-2{
    max-width: 70%;
    height: auto;
}
.required:after {
    content:" *";
    color: red;
  }

</style>

{{-- modal-dialog-centered --}}

<div class="modal fade addPrimaryMember" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document" id="addPrimaryMember">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Primary Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form wire:submit.prevent="save" enctype="multipart/form-data" autocomplete="off">

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="" class='required'>Member First Name</label>
                                <input type="text" class="form-control" placeholder="First Name" wire:model.lazy="sMember_FirstName" autocomplete="false">
                                <span class="text-danger"> @error('sMember_FirstName') {{ $message }}@enderror</span>
                            </div>

                            <div class="col">
                                <label for="" class='required'>Member Middle Name </label>
                                <input type="text" class="form-control" placeholder="Middle Date" wire:model="sMember_MiddleName" autocomplete="false">
                                <span class="text-danger"> @error('sMember_MiddleName') {{ $message }}@enderror</span>
                            </div>

                            <div class="col">
                                <label for="">Member last Name</label>
                                <input type="text" class="form-control" placeholder="last Name" wire:model="sMember_LastName" autocomplete="false">
                                <span class="text-danger"> @error('sMember_LastName') {{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-3">
                                <label for="">Gender</label>
                                <select wire:model="iGenderID_FK" class="form-control">
                                    <option value="0" hidden>GENDER SELECTED</option>
                                    @foreach($genderdata as $gd)
                                        <option value="{{ $gd->gender_id }}">{{ $gd->gender_description }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"> @error('iGenderID_FK') {{ $message }}@enderror</span>
                            </div>



                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Full Name </label> <br>
                                <label wire:model="sMember_Fullname" ><span class="text-red-600">  {{  $sMember_FirstName }} {{  $sMember_MiddleName }} {{  $sMember_LastName }} </span></label>

                                {{-- <input wire:model="sMember_Fullname" value='{{  $sMember_FirstName }} {{  $sMember_MiddleNam }} {{  $sMember_LastName }} ' type="text" class="form-control" placeholder="Full Name" autocomplete="off" > --}}
                                <span class="text-danger"> @error('sMember_Fullname') {{ $message }}@enderror</span>
                            </div>


                            <div class="col-md-3">
                                <label for="">Email ID </label>
                                <input wire:model="sEmailID1" type="email" class="form-control" placeholder="Email ID" >
                                <span class="text-danger"> @error('sEmailID1') {{ $message }}@enderror</span>
                            </div>

                            <div class="col">
                                <label for="">Mobile No</label>
                                <input type="text" class="form-control" placeholder="Mobile No" wire:model="sMobileNo1">
                                <span class="text-danger"> @error('sMobileNo1') {{ $message }}@enderror</span>
                            </div>



                        </div>
                    </div>



                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Date Of Birth </label> <br>
                                <input wire:model="dtDOB" type="date" class="form-control" autocomplete="off" >
                                <span class="text-danger"> @error('dtDOB') {{ $message }}@enderror</span>
                            </div>


                            <div class="col-md-3">
                                <label for="">Date of Booking  </label>
                                <input wire:model="dtDOBK" type="date" class="form-control" placeholder="Date of Booking" >
                                <span class="text-danger"> @error('dtDOBK') {{ $message }}@enderror</span>
                            </div>

                            <div class="col">
                                <label for="">Unit No</label>
                                {{-- <input type="text" class="form-control" placeholder="Unit No" wire:model="iPurchased_unitID_FK"> --}}

                                <select wire:model="iPurchased_unitID_FK" class="form-control">
                                    <option value="0" hidden>NO UNIT SELECTED</option>
                                    @foreach($projectunits as $pju)
                                        <option value="{{ $pju->iID }}">{{ $pju->sManagementUnitID }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"> @error('iPurchased_unitID_FK') {{ $message }}@enderror</span>
                            </div>

                            <div class="col">
                                <label for="">Occupation</label>
                                <input type="text" class="form-control" placeholder="Occupation" wire:model="sOccupation">
                                <span class="text-danger"> @error('sOccupation') {{ $message }}@enderror</span>
                            </div>


                        </div>
                    </div>



                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">

                                <label for="" class='required'>Aadhaar Card </label> <br>
                                <input wire:model="sAadhaarCard" type="text" class="form-control" placeholder="1234-1234-1234-1234" autocomplete="off" >
                                <span class="text-danger"> @error('sAadhaarCard') {{ $message }}@enderror</span>

                                <label for="">Aadhaar Card Photo  </label>
                                <input wire:model="sAadhaarCard_Photo" type="file" class="form-control"  >
                                <span class="text-danger"> @error('sAadhaarCard_Photo') {{ $message }}@enderror</span>

                            </div>

                            <div class="col-md-3 overflow-hidden text-center">

                                @if ($sAadhaarCard_Photo)
                                <div class="p-2 border border-success" style="cursor: pointer">
                                    <label for="" class="text-danger">new AadharCard photo</label>
                                        <img src="{{ $sAadhaarCard_Photo->temporaryUrl() }}" class="img-fluid-2" >
                                </div>
                                    @endif
                            </div>
                            {{-- <div class="col-md-3">
                                <label for="">Aadhaar Card Photo  </label>
                                <input wire:model="sEmailID1" type="file" class="form-control" placeholder="Upload photo" >
                                <span class="text-danger"> @error('sEmailID1') {{ $message }}@enderror</span>
                            </div> --}}

                            <div class="col-md-3  ">

                                <label for="" class='required'>Pan Card</label>
                                <input type="text" class="form-control" placeholder="WERXXX23" wire:model="sPanCard">
                                <span class="text-danger"> @error('sPanCard') {{ $message }}@enderror</span>

                                <label for="">Pan Card Photo</label>
                                <input type="file" class="form-control" placeholder="upload photo" wire:model="sPanCard_Photo">
                                <span class="text-danger"> @error('sPanCard_Photo') {{ $message }}@enderror</span>

                            </div>

                            <div class="col-md-3  overflow-hidden text-center">
                                @if ($sPanCard_Photo)
                                <div class="p-2 border border-success" style="cursor: pointer">
                                    <label for="" class="text-danger">new PandCard photo</label>
                                    <img src="{{ $sPanCard_Photo->temporaryUrl() }}" class="img-fluid-2" >
                                </div>
                                @endif
                            </div>


                        </div>
                    </div>



                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-9">
                                <label for="">Residential Address </label>
                                <input wire:model="sResidentialAddress1" type="text" class="form-control" placeholder="Residential Address"  autocomplete="off" >
                                <span class="text-danger"> @error('sResidentialAddress1') {{ $message }}@enderror</span>
                            </div>


                            <div class="col-md-3">
                                <label for="">City  </label>
                                <input wire:model="sCity" type="text" class="form-control" placeholder="City" >
                                <span class="text-danger"> @error('sCity') {{ $message }}@enderror</span>
                            </div>


                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-9">
                            <label for="">Residential Address </label>
                            <input wire:model="sResidentialAddress2" type="text" class="form-control" placeholder="Residential Address"  autocomplete="off" >
                            <span class="text-danger"> @error('sResidentialAddress2') {{ $message }}@enderror</span>
                            </div>


                            <div class="col-md-3">
                                <label for="">Pin Code  </label>
                                <input wire:model="sPinCode" type="text" class="form-control" placeholder="400 001" >
                                <span class="text-danger"> @error('sPinCode') {{ $message }}@enderror</span>
                            </div>

                        </div>
                    </div>


                <br>

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


