<div class="modal fade addHeader22" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Header</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="save" class="row g-3">


                    {{-- project detail start --}}
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="project name"
                                class="form-label @error('iproject_id_fk') text-danger @enderror">Project</label>

                            <select wire:model="iproject_id_fk"
                                class="form-control  @error('iproject_id_fk') border-danger @enderror">
                                <option selected disabled value="0">Project name</option>
                                @foreach ($projectData as $item)
                                    <option value="{{ $item->iproject_id }}">{{ $item->sproject_name }}</option>
                                @endforeach
                            </select>
                            {{-- {{ $iproject_id_fk }} --}}
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="form-controp">

                            <label for="" class="">Location
                                </label>
                            <input type="text" class="form-control" placeholder="Location"
                                wire:model="sproject_location" readonly>
                            {{-- <span class="text-danger"> 
                                    @error('sproject_location')
                                        {{ $message }}@enderror</span> --}}
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="form-controp">
                            <label for="" class="@error('ehsind_dt') text-danger @enderror">Data/Time
                                @error('ehsind_dt') <i class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <input type="text" class="form-control" wire:model="ehsind_dt">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Contractor Name</label>
                            <input type="text" class="form-control  @error('contractor_name') border-danger @enderror" placeholder="Contractor Name" wire:model="contractor_name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="venue">Venue</label>
                            <input id="venue" type="text" class="form-control  @error('venue') border-danger @enderror" placeholder="venue" wire:model="venue">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="faculty_name">Faculty Name</label>
                            <input id="faculty_name" type="text" class="form-control  @error('faculty_name') border-danger @enderror" placeholder="Faculty Name" wire:model="faculty_name">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="duration">Duration</label>
                            <input id="duration" type="text" class="form-control  @error('duration') border-danger @enderror" placeholder="Duration" wire:model="duration">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="faculty_sign">Faculty Sign</label>
                            <input id="faculty_sign" type="text" class="form-control  @error('faculty_sign') border-danger @enderror" placeholder="Faculty_Sign" wire:model="faculty_sign">
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="site_safety_in_charge_name">Site Safety In Charge Name</label>
                            <input id="site_safety_in_charge_name" type="text" class="form-control  @error('site_safety_in_charge_name') border-danger @enderror" placeholder="Site Safety In Charge Name" wire:model="site_safety_in_charge_name">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="site_safety_in_charge_sign">Site Safety In Charge Sign</label>
                            <input id="site_safety_in_charge_sign" type="text" class="form-control  @error('site_safety_in_charge_sign') border-danger @enderror" placeholder="Site Safety In Charge Sign" wire:model="site_safety_in_charge_sign">
                        </div>
                    </div>

                    {{-- project detail end --}}

                    <div class="col-12">
                        <div class="form-group">
                            <button type="button"
                                class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
