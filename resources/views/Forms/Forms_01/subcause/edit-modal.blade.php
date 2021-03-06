<div class="modal fade editSubcause" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit / Update Sub-cause </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="update">
                    <div class="form-group">
                        <label for="">Sub-cause Description</label>
                        <input type="text" class="form-control" placeholder="Sub-cause Description"
                            wire:model="upd_sub_causes_description">
                        <span class="text-danger"> @error('upd_sub_causes_description')
                                {{ $message }}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="">Sub-cause Abbrivation</label>
                        <input type="text" class="form-control" placeholder="Sub-cause Abbrivation"
                            wire:model="upd_sub_causes_abbr">
                        <span class="text-danger"> @error('upd_sub_causes_abbr') {{ $message }}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Cause Description</label>
                        <select wire:model="upd_sub_causes_fk" class="form-control">
                            @forelse ($cousesData as $item)
                                <option {{$upd_sub_causes_fk === $item->causes_id ?  'selected' : ''}} value="{{ $item->causes_id }}">{{ $item->causes_description }}</option>
                            @empty

                            @endforelse
                            @error('upd_sub_causes_fk')
                                {{ $message }}
                            @enderror
                        </select>
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
