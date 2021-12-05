<div class="modal fade addSubactivity" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Sub-activity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="save">
                    <div class="form-group">
                        <label for="">Sub-activity Description</label>
                        <input type="text" class="form-control" placeholder="Sub-activity Description"
                            wire:model="sub_activity_description">
                        <span class="text-danger"> @error('sub_activity_description')
                                {{ $message }}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="">Sub-activity Abbrivation</label>
                        <input type="text" class="form-control" placeholder="Sub-activity Abbrivation"
                            wire:model="sub_activity_abbr">
                        <span class="text-danger"> @error('sub_activity_abbr') {{ $message }}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">activity Description</label>
                        <select wire:model="activity_id_fk" class="form-control">
                            <option value="0" hidden>Select main activity</option>
                            @forelse ($activityData as $item)
                                <option value="{{ $item->activity_id }}">{{ $item->activity_description }}</option>
                            @empty

                            @endforelse
                            @error('activity_id_fk')
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
