<div>
    @php $button_title = 'Dashboard' @endphp
    @php $data_not_found = 'Dashboard' @endphp







    @foreach ( $projectwings as $curwing )

        @if ( $curwing->iProjectWingID == 1 )

        <h2><span style=color:red;font-weight:bolder;> {{ $curwing->sWingDescription }} </span> <h3> <span style=color:green;font-weight:bolder;> Wing -  Shops </span></h3>  </h2>

        <div class="flex-container2">

            @php $pp = 1 @endphp

            @forelse ( $projectsshops1 as $shops1 )

                @if ( $shops1->iSalesStatus_FK == 1)
                    <div id={{ $shops1->iID }} class="Vacant" wire:click="OpenEditCountryModal({{ $shops1->iID }} )" > <span title='{{ $shops1->salesunit_description }}' data-id='1'> {{ $shops1->sManagementUnitID }} </span> </div>
                @elseif ( $shops1->iSalesStatus_FK == 2 )
                    <div id={{ $shops1->iID }} class="Hold" wire:click="OpenEditCountryModal({{ $shops1->iID }} )"> <span title='{{ $shops1->salesunit_description }}' data-id='1'> {{ $shops1->sManagementUnitID }} </span> </div>
                @elseif ( $shops1->iSalesStatus_FK == 3 )
                    <div id={{ $shops1->iID }} class="Sold" wire:click="OpenEditCountryModal({{ $shops1->iID }} )"> <span title='{{ $shops1->salesunit_description }}' data-id='1'> {{ $shops1->sManagementUnitID }} </span> </div>
                @endif

                @php $pp++; @endphp


                @empty

                <span style="color:red;font-weight:bold;"> NO UNITS FOUND </span>
            @endforelse

        </div>
        <br>
        @endif



        @if ( $curwing->iProjectWingID == 2)

            <h2><span style=color:red;font-weight:bolder;> {{ $curwing->sWingDescription }} </span> <h3> <span style=color:green;font-weight:bolder;> Wing -  Shops </span></h3>  </h2>



            <div class="flex-container2">

                @php $pp = 1 @endphp

                @forelse ( $projectsshops2 as $shops2 )


                @if ( $shops2->iSalesStatus_FK == 1)
                    <div id={{ $shops2->iID }} class="Vacant" wire:click="OpenEditCountryModal({{ $shops2->iID }} )" > <span title='{{ $shops2->salesunit_description }}' data-id='1'> {{ $shops2->sManagementUnitID }} </span> </div>
                @elseif ( $shops2->iSalesStatus_FK == 2 )
                    <div id={{ $shops2->iID }} class="Hold" wire:click="OpenEditCountryModal({{ $shops2->iID }} )"> <span title='{{ $shops2->salesunit_description }}' data-id='1'> {{ $shops2->sManagementUnitID }} </span> </div>
                @elseif ( $shops2->iSalesStatus_FK == 3 )
                    <div id={{ $shops2->iID }} class="Sold" wire:click="OpenEditCountryModal({{ $shops2->iID }} )" > <span title='{{ $shops2->salesunit_description }}' data-id='1'> {{ $shops2->sManagementUnitID }} </span> </div>
                @endif

                @php $pp++; @endphp

                @empty

                    <span style="color:red;font-weight:bold;"> NO UNITS FOUND </span>
                @endforelse

            </div>

            <br>
            @endif



            @if ( $curwing->iProjectWingID == 3)

            <h2><span style=color:red;font-weight:bolder;> {{ $curwing->sWingDescription }} </span> <h3> <span style=color:green;font-weight:bolder;> Wing -  Shops </span></h3>  </h2>



            <div class="flex-container2">

                @php $pp = 1 @endphp

                @forelse ( $projectsshops3 as $shops3 )

                @if ( $shops3->iSalesStatus_FK == 1)
                    <div id={{ $shops3->iID }} class="Vacant" wire:click="OpenEditCountryModal({{ $shops3->iID }} )"> <span title='{{ $shops3->salesunit_description }}' data-id='1'> {{ $shops3->sManagementUnitID }} </span> </div>
                @elseif ( $shops3->iSalesStatus_FK == 2 )
                    <div id={{ $shops3->iID }} class="Hold" wire:click="OpenEditCountryModal({{ $shops3->iID }} )" > <span title='{{ $shops3->salesunit_description }}' data-id='1'> {{ $shops3->sManagementUnitID }} </span> </div>
                @elseif ( $shops3->iSalesStatus_FK == 3 )
                    <div id={{ $shops3->iID }} class="Sold" wire:click="OpenEditCountryModal({{ $shops3->iID }} )"> <span title='{{ $shops3->salesunit_description }}' data-id='1'> {{ $shops3->sManagementUnitID }} </span> </div>
                @endif

                @php $pp++; @endphp

                @endforeach

            </div>

            <br>
            @endif



            @if ( $curwing->iProjectWingID == 4)

            <h2><span style=color:red;font-weight:bolder;> {{ $curwing->sWingDescription }} </span> <h3> <span style=color:green;font-weight:bolder;> Wing -  Shops </span></h3>  </h2>



            <div class="flex-container2">

                @php $pp = 1 @endphp

                @forelse ( $projectsshops4 as $shops4 )

                @if ( $shops4->iSalesStatus_FK == 1)
                    <div id={{ $shops4->iID }} class="Vacant" wire:click="OpenEditCountryModal({{ $shops4->iID }} )"> <span title='{{ $shops4->salesunit_description }}' data-id='1'> {{ $shops4->sManagementUnitID }} </span> </div>
                @elseif ( $shops4->iSalesStatus_FK == 2 )
                    <div id={{ $shops4->iID }} class="Hold" wire:click="OpenEditCountryModal({{ $shops4->iID }} )"> <span title='{{ $shops4->salesunit_description }}' data-id='1'> {{ $shops4->sManagementUnitID }} </span> </div>
                @elseif ( $shops4->iSalesStatus_FK == 3 )
                    <div id={{ $shops4->iID }} class="Sold" wire:click="OpenEditCountryModal({{ $shops4->iID }} )"> <span title='{{ $shops4->salesunit_description }}' data-id='1'> {{ $shops4->sManagementUnitID }} </span> </div>

                @endif

                    @php $pp++; @endphp


                    @empty

                    <span style="color:red;font-weight:bold;"> NO UNITS FOUND </span>
                @endforelse

            </div>

            <br>
            @endif

    @endforeach



    {{-- ---------------------------------------------------------------- --}}



    @foreach ( $projectwings as $curwing )

        @if ( $curwing->iProjectWingID == 1 )

        <h2><span style=color:red;font-weight:bolder;> {{ $curwing->sWingDescription }} </span> <h3> <span style=color:green;font-weight:bolder;> Wing -  Commercial Offices </span></h3>  </h2>

        <div class="flex-container">

            @php $pp = 1 @endphp

            @forelse ( $projectsoffice1 as $office1 )

            @if ( $office1->iSalesStatus_FK == 1)
                <div id={{ $office1->iID }} class="Vacant" wire:click="OpenEditCountryModal({{ $office1->iID }} )"> <span title='{{ $office1->salesunit_description }}' data-id='1'> {{ $office1->sManagementUnitID }} </span> </div>
            @elseif ( $office1->iSalesStatus_FK == 2)
                <div id={{ $office1->iID }} class="Hold" wire:click="OpenEditCountryModal({{ $office1->iID }} )"> <span title='{{ $office1->salesunit_description }}' data-id='1'> {{ $office1->sManagementUnitID }} </span> </div>
            @elseif ( $office1->iSalesStatus_FK == 3)
                <div id={{ $office1->iID }} class="Sold" wire:click="OpenEditCountryModal({{ $office1->iID }} )"> <span title='{{ $office1->salesunit_description }}' data-id='1'> {{ $office1->sManagementUnitID }} </span> </div>
            @endif

                @php $pp++; @endphp

                @empty

                <span style="color:red;font-weight:bold;"> NO UNITS FOUND </span>
            @endforelse

        </div>
        <br>
        @endif



        @if ( $curwing->iProjectWingID == 2 )

        <h2><span style=color:red;font-weight:bolder;> {{ $curwing->sWingDescription }} </span> <h3> <span style=color:green;font-weight:bolder;> Wing -  Commercial Offices </span></h3>  </h2>

        <div class="flex-container">

            @php $pp = 1 @endphp

            @forelse ( $projectsoffice2 as $office2 )

            @if ( $office2->iSalesStatus_FK == 1)
                <div id={{ $office2->iID }} class="Vacant" wire:click="OpenEditCountryModal({{ $office2->iID }} ) > <span title='{{ $office2->salesunit_description }}' data-id='1'> {{ $office2->sManagementUnitID }} </span> </div>
            @elseif ( $office2->iSalesStatus_FK == 2)
                <div id={{ $office2->iID }} class="Hold" wire:click="OpenEditCountryModal({{ $office2->iID }} )> <span title='{{ $office2->salesunit_description }}' data-id='1'> {{ $office2->sManagementUnitID }} </span> </div>
            @elseif ( $office2->iSalesStatus_FK == 2)
                <div id={{ $office2->iID }} class="Sold" wire:click="OpenEditCountryModal({{ $office2->iID }} )> <span title='{{ $office2->salesunit_description }}' data-id='1'> {{ $office2->sManagementUnitID }} </span> </div>
            @endif

                @php $pp++; @endphp

                @empty

                <span style="color:red;font-weight:bold;"> NO UNITS FOUND </span>
            @endforelse

        </div>
        <br>
        @endif



        @if ( $curwing->iProjectWingID == 3 )

        <h2><span style=color:red;font-weight:bolder;> {{ $curwing->sWingDescription }} </span> <h3> <span style=color:green;font-weight:bolder;> Wing -  Commercial Offices </span></h3>  </h2>

        <div class="flex-container">

            @php $pp = 1 @endphp

            @forelse ( $projectsoffice3 as $office3 )

            @if ( $office3->iSalesStatus_FK == 1)
                <div id={{ $office3->iID }} class="Vacant" wire:click="OpenEditCountryModal({{ $office3->iID }} )"> <span title='{{ $office3->salesunit_description }}' data-id='1'> {{ $office3->sManagementUnitID }} </span> </div>
            @elseif ( $office3->iSalesStatus_FK == 2)
                <div id={{ $office3->iID }} class="Hold" wire:click="OpenEditCountryModal({{ $office3->iID }} )"> <span title='{{ $office3->salesunit_description }}' data-id='1'> {{ $office3->sManagementUnitID }} </span> </div>
            @elseif ( $office3->iSalesStatus_FK == 2)
                <div id={{ $office3->iID }} class="Sold" wire:click="OpenEditCountryModal({{ $office3->iID }} )" > <span title='{{ $office3->salesunit_description }}' data-id='1'> {{ $office3->sManagementUnitID }} </span> </div>
            @endif

                @php $pp++; @endphp

                @empty

                <span style="color:red;font-weight:bold;"> NO UNITS FOUND </span>
            @endforelse

        </div>
        <br>
        @endif



        @if ( $curwing->iProjectWingID == 4 )

        <h2><span style=color:red;font-weight:bolder;> {{ $curwing->sWingDescription }} </span> <h3> <span style=color:green;font-weight:bolder;> Wing -  Commercial Offices </span></h3>  </h2>

        <div class="flex-container">

            @php $pp = 1 @endphp

            @forelse ( $projectsoffice4 as $office4 )

            @if ( $office4->iSalesStatus_FK == 1)
                <div id={{ $office4->iID }} class="Vacant" wire:click="OpenEditCountryModal({{ $office4->iID }} )" > <span title='{{ $office4->salesunit_description }}' data-id='1'> {{ $office4->sManagementUnitID }} </span> </div>
            @elseif ( $office4->iSalesStatus_FK == 2)
                <div id={{ $office4->iID }} class="Hold" wire:click="OpenEditCountryModal({{ $office4->iID }} )" > <span title='{{ $office4->salesunit_description }}' data-id='1'> {{ $office4->sManagementUnitID }} </span> </div>
            @elseif ( $office4->iSalesStatus_FK == 2)
                <div id={{ $office4->iID }} class="Sold" wire:click="OpenEditCountryModal({{ $office4->iID }} )" > <span title='{{ $office4->salesunit_description }}' data-id='1'> {{ $office4->sManagementUnitID }} </span> </div>
            @endif

                @php $pp++; @endphp

                @empty

                <span style="color:red;font-weight:bold;"> NO UNITS FOUND </span>
            @endforelse

        </div>
        <br>
        @endif

    @endforeach


