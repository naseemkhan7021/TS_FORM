<style>
    .modal-dialog #addLead {
        border: 2mm solid green;
        webkit-border-radius: 10px;
        moz-border-radius: 10px;
        border-radius: 10px;

    }

</style>

{{-- modal-dialog-centered --}}

<div class="modal fade addLead" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document" id="addLead">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Leads</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form wire:submit.prevent="save" autocomplete="off">

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="">First Name</label>
                                <input type="text" class="form-control" placeholder="First Name" wire:model.lazy="first_name" autocomplete="false">
                                <span class="text-danger"> @error('first_name') {{ $message }}@enderror</span>
                            </div>

                            <div class="col">
                                <label for="">Middle Name </label>
                                <input type="text" class="form-control" placeholder="Middle Date" wire:model="middle_name" autocomplete="false">
                                <span class="text-danger"> @error('middle_name') {{ $message }}@enderror</span>
                            </div>

                            <div class="col">
                                <label for="">last Name</label>
                                <input type="text" class="form-control" placeholder="last Name" wire:model="last_name" autocomplete="false">
                                <span class="text-danger"> @error('last_name') {{ $message }}@enderror</span>
                            </div>

                            <div class="col">
                                <label for="">Mobile No</label>
                                <input type="text" class="form-control" placeholder="Mobile No" wire:model="mobile">
                                <span class="text-danger"> @error('mobile') {{ $message }}@enderror</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Full Name </label> <br>
                                <label wire:model="full_name" ><span class="text-red-600">  {{  $first_name }} {{  $middle_name }} {{  $last_name }} </span></label>
                                {{-- <input wire:model="full_name" value='{{  $first_name }} {{  $middle_name }} {{  $last_name }} ' type="text" class="form-control" placeholder="Full Name" autocomplete="off" > --}}
                                <span class="text-danger"> @error('full_name') {{ $message }}@enderror</span>
                            </div>
                            <div class="col">
                                <label for="">Email ID </label>
                                <input wire:model="email" type="text" class="form-control" placeholder="Email ID" >
                                <span class="text-danger"> @error('email') {{ $message }}@enderror</span>
                            </div>
                            <div class="col">
                                <label for="">Lead Current Status</label>
                                {{-- <input wire:model="current_leadstatus_id" type="text" class="form-control" placeholder="Lead Status" > --}}



                                <select wire:model="current_leadstatus_id" class="form-control">
                                    <option value="1" selected>Lead Current Status</option>
                                    @foreach($leadstatus as $lds)
                                        <option value="{{ $lds->leadstatus_id }}" wire:key="{{ $lds->leadstatus_id }} " >{{ $lds->leadstatus_description }}</option>
                                    @endforeach
                                </select>






                                <span class="text-danger"> @error('current_leadstatus_id') {{ $message }}@enderror</span>
                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="">Residential Address </label>
                        <input wire:model="residental_address" type="text" class="form-control" placeholder="Residential Address"  autocomplete="off" >
                        <span class="text-danger"> @error('residental_address') {{ $message }}@enderror</span>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-9">
                                <label for="">Unit Interested </label>
                                <input wire:model="required_sales_unit" type="text" class="form-control" placeholder="Units" autocomplete="off" readonly>

                                {{-- salesunits --}}


                                    <div class="mt-1">
                                        @foreach($salesunits as $su)
                                            <label class="mt-1 inline-flex items-center">
                                            <input type="checkbox" value="{{ $su->salesunit_id }}" wire:click="unitClicked('{{ $su->salesunit_id }}')"  wire:model="required_sales_unit_value.{{ $su->salesunit_id }}" class="form-checkbox h-6 w-6 text-green-500">
                                                <span class="ml-2 mr-2  text-lg">{{ $su->salesunit_description }}</span>
                                            </label>
                                        @endforeach
                                    </div>




                                <span class="text-danger"> @error('required_sales_unit') {{ $message }}@enderror</span>
                            </div>
                            <div class="col-md-3">
                                <label for="">Required Property Status </label>
                                {{-- <input wire:model="current_propertystatus_id" type="text" class="form-control" placeholder="Company Name" > --}}

                                <select wire:model="current_propertystatus_id" class="form-control">
                                    <option value="" selected>Property Status</option>
                                    @foreach($propertystatus as $ps)
                                        <option value="{{ $ps->propertystatus_id }}">{{ $ps->propertystatus_description }}</option>
                                    @endforeach
                                </select>


                                <span class="text-danger"> @error('current_propertystatus_id') {{ $message }}@enderror</span>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-9">
                                <label for="">Company Name </label>
                                <input wire:model="company_name" type="text" class="form-control" placeholder="Company Name" >
                                <span class="text-danger"> @error('company_name') {{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-3">
                                <label for="">Designation </label>
                                <input wire:model="designation" type="text" class="form-control" placeholder="Company Name" >
                                <span class="text-danger"> @error('designation') {{ $message }}@enderror</span>
                            </div>

                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="">Source</label>
                                {{-- <input wire:model="current_source_id" type="text" class="form-control" placeholder="current_source_id" > --}}

                                <select wire:model="current_source_id" class="form-control">
                                    <option value="1" selected>Source</option>
                                    @foreach($leadsource as $ldsr)
                                        <option value="{{ $ldsr->source_id }}">{{ $ldsr->source_description }}</option>
                                    @endforeach
                                </select>

                                <span class="text-danger"> @error('current_source_id') {{ $message }}@enderror</span>
                            </div>
                            <div class="col">
                                <label for="">Occupation </label>
                                <input wire:model="occupation" type="text" class="form-control" placeholder="Occupation" >
                                <span class="text-danger"> @error('occupation') {{ $message }}@enderror</span>
                            </div>
                            <div class="col">
                                <label for="">Registered Date </label>
                                <input wire:model.lazy="created_at" type="text" class="form-control" placeholder="Registered Date"  id="created_at" name="created_at"  readonly>
                                <span class="text-danger"> @error('created_at') {{ $message }}@enderror</span>
                            </div>
                            <div class="col">
                                <label for="">Next Follow Up Date </label>
                                <input  wire:model.lazy="dtfollowdate" type="text" class="form-control" placeholder="Next FollowUp Date" id="dtfollowdate" name="dtfollowdate" >
                                <span class="text-danger"> @error('dtfollowdate') {{ $message }}@enderror</span>
                            </div>

                        </div>
                </div>


                <div class="form-group">
                    <div class="row">
                        <div class="col-md-1">
                            <label for="">Min </label>
                            <input type="text" class="form-control" placeholder="Min" wire:model="lead_min_range">
                            <span class="text-danger"> @error('lead_min_range') {{ $message }}@enderror</span>
                        </div>
                        <div class="col-md-1">
                            <label for="">Max </label>
                            <input type="text" class="form-control" placeholder="Max" wire:model="lead_max_range">
                            <span class="text-danger"> @error('lead_max_range') {{ $message }}@enderror</span>
                        </div>
                        <div class="col">
                            <label for="">Range </label>
                            <input type="text" class="form-control" placeholder="Max" wire:model="lead_max_range">
                            <span class="text-danger"> @error('lead_max_range') {{ $message }}@enderror</span>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="">Feed Back</label>
                            <textarea wire:model="lead_feedback" class="form-control" placeholder="Lead Feedback" rows="3" cols="50">
                            </textarea>
                            <span class="text-danger"> @error('lead_feedback') {{ $message }} @enderror</span>
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


