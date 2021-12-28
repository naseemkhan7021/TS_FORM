<div class="modal fade editOrganizationrequirment" wire:ignore.self tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit / Update Organization Requirement</h5>
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
                            wire:model="organization_requirement_description">
                        <span class="text-danger"> @error('organization_requirement_description')
                                {{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="">Abbrivation</label>
                            <input type="text" class="form-control" placeholder="Abbrivation"
                                wire:model="organization_requirement_abbr">
                            <span class="text-danger"> @error('organization_requirement_abbr')
                                    {{ $message }}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="">Value</label>
                                <input type="number" class="form-control" placeholder="value"
                                    wire:model="organization_requirement_value">
                                <span class="text-danger"> @error('organization_requirement_value')
                                        {{ $message }}@enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="detail_add"
                                        class="@error('organization_requirement_detail') text-danger @enderror">Detail</label>
                                    <textarea wire:model='organization_requirement_detail' placeholder="Detail about {{$organization_requirement_description}}"
                                        name="detail" id="detail_add" rows="4"
                                        class="form-control @error('organization_requirement_detail') border border-danger @enderror"></textarea>
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
