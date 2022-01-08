<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <title>form15</title>
     <style>
          * {
               margin: 0;
               border: unset;
          }

          @page {
               margin: .5rem;
          }
          .bdr1b{
               border: 1px solid black;
          }

          body {
               font-family: sans-serif;
               margin: .5rem;
               display: flex;
               justify-content: center;
               
               /* display: grid; */
               /* align-items: center; */
               /* justify-self: center; */
          }

          #parant {
               border: 1px solid black !important;

          }

          #parant table {
               /* margin: .5rem; */

               /* margin: 1rem auto; */
               margin: 1rem auto 0.7rem auto;
          }

          table {
               width: 98%;
               border-collapse: collapse;
               /* border: 1px solid black; */
               border:none;
          }
          #childeTable1 tbody{
               font-size: .9rem;
          }

          #childeTable2 {
               width: 100%;
               border: none;
               margin: 0;
               /* margin-top: 1rem; */
          }
          #childeTable2 tbody{
               font-size: .8rem !important;
          }

          #childeTable2 tr td div {
               display: inline-block;
               margin-bottom: .5rem; 
          }

          #Heading1 {
               margin-bottom: 1rem;
          }

          .imgdiv {
               display: flex;
               justify-content: center;
          }

          .imgdiv img {
               object-fit: contain;
               width: 100%;
               /* height: 100%; */
          }

          .imgcon {
               width: 6rem;
               height: 6rem;
          }
          .m-l1{
               margin-left: 1rem;
          }
          .lihit14{
               line-height: 1.4;
          }
     </style>
</head>

