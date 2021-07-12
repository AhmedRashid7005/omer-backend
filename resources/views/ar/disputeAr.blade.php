@extends('template.ar_template')
@section('title', 'Dispute')
@section('content')

@push("css")
    <style>
        .footer{
            margin-top: 160px !important;
        }
    </style>
@endpush


    <!--section -->    
     <section class="other_nav_link" style="position: relative; top: 160px;">
            <!-- Start container-->
            <div class="container ">

            <form id="myform">
                <div class="row ">

                    <!--select -->  
                    <div class="col-md-12  col-12 text-center">
                        <h1 class="text-primary text-center my-3" > Raising a dispute</h1>
                        <div class="input-group mb-3"  >
                            <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Sections</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" >
                            <option selected>select...</option>
                            <option value="1">Broker</option>
                            <option value="3">import</option>
                            <option value="4">spare parts</option>
                            <option value="5">global shipping</option>
                            <option value="6">domestic shipping</option>
                            <option value="9">other</option>
                            </select>
                        </div>
                    </div>
                  <!--select-->                  
                    
                    
                    
                    <!-- div name-->    
                    <div class=" col-md-12  col-12  text-center">
                        <div class="input-group mb-3"  >
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" >Suite Number *</span>
                            </div>
                            <input type="text" id="textview" class="form-control" id="email" oninvalid="InvalidMsg(this);" 
                            oninput="InvalidMsg(this);" name="email" 
                            required="required" placeholder="  (Required)" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                <!--div name-->   
                
                
                <!--div email--> 
                    <div class=" col-md-12  col-12  text-center">
                        <div class="input-group mb-3"  >
                            <div class="input-group-prepend">
                                <span class="input-group-text w-auto" id="basic-addon1"> Order or shipment Number *</span>
                            </div>
                            <input type="text" id="textview1" class="form-control" id="email" oninvalid="InvalidMsg(this);" 
                            oninput="InvalidMsg(this);" name="email" 
                            type="email" required="required" placeholder=" (Required)" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                <!--div email-->
                

                
            
                 <!--massage-->  
                    <div class="col-md-12 col-12  text-center mb-3"> 
                        <div class="input-group "  >
                            <div class="input-group-prepend">
                            <span class="input-group-text">Subject of dispute</span>
                            </div>
                            <textarea id="textview-area1" class="form-control" placeholder=" (Optional)" aria-label="With textarea"></textarea>
                        </div>
                    </div>
               <!--massage-->    



               <!-- Message description -->
                    <div class="col-md-12 col-12  text-center mb-3"> 
                        <div class="input-group "  >
                            <div class="input-group-prepend">
                            <span class="input-group-text w-auto">Description of dispute *</span>
                            </div>
                            <textarea id="textview-area" class="form-control" id="email" oninvalid="InvalidMsg(this);" 
                            oninput="InvalidMsg(this);" 
                             required="required"  placeholder="  (Required)" aria-label="With textarea"></textarea>
                        </div>
                    </div>
                <!-- Message description -->


               <!-- div name-->    
                    <div class=" col-md-12  col-12  text-center">
                        <div class="input-group mb-3"  >
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" >Solution *</span>
                            </div>
                            <input type="text" id="textview2" class="form-control" id="email" oninvalid="InvalidMsg(this);" 
                            oninput="InvalidMsg(this);" name="email" 
                            required="required" placeholder="(Required)" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                <!--div name-->

                <!-- col-12 -->
                <div class="col-lg-12 col-12 text-right my-3">
                    <div class="border wrapper w-100" id="form1" runat="server" >
                        <div class="file-upload float-right ">
                            <input class="inputfile " id="image-file" type="file" multiple/>
                            <i class="fa fa-3x fa-image"></i>
                          </div>
                          <div  class="content-img w-100  "></div>
                        </div>
                </div>
                <!--</div>-->
                    
                           
                    
                    <div class=" col-md-12 col-12  text-center my-md-4">
                        <input class="btn btn-primary px-5" type="submit" value="Send"/>
                    </div> 
                    
                </div>



            </form>
                 <!--/ Row-->
                
        </div>

            <!-- End container-->
    </section>

    <!-- End section  -->
    
    
    
    
    
     <!--section -->    
         <section class="section-2" style="position: relative; top: 160px;">
            <!-- Start container-->
            <div class="container ">
 

                <!--/ ROW -->
                <div class="row ">
                    
                    <!--/ col-12 -->
                    <div class="col-md-12 col-12 my-md-5 table-responsive-sm">
                        
                        <!--/ table -->
                        <table class="table table-bordered text-center">
                            <thead>
                              <tr>
                                <th scope="col">Subject</th>
                                <th scope="col">Order Number </th>
                                <th scope="col">Section</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row"><button class="btn btn-danger">Show</button></th>
                                <td> </td>
                                <td> </td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td></td>
                              </tr>
                              <tr>
                                <th scope="row">3</th>
                                <td colspan="2"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                            </tbody>
                          </table>
                        <!--/ table -->
                        
                    </div>
                    <!--/ col-12 -->
                    

                </div>
                <!--/ ROW --> 
            </div>
            <!--/ container --> 
        </section>
    
    <!--/ section --> 
         
         
         
        <!--section -->    
        <section class="section-2" style="position: relative; top: 160px; margin-bottom: 140px;">
            <!-- Start container-->
            <div class="container ">

                <!-- ROW -->
                <div class="row ">
                    
                  <!-- col-12 -->
                    <div class="col-md-12 col-12  my-5">
                        
                        <!-- table -->
                        <h3> Message</h3>
                      
                        <p>Date : 09-11-2020 </p>
                        <p> Employee name : Ahmed</p>
                        <p> Auto parts : </p>

                    </div>
                    <!--/ col-12 -->
                    
                        <!-- col-6 -->
                        <div class=" col-md-6 text-center mt-4 ">
                            <button type="button" class="btn btn-secondary px-5"> Cancel dispute</button>
                        </div>
                        <!--/ col-6 -->
                        
                        
                        
                        <!-- col-6 -->
                        <div class=" col-md-6 text-center mt-3 mb-5">
                            
                            <div class="input-group mb-3"  >
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" >Reply to the message</span>
                                </div>
                                <textarea id="textview-area" class="form-control" id="email" oninvalid="InvalidMsg(this);" 
                                oninput="InvalidMsg(this);" 
                                 required="required"  placeholder="Reply" aria-label="With textarea"></textarea>
                          
                            </div>
                            <button type="button" class="btn btn-primary px-5">Send</button>
                        </div>
                        <!--/ col-6 -->
                        
                        
                        
  
                </div>
                <!--/ ROW --> 
            </div>
            <!--/ container --> 
        </section>
    
    <!--/ section --> 
    
    
    
    

    
    

<!-- My_model-2 -->
    <div id="myModal_2" class="modal fade text-center">
                  <div class="modal-dialog">
                    <div class="col-lg-10 col-sm-10 col-12 main-section">
                      <div class="modal-content">
                        
                        <div class="col-lg-12 col-sm-12 col-12 my-5">
                          <img src="images/done.png">
                        </div>
                        <div class="col-lg-12 col-sm-12 col-12 form-input mb-3">
                          <form>
                            <button type="button" class="close" data-dismiss="modal">Done</button> 
                          </form>
                        </div>
  
                      </div>
                    </div>
                  </div>
                </div>
    <!--/ My_model -->


@endsection


@push("script")


<script type="text/javascript">

  function cleanall(){
    document.getElementById("textview").value = "";
    document.getElementById("textview1").value = "";
    document.getElementById("textview2").value = "";
    document.getElementById("textview3").value = "";
    document.getElementById("textview-area").value = "";
    document.getElementById("textview-area1").value = "";

  }  



  
function InvalidMsg(textbox) { 

if (textbox.value === '') { 
    textbox.setCustomValidity 
    ('this input is required').style.backgroundColor = "red"; 
}else { 
    textbox.setCustomValidity(''); 
} 

return true; 
}  

</script>

@endpush