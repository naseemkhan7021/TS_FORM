<div class="">
    <!-- LOGO start -->
    <div class="logo-box">
        <a href="{{ route('any', ['dashboard']) }}" class="logo logo-dark text-center">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
                <!-- <span class="logo-lg-text-light">UBold</span> -->
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="20">
                <!-- <span class="logo-lg-text-light">U</span> -->
            </span>
        </a>

        <a href="{{ route('any', ['dashboard']) }}" class="logo logo-light text-center">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">

                @if (count($defaultvalues) > 0)
                    <img src="{{ Storage::url($defaultvalues[0]->sbc_logo_small) }}" alt="companylogo" height="20">
                @else
                    No Default logo
                @endif

            </span>
        </a>
    </div>
    <!-- LOGO end -->

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

            <li class="d-none d-xl-block">
                <a style="text-transform: capitalize ;color: red;letter-spacing: 1px; font-weight: 800; font-size: 1rem"
                    class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    {{ count($defaultvalues) > 0 ? $defaultvalues[0]->sdepartment_name : 'No Default Comapany' }}
                    {{-- {{}} --}}
                </a>
            </li>
            {{-- {{  dd($projects) }} --}}


            <li class="d-none d-xl-block " style="line-height: 5">
                <select wire:change='setProjectId()'
                    style="text-transform: capitalize ;background: none;letter-spacing: 1px; border: unset; color: rgba(255, 255, 255, 0.6); font-weight: 800; font-size: 1rem"
                    name="" id="" wire:model="selectedProjectID">
                    {{-- @foreach ($projects as $item)
                        <option style="background: #6c757d; padding: 1rem" value="{{ $item->iproject_id }}">
                            {{ $item->sproject_name }} {{ $item->sproject_location }} </option>
                    @endforeach --}}

                    @forelse ($projects as $item)
                        <option style="background: #6c757d; padding: 1rem" value="{{ $item->iproject_id }}">
                            {{ $item->sproject_name }} {{ $item->sproject_location }} </option>
                    @empty
                        <option value="0">No project add</option>
                    @endforelse
                </select>
            </li>
            {{-- {{ $selectedProjectID }} --}}
        </ul>
    </div>

</div>
