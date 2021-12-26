<div class="modal fade editFormdata18" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit / Update INSPECTION</h5>
                <button wire:click='clearValidationf()' type="button" class="close" data-dismiss="modal"
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
                                class="form-label @error('iproject_id_fk') text-danger @enderror">Project</label>

                            <select wire:model="iproject_id_fk"
                                class="form-control  @error('iproject_id_fk') border-danger @enderror">
                                <option selected disabled value="0">Select Project</option>
                                @foreach ($projectData as $item)
                                    <option value="{{ $item->iproject_id }}">{{ $item->sproject_name }}</option>
                                @endforeach
                            </select>
                            {{-- {{ $iproject_id_fk }} --}}
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="form-controp">

                            <label for="" class="">Project Location
                            </label>
                            <input type="text" class="form-control" placeholder="Location"
                                wire:model="sproject_location" readonly>
                        </div>
                    </div>

                    {{-- <div class="col-md-3 col-sm-6">
                        <div class="form-controp">
                            <label for="" class="@error('ehsind_dt') text-danger @enderror">Data/Time
                                @error('ehsind_dt') <i class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <input type="text" class="form-control" wire:model="ehsind_dt" readonly>
                        </div>
                    </div> --}}
                    <div class="col-md-3 col-sm-6"></div>


                    {{-- project detail end --}}

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="" class="@error('extinguisher_no') text-danger @enderror">Extinguisher No</label>
                            <input type="text" class="form-control  @error('extinguisher_no') border-danger @enderror"
                                placeholder="Extinguisher No" wire:model="extinguisher_no">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="location_edit" class="@error('location') text-danger @enderror">Location</label>
                            <input id="location_edit" type="text"
                                class="form-control  @error('location') border-danger @enderror" placeholder="inside"
                                wire:model="location">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="type_edit" class="@error('type') text-danger @enderror">Type</label>
                            <input id="type_edit" type="text"
                                class="form-control  @error('type') border-danger @enderror" placeholder="Type"
                                wire:model="type">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="size_edit" class="@error('size') text-danger @enderror">Size</label>
                            <input id="size_edit" type="text"
                                class="form-control  @error('size') border-danger @enderror" placeholder="size"
                                wire:model="size">
                        </div>
                    </div>


                    {{-- pressure_gauge_or_safety_pin_status --}}
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for="" title="Pressure_Gauge_Or_Safety_Pin_Status"
                                class="form-label @error('pressure_gauge_or_safety_pin_status') text-danger @enderror">Pressure_Gauge...</label>

                            <div class="form-control @error('pressure_gauge_or_safety_pin_status') border border-danger @enderror">
                                <div class="form-check form-check-inline">
                                    <input checked wire:model='pressure_gauge_or_safety_pin_status' value="Good"
                                        class="form-check-input" name="status_edit" type="radio" id="Good_edit">
                                    <label class="form-check-label" for="Good_edit">Good</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input wire:model='pressure_gauge_or_safety_pin_status' value="Bad"
                                        class="form-check-input" name="status_edit" type="radio" id="Bad_edit">
                                    <label class="form-check-label" for="Bad_edit">Bad</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- seal_intact_and_not_corroded --}}
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for="" title="Seal_Intact_And_Not_Corroded"
                                class="form-label @error('seal_intact_and_not_corroded') text-danger @enderror">Seal_Intact...</label>

                            <div class="form-control @error('seal_intact_and_not_corroded') border border-danger @enderror">
                                <div class="form-check form-check-inline">
                                    <input checked wire:model='seal_intact_and_not_corroded' value="Yes"
                                        class="form-check-input" name="sealIntact_edit" type="radio" id="Yes_edit">
                                    <label class="form-check-label" for="Yes_edit">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input wire:model='seal_intact_and_not_corroded' value="No" class="form-check-input"
                                        name="sealIntact_edit" type="radio" id="No_edit">
                                    <label class="form-check-label" for="No_edit">No</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name_of_responsible_person" class="@error('name_of_responsible_person') text-danger @enderror">Name Of Responsible Person</label>
                            <input id="name_of_responsible_person" type="text"
                                class="form-control  @error('name_of_responsible_person') border-danger @enderror"
                                placeholder="Name Of Responsible Person" wire:model="name_of_responsible_person">
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="Date_Of_Refilling_edit" class="@error('date_of_refilling') text-danger @enderror">Date Of Refilling</label>
                            <input id="Date_Of_Refilling_edit" type="date"
                                class="form-control  @error('date_of_refilling') border-danger @enderror"
                                placeholder="Date_Of_Refilling" wire:model="date_of_refilling">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="Date_Of_Inspection_edit" class="@error('date_of_inspection') text-danger @enderror">Date Of Inspection</label>
                            <input id="Date_Of_Inspection_edit" type="date"
                                class="form-control  @error('date_of_inspection') border-danger @enderror"
                                placeholder="Date Of Inspection" wire:model="date_of_inspection">
                        </div>
                    </div>

                    <div class="col-md-6"></div>

                    {{-- due next date  --}}
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="due_for_next_Refilling_edit" class="@error('due_for_next_refilling') text-danger @enderror">Due next Refilling</label>
                            <input readonly id="due_for_next_Refilling_edit" type="date"
                                class="form-control  @error('due_for_next_refilling') border-danger @enderror"
                                placeholder="Due For Next Refilling" wire:model="due_for_next_refilling">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="due_for_next_Inspection_edit" class="@error('due_for_next_inspection') text-danger @enderror">Due next Inspection</label>
                            <input readonly id="due_for_next_Inspection_edit" type="date"
                                class="form-control  @error('due_for_next_inspection') border-danger @enderror"
                                placeholder="Due for next Inspection" wire:model="due_for_next_inspection">
                        </div>
                    </div>

                    <hr class="text-secondary w-100">

                    {{-- Completed by :  start --}}
                    <div class="col-md-3 form-group">
                        <label for="completedbyname" class="@error('inspected_by_name') text-danger @enderror">Completed by - Name:</label>
                        <input placeholder="Name " type="text" wire:model='inspected_by_name' id="completedbyname"
                            class="form-control border @error('inspected_by_name') border-danger @enderror">
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="completedbyname" class="@error('inspected_by_designation') text-danger @enderror">Designation</label>
                        <input placeholder="Designation" type="text" wire:model='inspected_by_designation' id="completedbyname"
                            class="form-control border @error('inspected_by_designation') border-danger @enderror">
                    </div>

                    <div class="col-md-3 form-group">
                        <label class="@error('inspected_by_signature') text-danger @enderror">Signature:</label>

                        <div class="form-check form-check-inline form-control border @error('inspected_by_signature') border-danger @enderror">
                            <input wire:model='inspected_by_signature' class="form-check-input ml-2" type="checkbox" id="completedbysignature_edit" value="1">
                            <label class="form-check-label" for="completedbysignature_edit">check me verify</label>
                        </div>
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="completedbydate" class="@error('inspected_by_date') text-danger @enderror">Date</label>
                        <input type="date" wire:model='inspected_by_date' id="completedbydate"
                            class="form-control border @error('inspected_by_date') border-danger @enderror">
                    </div>
                    {{-- Completed by :  end --}}


                    <hr class="text-secondary w-100">

                    <div class="col-12">
                        <div class="form-group">
                            <button wire:click='clearValidationf()' type="button" class="btn btn-danger btn-sm"
                                data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-sm">Save Change</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
