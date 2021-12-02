<style>
    .modal-dialog #addLead {
        border: 2mm solid green;
        webkit-border-radius: 10px;
        moz-border-radius: 10px;
        border-radius: 10px;

    }

</style>

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css" />
@endsection



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
                                <input wire:model="required_sales_unit" type="text" class="form-control" placeholder="Units" autocomplete="off" value="{{  $selectedUnits }}"  >
                                 {{-- {{  $selectedUnits }} --}}
                                <table>
                                    <tr>

                                      <!-- unit_list -->
                                      {{-- id="required_sales_unit".<?php //echo $su['salesunit_id']  ?>  name="required_sales_unit".<?php //echo $su['salesunit_id']  ?> --}}


                                         {{-- {{  $selectedUnits }} --}}

                                        <br>

                                        {{-- {{ count($salesunits)  }} --}}

                                      @if (count($salesunits))


                                            @php $iCounter = 1; @endphp

                                            @foreach ($salesunits as $su)

                                            <td>
                                                <input type="checkbox" wire:model="selectedUnits"     value={{ $su->salesunit_abbr }} >
                                                {{-- <label style="padding:4px;color:darkred;font-weight:bold;" for={{ $selectedUnits[$iCounter]->salesunit_id }} > {{ $selectedUnits[$iCounter]->salesunit_abbr }}  </label> --}}
                                                <label style="padding:4px;color:darkgreen;font-weight:bold;" for={{ $su->salesunit_id }} > {{ $su->salesunit_description }}  </label>

                                                {{-- <div class="checkbox checkbox-primary">
                                                    <input id={{ $su['salesunit_id'] }}   name="required_sales_unit"  value={{ $su['salesunit_id'] }}   type="checkbox">
                                                    <label style="padding:4px;color:darkred;font-weight:bold;" for=<?php //echo $su["salesunit_id"] ?>> <?php echo $su["salesunit_description"] ?> </label>
                                                </div> --}}
                                          </td>
                                          @php $iCounter++; @endphp
                                          @endforeach

                                          {{-- {{  $this->required_sales_unit }} --}}



                                      @endif

                                      <input type="hidden" class="form-control" id="iRequiredUnit" name="iRequiredUnit" placeholder="Unit Required">
                                    </tr>
                                  </table>




                                    {{-- <div class="mt-1">
                                        @foreach($salesunits as $su)
                                            <label class="mt-1 inline-flex items-center">


                                                <span class="ml-2 mr-2  text-lg">{{ $su->salesunit_description }}</span>
                                            </label>
                                        @endforeach
                                    </div>



                                    <td>
                                        <div class="checkbox checkbox-primary">
                                          <input name="iReqUnit" id=<?php echo $list['iUnitTypeID']  ?> value=<?php echo "'" . $list['sDescriptionL1'] . "'"  ?> type="checkbox">
                                          <label style="padding:4px;color:darkgreen;font-weight:bold;" for=<?php echo $list["iUnitTypeID"] ?>> <?php echo $list["sDescriptionL1"] ?> </label>
                                        </div>
                                    </td> --}}



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
                                <label for="registered_dt">Registered Date </label>
                                <input wire:model.lazy="registered_dt" type="text" class="form-control" placeholder="Registered Date"  id="registered_dt" name="registered_dt" readonly>
                                <span class="text-danger"> @error('registered_dt') {{ $message }}@enderror</span>
                            </div>
                            <div class="col">
                                <label for="dtfollowdate">Next Follow Up Date </label>
                                <input  wire:model.lazy="dtfollowdate" type="date" class="form-control" placeholder="Next FollowUp Date" id="dtfollowdate" name="dtfollowdate" value='{{ $dtfollowdate }}' >
                                <span class="text-danger"> @error('dtfollowdate') {{ $message }}@enderror</span>
                            </div>

                        </div>
                    </div>





                <div class="form-group">

                    <div class="row">
                        <div class="col-md-1">
                            <label for="">Min </label>
                            <input type="text" class="form-control" placeholder="Min" wire:model.lazy="lead_min_range" readonly>
                            <span class="text-danger"> @error('lead_min_range') {{ $message }}@enderror</span>
                        </div>
                        <div class="col-md-1">
                            <label for="">Max </label>
                            <input type="text" class="form-control" placeholder="Max" wire:model.lazy="lead_max_range">
                            <span class="text-danger"> @error('lead_max_range') {{ $message }}@enderror</span>
                        </div>
                        <div class="col-md-1">
                            <label for="">Current </label>
                            <input type="text" class="form-control" placeholder="Max" wire:model="lead_current_range">
                            <span class="text-danger"> @error('lead_current_range') {{ $message }}@enderror</span>
                        </div>

                        <div class="col">
                            <label for="">Range </label><br>
                            {{-- <input type="text" class="form-control" placeholder="Max" wire:model="lead_max_range"> --}}
                            {{-- <input type="range" min="1" max="100" value="50" class="slider" id="myRange"> --}}


                            <input type="range" style="width:100%" class="form-range pt-3" min={{ $lead_min_range }} value={{ $lead_current_range }} max={{ $lead_max_range }} step="0.5" >

                            {{-- <span class="text-danger"> @error('lead_max_range') {{ $message }}@enderror</span> --}}
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


@section('script')




@endsection