{{-- ---------------------------------------------------------------- --}}



    @foreach ( $projectwings as $curwing )

        @if ( $curwing->iProjectWingID == 1 )

        <h2><span style=color:red;font-weight:bolder;> {{ $curwing->sWingDescription }} </span> <h3> <span style=color:green;font-weight:bolder;> Wing -  Residential Apartments </span></h3>  </h2>

        <div class="flex-container3">

            @php $pp = 1 @endphp

            @forelse ( $projectsrest1 as $rest1 )

            @if ( $rest1->iSalesStatus_FK == 1)
                <div id={{ $rest1->iID }} class="Vacant" wire:click="OpenEditCountryModal({{ $rest1->iID }} )"> <span title='{{ $rest1->salesunit_description }}' data-id='1'> {{ $rest1->sManagementUnitID  }} </span>    </div>
            @elseif ( $office4->iSalesStatus_FK == 2)
                <div id={{ $rest1->iID }} class="Hold" wire:click="OpenEditCountryModal({{ $rest1->iID }} )"> <span title='{{ $rest1->salesunit_description }}' data-id='1'> {{ $rest1->sManagementUnitID  }} </span>    </div>
            @elseif ( $office4->iSalesStatus_FK == 3)
                <div id={{ $rest1->iID }} class="Sold" wire:click="OpenEditCountryModal({{ $rest1->iID }} )"> <span title='{{ $rest1->salesunit_description }}' data-id='1'> {{ $rest1->sManagementUnitID  }} </span>    </div>
            @endif


                @php $pp++; @endphp

                @empty

                <span style="color:red;font-weight:bold;"> NO UNITS FOUND </span>
            @endforelse

        </div>
        <br>
        @endif

        {{-- iSalesStatus_FK --}}


        @if ( $curwing->iProjectWingID == 1 )

        <h2><span style=color:red;font-weight:bolder;> {{ $curwing->sWingDescription }} </span> <h3> <span style=color:green;font-weight:bolder;> Wing -  Residential Apartments </span></h3>  </h2>

        <div class="flex-container3">

            @php $pp = 1 @endphp

            @forelse ( $projectsrest2 as $rest2 )

            @if ( $rest2->iSalesStatus_FK == 1)
                <div id={{ $rest2->iID }} class="Vacant" wire:click="OpenEditCountryModal({{ $rest2->iID }} )" > <span title='{{ $rest2->salesunit_description }}' data-id='1'> {{ $rest2->sManagementUnitID }} </span> </div>
                @elseif ( $rest2->iSalesStatus_FK == 2)
                <div id={{ $rest2->iID }} class="Hold" wire:click="OpenEditCountryModal({{ $rest2->iID }} )" > <span title='{{ $rest2->salesunit_description }}' data-id='1'> {{ $rest2->sManagementUnitID }} </span> </div>
                @elseif ( $rest2->iSalesStatus_FK == 3)
                <div id={{ $rest2->iID }} class="Sold" wire:click="OpenEditCountryModal({{ $rest2->iID }} )" > <span title='{{ $rest2->salesunit_description }}' data-id='1'> {{ $rest2->sManagementUnitID }} </span> </div>
                @endif

                @php $pp++; @endphp

                @empty

                <span style="color:red;font-weight:bold;"> NO UNITS FOUND </span>
            @endforelse

        </div>
        <br>
        @endif




        @if ( $curwing->iProjectWingID == 1 )

        <h2><span style=color:red;font-weight:bolder;> {{ $curwing->sWingDescription }} </span> <h3> <span style=color:green;font-weight:bolder;> Wing -  Residential Apartments </span></h3>  </h2>

        <div class="flex-container3">

            @php $pp = 1 @endphp

            @forelse ( $projectsrest3 as $rest3 )

            @if ( $rest3->iSalesStatus_FK == 1)
                <div id={{ $rest3->iID }} class="Vacant" wire:click="OpenEditCountryModal({{ $rest3->iID }} )" > <span title='{{ $rest3->salesunit_description }}' data-id='1'> {{ $rest3->sManagementUnitID }} </span> </div>
                @elseif ( $rest3->iSalesStatus_FK == 2)
                <div id={{ $rest3->iID }} class="Hold" wire:click="OpenEditCountryModal({{ $rest3->iID }} )"> <span title='{{ $rest3->salesunit_description }}' data-id='1'> {{ $rest3->sManagementUnitID }} </span> </div>
                @elseif ( $rest3->iSalesStatus_FK == 3)
                <div id={{ $rest3->iID }} class="Sold" wire:click="OpenEditCountryModal({{ $rest3->iID }} )"> <span title='{{ $rest3->salesunit_description }}' data-id='1'> {{ $rest3->sManagementUnitID }} </span> </div>
                @endif

                @php $pp++; @endphp

                @empty

                <span style="color:red;font-weight:bold;"> NO UNITS FOUND </span>
            @endforelse

        </div>
        <br>
        @endif




        @if ( $curwing->iProjectWingID == 4 )

        <h2><span style=color:red;font-weight:bolder;> {{ $curwing->sWingDescription }} </span> <h3> <span style=color:green;font-weight:bolder;> Wing -  Residential Apartments </span></h3>  </h2>

        <div class="flex-container3">

            @php $pp = 1 @endphp

            @forelse ( $projectsrest4 as $rest4 )

            @if ( $rest4->iSalesStatus_FK == 1)
                <div id={{ $rest4->iID }} class="Vacant" wire:click="OpenEditCountryModal({{ $rest4->iID }} )"> <span title='{{ $rest4->salesunit_description }}' data-id='1'> {{ $rest4->sManagementUnitID }} </span> </div>
                @elseif ( $rest4->iSalesStatus_FK == 2)
                <div id={{ $rest4->iID }} class="Hold" wire:click="OpenEditCountryModal({{ $rest4->iID }} )"> <span title='{{ $rest4->salesunit_description }}' data-id='1'> {{ $rest4->sManagementUnitID }} </span> </div>
                @elseif ( $rest4->iSalesStatus_FK == 3)
                <div id={{ $rest4->iID }} class="Sold" wire:click="OpenEditCountryModal({{ $rest4->iID }} )"> <span title='{{ $rest4->salesunit_description }}' data-id='1'> {{ $rest4->sManagementUnitID }} </span> </div>
                @endif

                @php $pp++; @endphp

                @empty

                <span style="color:red;font-weight:bold;"> NO UNITS FOUND </span>
            @endforelse

        </div>
        <br>
        @endif




    @endforeach



    @include('dashboard.presales.add-modal')
    @include('dashboard.presales.edit-modal')



</div>
