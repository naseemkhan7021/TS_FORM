<div class="modal fade editScaleofimpact" wire:ignore.self tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit / Update Scale Of Impact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="update">
                    <input type="hidden" wire:model="cid">

                    <div class="form-group">
                        <label for="">Description </label>
                        <input type="text" class="form-control" placeholder="Description"
                            wire:model="scale_of_impact_description">
                        <span class="text-danger"> @error('scale_of_impact_description')
                                {{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="">Abbrivation</label>
                            <input type="text" class="form-control" placeholder="Abbrivation"
                                wire:model="scale_of_impact_abbr">
                            <span class="text-danger"> @error('scale_of_impact_abbr')
                                    {{ $message }}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="">Value</label>
                                <input type="number" class="form-control" placeholder="value"
                                    wire:model="scale_of_impact_value">
                                <span class="text-danger"> @error('scale_of_impact_value')
                                        {{ $message }}@enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="detail_add"
                                        class="@error('scale_of_impact_detail') text-danger @enderror">Detail</label>
                                    <textarea wire:model='scale_of_impact_detail' placeholder="Detail about {{$scale_of_impact_description}}"
                                        name="detail" id="detail_add" rows="4"
                                        class="form-control @error('scale_of_impact_detail') border border-danger @enderror"></textarea>
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
