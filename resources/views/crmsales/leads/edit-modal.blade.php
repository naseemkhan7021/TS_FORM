<style>
    .modal-dialog #addLead {
        border: 2mm solid green;
        webkit-border-radius: 10px;
        moz-border-radius: 10px;
        border-radius: 10px;

    }

</style>

{{-- modal-dialog-centered --}}

<div class="modal fade editLead " wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document" id="editLead">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit / Update Leads</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form wire:submit.prevent="update" autocomplete="off">
                    <input type="hidden" wire:model="cid">
                    <div class="form-group">


                        <div class="row">
                            <div class="col">
                                <label for="">First Name</label>
                                <input type="text" class="form-control" placeholder="First Name"
                                    wire:model.lazy="upd_first_name" autocomplete="false">
                                <span class="text-danger"> @error('upd_first_name')
                                        {{ $message }}@enderror</span>
                            </div>

                            <div class="col">
                                    <label for="">Middle Name </label>
                                    <input type="text" class="form-control" placeholder="Middle Date"
                                        wire:model="upd_middle_name" autocomplete="false">
                                    <span class="text-danger"> @error('upd_middle_name')
                                            {{ $message }}@enderror</span>
                            </div>

                            <div class="col">
                                <label for="">last Name</label>
                                <input type="text" class="form-control" placeholder="last Name"
                                    wire:model="upd_last_name" autocomplete="false">
                                <span class="text-danger"> @error('upd_last_name')
                                        {{ $message }}@enderror</span>
                            </div>

                            <div class="col">
                                <label for="">Mobile No</label>
                                <input type="text" class="form-control" placeholder="Mobile No"
                                    wire:model="upd_mobile">
                                <span class="text-danger"> @error('upd_mobile') {{ $message }}@enderror</span>
                            </div>
                        </div>
                    </div>


                    {{-- {{ strpos($selectedUnits2, $su['salesunit_id']) !== false ? "checked" : '' }}  --}}

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Full Name </label> <br>
                                <label wire:model="full_name"><span class="text-red-600"> {{ $upd_first_name }}
                                        {{ $upd_middle_name }} {{ $upd_last_name }} </span></label>
                                {{-- <input wire:model="full_name" value='{{  $first_name }} {{  $middle_name }} {{  $last_name }} ' type="text" class="form-control" placeholder="Full Name" autocomplete="off" > --}}
                                <span class="text-danger"> @error('upd_full_name')
                                        {{ $message }}@enderror</span>
                            </div>
                            <div class="col">
                                    <label for="">Email ID </label>
                                    <input wire:model="upd_email" type="text" class="form-control" placeholder="Email ID">
                                    <span class="text-danger"> @error('upd_email') {{ $message }}@enderror</span>
                            </div>
                            <div class="col">
                                <label for="">Lead Current Status</label>
                                {{-- <input wire:model="current_leadstatus_id" type="text" class="form-control" placeholder="Lead Status" > --}}

                                <select wire:model="upd_current_leadstatus_id" class="form-control">
                                    <option value="1" selected>Lead Current Status</option>
                                    @foreach ($leadstatus as $lds)
                                        <option value="{{ $lds->leadstatus_id }}"
                                            wire:key="{{ $lds->leadstatus_id }} ">
                                            {{ $lds->leadstatus_description }}</option>
                                    @endforeach
                                </select>

                                <span class="text-danger"> @error('upd_current_leadstatus_id')
                                        {{ $message }}@enderror</span>
                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="">Residential Address </label>
                        <input wire:model="upd_residental_address" type="text" class="form-control"
                            placeholder="Residential Address" autocomplete="off">
                        <span class="text-danger"> @error('residental_address') {{ $message }}@enderror</span>
                    </div>


                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <label for="">Unit Interested </label>
                                                                <input wire:model="upd_required_sales_unit" type="text" class="form-control"
                                                                    placeholder="Units" autocomplete="off" readonly>
                                                                <input wire:model="selectedUnit2s" type="text" class="form-control"
                                                                    placeholder="Units" autocomplete="off">

                                                                    {{-- {{  $this->selectedUnits2 = $upd_required_sales_unit }} --}}
                                                                    {{-- wire:model='selectedUnits2' --}}
                                                                    {{-- {{ print_r($selectedUnit2s) }} --}}

                                                                    {{-- wire:click='addcheckValue({{ $su->salesunit_id }})' --}}

                                                                    <table>
                                                                        <tr>
                                                                            <br>
                                                                              @if (count($salesunits)>0)
                                                                                @foreach ($salesunits as $su)
                                                                                <td>
                                                                                    <input  type="checkbox" class="checkbox checkbox-primary"  wire:model='selectedUnit2s' value={{ $su->salesunit_id }} />
                                                                                    <label style="padding:4px;color:darkgreen;font-weight:bold;" > {{ $su->salesunit_description }}  </label>
                                                                              </td>
                                                                              @endforeach
                                                                          @endif

                                                                          {{-- <input type="text" class="form-control" wire:model="iRequiredUnit"  placeholder="Unit Required"> --}}
                                                                        </tr>
                                                                    </table>





                                                                <span class="text-danger"> @error('upd_required_sales_unit')
                                                                        {{ $message }}@enderror</span>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="">Required Property Status </label>
                                                                    {{-- <input wire:model="current_propertystatus_id" type="text" class="form-control" placeholder="Company Name" > --}}

                                                                    <select wire:model="upd_current_propertystatus_id" class="form-control">
                                                                        <option value="" selected>Property Status</option>
                                                                        @foreach ($propertystatus as $ps)
                                                                            <option value="{{ $ps->propertystatus_id }}">
                                                                                {{ $ps->propertystatus_description }}</option>
                                                                        @endforeach
                                                                    </select>


                                                                    <span class="text-danger"> @error('upd_current_propertystatus_id')
                                                                            {{ $message }}@enderror</span>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-9">
                                                                        <label for="">Company Name </label>
                                                                        <input wire:model="upd_company_name" type="text" class="form-control"
                                                                            placeholder="Company Name">
                                                                        <span class="text-danger"> @error('upd_company_name')
                                                                                {{ $message }}@enderror</span>
                                                                        </div>

                                                                        <div class="col-md-3">
                                                                            <label for="">Designation </label>
                                                                            <input wire:model="upd_designation" type="text" class="form-control"
                                                                                placeholder="Designation">
                                                                            <span class="text-danger"> @error('upd_designation')
                                                                                    {{ $message }}@enderror</span>
                                                                            </div>

                                                                        </div>
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <label for="">Source</label>
                                                                                {{-- <input wire:model="current_source_id" type="text" class="form-control" placeholder="current_source_id" > --}}

                                                                                <select wire:model="upd_current_source_id" class="form-control">
                                                                                    <option value="1" selected>Source</option>
                                                                                    @foreach ($leadsource as $ldsr)
                                                                                        <option value="{{ $ldsr->source_id }}">{{ $ldsr->source_description }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>

                                                                                <span class="text-danger"> @error('upd_current_source_id')
                                                                                        {{ $message }}@enderror</span>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="">Occupation </label>
                                                                                    <input wire:model="upd_occupation" type="text" class="form-control"
                                                                                        placeholder="Occupation">
                                                                                    <span class="text-danger"> @error('upd_occupation')
                                                                                            {{ $message }}@enderror</span>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label for="">Registered Date </label>
                                                                                        <input wire:model.lazy="upd_created_at" type="text" class="form-control"
                                                                                            placeholder="Registered Date" id="created_at" name="created_at" readonly>
                                                                                        <span class="text-danger"> @error('upd_created_at')
                                                                                                {{ $message }}@enderror</span>
                                                                                        </div>
                                                                                        <div class="col">
                                                                                            <label for="">Next Follow Up Date </label>
                                                                                            <input wire:model.lazy="upd_dtfollowdate" type="date" class="form-control"
                                                                                                placeholder="Next FollowUp Date" id="dtfollowdate" name="dtfollowdate">
                                                                                            <span class="text-danger"> @error('upd_dtfollowdate')
                                                                                                    {{ $message }}@enderror</span>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <div class="col-md-1">
                                                                                                <label for="">Min </label>
                                                                                                <input type="text" class="form-control" placeholder="Min" wire:model="upd_lead_min_range">
                                                                                                <span class="text-danger"> @error('upd_lead_min_range')
                                                                                                        {{ $message }}@enderror</span>
                                                                                                </div>
                                                                                                <div class="col-md-1">
                                                                                                    <label for="">Max </label>
                                                                                                    <input type="text" class="form-control" placeholder="Max" wire:model="upd_lead_max_range">
                                                                                                    <span class="text-danger"> @error('upd_lead_max_range')
                                                                                                            {{ $message }}@enderror</span>
                                                                                                    </div>
                                                                                                    <div class="col-md-1">
                                                                                                        <label for="">Current </label>
                                                                                                        <input type="text" class="form-control" placeholder="current" wire:model="upd_lead_current_range">
                                                                                                        <span class="text-danger"> @error('upd_lead_current_range')
                                                                                                                {{ $message }}@enderror</span>
                                                                                                        </div>

                                                                                                        <div class="col">
                                                                                                            <label for="">Range </label>
                                                                                                            <input type="range" style="width:100%" class="form-range pt-3" min={{ $upd_lead_min_range }} value={{ $upd_lead_current_range }} max={{ $upd_lead_max_range }} step="0.5" >
                                                                                                        </div>
                                                                                                    </div>

                                                                                                </div>


                                                                                                <div class="form-group">
                                                                                                    <div class="row">
                                                                                                        <div class="col">
                                                                                                            <label for="">Feed Back</label>
                                                                                                            <textarea wire:model="upd_lead_feedback" class="form-control" placeholder="Lead Feedback"
                                                                                                                rows="3" cols="50">
                                                                                                        </textarea>
                                                                                                            <span class="text-danger"> @error('upd_lead_feedback') {{ $message }}
                                                                                                                @enderror</span>
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
                                                                            </div>
