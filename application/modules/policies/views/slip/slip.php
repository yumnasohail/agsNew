 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <style>
      .container
        {width:90%;margin:0 auto;}
      .center
        {text-align:center;}
      .underline
        {text-decoration:underline;}
      .p-25
        {padding: 25px;}
      .p-15
        {padding-left: 15px;}
      .mb-20
        {margin-bottom:20px;}
      .mb-15
        {margin-bottom:15px;}
      .new-page 
        {page-break-before: always;}
      table 
        {border-collapse: collapse;width: 100%;text-align: center;}
      table, tr, td, th 
        {border-bottom: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;border-top: 1px solid black;}
      th 
        {vertical-align: top; text-align:center;}
      td:empty:after 
        {content: "\00a0";}
      .txt-left
        {text-align:left!important;}
      .txt-right
        {text-align:right!important;}
      td , th
        {padding:5px;text-align:right;}
      .white-bd
        {border-bottom: 1px solid white!important;}
      .white-3d
        {border-bottom: 1px solid white;border-left: 1px solid white;border-top: 1px solid white;}
      .white-4d
        {border: 1px solid white;}
      .left-2
        {border-left: 2px solid black;}
      .top-2
        {border-top: 2px solid black;}
      .bottom-2
        {border-bottom: 2px solid black;}
      .right-2
        {border-right: 2px solid black;}
      .mb-40
        {margin-bottom:40px;}
      .landscape {
        }
      span ,body
        {color:black;}
      
      </style>
      <div class="container">
        <div class="row p-15 mb-20">
             <div class="col-xs-12 center underline">
               <span><strong>RISK DETAILS</strong></span>
            </div>
         </div>
         <div class="row p-15 mb-20">
            <div class="col-xs-3">
               <span><strong>UNIQUE MARKET REFERNCE:</strong></span>
            </div>
            <div class="col-xs-9">
                <div class="col-xs-12">
                    <span><?php echo $formdata['umr']; ?></span>
                </div>
            </div>
         </div>
         <div class="row p-15 mb-20">
            <div class="col-xs-3">
               <span><strong>TYPE:</strong></span>
            </div>
            <div class="col-xs-9">
                <div class="col-xs-12">
                    <span>VOLUNTARY SPORTS PERSONAL ACCIDENT, LIABILITY AND ACCIDENTAL DEATH INSURANCE</span>
                </div>
            </div>
         </div>
         <div class="row p-15 mb-20">
            <div class="col-xs-3">
               <span><strong>INSURED:</strong></span>
            </div>
            <div class="col-xs-9">
                <div class="col-xs-12">
                    <span><?php echo $formdata['insurer']; ?></span>
               </div>
               <div class="col-xs-3">
                   Address: 
               </div>
               <div class="col-xs-9">
                    <?php echo $formdata['address1']; ?> <br>
                   <?php echo $formdata['address2']; ?><br>
                    <?php echo $formdata['address3']; ?> <br>
               </div>
            </div>
         </div>
         <div class="row p-15 mb-20">
            <div class="col-xs-3">
               <span><strong>PERIOD:</strong></span>
            </div>
            <div class="col-xs-9">
                <div class="col-xs-3">
                    From:
                </div>
                <div class="col-xs-9">
                    <?php echo date("jS F Y", strtotime($formdata['start_date']));; ?>
                </div>
                <div class="col-xs-3">
                    To:
                </div>
                <div class="col-xs-9">
                    <?php echo date("jS F Y", strtotime($formdata['end_date'])); ?>
                </div> 
                <div class="col-xs-12">
                    Both days inclusive at Local Standard Time at the address of the Insured
                </div>
            </div>
         </div>
         
         <div class="row p-15 mb-20">
            <div class="col-xs-3">
               <span><strong>INTEREST:</strong></span>
            </div>
            <div class="col-xs-9">
                <div class="col-xs-12">
                    PART A
                </div>
                <div class="col-xs-12 mb-15">
                    <?php echo $formdata['interest_a']; ?>
                </div>
                <div class="col-xs-12">
                    PART B
                </div>
                <div class="col-xs-12">
                    <?php echo $formdata['interest_b']; ?>
                </div> 
            </div>
         </div>
         
         <div class="row p-15 mb-20">
            <div class="col-xs-3">
               <span><strong>SUM INSURED:</strong></span>
            </div>
            <div class="col-xs-9">
                <div class="col-xs-12 mb-15">
                    Schedule of Benefits, as attached hereto.<br>
                    Maximum Sum Insured any one assured;
                </div>
                <div class="col-xs-12">
                    PART A
                </div>
                <div class="col-xs-12 mb-15">
                    NOK 825.000 in respect of Accidental Death (AD)<br>
                    NOK 900.000 in respect of Personal Accident (PA)<br>
                    NOK 15,000,000 in respect of Personal Liability (PL)<br>
                </div> 
                <div class="col-xs-12">
                    PART B
                </div>
                <div class="col-xs-12">
                    NOK 15,000,000 in respect of Personal Liability (PL)
                </div> 
            </div>
         </div>
         
          <div class="row p-15 mb-20">
            <div class="col-xs-3">
               <span><strong>DEDUCTIBLE:</strong></span>
            </div>
            <div class="col-xs-9">
                <div class="col-xs-12">
                   <?php echo $formdata['deduct_m']; ?>
                </div>
                <div class="col-xs-12">
                    <?php echo $formdata['deduct_l']; ?>
                </div>
            </div>
         </div>
         
         
         <div class="row p-15 mb-20">
            <div class="col-xs-3">
               <span><strong>TERRITORIAL LIMITS:</strong></span>
            </div>
            <div class="col-xs-9">
                <div class="col-xs-12">
                    Worldwide
                </div>
            </div>
         </div>
         
         
         <div class="row p-15 mb-20 new-page ">
            <div class="col-xs-3">
               <span><strong>CONDITIONS:</strong></span>
            </div>
            <div class="col-xs-9">
                <div class="col-xs-12 mb-15">
                    Service of Suit Clause (LSW 487).
                    Several Liability Clause LMA 3333
                </div>
                <div class="col-xs-12 mb-15">
                    All jumpers must follow NLF's routines for the insurance to be valid
                    The insurance covers practical jump activities arranged by NLF
                </div>
                <div class="col-xs-12 mb-15">
                    Warranted that all members must have a valid membership and license in NLF
                    Under Part A, Coverage only operates whilst members are under the supervision
                    of NLF.
                </div>
                <div class="col-xs-12 mb-15">
                    AGS insurance terms of January 2020
                </div>
                <div class="col-xs-12  mb-15">
                    Age criteria 15 to 75 years of age those individuals who are 15 or 17 years of
                    age can participate with the express permission of their parents/guardians.
                </div>
                <div class="col-xs-12 mb-15">
                    Over 75 years subject to approved medical report to Insured before valid
                    insurance. In cases where the Civil Aviation Authority has granted exemption
                    from the lower age limit, the insurance will also cover these pupils / practitioners
                </div>
            </div>
         </div>
         <div class="row p-15 mb-20">
            <div class="col-xs-3">
               <span><strong>NOTICE IN THE EVENT OF LOSS:</strong></span>
            </div>
            <div class="col-xs-9">
                <div class="col-xs-12 mb-15">
                    In respect of Personal Accident and Liability
                </div>
                <div class="col-xs-12 mb-15">
                    AGS FORSIKRING AS<br>
                    Henrik Ibsens gate 90<br>
                    NO 0255 Oslo<br>
                    Norway          
                </div>
            </div>
         </div>
         
         <div class="row p-15 mb-20">
            <div class="col-xs-3">
               <span><strong>CHOICE OF LAW AND JURISDICTION:</strong></span>
            </div>
            <div class="col-xs-9">
                <div class="col-xs-12">
                    This Policy shall be governed by and construed in accordance with Norwegian law and the Norwegian courts shall have exclusive jurisdiction
                </div>
            </div>
         </div>

         <div class="row p-15 mb-20">
            <div class="col-xs-3">
               <span><strong>PREMIUM:</strong></span>
            </div>
            <div class="col-xs-9">
                <div class="col-xs-12 mb-15">
                    Annual Premiums for Licence Year
                </div>
                <div class="col-xs-12">
                    PART A
                </div>
                <div class="col-xs-12">
                   <?php echo $formdata['tandem']; ?>
                </div> 
                <div class="col-xs-12">
                    <?php echo $formdata['b_license']; ?>
                </div> 
                <div class="col-xs-12 mb-15">
                    <?php echo $formdata['e_license']; ?>
                </div> 
                <div class="col-xs-12">
                    PART B
                </div>
                <div class="col-xs-12 mb-15">
                    <?php echo $formdata['foreign_nok']; ?>
                </div> 
                <div class="col-xs-12 mb-15">
                    <?php echo $formdata['premium_return']; ?>
                </div> 
                <div class="col-xs-12 ">
                    <?php echo $formdata['rib']; ?>
                </div> 
            </div>
         </div>


        <div class="row p-15 mb-20">
            <div class="col-xs-3">
               <span><strong>PREMIUM PAYMENT:</strong></span>
            </div>
            <div class="col-xs-9">
                <div class="col-xs-12 mb-15">
                    Premium Bordereau showing Written, Paid and Claims to be provided as agreed
                </div>
            </div>
         </div>
         
         
         <div class="row p-15 mb-20">
            <div class="col-xs-3">
               <span><strong>TERMS:</strong></span>
            </div>
            <div class="col-xs-9">
                <div class="col-xs-12 mb-15">
                    between Insurer and AGS.
                </div>
            </div>
         </div>
         
         <div class="row p-15 mb-20">
            <div class="col-xs-3">
               <span><strong>TAXES PAYABLE BY INSURED AND ADMINISTERED BY INSURED:</strong></span>
            </div>
            <div class="col-xs-9">
                <div class="col-xs-12 mb-15">
                   None
                </div>
            </div>
         </div>
         
         <div class="row p-15 mb-20">
            <div class="col-xs-3">
               <span><strong>RECORDING, TRANSMITTING AND STORING INFORMATION:</strong></span>
            </div>
            <div class="col-xs-9">
                <div class="col-xs-12 mb-15">
                    Where AGS maintains risk and claim data/information/document AGS will hold data/information/documents electronically.
                </div>
            </div>
         </div>
         
         
         <div class="row p-15 mb-20">
            <div class="col-xs-3">
               <span><strong>INSURER CONTRACT DOCUMENTATION:</strong></span>
            </div>
            <div class="col-xs-9">
                <div class="col-xs-12 mb-15">
                    This document details the contract terms entered into by the insurer(s),and constitutes the contract document.
                </div>
            </div>
         </div>
      </div>
      <div class="new-page container landscape">
          <div class="row p-15 mb-20">
             <div class="col-xs-12 center underline">
               <span><strong>Schedule of Benefits</strong></span>
            </div>
         </div>
        <table class="mb-40">
           <tr>
            <th class="white-3d" rowspan="1"></th>
            <td colspan="4" class="center top-2 left-2 right-2">Sum Insured</td>
          </tr>
          <tr>
             <th class= "txt-left white-bd left-2" rowspan="1">Benefits</th>
             <th class="white-bd left-2" rowspan="1"></th>
             <th class="white-bd center right-2" colspan="3">Voluntary</th>
          </tr>
          <tr>
            <th class="txt-left left-2">English / Norges (if applicable)</th>
            <th class="center left-2">For all members</th>
            <th class="center">Tandem</th>
            <th class="center">Basic</th>
            <th class="center right-2">Extended Death (2)</th>
          </tr>
          <tr>
            <td class="txt-left left-2">Accidental Death / Ulykkes dødsfall </td>
            <td class="left-2">0</td>
            <td>100</td>
            <td>2250.0</td>
            <td class="right-2">34500.000</td>
          </tr>
          <tr>
            <td class="txt-left left-2">Accidental Death / Ulykkes dødsfall </td>
            <td class="left-2">0</td>
            <td>100</td>
            <td>2250.0</td>
            <td class="right-2">34500.000</td>
          </tr>
          <tr>
            <td class="txt-left left-2">Accidental Death / Ulykkes dødsfall </td>
            <td class="left-2">0</td>
            <td>100</td>
            <td>2250.0</td>
            <td class="right-2">34500.000</td>
          </tr>
          <tr>
            <td class="txt-left left-2">Accidental Death / Ulykkes dødsfall </td>
            <td class="left-2">0</td>
            <td>100</td>
            <td>2250.0</td>
            <td class="right-2">34500.000</td>
          </tr>
          <tr>
            <td class="txt-left left-2">Accidental Death / Ulykkes dødsfall </td>
            <td class="left-2">0</td>
            <td>100</td>
            <td>2250.0</td>
            <td class="right-2">34500.000</td>
          </tr>
          <tr>
            <td class="txt-left left-2">Accidental Death / Ulykkes dødsfall </td>
            <td class="left-2">0</td>
            <td>100</td>
            <td>2250.0</td>
            <td class="right-2">34500.000</td>
          </tr>
          <tr>
            <td class="txt-left left-2">Accidental Death / Ulykkes dødsfall </td>
            <td class="left-2">0</td>
            <td>100</td>
            <td>2250.0</td>
            <td class="right-2">34500.000</td>
          </tr>
          <tr>
            <td class="white-3d txt-left">Premium</td>
            <td class="bottom-2 top-2 left-2">Not applicable</td>
            <td class="bottom-2 top-2">Nok 105,-</td>
            <td class="bottom-2 top-2">Nok 105,-</td>
            <td class="bottom-2 top-2 right-2">Nok 105,-</td>
          </tr>
        </table>
            <div class="col-xs-12">
                (1) International members visit Norway with valid jump certificates that jumps with NLF organized activity in Norway without Liability insurance
                may purchase this insurance directly from AGS, organised via the club and on individually basis, for NOK 450,- for a period of 30 days.
                Insurance valid (liability-only) when paid to AGS, plus 30 days.
            </div>
            <div class="col-xs-12">
                (2) Extended Death Cover Nok 600.000 is an additional Cover and Additional premium, total death benefits is Nok 825.000 and Premium Nok
                1.650,- per member year.
            </div>
        </div>
      </div>
      <div class="new-page container landscape">
          <div class="row p-15 mb-20">
             <div class="col-xs-12 center underline">
               <span><strong>Premium and claims Stats</strong></span>
            </div>
         </div>
         <div class="row p-15">
             <div class="col-xs-12 mb-15">
                All amounts in NOK     <br>
                Updated September 2020 
            </div>
         </div>
         <table>
          <tr>
            <th class="txt-left">Insurance Period From</th>
            <th class="txt-left">Gross Premium </th>
            <th class="txt-left">Net Premium</th>
            <th class="txt-left">Claims Paid </th>
            <th class="txt-left">Reserve </th>
            <th class="txt-left">Total Incurred</th>
            <th class="txt-left">NLR</th>
            <th class="txt-left">Net to UW</th>
          </tr>
          <tr>
            <td>25</td>
            <td>34534</td>
            <td>435.8</td>
            <td>34.6</td>
            <td>454</td>
            <td>5464</td>
            <td>55.88</td>
            <td>55.88</td>
          </tr>
          <tr>
            <td>25</td>
            <td>34534</td>
            <td>435.8</td>
            <td>34.6</td>
            <td>454</td>
            <td>5464</td>
            <td>55.88</td>
            <td>55.88</td>
          </tr>
          <tr>
            <td>25</td>
            <td>34534</td>
            <td>435.8</td>
            <td>34.6</td>
            <td>454</td>
            <td>5464</td>
            <td>55.88</td>
            <td>55.88</td>
          </tr>
          <tr>
            <td>25</td>
            <td>34534</td>
            <td>435.8</td>
            <td>34.6</td>
            <td>454</td>
            <td>5464</td>
            <td>55.88</td>
            <td>55.88</td>
          </tr>
          <tr>
            <td>25</td>
            <td>34534</td>
            <td>435.8</td>
            <td>34.6</td>
            <td>454</td>
            <td>5464</td>
            <td>55.88</td>
            <td>55.88</td>
          </tr>
          <tr>
            <td>25</td>
            <td>34534</td>
            <td>435.8</td>
            <td>34.6</td>
            <td>454</td>
            <td>5464</td>
            <td>55.88</td>
            <td>55.88</td>
          </tr>
          <tr>
            <td class="white-4d">25</td>
            <td class="white-4d">34534</td>
            <td class="white-4d">435.8</td>
            <td class="white-4d">34.6</td>
            <td class="white-4d">454</td>
            <td class="white-4d">5464</td>
            <td class="white-4d">55.88</td>
            <td class="white-4d">55.88</td>
          </tr>
        </table>
        </div>
      </div>
       <div class="container new-page">
        <div class="row p-15 mb-20">
             <div class="col-xs-12 center ">
               <span><strong>SECURITY DETAILS</strong></span>
            </div>
        </div>
        <div class="row p-15 mb-20">
             <div class="col-xs-12 center">
               <span><strong>(RE)INSURERS LIABILITY CLAUSE</strong></span>
            </div>
        </div>
      
        <div class="row p-15 mb-20">
            <div class="col-xs-12 mb-20">
               <span><strong>(Re)insurer’s liability several not joint</strong></span>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-12 mb-20">
                    <span>The liability of a (re)insurer under this contract is several and not joint with other (re)insurers party to this
                        contract. A (re)insurer is liable only for the proportion of liability it has underwritten. A (re)insurer is not
                        jointly liable for the proportion of liability underwritten by any other (re)insurer. Nor is a (re)insurer
                        otherwise responsible for any liability of any other (re)insurer that may underwrite this contract.
                    </span>
               </div>
               <div class="col-xs-12 mb-20">
                   The proportion of liability under this contract underwritten by a (re)insurer (or, in the case of a Lloyd’s
                    syndicate, the total of the proportions underwritten by all the members of the syndicate taken together) is
                    shown next to its stamp. This is subject always to the provision concerning “signing” below.
               </div>
               <div class="col-xs-12">
                    In the case of a Lloyd’s syndicate, each member of the syndicate (rather than the syndicate itself) is a
                    (re)insurer. Each member has underwritten a proportion of the total shown for the syndicate (that total
                    itself being the total of the proportions underwritten by all the members of the syndicate taken together).
                    The liability of each member of the syndicate is several and not joint with other members. A member is
                    liable only for that member’s proportion. A member is not jointly liable for any other member’s proportion.
                    Nor is any member otherwise responsible for any liability of any other (re)insurer that may underwrite this
                    contract. The business address of each member is Lloyd’s, One Lime Street, London EC3M 7HA. The
                    identity of each member of a Lloyd’s syndicate and their respective proportion may be obtained by writing
                    to Market Services, Lloyd’s, at the above address.
               </div>
            </div>
         </div>
         <div class="row p-15 mb-20">
            <div class="col-xs-12 mb-20">
               <span><strong>Proportion of liability</strong></span>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-12 mb-20">
                    <span>Unless there is “signing” (see below), the proportion of liability under this contract underwritten by each
                    (re)insurer (or, in the case of a Lloyd’s syndicate, the total of the proportions underwritten by all the
                    members of the syndicate taken together) is shown next to its stamp and is referred to as its “written line”.
                    </span>
               </div>
               <div class="col-xs-12 mb-20">
                    Where this contract permits, written lines, or certain written lines, may be adjusted (“signed”). In that case
                    a schedule is to be appended to this contract to show the definitive proportion of liability under this
                    contract underwritten by each (re)insurer (or, in the case of a Lloyd’s syndicate, the total of the proportions
                    underwritten by all the members of the syndicate taken together). A definitive proportion (or, in the case of
                    a Lloyd’s syndicate, the total of the proportions underwritten by all the members of a Lloyd’s syndicate
                    taken together) is referred to as a “signed line”. The signed lines shown in the schedule will prevail over
                    the written lines unless a proven error in calculation has occurred.
               </div>
               <div class="col-xs-12 mb-20">
                    Although reference is made at various points in this clause to “this contract” in the singular, where the
                    circumstances so require this should be read as a reference to contracts in the plural.
               </div>
               <div class="col-xs-12">
                    21/6/07<br>
                    LMA3333
               </div>
            </div>
         </div>
        </div>
        <div class="container new-page">
            <div class="row p-15 mb-20">
                 <div class="col-xs-12 center ">
                   <span><strong>EUROPEAN SERVICE OF SUIT AND JURISDICTION CLAUSE</strong></span>
                </div>
            </div>
            <div class="row p-15 mb-20">
                <div class="col-xs-12">
                    <div class="col-xs-12 mb-20">
                        <span>It is agreed that this Insurance shall be governed exclusively by the law and practice of the United
                        Kingdom and any disputes arising under, out of or in connection with this Insurance shall be exclusively
                        subject to the jurisdiction of any competent court in the United Kingdom.
                        </span>
                   </div>
                   <div class="col-xs-12 mb-20">
                       The Underwriters hereon agree that all summonses, notices or processes requiring to be served upon
                        them for the purpose of instituting any legal proceedings against them in connection with this Insurance
                        shall be properly served if addressed to them and delivered to them care of
                   </div>
                   <div class="col-xs-12">
                        <strong>Adv.firma Sverdrup DA</strong><br>
                        <strong>v/advokat Espen Komnæs</strong><br>
                        Postboks 1865 Vika<br>
                        N-0124 Oslo<br>
                        Tlf.+47 95 25 79 65 E-mail:espen.komnaes@sverdruplaw.no<br>
                   </div>
                   <div class="col-xs-12 mb-20">
                       who in this instance, have authority to accept service on their behalf.
                   </div>
                   <div class="col-xs-12 mb-20">
                        Underwriters by giving the above authority do not renounce their right to any special delays or periods of
                        time to which they may be entitled for the service of any such summonses, notices or processes by
                        reason of their residence or domicile in England.
                   </div>
                   <div class="col-xs-12 mb-20">
                        04/93<br>
                        LSW487
                   </div>
                </div>
             </div>
        </div>
        
        <div class="container new-page">
            <div class="row p-15 mb-20">
                <div class="col-xs-12 mb-20">
                    <div class="col-xs-3">
                        <span><strong>ORDER HEREON:</strong></span>
                   </div>
                   <div class="col-xs-9">
                       100% of 100%
                   </div>
                </div>
                <div class="col-xs-12 mb-20">
                   <div class="col-xs-3">
                        <strong>BASIS OF WRITTEN LINES:</strong>
                   </div>
                   <div class="col-xs-9">
                       Percentage of whole
                   </div>
                </div>
                <div class="col-xs-12">
                   <div class="col-xs-3">
                        <strong>SIGNING PROVISIONS:</strong>
                   </div>
                   <div class="col-xs-9 mb-20">
                        In the event that the written lines hereon exceed 100% of the order, any lines
                        written “to stand” will be allocated in full and all other lines will be signed down in
                        equal proportions so that the aggregate signed lines are equal to 100% of the order
                        without further agreement of any of the insurers.
                        <div class="col-xs-12 mb-20">
                            However:
                        </div>
                        <div class="col-xs-1 mb-20">
                            a)
                        </div>
                        <div class="col-xs-11 mb-20">
                            in the event that the placement of the order is not completed by the
                            commencement date of the period of insurance then all lines written by that
                            date will be signed in full;
                        </div>
                        <div class="col-xs-1 mb-20">
                            b)
                        </div>
                        <div class="col-xs-11 mb-20">
                            the signed lines resulting from the application of the above provisions can be
                            varied, before or after the commencement date of the period of insurance,
                            by the documented agreement of the insured and all insurers whose lines
                            are to be varied. The variation to the contracts will take effect only when all
                            such insurers have agreed, with the resulting variation in signed lines
                            commencing from the date set out in that agreement.
                        </div>
                   </div>
                </div>
             </div>
             
             <div class="row p-15 mb-20">
                 <div class="col-xs-12 underline">
                   <span><strong>WRITTEN LINES</strong></span>
                </div>
             </div>
        </div>
        
        <div class="container new-page">
            <div class="row p-15 mb-20">
                 <div class="col-xs-12 underline center">
                   <span><strong>SUBSCRIPTION AGREEMENT</strong></span>
                </div>
             </div>
            <div class="row p-15 mb-20">
                <div class="col-xs-12 mb-20">
                    <div class="col-xs-3">
                        <span><strong>SLIP LEADER:</strong></span>
                   </div>
                   <div class="col-xs-9">
                        Lloyds Insurance Company, Brussel
                   </div>
                </div>
                <div class="col-xs-12 mb-20">
                   <div class="col-xs-3">
                        <strong>SETTLEMENT DUE DATE:</strong>
                   </div>
                   <div class="col-xs-9">
                   </div>
                </div>
               <div class="col-xs-12 mb-20">
                   <div class="col-xs-3">
                        <strong>BASIS OF AGREEMENT TO CONTRACT CHANGES:</strong>
                   </div>
                   <div class="col-xs-9">
                       Slip Leader only
                   </div>
                </div>
                <div class="col-xs-12 mb-20">
                   <div class="col-xs-3">
                        <strong>CLAIMS AGREEMENT PARTIES:</strong>
                   </div>
                   <div class="col-xs-9">
                       Claims to be agreed by the Slip Leader
                   </div>
                </div>
                <div class="col-xs-12 mb-20">
                   <div class="col-xs-3">
                        <strong>CLAIMS ADMINISTRATION:</strong>
                   </div>
                   <div class="col-xs-9">
                       Claims to be managed in accordance with the agreement between
                        Underwriters and AGS Forsikring AS.
                   </div>
                </div>
                <div class="col-xs-12 mb-20">
                   <div class="col-xs-3">
                        <strong>RULES AND EXTENT OF ANY OTHER DELEGATED CLAIMS AUTHORITY:</strong>
                   </div>
                   <div class="col-xs-9">
                       None
                   </div>
                </div>
                <div class="col-xs-12 mb-20">
                   <div class="col-xs-3">
                        <strong>BASIS OF CLAIMS AGREEMENT:</strong>
                   </div>
                   <div class="col-xs-9">
                        Claims to be managed in accordance with the agreement between
                        Underwriters and AGS Forsikring AS
                   </div>
                </div>
                <div class="col-xs-12 mb-20">
                   <div class="col-xs-3">
                        <strong>ARRANGEMENTS FOR COLLECTION OF EXPERT FEES:</strong>
                   </div>
                   <div class="col-xs-9">
                       
                   </div>
                </div>
                <div class="col-xs-12 mb-20">
                   <div class="col-xs-3">
                        <strong>BUREAU ARRANGEMENT:</strong>
                   </div>
                   <div class="col-xs-9">
                       Delinked accounts to be presented by broker to Xchanging Ins-sure Services where applicable.
                   </div>
                </div>
                
             </div>
        </div>
        
        
        
        <div class="container new-page">
            <div class="row p-15 mb-20 ">
                 <div class="col-xs-12 underline center">
                   <span><strong>FISCAL AND REGULATORY</strong></span>
                </div>
             </div>
            <div class="row p-15 mb-20">
                <div class="col-xs-12 mb-20">
                    <div class="col-xs-3">
                        <span><strong>TAXES PAYABLE BY INSURERS:</strong></span>
                   </div>
                   <div class="col-xs-9">
                        None
                   </div>
                </div>
                <div class="col-xs-12 mb-20">
                   <div class="col-xs-3">
                        <strong>COUNTRY OF ORIGIN:</strong>
                   </div>
                   <div class="col-xs-9">
                       Norway
                   </div>
                </div>
               <div class="col-xs-12 mb-20">
                   <div class="col-xs-3">
                        <strong>OVERSEAS BROKER:</strong>
                   </div>
                   <div class="col-xs-9">
                        AGS Forsikring AS<br>
                        Henrik Ibsens gate 90<br>
                        Oslo 0255<br>
                        Norway
                   </div>
                </div>
                <div class="col-xs-12 mb-20">
                   <div class="col-xs-3">
                        <strong>ALLOCATION OF PREMIUM TO CODING:</strong>
                   </div>
                   <div class="col-xs-9">
                         <?php echo $formdata['brokerage']; ?><br>
                         <?php echo $formdata['brokerage']; ?>
                   </div>
                </div>
                <div class="col-xs-12 mb-20">
                   <div class="col-xs-3">
                        <strong>FSA CLIENT CLASSIFICATION:</strong>
                   </div>
                   <div class="col-xs-9">
                      Commercial
                   </div>
                </div>
             </div>
             <div class="row p-15 mb-20">
                 <div class="col-xs-12 underline center">
                   <span><strong>BROKER REMUNERATION AND DEDUCTION SECTION</strong></span>
                </div>
             </div>
             <div class="row p-15 mb-20">
                <div class="col-xs-12 mb-20">
                    <div class="col-xs-3">
                        <span><strong>FEE PAYABLE BY CLIENT: </strong></span>
                   </div>
                   <div class="col-xs-9">
                        No
                   </div>
                </div>
                <div class="col-xs-12 mb-20">
                    <div class="col-xs-3">
                        <span><strong>TOTAL BROKERAGE:  </strong></span>
                   </div>
                   <div class="col-xs-9">
                        <?php echo $formdata['brokerage']; ?>
                   </div>
                </div>
                <div class="col-xs-12 mb-20">
                    <div class="col-xs-3">
                        <span><strong>OTHER DEDUCTIONS FROM PREMIUM: </strong></span>
                   </div>
                   <div class="col-xs-9">
                        None
                   </div>
                </div>
            </div>
        </div>


   </body>
</html>