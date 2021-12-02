<div class="modal fade editChannelPartner " wire:ignore.self tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit / Update Channel Partner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="update">
                    <input type="hidden" wire:model="cid">

                    <div class="form-group">
                        <label for="">First Name </label>
                        <input type="text" class="form-control" placeholder="First Name" wire:model="upd_cp_first_name">
                        <span class="text-danger"> @error('upd_cp_first_name') {{ $message }}@enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="">Middle Name </label>
                        <input type="text" class="form-control" placeholder="Middle Name" wire:model="upd_cp_middle_name">
                        <span class="text-danger"> @error('upd_cp_middle_name') {{ $message }}@enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="">last Name</label>
                            <input type="text" class="form-control" placeholder="Last Name" wire:model="upd_cp_last_name">
                            <span class="text-danger"> @error('upd_cp_last_name') {{ $message }}@enderror</span>
                            </div>

                            <div class="form-group">
                                <label for="">Mobile No </label>
                                <input type="text" class="form-control" placeholder="Mobile No" wire:model="upd_cp_mobile">
                                <span class="text-danger"> @error('upd_cp_mobile') {{ $message }}@enderror</span>
                                </div>

                                <div class="form-group">
                                    <label for="">Rera ID </label>
                                    <input type="text" class="form-control" placeholder="Rera ID" wire:model="upd_rera_id">
                                    <span class="text-danger"> @error('upd_rera_id') {{ $message }}@enderror</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Email ID </label>
                                        <input type="text" class="form-control" placeholder="Email ID" wire:model="upd_cp_email">
                                        <span class="text-danger"> @error('upd_cp_email') {{ $message }}@enderror</span>
                                        </div>


                                        <div class="form-group">
                                            <label for="">Company Name</label>
                                            <input type="text" class="form-control" placeholder="Company Name"
                                                wire:model="upd_cp_company_name">
                                            <span class="text-danger"> @error('upd_cp_company_name') {{ $message }}@enderror</span>
                                            </div>

                                            <div class="form-group">
                                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
