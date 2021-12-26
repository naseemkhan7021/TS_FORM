<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{ asset('assets/images/users/user-1.jpg') }}" alt="user-img" title="Mat Helme"
                class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-toggle="dropdown">Geneva Kennedy</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user mr-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings mr-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock mr-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out mr-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-muted">Admin Head</p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                {{-- <li>
                    <a href="#sidebarDashboards" data-toggle="collapse">
                        <i data-feather="airplay"></i>
                        <span class="badge badge-success badge-pill float-right">4</span>
                        <span> Dashboards </span>
                    </a>
                    <div class="collapse" id="sidebarDashboards">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('any', 'dashboard') }}">Dashboard 1</a>
                            </li>
                            <li>
                                <a href="{{ route('any', 'dashboard-2') }}">Dashboard 2</a>
                            </li>
                            <li>
                                <a href="{{ route('any', 'dashboard-3') }}">Dashboard 3</a>
                            </li>
                            <li>
                                <a href="{{ route('any', 'dashboard-4') }}">Dashboard 4</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                {{-- <li class="menu-title mt-2">Apps</li> --}}

                {{-- <li>
                    <a href="{{ route('second', ['apps', 'calendar']) }}">
                        <i data-feather="calendar"></i>
                        <span> Calendar </span>
                    </a>
                </li> --}}

                {{-- <li>
                    <a href="{{ route('second', ['apps', 'chat']) }}">
                        <i data-feather="message-square"></i>
                        <span> Chat </span>
                    </a>
                </li> --}}

                @if (Auth::user()->current_role⁯_id == 1)
                    <li>
                        <a href="#sidebarGeneral" data-toggle="collapse">
                            <i data-feather="shopping-cart"></i>
                            <span> General </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarGeneral">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('genders') }}"> Gender </a>
                                </li>
                                <li>
                                    <a href="{{ route('languages') }}"> Language </a>
                                </li>
                                <li>
                                    <a href="{{ route('nationality') }}"> Nationality </a>
                                </li>
                                <li>
                                    <a href="{{ route('designation') }}"> Designation </a>
                                </li>
                                <li>
                                    <a href="{{ route('occupation') }}">Occupation </a>
                                </li>
                                <li>
                                    <a href="{{ route('relationtype') }}"> Relation Type </a>
                                </li>
                                <li>
                                    <a href="{{ route('addresstype') }}"> Address Type </a>
                                </li>
                                <li>
                                    <a href="{{ route('religion') }}"> Religion </a>
                                </li>
                                <li>
                                    <a href="{{ route('qualification') }}"> Qualification </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                @endif

                @if (Auth::user()->current_role⁯_id == 1)


                    {{-- <li>
                        <a href="#sidebarCrm" data-toggle="collapse">
                            <i data-feather="users"></i>
                            <span> Const. CRM </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarCrm">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('salesunit') }}"> Sales Unit </a>
                                </li>
                                <li>
                                    <a href="{{ route('leadstatus') }}"> Lead Status </a>
                                </li>
                                <li>
                                    <a href="{{ route('leadsource') }}"> Lead Source </a>
                                </li>
                                <li>
                                    <a href="{{ route('paymentmode') }}"> Payment Mode </a>
                                </li>
                                <li>
                                    <a href="{{ route('propertystatus') }}"> Property Status </a>
                                </li>
                                <li>
                                    <a href="{{ route('paymenttemplate') }}"> Payment Template </a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}

                @endif

                @if (Auth::user()->current_role⁯_id == 1)


                    {{-- <li>
                        <a href="#sidebarProjectCRM" data-toggle="collapse">
                            <i data-feather="users"></i>
                            <span> Project CRM </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarProjectCRM">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('const_projects') }}">Project</a>
                                </li>
                                <li>
                                    <a href="{{ route('projectwings') }}">Project Wings</a>
                                </li>
                                <li>
                                    <a href="{{ route('projectunit') }}">Project Units</a>
                                </li> --}}
                                {{-- <li>
                                <a href="{{ route('dashboard_presales') }}">Sales  - Pre Sales </a>
                            </li>
                            <li>
                                <a href="{{ route('dashboard_unitavailable') }}">Sales - Unit Available</a>
                            </li>
                            <li>
                                <a href="{{ route('dashboard_management') }}">Management Dashboard</a>
                            </li>
                            <li>
                                <a href="{{ route('primarymember') }}">Primary Member</a>
                            </li>

                            <li>
                                <a href="{{ route('secondarymember') }}">Secondary Member</a>
                            </li> --}}

                            {{-- </ul>
                        </div>
                    </li> --}}

                @endif

                @if (Auth::user()->current_role⁯_id == 1)
{{--
                    <li>
                        <a href="#sidebarPreSales" data-toggle="collapse">
                            <i data-feather="mail"></i>
                            <span> Pre Sales </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarPreSales">
                            <ul class="nav-second-level">
                                <li>
                                    <a href={{ route('dashboard_presales') }}>Unit Quotes</a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}

                @endif

                @if (Auth::user()->current_role⁯_id == 1)

                    {{-- <li>
                        <a href="#sidebarSales" data-toggle="collapse">
                            <i data-feather="mail"></i>
                            <span> Sales </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarSales">
                            <ul class="nav-second-level">
                                <li>
                                    <a href={{ route('dashboard_presales') }}> Unit Availability </a>
                                </li>
                                <li>
                                    <a href={{ route('dashboard_presales') }}> Unit Details </a>
                                </li>
                                <li>
                                    <a href="{{ route('leads') }}"> Leads </a>
                                </li>
                                <li>
                                    <a href={{ route('leadfollow') }}> Current Activities </a>
                                </li>

                                <li>
                                    <a href="{{ route('channelpartner') }}"> Channel Partner </a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}

                @endif


                @if (Auth::user()->current_role⁯_id == 1)


                    {{-- <li>
                        <a href="#sidebarPostSales" data-toggle="collapse">
                            <i data-feather="mail"></i>
                            <span> Post Sales </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarPostSales">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('primarymember') }}"> Primary Members </a>
                                </li>
                                <li>
                                    <a href="{{ route('secondarymember') }}"> Secondary Members </a>
                                </li>
                                <li>
                                    <a href={{ route('dashboard_presales') }}> Summary </a>
                                </li>
                                <li>
                                    <a href={{ route('dashboard_presales') }}> Receipts </a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}

                @endif

                @if (Auth::user()->current_role⁯_id == 1)

                    <li>
                        <a href="#sidebarCommmon" data-toggle="collapse">
                            <i data-feather="users"></i>
                            <span> Form Common </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarCommmon">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('index_company') }}"> Company </a>
                                </li>
                                
                                <li>
                                    <a href="{{ route('index_department') }}"> Department </a>
                                </li>
                                <li>
                                    <a href="{{ route('index_project') }}"> Projects </a>
                                </li>

                                <li>
                                    <a href="{{ route('index_documentserial') }}"> Document Serial </a>
                                </li>

                                <li>
                                    <a href="{{ route('index_defaultdata') }}"> Default Data </a>
                                </li>

                                <li>
                                    <a href="{{ route('index_InjuryTo') }}"> Potential Injury To </a>
                                </li>

                            </ul>
                        </div>
                    </li>


                @endif






                @if (Auth::user()->current_role⁯_id == 1)

                    {{-- Form 00 --}}
                    <li>
                        <a href="#sidebarForm00" data-toggle="collapse">
                            <i data-feather="users"></i>
                            <span> Form 00 </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarForm00">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('form00_data') }}"> Forms 00 </a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    {{-- Form 01 --}}
                    <li>
                        <a href="#sidebarForm01" data-toggle="collapse">
                            <i data-feather="users"></i>
                            <span> Form 01 </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarForm01">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{route('form01_formdata01')}}"> Forms 01 </a>
                                </li>
                                <li>
                                    <a href="{{ route('form01_activity') }}"> Activity </a>
                                </li>
                                <li>
                                    <a href="{{ route('form01_subactivity') }}"> Sub Activity </a>
                                </li>
                                <li>
                                    <a href="{{ route('form01_preventiveincidentcontrol') }}"> Preventive Incident
                                        Control</a>
                                </li>
                                <li>
                                    <a href="{{ route('form01_potentialhazard') }}"> Potential Hazard </a>
                                </li>
                                <li>
                                    <a href="{{ route('form01_probable_consequence') }}"> Probable Consequence </a>
                                </li>
                                <li>
                                    <a href="{{ route('form01_cause') }}"> Causes </a>
                                </li>
                                <li>
                                    <a href="{{ route('form01_subcause') }}"> Sub Causes </a>
                                </li>
                                <li>
                                    <a href="{{ route('form01_risk_probability') }}"> Risk Probability </a>
                                </li>
                                <li>
                                    <a href="{{ route('form01_risk_consequence') }}"> Risk Consequence </a>
                                </li>
                                <li>
                                    <a href="{{ route('form01_consequences_control') }}"> Consequences Control </a>
                                </li>
                                <li>
                                    <a href="{{ route('form01_engineering_control') }}"> Engineering Control </a>
                                </li>
                                <li>
                                    <a href="{{ route('form01_administrative_control_mitigative') }}"> Administrative
                                        Control Mitigative </a>
                                </li>
                                <li>
                                    <a href="{{ route('form01_administrative_control_preventive') }}"> Administrative
                                        Control Preventive </a>
                                </li>
                                <li>
                                    <a href="{{ route('form01_duration_of_exposure') }}"> Duration Of Exposure </a>
                                </li>


                            </ul>
                        </div>
                    </li>

                    {{-- Form 15 --}}
                    <li>
                        <a href="#sidebarForm15" data-toggle="collapse">
                            <i data-feather="users"></i>
                            <span> Form 15 </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarForm15">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{route('form15_formdata15')}}"> Forms 15 </a>
                                </li>
                                <li>
                                    <a href="{{ route('form15_activity15') }}"> Activity </a>
                                </li>
                                <li>
                                    <a href="{{ route('form15_cause15') }}"> Causes </a>
                                </li>
                                <li>
                                    <a href="{{ route('form15_imdaction') }}"> Immediate Action </a>
                                </li>
                                <li>
                                    <a href="{{ route('form15_contributingcause') }}"> Contributing Cause</a>
                                </li>
                                <li>
                                    <a href="{{ route('form15_imdcorrection') }}"> Immediate Correction </a>
                                </li>
                                <li>
                                    <a href="{{ route('form15_natureofpotentialinjury') }}"> Nature Of Potential
                                        Injuries </a>
                                </li>
                                <li>
                                    <a href="{{ route('form15_whyunsafeactcommitted') }}"> Why unsafe act Committed
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    {{-- Form 16 --}}
                    <li>
                        <a href="#sidebarForm16" data-toggle="collapse">
                            <i data-feather="users"></i>
                            <span> Form 16 </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarForm16">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('form16_formdata16') }}"> Forms 16 </a>
                                </li>


                            </ul>
                        </div>
                    </li>

                    {{-- Form 17 --}}
                    <li>
                        <a href="#sidebarForm17" data-toggle="collapse">
                            <i data-feather="users"></i>
                            <span> Form 17 </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarForm17">
                            <ul class="nav-second-level">
                                <li>
                                    <a href='{{route('form17_formdata17')}}'> Forms 17 </a>
                                </li>
                                <li>
                                    <a href='{{route('form17_substandcondition')}}'> Substandard Actions </a>
                                </li>
                                <li>
                                    <a href='{{route('form17_substandaction')}}'> Substandard Conditions </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    {{-- Form 18 --}}
                    <li>
                        <a href="#sidebarForm18" data-toggle="collapse">
                            <i data-feather="users"></i>
                            <span> Form 18 </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarForm18">
                            <ul class="nav-second-level">
                                <li>
                                    <a href='{{route('form18_formdata18')}}'> Forms 18 </a>
                                </li>

                            </ul>
                        </div>
                    </li>


                    {{-- Form 22 --}}
                    <li>
                        <a href="#sidebarForm22" data-toggle="collapse">
                            <i data-feather="users"></i>
                            <span> Form 22 </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarForm22">
                            <ul class="nav-second-level">
                                <li>
                                    <a href='{{route('form22_participant')}}'> Participants </a>
                                </li>
                                <li>
                                    <a href='{{route('form22_header')}}'> Header </a>
                                </li>
                                <li>
                                    <a href='{{route('form22_topicdiscussed')}}'> Topic Discussed </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                @endif




                {{-- <li>
                    <a href="{{ route('second', ['apps', 'social-feed']) }}">
                        <span class="badge badge-pink float-right">Hot</span>
                        <i data-feather="rss"></i>
                        <span> Social Feed </span>
                    </a>
                </li> --}}

                {{-- <li>
                    <a href="{{ route('second', ['apps', 'companies']) }}">
                        <i data-feather="activity"></i>
                        <span> Companies </span>
                    </a>
                </li> --}}

                {{-- <li>
                    <a href="#sidebarProjects" data-toggle="collapse">
                        <i data-feather="briefcase"></i>
                        <span> Projects </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarProjects">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('second', ['project', 'list']) }}">List</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['project', 'detail']) }}">Detail</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['project', 'create']) }}">Create Project</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                {{-- <li>
                    <a href="#sidebarTasks" data-toggle="collapse">
                        <i data-feather="clipboard"></i>
                        <span> Tasks </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTasks">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('second', ['task', 'list']) }}">List</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['task', 'details']) }}">Details</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['task', 'kanban-board']) }}">Kanban Board</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                {{-- <li>
                    <a href="#sidebarContacts" data-toggle="collapse">
                        <i data-feather="book"></i>
                        <span> Contacts </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarContacts">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('second', ['contacts', 'list']) }}">Members List</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['contacts', 'profile']) }}">Profile</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                {{-- <li>
                    <a href="#sidebarTickets" data-toggle="collapse">
                        <i data-feather="aperture"></i>
                        <span> Tickets </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTickets">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('second', ['tickets', 'list']) }}">List</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['tickets', 'detail']) }}">Detail</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                {{-- <li>
                    <a href="{{ route('second', ['apps', 'file-manager']) }}">
                        <i data-feather="folder-plus"></i>
                        <span> File Manager </span>
                    </a>
                </li> --}}

                {{-- <li class="menu-title mt-2">Custom</li> --}}

                {{-- <li>
                    <a href="#sidebarAuth" data-toggle="collapse">
                        <i data-feather="file-text"></i>
                        <span> Auth Pages </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAuth">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('second', ['auth', 'login']) }}">Log In</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['auth', 'login-2']) }}">Log In 2</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['auth', 'register']) }}">Register</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['auth', 'register-2']) }}">Register 2</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['auth', 'signin-signup']) }}">Signin - Signup</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['auth', 'signin-signup-2']) }}">Signin - Signup 2</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['auth', 'recoverpw']) }}">Recover Password</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['auth', 'recoverpw-2']) }}">Recover Password 2</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['auth', 'lock-screen']) }}">Lock Screen</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['auth', 'lock-screen-2']) }}">Lock Screen 2</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['auth', 'logout']) }}">Logout</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['auth', 'logout-2']) }}">Logout 2</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['auth', 'confirm-mail']) }}">Confirm Mail</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['auth', 'confirm-mail-2']) }}">Confirm Mail 2</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                {{-- <li>
                    <a href="#sidebarExpages" data-toggle="collapse">
                        <i data-feather="package"></i>
                        <span> Extra Pages </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarExpages">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('second', ['pages', 'starter']) }}">Starter</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['pages', 'timeline']) }}">Timeline</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['pages', 'sitemap']) }}">Sitemap</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['pages', 'invoice']) }}">Invoice</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['pages', 'faqs']) }}">FAQs</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['pages', 'search-results']) }}">Search Results</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['pages', 'pricing']) }}">Pricing</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['pages', 'maintenance']) }}">Maintenance</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['pages', 'coming-soon']) }}">Coming Soon</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['pages', 'gallery']) }}">Gallery</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['pages', '404']) }}">Error 404</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['pages', '404-two']) }}">Error 404 Two</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['pages', '404-alt']) }}">Error 404-alt</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['pages', '500']) }}">Error 500</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['pages', '500-two']) }}">Error 500 Two</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                {{-- <li>
                    <a href="#sidebarLayouts" data-toggle="collapse">
                        <i data-feather="layout"></i>
                        <span class="badge badge-blue float-right">New</span>
                        <span> Layouts </span>
                    </a>
                    <div class="collapse" id="sidebarLayouts">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('second', ['layoutsDemo', 'horizontal']) }}">Horizontal</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['layoutsDemo', 'detached']) }}">Detached</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['layoutsDemo', 'two-column']) }}">Two Column Menu</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['layoutsDemo', 'two-tone-icons']) }}">Two Tones Icons</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['layoutsDemo', 'preloader']) }}">Preloader</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                {{-- <li class="menu-title mt-2">Components</li> --}}

                {{-- <li>
                    <a href="#sidebarBaseui" data-toggle="collapse">
                        <i data-feather="pocket"></i>
                        <span> Base UI </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarBaseui">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('second', ['ui', 'buttons']) }}">Buttons</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['ui', 'cards']) }}">Cards</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['ui', 'avatars']) }}">Avatars</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['ui', 'portlets']) }}">Portlets</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['ui', 'tabs-accordions']) }}">Tabs & Accordions</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['ui', 'modals']) }}">Modals</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['ui', 'progress']) }}">Progress</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['ui', 'notifications']) }}">Notifications</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['ui', 'spinners']) }}">Spinners</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['ui', 'images']) }}">Images</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['ui', 'carousel']) }}">Carousel</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['ui', 'list-group']) }}">List Group</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['ui', 'video']) }}">Embed Video</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['ui', 'dropdowns']) }}">Dropdowns</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['ui', 'ribbons']) }}">Ribbons</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['ui', 'tooltips-popovers']) }}">Tooltips & Popovers</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['ui', 'general']) }}">General UI</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['ui', 'typography']) }}">Typography</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['ui', 'grid']) }}">Grid</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                {{-- <li>
                    <a href="#sidebarExtendedui" data-toggle="collapse">
                        <i data-feather="layers"></i>
                        <span class="badge badge-info float-right">Hot</span>
                        <span> Extended UI </span>
                    </a>
                    <div class="collapse" id="sidebarExtendedui">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('second', ['extended', 'nestable']) }}">Nestable List</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['extended', 'range-slider']) }}">Range Slider</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['extended', 'dragula']) }}">Dragula</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['extended', 'animation']) }}">Animation</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['extended', 'sweet-alert']) }}">Sweet Alert</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['extended', 'tour']) }}">Tour Page</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['extended', 'scrollspy']) }}">Scrollspy</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['extended', 'loading-buttons']) }}">Loading Buttons</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                {{-- <li>
                    <a href="{{ route('any', 'widgets') }}">
                        <i data-feather="gift"></i>
                        <span> Widgets </span>
                    </a>
                </li> --}}

                {{-- <li>
                    <a href="#sidebarIcons" data-toggle="collapse">
                        <i data-feather="cpu"></i>
                        <span> Icons </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarIcons">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('second', ['icons', 'two-tone']) }}">Two Tone Icons</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['icons', 'feather']) }}">Feather Icons</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['icons', 'mdi']) }}">Material Design Icons</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['icons', 'dripicons']) }}">Dripicons</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['icons', 'font-awesome']) }}">Font Awesome 5</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['icons', 'themify']) }}">Themify</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['icons', 'simple-line']) }}">Simple Line</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['icons', 'weather']) }}">Weather</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                {{-- <li>
                    <a href="#sidebarForms" data-toggle="collapse">
                        <i data-feather="bookmark"></i>
                        <span> Forms </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarForms">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('second', ['forms', 'elements']) }}">General Elements</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['forms', 'advanced']) }}">Advanced</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['forms', 'validation']) }}">Validation</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['forms', 'pickers']) }}">Pickers</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['forms', 'wizard']) }}">Wizard</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['forms', 'masks']) }}">Masks</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['forms', 'summernote']) }}">Summernote</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['forms', 'quilljs']) }}">Quilljs Editor</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['forms', 'file-uploads']) }}">File Uploads</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['forms', 'x-editable']) }}">X Editable</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['forms', 'image-crop']) }}">Image Crop</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                {{-- <li>
                    <a href="#sidebarTables" data-toggle="collapse">
                        <i data-feather="grid"></i>
                        <span> Tables </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTables">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('second', ['tables', 'basic']) }}">Basic Tables</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['tables', 'datatables']) }}">Data Tables</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['tables', 'editable']) }}">Editable Tables</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['tables', 'responsive']) }}">Responsive Tables</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['tables', 'footables']) }}">FooTable</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['tables', 'bootstrap']) }}">Bootstrap Tables</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['tables', 'tablesaw']) }}">Tablesaw Tables</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['tables', 'jsgrid']) }}">JsGrid Tables</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                {{-- <li>
                    <a href="#sidebarCharts" data-toggle="collapse">
                        <i data-feather="bar-chart-2"></i>
                        <span> Charts </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCharts">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('second', ['charts', 'apex']) }}">Apex Charts</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['charts', 'flot']) }}">Flot Charts</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['charts', 'morris']) }}">Morris Charts</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['charts', 'chartjs']) }}">Chartjs Charts</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['charts', 'peity']) }}">Peity Charts</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['charts', 'chartist']) }}">Chartist Charts</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['charts', 'c3']) }}">C3 Charts</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['charts', 'sparklines']) }}">Sparklines Charts</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['charts', 'knob']) }}">Jquery Knob Charts</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                {{-- <li>
                    <a href="#sidebarMaps" data-toggle="collapse">
                        <i data-feather="map"></i>
                        <span> Maps </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarMaps">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('second', ['maps', 'google']) }}">Google Maps</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['maps', 'vector']) }}">Vector Maps</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ['maps', 'mapael']) }}">Mapael Maps</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                {{-- <li>
                    <a href="#sidebarMultilevel" data-toggle="collapse">
                        <i data-feather="share-2"></i>
                        <span> Multi Level </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarMultilevel">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#sidebarMultilevel2" data-toggle="collapse">
                                    Second Level <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarMultilevel2">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="javascript: void(0);">Item 1</a>
                                        </li>
                                        <li>
                                            <a href="javascript: void(0);">Item 2</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#sidebarMultilevel3" data-toggle="collapse">
                                    Third Level <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarMultilevel3">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="javascript: void(0);">Item 1</a>
                                        </li>
                                        <li>
                                            <a href="#sidebarMultilevel4" data-toggle="collapse">
                                                Item 2 <span class="menu-arrow"></span>
                                            </a>
                                            <div class="collapse" id="sidebarMultilevel4">
                                                <ul class="nav-second-level">
                                                    <li>
                                                        <a href="javascript: void(0);">Item 1</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript: void(0);">Item 2</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul> --}}
        </div>
        </li>
        </ul>

    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>

</div>
<!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
