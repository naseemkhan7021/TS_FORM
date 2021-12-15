<div class="modal fade editCompany" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit / Update Company</h5>
                <button wire:click='clearallValuesandValidation()' type="button" class="close"
                    data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="update">
                    <input type="hidden" wire:model="cid">
                    {{-- <div class="form-group">
                         <label for="">Continent</label>
                         <select class="form-control" wire:model="upd_continent">
                               <option value="">No selected</option>
                               @foreach ($continents as $continent)
                                   <option value="{{ $continent->id }}">{{ $continent->continent_name }}</option>
                               @endforeach

                         </select>
                         <span class="text-danger"> @error('upd_continent') {{ $message }}@enderror</span>
                     </div> --}}
                    <div class="form-group">
                        <label for="">Company Name</label>
                        <input type="text" class="form-control" placeholder="Company Description"
                            wire:model="upd_sbc_company_name">
                        <span class="text-danger"> @error('upd_sbc_company_name') {{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="">Company Abbrivation</label>
                            <input type="text" class="form-control" placeholder="Company Abbrivation"
                                wire:model="upd_sbc_abbr">
                            <span class="text-danger"> @error('upd_sbc_abbr') {{ $message }}@enderror</span>
                            </div>

                            <div class="form-group">
                                <label for="">License Valid Till </label>
                                <input type="date" class="form-control" placeholder="License Valid Till"
                                    wire:model="upd_validupto_dt">
                                <span class="text-danger"> @error('upd_validupto_dt') {{ $message }}@enderror</span>
                                </div>


                                {{-- img upload --}}
                                <div class="form-group">
                                    <label for="" class="">Upload img</label>
                                    <hr class="my-1">
                                    <div class="row g-3">
                                        <div class="col-md-6 form-group">
                                            <label for="largeImg">Large img</label>
                                            <div class="custom-file">
                                                <input
                                                    wire:click='{{ ($sbc_logo_large != '') | null ? $this->handelfileupload($sbc_logo_large, 'large', 'edit') : '' }}'
                                                    wire:model='sbc_logo_large' type="file" class="custom-file-input" id="largelogo"
                                                    aria-describedby="inputGroupFileAddon01">
                                                <label class="custom-file-label" for="largelogo">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="smallImg">Small img</label>
                                            <div class="custom-file">
                                                <input
                                                    wire:click='{{ ($sbc_logo_small != '') | null ? $this->handelfileupload($sbc_logo_small, 'small', 'edit') : '' }}'
                                                    wire:model='sbc_logo_small' type="file" class="custom-file-input" id="smalllogo"
                                                    aria-describedby="inputGroupFileAddon01">
                                                <label class="custom-file-label" for="smalllogo">Choose file</label>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="" class="">Image Preview</label>
                                            <hr class="my-1">
                                        </div>

                                        {{-- image preview --}}
                                        <div class="col-md-6 form-group">
                                            <div class="custom-file text-center">
                                                {{-- D:\xampp\htdocs\naseem_tsforms\storage\app\public\photos\injuredDoc\Dhoni_1639298740.png --}}

                                                @if ($sbc_logo_large)
                                                    <a target="_blank" href="{{ $sbc_logo_large->temporaryUrl() }}"
                                                        class="h-100 d-block">
                                                        <img src="{{ $sbc_logo_large->temporaryUrl() }}"
                                                            alt="{{ $sbc_logo_large->temporaryUrl() }}" class="w-100 h-100"
                                                            style="object-fit: contain">
                                                    </a>
                                                @else
                                                    @if (Storage::disk()->exists($old_sbc_logo_large))
                                                        {{-- find file is exist or not --}}

                                                        <a href="{{ Storage::url($old_sbc_logo_large) }}" class="h-100 d-block"
                                                            href="javascript:void(0)">
                                                            <img src="{{ Storage::url($old_sbc_logo_large) }}"
                                                                alt="{{ Storage::url($old_sbc_logo_large) }}"
                                                                class="w-100 h-100" style="object-fit: contain">
                                                        </a>
                                                        @else
                                                        <b class="text-danger">File Not Found</b>

                                                    @endif
                                                @endif

                                            </div>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <div class="custom-file">
                                                @if ($sbc_logo_small)
                                                    <a target="_blank" href="{{ $sbc_logo_small->temporaryUrl() }}"
                                                        class="h-100 d-block">
                                                        <img src="{{ $sbc_logo_small->temporaryUrl() }}"
                                                            alt="{{ $sbc_logo_small->temporaryUrl() }}" class="w-100 h-100"
                                                            style="object-fit: contain">
                                                    </a>
                                                @else
                                                    @if ($old_sbc_logo_small && Storage::disk()->exists($old_sbc_logo_small))
                                                        <a href="{{ Storage::url($old_sbc_logo_small) }}" class="h-100 d-block"
                                                            href="javascript:void(0)">
                                                            <img src="{{ Storage::url($old_sbc_logo_small) }}"
                                                                alt="{{ Storage::url($old_sbc_logo_small) }}"
                                                                class="w-100 h-100" style="object-fit: contain">
                                                        </a>
                                                    @else
                                                        <b class="text-danger">File Not Found</b>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <button wire:click='clearallValuesandValidation()' type="button" class="btn btn-danger btn-sm"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>


            </div>
            {{-- {{ $showimg}}  component
<x-img-view-model :imgdata="$showimg" /> --}}
