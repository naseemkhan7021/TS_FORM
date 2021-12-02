<style>
    .modal-dialog #addLead {
        border: 2mm solid green;
        webkit-border-radius: 10px;
        moz-border-radius: 10px;
        border-radius: 10px;

    }

</style>

{{-- modal-dialog-centered --}}

<div class="modal fade editLeadfollowup " wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document" id="editLeadfollowup">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Display Current Follow Up & Create New Follow Up</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body">
                <form>
                <fieldset class="border border-danger p-3">
                    <legend style="width: unset; text-transform: uppercase; font-size: 1.2rem;"  class="font-weight-bolder modal-title uppercase">Read only</legend>
                       <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="font-weight-bolder" for="">Lead ID</label>
                                    <input type="text" class="border-0 form-control" value={{ $upd_lead_ID }} placeholder="First Name" autocomplete="false" readonly>
                                </div>

                                <div class="col-md-6">
                                        <label class="font-weight-bolder" for="">Lead Full Name </label>
                                        <input type="text" class="border-0 form-control" value={{ $upd_lead_ID }} placeholder="Middle Date"
                                            wire:model="upd_lead_fullname" autocomplete="false" readonly>

                                </div>

                                <div class="col-md-2">
                                    <label class="font-weight-bolder" for="">Lead Source</label>
                                    <input type="text" class="border-0 form-control" value={{ $upd_lead_source_description }} placeholder="last Name"
                                        wire:model="upd_lead_source_description" autocomplete="false" readonly>

                                </div>

                                <div class="col-md-2">
                                    <label class="font-weight-bolder" for="">Mobile No</label>
                                    <input type="text" class="border-0 form-control" value={{ $upd_lead_mobile }} placeholder="Mobile No"
                                        wire:model="upd_lead_mobile" readonly>

                                </div>
                            </div>
                        </div>




                    <div class="form-group">

                        <div class="row">
                            <div class="col-md-2">
                                <label class="font-weight-bolder" for="">Current Status</label> {{ $upd_last_current_status_id }}
                                <input type="text" class="border-0 form-control" placeholder="First Name"
                                    wire:model.lazy="upd_last_curren_status" autocomplete="false" readonly>
                            </div>

                            <div class="col-md-6">
                                    <label class="font-weight-bolder" for="">Staff/Auto Feed Back </label>
                                    <input type="text" class="border-0 form-control" placeholder="Middle Date"
                                        wire:model="upd_staff_feedback" autocomplete="false" readonly>

                            </div>

                            <div class="col-md-2">
                                <label class="font-weight-bolder" for="">Last Date</label>
                                <input type="text" class="border-0 form-control" placeholder="last Name"
                                    wire:model="upd_lead_email" autocomplete="false" readonly>

                            </div>

                            <div class="col-md-2">
                                <label class="font-weight-bolder" for="">Staff Name</label>
                                <input type="text" class="border-0 form-control" placeholder="Mobile No"
                                    wire:model="upd_staff_name" readonly>

                            </div>
                        </div>
                    </div>

                </fieldset>
            </form>

            </div>

            <div class="modal-body">
                <form wire:submit.prevent="save" autocomplete="off">



                <div class="form-group">

                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Current Date</label>
                            <input type="date" class="form-control" placeholder="Current Date"
                                wire:model.lazy="current_dt" autocomplete="false">
                        </div>

                        <div class="col-md-3">
                            <label for="">New Status </label>

                            <select wire:model="lead_newstatus_FK" class="form-control">
                                <option value="1" selected>Lead Current Status</option>
                                @foreach($leadstatus as $lds)
                                    <option value="{{ $lds->leadstatus_id }}" wire:key="{{ $lds->leadstatus_id }} " >{{ $lds->leadstatus_description }}</option>
                                @endforeach
                            </select>

                            <span class="text-danger"> @error('lead_newstatus_FK') {{ $message }}@enderror</span>
                        </div>


                        <div class="col-md-3">
                            <label for="">Next FollowUp Date</label>
                            <input type="date" class="form-control" placeholder="Next FollowUp Date"
                                wire:model="nextfollowup_dt" autocomplete="false">

                        </div>

                        <div class="col-md-3">
                            <label for="">Conversation Mode</label>


                            <select wire:model="modeofconversation_id_fk" class="form-control">
                                <option value="1" selected>Mode Of Converation</option>
                                @foreach($conversationmode as $cm)
                                    <option value="{{ $cm->conversation_id }}" wire:key="{{ $cm->conversation_id }} " >{{ $cm->conversation_description }}</option>
                                @endforeach
                            </select>

                            <span class="text-danger"> @error('modeofconversation_id_fk') {{ $message }}@enderror</span>
                        </div>
                    </div>
                </div>



                <div class="form-group">

                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Latest Feed Back (Staff)</label>
                            <input type="text" class="form-control" placeholder="First Name"
                                wire:model.lazy="staff_description" autocomplete="false">
                        </div>

                    </div>
                </div>


                {{-- <br> --}}

                <div class="form-group">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                </div>


                </form>
            </div>
        </div>