<body>
     <table id="parant">
          <tbody>
               <tr>
                    <td colspan="2">
                         <table id="childeTable1" border="1">
                              <tbody align="center">
                                   <tr class="">
                                        <td class="imgcon bdr1b" rowspan="4">
                                             {{-- <div class="imgdiv">
                                                  <img src="/img/largelogo.png" alt="loglarge">
                                             </div> --}}
                                             <div class="imgdiv">
                                                  @php
                                                      // access the firt file in logo/large folder
                                                      $dir = public_path('storage/photos/logo/large/');
                                                      $fils = scandir($dir);
                                                      // $firtFile = $fils;
                                                      // dd(public_path("storage/photos/logo/large/".$fils[2]));
                                                  @endphp
                                                  {{-- <img src="{{Storage::url($defaultData->sbc_logo_small)}}" alt="loglarge"> <-- this code will work in production ... this is reletive path --}}
                                                  <img src="{{ public_path('storage/photos/logo/large/' . $fils[2]) }}" alt="loglarge">
                          
                          
                                              </div>
                                        </td>
                                   </tr>
                                   <tr >
                                        <td colspan="4" class="bdr1b">
                                             <strong>INTEGRATED MANAGEMENT SYSTEM </strong> (ISO 45001:2018 &#38; ISO
                                             14001:2015)
                                        </td>
                                   </tr>
                                   <tr >
                                        <td colspan="3"  class="bdr1b">Doc. Name: <strong>NEARMISS REPORTING FORMAT</strong></td>
                                        <td  class="bdr1b">Doc. Code: <strong>EHS-F-15</strong></td>
                                   </tr>
                                   <tr class="">
                                        <td class="bdr1b">Issue No.: 01</td>
                                        <td class="bdr1b">Issue Date: 01.03.2020</td>
                                        <td class="bdr1b">Revision No: 00</td>
                                        <td class="bdr1b">Revision Date: 01.03.2020</td>
                                   </tr>

                                   <tr >
                                        <td colspan="6" >
                                             <table id="childeTable2">
                                                  <tbody>
                                                       <tr align="center">
                                                            <td id="Heading1" colspan="4">
                                                                 <strong><u>NEARMISS REPORTING FORMAT</u></strong>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <td colspan="3">
                                                                 <div class="">Project Name: _________________________
                                                                 </div>
                                                            </td>

                                                            <td align="right">
                                                                 <div class="">Report no.: _________________</div>
                                                            </td>
                                                            <!-- <td>
                                                                 Project Name
                                                            </td>
                                                            <td>
                                                                 Data
                                                            </td>
                                                            <td>Report no.</td>
                                                            <td>Data</td> -->
                                                       </tr>
                                                       <tr>
                                                            <td colspan="3">
                                                                 <div class=""> Location: _________________</div>
                                                            </td>
                                                            <td align="right">
                                                                 <div  class="">Date: ____________</div>
                                                                 <div  class="">Time.: ______________</div>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <td colspan="3">
                                                                 <div class=""><strong>Potential Injury
                                                                      to:</strong> <span >□ T&S Staff □ Sub-Contractor □
                                                                           Others.</span></div>
                                                            </td>
                                                            <td >
                                                                 <div class="">Company Name: _________________</div>
                                                            </td>
                                                       </tr>
                                                       <!-- Nature of Potential Injury: ( Tick ✓ in the Boxes ) -->
                                                       <tr>
                                                            <td colspan="4">
                                                                 <div class=""><strong>Nature of Potential Injury:</strong> <span >( Tick ✓ in the Boxes )</span></div>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <td>
                                                                 <div class="m-l1">□ Equipment damage</div>
                                                            </td>
                                                            <td>
                                                                 <div class="m-l1">□ Personal Injury</div>
                                                            </td>
                                                            <td colspan="2">
                                                                 <div class="m-l1">□ Fire / Explosion</div>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <td>
                                                                 <div class="m-l1">□ Motor Vehicle</div>
                                                            </td>
                                                            <td>
                                                                 <div class="m-l1">□ Other</div>
                                                            </td>
                                                            <td colspan="2">
                                                                 <div class="m-l1">Details if required: _____________________</div>
                                                            </td>
                                                       </tr>
                                                       <!-- Activity: ( Tick ✓ in the Boxes ) -->
                                                       <tr>
                                                            <td colspan="4">
                                                                 <div class=""><strong>Activity:</strong> <span >( Tick ✓ in the Boxes )</span></div>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <td>
                                                                 <div class="m-l1">□ Working at Height</div>
                                                            </td>
                                                            <td>
                                                                 <div class="m-l1">□ Scaffolding</div>
                                                            </td>
                                                            <td>
                                                                 <div class="m-l1">□ Material Handling</div>
                                                            </td>
                                                            <td>
                                                                 <div class="m-l1">□ Operating Plant</div>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <td>
                                                                 <div class="m-l1">□ Motor Vehicle</div>
                                                            </td>
                                                            <td>
                                                                 <div class="m-l1">□ Other</div>
                                                            </td>
                                                            <td>
                                                                 <div class="m-l1">□ Welding / Cutting</div>
                                                            </td>
                                                            <td>
                                                                 <div class="m-l1">□ Foreign Body</div>
                                                            </td>
                                                       </tr>

                                                       <tr>
                                                            <td colspan="4">
                                                                 <div class=""><strong>Details of Nearmiss:</strong></div>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <td colspan="4">
                                                                 <div class="lihit14">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ullam doloribus similique harum blanditiis nemo, rem dignissimos, officiis sint eius non velit possimus nostrum deserunt corporis, iste modi? Laboriosam optio iste dicta possimus recusandae neque pariatur necessitatibus beatae odit cupiditate! Fugiat tempora iusto nihil corrupti quod necessitatibus eligendi perferendis, nisi sequi est unde laboriosam autem in ducimus excepturi iure odit nemo! Ullam accusantium voluptatum, tempore est dolorum et modi harum, consequatur ea eveniet fugit cumque fugiat quam. Omnis laborum sequi quisquam, animi hic harum quos ipsam excepturi nobis ratione dolore consequatur dolorem reprehenderit labore laudantium. Maiores eaque sequi et cum qui,.</div>
                                                            </td>
                                                       </tr>

                                                       <tr>
                                                            <td colspan="4">
                                                                 <div class=""><strong>Cause:</strong> <span >( Tick ✓ in the Boxes )</span></div>
                                                            </td>
                                                       </tr>

                                                       <tr>
                                                            <td colspan="2" align="center">
                                                                 <div><strong>Immediate Cause:</strong></div>
                                                            </td>
                                                            <td colspan="2" align="center">
                                                                 <div> 
                                                                      <strong>Contributing Cause:</strong>
                                                                 </div>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <td colspan="4">
                                                                 <div style="display: flex;"> 
                                                                      <div class="" style="width: 50%;">
                                                                      <div style="display: block;" class="">□ Unsafe Condition</div>
                                                                      <div style="display: block;" class="">□ Unsafe Condition</div>
                                                                      <div style="display: block;" class="">□ Unsafe Condition</div>
                                                                      <div style="display: block;" class="lihit14">detail : Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum maxime eaque non consequuntur temporibus suscipit?</div>
                                                                      </div>
                                                                      <div class="" style="width: 50%;">
                                                                      <div style="display: block;" class="">□ Unsafe Condition</div>
                                                                      <div style="display: block;" class="">□ Unsafe Condition</div>
                                                                      <div style="display: block;" class="">□ Unsafe Condition</div>
                                                                      <div style="display: block;" class="lihit14">detail : Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum maxime eaque non consequuntur temporibus suscipit?</div>
                                                                      </div>
                                                                 </div>
                                                            </td>
                                                       </tr>

                                                       <!-- Why was the unsafe act committed: : ( Tick ✓ in the Boxes ) -->
                                                       <tr>
                                                            <td colspan="4">
                                                                 <div class=""><strong>Why was the unsafe act committed:</strong> <span >( Tick ✓ in the Boxes )</span></div>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <td colspan="2">
                                                                 <div class="m-l1">□ Equipment damage</div>
                                                            </td> 
                                                            <td align="center">
                                                                 <div class="m-l1">□ Personal Injury</div>
                                                            </td>
                                                            <td align="center">
                                                                 <div class="m-l1">□ Fire / Explosion</div>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <td>
                                                                 <div class="m-l1">□ Other</div>
                                                            </td>
                                                            <td colspan="3" align="center">
                                                                 <div class="m-l1">Details if required: ________________________</div>
                                                            </td>
                                                       </tr>

                                                       <tr>
                                                            <td colspan="4">
                                                                 <div class=""><strong>Cause:</strong> <span >( Tick ✓ in the Boxes )</span></div>
                                                            </td>
                                                       </tr>

                                                       <tr>
                                                            <td colspan="2" align="center">
                                                                 <div><strong>Action:</strong></div>
                                                            </td>
                                                            <td colspan="2" align="center">
                                                                 <div> 
                                                                      <strong>Correction:</strong>
                                                                 </div>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <td colspan="4">
                                                                 <div style="display: flex;"> 
                                                                      <div class="" style="width: 50%;">
                                                                      <div style="display: block;" class="">□ Unsafe Condition</div>
                                                                      <div style="display: block;" class="">□ Unsafe Condition</div>
                                                                      <div style="display: block;" class="">□ Unsafe Condition</div>
                                                                      </div>
                                                                      <div class="" style="width: 50%;">
                                                                      <div style="display: block;" class="">□ Unsafe Condition</div>
                                                                      <div style="display: block;" class="">□ Unsafe Condition</div>
                                                                      <div style="display: block;" class="">□ Unsafe Condition</div>
                                                                      </div>
                                                                 </div>
                                                            </td>
                                                       </tr>

                                                       <tr>
                                                            <td colspan="4">
                                                                 <div class=""><strong>Further recommended action:</strong></div>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <td colspan="4">
                                                                 <div class="lihit14">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ullam doloribus similique harum blanditiis nemo, rem dignissimos, officiis sint eius non velit possimus nostrum deserunt corporis, iste modi? Laboriosam optio iste dicta possimus recusandae neque pariatur necessitatibus beatae odit cupiditate! Fugiat tempora iusto nihil corrupti quod necessitatibus eligendi perferendis.</div>
                                                            </td>
                                                       </tr>

                                                       <tr>
                                                            <td class="" colspan="3">
                                                                 <div class="">Completed by - Name: ____________________________</div>
                                                            </td>
                                                            <td>
                                                                 <div class="">Signature:___________ Date: __/__/__</div>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <td colspan="4">
                                                                 <div class=""><strong>CC to: GM / PM / Corporate EHS Department</strong></div>
                                                            </td>
                                                       </tr>

                                                  </tbody>
                                             </table>
                                        </td>
                                   </tr>
                                   <tr style="border-top: 1px solid black !important;font-size: .8rem;">
                                        <td colspan="4" align="left">
                                             <div>
                                                  IMS VOLUME-I / SECTION-V  EHS FORMATS / EHS-F-15
                                             </div>
                                        </td>
                                        <td align="right">
                                             printed 0
                                        </td>
                                   </tr>
                              </tbody>
                         </table>
                    </td>
               </tr>
          </tbody>
     </table>
</body>

</html>