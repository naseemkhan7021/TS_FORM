<div class="modal fade addCompany" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Company</h5>
                <button wire:click='clearallValuesandValidation()' type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div  wire:loading.delay.longest>
                    <div class="spinner-border text-primary m-auto d-block" role="status">
                        <span class="sr-only m-auto">Loading...</span>
                    </div>
                </div>
                <form wire:submit.prevent="save">

                    <div class="form-group">
                        <label for="">Company Name</label>
                        <input type="text" class="form-control" placeholder="Company Name"
                            wire:model="sbc_company_name">
                        <span class="text-danger"> @error('sbc_company_name') {{ $message }}@enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="">Company Abbrivation</label>
                            <input type="text" class="form-control" placeholder="Company Abbrivation"
                                wire:model="sbc_abbr">
                            <span class="text-danger"> @error('sbc_abbr') {{ $message }}@enderror</span>
                            </div>

                            <div class="form-group">
                                <label for="">License Valid Till </label>
                                <input type="date" class="form-control" placeholder="Company Abbrivation"
                                    wire:model="validupto_dt">
                                <span class="text-danger"> @error('validupto_dt') {{ $message }}@enderror</span>
                                </div>

                                {{-- img upload --}}
                                <div class="form-group">
                                    <label for="" class="">Upload img</label>
                                    <hr class="my-1">
                                    <div class="row g-3">
                                        <div class="col-md-6 form-group">
                                            <label for="largeImg">Large img</label>
                                            <div class="custom-file">
                                                <input wire:click='{{$sbc_logo_large ? $this->handelfileupload($sbc_logo_large,'large') : '' }}' wire:model='sbc_logo_large' type="file" class="custom-file-input" id="largelogo" aria-describedby="inputGroupFileAddon01">
                                                <label class="custom-file-label" for="largelogo">Choose file</label>
                                              </div>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="smallImg">Small img</label>
                                            <div class="custom-file">
                                                <input wire:click='{{$sbc_logo_small ? $this->handelfileupload($sbc_logo_small,'small') : '' }}' wire:model='sbc_logo_small' type="file" class="custom-file-input" id="smalllogo" aria-describedby="inputGroupFileAddon01">
                                                <label class="custom-file-label" for="smalllogo">Choose file</label>
                                              </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="" class="">Image Preview</label>
                                            <hr class="my-1">
                                        </div>

                                        {{-- image preview  --}}
                                        <div class="col-md-6 form-group">
                                            <div class="custom-file">
                                                {{-- D:\xampp\htdocs\naseem_tsforms\storage\app\public\photos\injuredDoc\Dhoni_1639298740.png --}}
                                                @if ($sbc_logo_large)
                                                <a href="{{ $sbc_logo_large->temporaryUrl() }}" class="h-100 d-block" target="_blank">
                                                    <img src="{{ $sbc_logo_large->temporaryUrl() }}"
                                                        alt="{{ $sbc_logo_large->temporaryUrl() }}" class="w-100 h-100"
                                                        style="object-fit: contain">
                                                </a>
                                                @endif
                                                {{-- <img src="{{Storage::url('app/public/photos/injuredDoc/Dhoni_1639298740.png')}}" alt=""> --}}
                                              </div>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <div class="custom-file">
                                                @if ($sbc_logo_small)    
                                                <a href="{{ $sbc_logo_small->temporaryUrl() }}" class="h-100 d-block" target="_blank">
                                                    <img src="{{ $sbc_logo_small->temporaryUrl() }}"
                                                        alt="{{ $sbc_logo_small->temporaryUrl() }}" class="w-100 h-100"
                                                        style="object-fit: contain">
                                                </a>
                                                @endif
                                              </div>
                                        </div>
                                    </div>
                                    {{-- <input type="date" class="form-control" placeholder="Company Abbrivation" wire:model="validupto_dt">
                        <span class="text-danger"> @error('validupto_dt') {{ $message }}@enderror</span> --}}
                                </div>


                                <div class="form-group">
                                    <button wire:click='clearallValuesandValidation()' type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
