<div>
    {{-- https://developer.snapappointments.com/bootstrap-select/ --}}
    
    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect waves-light">
                <i class="fe-menu"></i>
            </button>
        </li>

        <li>
            <!-- Mobile menu toggle (Horizontal Layout)-->
            <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
                <div class="lines">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </a>
            <!-- End mobile menu toggle-->
        </li>


    {{-- {{  $defaultvalues }} --}}
    @forelse ( $defaultvalues as  $dv )


    <li class="d-none d-xl-block">
        {{-- <input type="text" class="form-control" value="{{ $defaultvalues[0]->sbc_company_name }}"   placeholder="Company Name" wire:model="company_name"> --}}
      <a style="text-transform: capitalize ;color: rgb(0, 162, 255);letter-spacing: 1px; font-weight: 800; font-size: 1rem;" class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
             {{ $dv->sbc_company_name }}
        </a>
    </li>

    <li class="d-none d-xl-block">
        {{-- <input type="text" class="form-control" value="{{ $defaultvalues[0]->sdepartment_name }}" placeholder="Company Name" wire:model="company_name"> --}}
        <a style="text-transform: capitalize ;color: red;letter-spacing: 1px; font-weight: 800; font-size: 1rem" class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
             {{ $dv->sdepartment_name }}
        </a>
    </li>

    <li class="d-none d-xl-block" style="line-height: 5">
        <select style="text-transform: capitalize ;background: none;letter-spacing: 1px; border: unset; color: rgba(255, 255, 255, 0.6); font-weight: 800; font-size: 1rem" name="" id="">
            @foreach ($projects as $item)
                <option style="background: #6c757d; padding: 1rem"  value="{{ $item->iproject_id }}">{{ $item->sproject_name }} Vashi project</option>
            @endforeach
        </select>
    </li>

    </ul>
    @empty

    @endforelse

</div>