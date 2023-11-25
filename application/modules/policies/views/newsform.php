<style>
  table tbody tr td{
    width:50%;
  }
</style>
<main>
  <div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <h1 class="color-theme-1">Skadesaker</h1>
              <div class="separator mb-5"></div>
          </div>
      </div>
      <div class="row mb-4">
        <div class="col-md-12 col-lg-12 col-12 mb-4">
            <div class="card">
                <div class="card-header pl-0 pr-0">
                    <ul class="nav nav-tabs card-header-tabs  ml-0 mr-0" role="tablist">
                        <li class="nav-item text-center">
                            <a class="nav-link active" id="first-tab_" data-toggle="tab" href="#firstFull" role="tab" aria-controls="first" aria-selected="true">Vis</a>
                        </li>
                        <li class="nav-item text-center">
                            <a class="nav-link" id="second-tab_" data-toggle="tab" href="#secondFull" role="tab" aria-controls="second" aria-selected="false">Endre</a>
                        </li>
                        <li class="nav-item text-center">
                            <a class="nav-link" id="third-tab_" data-toggle="tab" href="#thirdFull" role="tab" aria-controls="second" aria-selected="false">Sttaus</a>
                        </li>
                        <li class="nav-item text-center">
                            <a class="nav-link" id="fourth-tab_" data-toggle="tab" href="#fourthFull" role="tab" aria-controls="second" aria-selected="false">Sportscover</a>
                        </li>
                        <li class="nav-item text-center">
                            <a class="nav-link" id="fifth-tab_" data-toggle="tab" href="#fifthFull" role="tab" aria-controls="second" aria-selected="false">Logg</a>
                        </li>
                        <li class="nav-item text-center">
                            <a class="nav-link" id="sixth-tab_" data-toggle="tab" href="#sixthFull" role="tab" aria-controls="second" aria-selected="false">Notater</a>
                        </li>
                        <li class="nav-item text-center">
                            <a class="nav-link" id="seventh-tab_" data-toggle="tab" href="#seventhFull" role="tab" aria-controls="second" aria-selected="false">Godkjenn/avsia</a>
                        </li>
                        <li class="nav-item text-center">
                            <a class="nav-link" id="eight-tab_" data-toggle="tab" href="#eightFull" role="tab" aria-controls="second" aria-selected="false">Saksbehandling</a>
                        </li>
                        
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="firstFull" role="tabpanel" aria-labelledby="first-tab_">
                          <div class="append_detail"> 

                          </div>
                        </div>
                        <div class="tab-pane fade" id="secondFull" role="tabpanel" aria-labelledby="second-tab_">
                           
                            
                        </div>
                        <div class="tab-pane fade" id="thirdFull" role="tabpanel" aria-labelledby="third-tab_">
                            <h6 class="mb-4">Wedding Cake with Flowers Macarons and Blueberries</h6>
                            <button type="button" class="btn btn-sm btn-outline-primary">Edit</button>
                        </div>
                        <div class="tab-pane fade" id="fourthFull" role="tabpanel" aria-labelledby="fourth-tab_">
                            <h6 class="mb-4">Wedding Cake with Flowers Macarons and Blueberries</h6>
                            <button type="button" class="btn btn-sm btn-outline-primary">Edit</button>
                        </div>
                        <div class="tab-pane fade" id="fifthFull" role="tabpanel" aria-labelledby="fifth-tab_">
                            <fieldset class="border-theme1">
                                <legend>Write a note</legend>
                                <div class="contain_auto" >
                                    <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                        <textarea  class="form-control" name="reservation" required></textarea>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-outline-primary">Save note</button>
                                </div>
                            </fieldset>
                            <fieldset class="border-theme1">
                                <legend>Saved notes</legend>
                                <div class="contain_auto" >
                                    <p>No note has been written for this damage case.</p>
                                </div>
                            </fieldset>
                        </div>
                        <div class="tab-pane fade" id="sixthFull" role="tabpanel" aria-labelledby="sixth-tab_">
                            <h6 class="mb-4">Wedding Cake with Flowers Macarons and Blueberries</h6>
                            <button type="button" class="btn btn-sm btn-outline-primary">Edit</button>
                        </div>
                        <div class="tab-pane fade" id="seventhFull" role="tabpanel" aria-labelledby="seventh-tab_">
                            <div id="accordion">
                                <div class="border " >
                                    <button class="btn btn-link btn-full background-theme1 border-theme1" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">
                                        
                                        Vedta         
                                        
                                    </button>

                                    <div id="collapseOne" class="collapse show " data-parent="#accordion">
                                        <div class="p-4">
                                        <fieldset class="border-theme1">
                                        <legend>Saksdata</legend>
                                        <div class="contain_auto" >
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                <label for="lastName">Status sak</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="status" >
                                                        <option value="Gress">Gress </option>
                                                        <option value="Kunstdekke">Kunstdekke </option>
                                                        <option value="Snø/is">Snø/is </option>
                                                        <option value="Grus">Grus  </option>
                                                        <option value="Innendørs">Innendørs  </option>
                                                        <option value="Annet">Annet  </option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text " for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                <label for="lastName">To the police</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="policy" >
                                                        <option value="Gress">Gress </option>
                                                        <option value="Kunstdekke">Kunstdekke </option>
                                                        <option value="Snø/is">Snø/is </option>
                                                        <option value="Grus">Grus  </option>
                                                        <option value="Innendørs">Innendørs  </option>
                                                        <option value="Annet">Annet  </option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                <label for="lastName">Insured below</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="policy" >
                                                        <option value="Gress">Gress </option>
                                                        <option value="Kunstdekke">Kunstdekke </option>
                                                        <option value="Snø/is">Snø/is </option>
                                                        <option value="Grus">Grus  </option>
                                                        <option value="Innendørs">Innendørs  </option>
                                                        <option value="Annet">Annet  </option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Regress</label>
                                                <input type="text" class="form-control" name="regress" required>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                <label for="lastName">body part</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="body_part" >
                                                        <option value="Gress">Gress </option>
                                                        <option value="Kunstdekke">Kunstdekke </option>
                                                        <option value="Snø/is">Snø/is </option>
                                                        <option value="Grus">Grus  </option>
                                                        <option value="Innendørs">Innendørs  </option>
                                                        <option value="Annet">Annet  </option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                <label for="lastName">damage part</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="damage_part" >
                                                        <option value="Gress">Gress </option>
                                                        <option value="Kunstdekke">Kunstdekke </option>
                                                        <option value="Snø/is">Snø/is </option>
                                                        <option value="Grus">Grus  </option>
                                                        <option value="Innendørs">Innendørs  </option>
                                                        <option value="Annet">Annet  </option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Deductible</label>
                                                <input type="text" class="form-control" name="deductible" required>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Reservation</label>
                                                <input type="text" class="form-control" name="reservation" required>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Automatic</label>
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckThis">
                                                    <label class="custom-control-label" for="customCheckThis">Export this case to the insurer</label>
                                                </div>
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckThis">
                                                    <label class="custom-control-label" for="customCheckThis">Give IHS limited access to the case</label>
                                                </div>
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckThis">
                                                    <label class="custom-control-label" for="customCheckThis">Mark as: Consult underwriter</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckThis">
                                                    <label class="custom-control-label" for="customCheckThis">This case can be closed automatically in case to inactivity</label>
                                                </div>
                                            </div>
                                            </div>
                                            </fieldset>
                                            <fieldset class="border-theme1">
                                            <legend>Send Email</legend>
                                        <div class="contain_auto">
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckThis">
                                                    <label class="custom-control-label" for="customCheckThis">Send Email to victim</label>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <label for="password">Subject</label>
                                                <input type="text" class="form-control" name="regress" required>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <label for="password">Sender Name</label>
                                                <input type="text" class="form-control" name="regress" required>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Sender Name</label>
                                                <textarea  class="form-control" name="regress" required></textarea>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-primary">Approve Claim</button>
                                            </div>
                                        </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <div class="border ">
                                    <button class="btn btn-link collapsed btn-full background-theme1 border-theme1" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Decline
                                    </button>
                                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                        <div class="p-4">
                                            <fieldset class="border-theme1">
                                            <legend>Saksdata</legend>
                                        <div class="contain_auto" >
                                        <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Type of Rejection</label>
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckThis">
                                                    <label class="custom-control-label" for="customCheckThis">Refusal</label>
                                                </div>
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckThis">
                                                    <label class="custom-control-label" for="customCheckThis">Temporary rejection with the posibility of user editing</label>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                <label for="lastName">Status sak</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="status" >
                                                        <option value="Gress">Gress </option>
                                                        <option value="Kunstdekke">Kunstdekke </option>
                                                        <option value="Snø/is">Snø/is </option>
                                                        <option value="Grus">Grus  </option>
                                                        <option value="Innendørs">Innendørs  </option>
                                                        <option value="Annet">Annet  </option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text " for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                <label for="lastName">To the police</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="policy" >
                                                        <option value="Gress">Gress </option>
                                                        <option value="Kunstdekke">Kunstdekke </option>
                                                        <option value="Snø/is">Snø/is </option>
                                                        <option value="Grus">Grus  </option>
                                                        <option value="Innendørs">Innendørs  </option>
                                                        <option value="Annet">Annet  </option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                <label for="lastName">Insured below</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="policy" >
                                                        <option value="Gress">Gress </option>
                                                        <option value="Kunstdekke">Kunstdekke </option>
                                                        <option value="Snø/is">Snø/is </option>
                                                        <option value="Grus">Grus  </option>
                                                        <option value="Innendørs">Innendørs  </option>
                                                        <option value="Annet">Annet  </option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Regress</label>
                                                <input type="text" class="form-control" name="regress" required>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                <label for="lastName">body part</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="body_part" >
                                                        <option value="Gress">Gress </option>
                                                        <option value="Kunstdekke">Kunstdekke </option>
                                                        <option value="Snø/is">Snø/is </option>
                                                        <option value="Grus">Grus  </option>
                                                        <option value="Innendørs">Innendørs  </option>
                                                        <option value="Annet">Annet  </option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                <label for="lastName">damage part</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="damage_part" >
                                                        <option value="Gress">Gress </option>
                                                        <option value="Kunstdekke">Kunstdekke </option>
                                                        <option value="Snø/is">Snø/is </option>
                                                        <option value="Grus">Grus  </option>
                                                        <option value="Innendørs">Innendørs  </option>
                                                        <option value="Annet">Annet  </option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Deductible</label>
                                                <input type="text" class="form-control" name="deductible" required>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Reservation</label>
                                                <input type="text" class="form-control" name="reservation" required>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Automatic</label>
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckThis">
                                                    <label class="custom-control-label" for="customCheckThis">Export this case to the insurer</label>
                                                </div>
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckThis">
                                                    <label class="custom-control-label" for="customCheckThis">Give IHS limited access to the case</label>
                                                </div>
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckThis">
                                                    <label class="custom-control-label" for="customCheckThis">Mark as: Consult underwriter</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckThis">
                                                    <label class="custom-control-label" for="customCheckThis">This case can be closed automatically in case to inactivity</label>
                                                </div>
                                            </div>
                                            </div>
                                            </fieldset>
                                            <fieldset class="border-theme1">
                                            <legend>Send Email</legend>
                                            <div class="contain_auto">
                                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                    <div class="custom-control custom-checkbox ">
                                                        <input type="checkbox" class="custom-control-input" id="customCheckThis">
                                                        <label class="custom-control-label" for="customCheckThis">Send Email to victim</label>
                                                    </div>
                                                </div>
                                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                    <label for="password">Subject</label>
                                                    <input type="text" class="form-control" name="regress" required>
                                                </div>
                                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                    <label for="password">Sender Name</label>
                                                    <input type="text" class="form-control" name="regress" required>
                                                </div>
                                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                    <label for="password">Sender Name</label>
                                                    <textarea  class="form-control" name="regress" required></textarea>
                                                </div>
                                                <button type="button" class="btn btn-sm btn-outline-primary">Decline Claim</button>
                                                </div>
                                            </fieldset>
                                        </div>
                                        
                                    </div>
                                </div>
                                </div>
                            </div>
                        <div class="tab-pane fade" id="eightFull" role="tabpanel" aria-labelledby="eight-tab_">
                            <div id="procedural">
                                <div class="border " >
                                    <button class="btn btn-link btn-full background-theme1 border-theme1" data-toggle="collapse" data-target="#collapseTwo"
                                        aria-expanded="true" aria-controls="collapseTwo">
                                        Overview
                                    </button>

                                    <div id="collapseTwo" class="collapse show " data-parent="#procedural">
                                        <div class="p-4">
                                        <fieldset class="border-theme1">
                                        <legend>Saksdata</legend>
                                        <div class="contain_auto" >
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                <label for="lastName">Status sak</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="status" >
                                                        <option value="Gress">Gress </option>
                                                        <option value="Kunstdekke">Kunstdekke </option>
                                                        <option value="Snø/is">Snø/is </option>
                                                        <option value="Grus">Grus  </option>
                                                        <option value="Innendørs">Innendørs  </option>
                                                        <option value="Annet">Annet  </option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text " for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                <label for="lastName">To the police</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="policy" >
                                                        <option value="Gress">Gress </option>
                                                        <option value="Kunstdekke">Kunstdekke </option>
                                                        <option value="Snø/is">Snø/is </option>
                                                        <option value="Grus">Grus  </option>
                                                        <option value="Innendørs">Innendørs  </option>
                                                        <option value="Annet">Annet  </option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                <label for="lastName">Insured below</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="policy" >
                                                        <option value="Gress">Gress </option>
                                                        <option value="Kunstdekke">Kunstdekke </option>
                                                        <option value="Snø/is">Snø/is </option>
                                                        <option value="Grus">Grus  </option>
                                                        <option value="Innendørs">Innendørs  </option>
                                                        <option value="Annet">Annet  </option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Regress</label>
                                                <input type="text" class="form-control" name="regress" required>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                <label for="lastName">body part</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="body_part" >
                                                        <option value="Gress">Gress </option>
                                                        <option value="Kunstdekke">Kunstdekke </option>
                                                        <option value="Snø/is">Snø/is </option>
                                                        <option value="Grus">Grus  </option>
                                                        <option value="Innendørs">Innendørs  </option>
                                                        <option value="Annet">Annet  </option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                <label for="lastName">damage part</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="damage_part" >
                                                        <option value="Gress">Gress </option>
                                                        <option value="Kunstdekke">Kunstdekke </option>
                                                        <option value="Snø/is">Snø/is </option>
                                                        <option value="Grus">Grus  </option>
                                                        <option value="Innendørs">Innendørs  </option>
                                                        <option value="Annet">Annet  </option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Deductible</label>
                                                <input type="text" class="form-control" name="deductible" required>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Reservation</label>
                                                <input type="text" class="form-control" name="reservation" required>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Automatic</label>
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckThis">
                                                    <label class="custom-control-label" for="customCheckThis">Export this case to the insurer</label>
                                                </div>
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckThis">
                                                    <label class="custom-control-label" for="customCheckThis">Give IHS limited access to the case</label>
                                                </div>
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckThis">
                                                    <label class="custom-control-label" for="customCheckThis">Mark as: Consult underwriter</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckThis">
                                                    <label class="custom-control-label" for="customCheckThis">This case can be closed automatically in case to inactivity</label>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-primary">Update case data</button>
                                            </div>
                                            </fieldset>
                                            <div class="top-bot-set">
                                                <div class="card-header">
                                                    <ul class="nav nav-tabs card-header-tabs " role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="first-tab" data-toggle="tab" href="#first"
                                                                role="tab" aria-controls="first" aria-selected="true">All Transaction</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="third-tab" data-toggle="tab" href="#third"
                                                                role="tab" aria-controls="third" aria-selected="false">Payouts - Per category</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="card-body">
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade show active" id="first" role="tabpanel"
                                                            aria-labelledby="first-tab">
                                                            <table class="data-table data-table-feature table table-bordered border-theme1">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Date</th>
                                                                        <th>User</th>
                                                                        <th>Type</th>
                                                                        <th>Amount</th>
                                                                        <th>Status</th>
                                                                        <th>Options</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <p class="list-item-heading">Marble Cake</p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-muted">1452</p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-muted">62</p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-muted">Cupcakes</p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-muted">Cupcakes</p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-muted">Cupcakes</p>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="tab-pane fade" id="third" role="tabpanel"
                                                            aria-labelledby="third-tab">
                                                            <table class="data-table data-table-feature table table-bordered border-theme1">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Category</th>
                                                                        <th>Amount</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <p class="list-item-heading">Marble Cake</p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-muted">1452</p>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <fieldset class="border-theme1">
                                                <legend>Statistics</legend>
                                                <div class="row side-set">
                                                    <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                        <table class=" table-bordered border-theme1 table">
                                                        <thead class="border-theme1 ">
                                                                <tr>
                                                                    <th colspan="2">Payout Status</th>
                                                                </tr>
                                                            </thead>
                                                            <thead class=" border-theme1 ">
                                                                <tr>
                                                                    <th>type</th>
                                                                    <th>sum</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <p class="list-item-heading">Marble Cake</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="text-muted">1452</p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                        <table class=" table-bordered border-theme1 table">
                                                        <thead class="border-theme1 ">
                                                                <tr>
                                                                    <th colspan="2">Forecast for total payment</th>
                                                                </tr>
                                                            </thead>
                                                            <thead class=" border-theme1 ">
                                                                <tr>
                                                                    <th>type</th>
                                                                    <th>sum</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <p class="list-item-heading">Marble Cake</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="text-muted">1452</p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div> 
                                <div class="border " >
                                    <button class="btn btn-link collapsed btn-full background-theme1 border-theme1" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="false" aria-controls="collapseOne">
                                        Utbetaling
                                    </button>

                                    <div id="collapseOne" class="collapse " data-parent="#procedural">
                                        <div class="p-4">
                                        <fieldset class="border-theme1">
                                            <legend>Delbelop</legend>
                                            <div class="row" >
                                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-1">
                                                </div>
                                                <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-2">
                                                    <label for="lastName">Dato</label>
                                                    <div class="input-group date">
                                                        <input type="text" class="form-control">
                                                        <span class="input-group-text input-group-append input-group-addon">
                                                            <i class="simple-icon-calendar"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-3">
                                                    <label for="lastName">Deknlngskategori</label>
                                                    <div class="input-group mb-3">
                                                        <select class="custom-select" id="inputGroupSelect02" name="policy" >
                                                            <option value="Gress">Gress </option>
                                                            <option value="Kunstdekke">Kunstdekke </option>
                                                            <option value="Snø/is">Snø/is </option>
                                                            <option value="Grus">Grus  </option>
                                                            <option value="Innendørs">Innendørs  </option>
                                                            <option value="Annet">Annet  </option>
                                                        </select>
                                                        <div class="input-group-append">
                                                            <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-2">
                                                    <label for="password">Betalit till</label>
                                                    <input type="text" class="form-control" name="regress" required>
                                                </div>
                                            
                                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-2">
                                                    <label for="password">Belop</label>
                                                    <input type="text" class="form-control" name="deductible" required>
                                                </div>
                                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-1 to_center">
                                                    <button type="button" class="btn btn-sm btn-outline-primary">x</button>
                                                </div>
                                            </div>
                                            <div class="contain_auto">
                                                <button type="button" class="btn btn-sm btn-outline-primary">Legg till ny rad</button>
                                            </div>
                                        </fieldset>
                                        <fieldset class="border-theme1">
                                            <legend>Egenskaper</legend>
                                        <div class="contain_auto">
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckThis">
                                                    <label class="custom-control-label" for="customCheckThis">Send email to inquired party when this payment is transferred</label>
                                                </div>
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckThis">
                                                    <label class="custom-control-label" for="customCheckThis">Reduce reservation automatically with the payment amount</label>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                <label for="lastName">Main category</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="policy" >
                                                        <option value="Gress">Gress </option>
                                                        <option value="Kunstdekke">Kunstdekke </option>
                                                        <option value="Snø/is">Snø/is </option>
                                                        <option value="Grus">Grus  </option>
                                                        <option value="Innendørs">Innendørs  </option>
                                                        <option value="Annet">Annet  </option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                <label for="lastName">Fill in the feild</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="policy" >
                                                        <option value="Gress">Gress </option>
                                                        <option value="Kunstdekke">Kunstdekke </option>
                                                        <option value="Snø/is">Snø/is </option>
                                                        <option value="Grus">Grus  </option>
                                                        <option value="Innendørs">Innendørs  </option>
                                                        <option value="Annet">Annet  </option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Description</label>
                                                <input type="text" class="form-control" name="regress" required>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Deductible that is deducted</label>
                                                <input type="text" class="form-control" name="regress" required>
                                            </div>
                                            </div>
                                        </fieldset>
                                        <fieldset class="border-theme1">
                                            <legend>Receiver</legend>
                                        <div class="contain_auto">
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <label>Recepient Category</label>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="radio3" name="radioDisabled" class="custom-control-input" disabled="">
                                                    <label class="custom-control-label">Toggle this custom radio</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="radio3" name="radioDisabled" class="custom-control-input" disabled="">
                                                    <label class="custom-control-label">Toggle this custom radio</label>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <label>Type of Payment</label>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="radio3" name="radioDisabled" class="custom-control-input" disabled="">
                                                    <label class="custom-control-label">National</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="radio3" name="radioDisabled" class="custom-control-input" disabled="">
                                                    <label class="custom-control-label">International</label>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Name</label>
                                                <input type="text" class="form-control" name="regress" required>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Address</label>
                                                <input type="text" class="form-control" name="regress" required>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Account no.</label>
                                                <input type="text" class="form-control" name="regress" required>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Postnr/sted</label><br>
                                                <input type="text" class="form-control inpt-code" name="a_code"
                                                    id="a_codeValidation" required>
                                                <input type="text" class="form-control inpt-num" name="a_phone"
                                                id="a_phoneValidation" required>
                                            </div>
                                            </div>
                                        </fieldset>
                                        <fieldset class="border-theme1">
                                            <legend>Payment details</legend>
                                        <div class="contain_auto row">
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-10">
                                                <label for="password">Amount to be paid</label>
                                                <input type="text" class="form-control" name="regress" required>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-2  to_center">
                                                <button type="button" class="btn btn-sm btn-outline-primary">Calculate automatically</button>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Message</label>
                                                <input type="text" class="form-control" name="regress" required>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                <label for="lastName">Due date</label>
                                                <div class="input-group date">
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-text input-group-append input-group-addon">
                                                        <i class="simple-icon-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">KID</label>
                                                <input type="text" class="form-control" name="regress" required>
                                            </div>
                                            </div>
                                        </fieldset>
                                            <button type="button" class="btn btn-sm btn-outline-primary" style="margin-top: 3%;">Add transaction </button>
                                        </div>
                                    </div>
                                </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</main>




<script>
  $(document).ready(function() {
    $.ajax({
      type: 'POST',
      url: "<?php echo ADMIN_BASE_URL?>claims/get_claim_detail",
      data: {'id': '<?php echo $federation_id; ?>'},
      async: false,
      success: function(result) {
        $('.append_detail').html(result);
      }
    });
  });
</script>