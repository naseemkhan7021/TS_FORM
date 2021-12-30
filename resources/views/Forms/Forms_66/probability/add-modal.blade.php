<div class="modal fade addProbability" wire:ignore.self tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Probability</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="save">

                    <div class="form-group">
                        <label for="">Description </label>
                        <input type="text" class="form-control" placeholder="Description"
                            wire:model="probability_description">
                        <span class="text-danger"> @error('probability_description')
                                {{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="">Abbrivation</label>
                            <input type="text" class="form-control" placeholder="Abbrivation"
                                wire:model="probability_abbr">
                            <span class="text-danger"> @error('probability_abbr')
                                    {{ $message }}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="">Value</label>
                                <input type="number" class="form-control" placeholder="value"
                                    wire:model="probability_value">
                                <span class="text-danger"> @error('probability_value')
                                        {{ $message }}@enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="detail_add" class="@error('probability_detail') text-danger @enderror">Detail</label>
                                    <textarea wire:model='probability_detail' placeholder="Detail about {{$probability_description}}" name="detail" id="detail_add" rows="4" class="form-control @error('probability_detail') border border-danger @enderror"></textarea>
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
