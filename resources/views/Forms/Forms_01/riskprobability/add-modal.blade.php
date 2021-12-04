<div class="modal fade addRiskprobability" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Risk Probability</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <form wire:submit.prevent="save">

                     <div class="form-group">
                         <label for="">Risk Probability Description </label>
                         <input type="text" class="form-control" placeholder="Risk Probability Description" wire:model="risk_probability_description">
                         <span class="text-danger"> @error('risk_probability_description') {{ $message }}@enderror</span>
                     </div>
                     <div class="form-group">
                         <label for="">Risk Probability Abbrivation</label>
                         <input type="text" class="form-control" placeholder="Risk Probability Abbrivation" wire:model="risk_probability_abbr">
                         <span class="text-danger"> @error('risk_probability_abbr') {{ $message }}@enderror</span>
                     </div>
                     <div class="form-group">
                         <label for="">Risk Probability Value</label>
                         <input type="text" class="form-control" placeholder="Risk Probability value" wire:model="risk_probability_value">
                         <span class="text-danger"> @error('risk_probability_value') {{ $message }}@enderror</span>
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
