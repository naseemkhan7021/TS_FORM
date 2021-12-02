<style>
    .modal-dialog  #addProject {
        border: 2mm solid green;
        webkit-border-radius: 10px;
        moz-border-radius: 10px;
        border-radius: 10px;

    }
</style>

{{-- modal-dialog-centered --}}

<div class="modal fade addProjectwings" wire:ignore.self tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document" id="addProject">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Projects</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form wire:submit.prevent="save">
                    <div class="form-group">
                        <label for="">Project Name </label>
                        <input type="text" class="form-control" placeholder="Project Name" wire:model="sProjectName">
                        <span class="text-danger"> @error('sProjectName') {{ $message }}@enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="">Location </label>
                        <input type="text" class="form-control" placeholder="Location" wire:model="sLocation">
                        <span class="text-danger"> @error('sLocation') {{ $message }}@enderror</span>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="">Wing Description</label>
                                <input type="text" class="form-control" placeholder="Wing Description" wire:model="sWingDescription">
                                <span class="text-danger"> @error('sWingDescription') {{ $message }}@enderror</span>
                            </div>
                            <div class="col">
                                <label for="">Wing Abbrivation </label>
                                <input type="text" class="form-control" placeholder="Wing Abbrivation" wire:model.lazy="sWingAbbr"   >
                                <span class="text-danger"> @error('sWingAbbr') {{ $message }}@enderror</span>
                            </div>
                            <div class="col">
                                <label for="">No of Floors </label>
                                <input type="text" class="form-control" placeholder="No of Floors" wire:model.lazy="iFloors"   >
                                <span class="text-danger"> @error('iFloors') {{ $message }}@enderror</span>
                            </div>

                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="">Flats Per Floor </label>
                                <input type="text" class="form-control" placeholder="Flats Per Floor" wire:model.lazy="iUnitsperfloor"   >
                                <span class="text-danger"> @error('iUnitsperfloor') {{ $message }}@enderror</span>
                            </div>
                            <div class="col">
                                <label for="">No. of Shops ( Ground Floor)</label>
                                <input type="text" class="form-control" placeholder="Wing Description" wire:model.lazy="iShopsW">
                                <span class="text-danger"> @error('iShopsW') {{ $message }}@enderror</span>
                            </div>
                            <div class="col">
                                <label for="">No. of Offices ( First Floor) </label>
                                <input type="text" class="form-control" placeholder="Wing Abbrivation" wire:model.lazy="iOfficeW"   >
                                <span class="text-danger"> @error('iOfficeW') {{ $message }}@enderror</span>
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



