<div class="modal fade editDurationofImpact" wire:ignore.self tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit / Update Duration of Impact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="update">
                    <input type="hidden" wire:model="cid">

                    <div class="form-group">
                        <label for="">Duration of Impact Description </label>
                        <input type="text" class="form-control" placeholder="Duration of Impact Description"
                            wire:model="duration_of_impact_description">
                        <span class="text-danger"> @error('duration_of_impact_description')
                                {{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="">Duration of Impact Abbrivation</label>
                            <input type="text" class="form-control" placeholder="Duration of Impact Abbrivation"
                                wire:model="duration_of_impact_abbr">
                            <span class="text-danger"> @error('duration_of_impact_abbr')
                                    {{ $message }}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="">Duration of Impact Value</label>
                                <input type="number" class="form-control" placeholder="Duration of Impact value"
                                    wire:model="duration_of_impact_value">
                                <span class="text-danger"> @error('duration_of_impact_value')
                                        {{ $message }}@enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="detail_add"
                                        class="@error('duration_of_impact_detail') text-danger @enderror">Detail</label>
                                    <textarea wire:model='duration_of_impact_detail' placeholder="Detail about duration of impact"
                                        name="detail" id="detail_add" rows="4"
                                        class="form-control @error('duration_of_impact_detail') border border-danger @enderror"></textarea>
                                </div>

                                <div class="form-group">
                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary btn-sm">Save Change</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
