<?php 
	include 'header.php';
?>



    	<div class="container-fluid">
    		<div class="fuelux">
      			<div id="MyWizard" class="wizard">
	        		<ul class="steps">
	            		<li data-target="#step1" class="active"><span class="badge badge-info">1</span>Contact Information<span class="chevron"></span></li>
	            		<li data-target="#step2"><span class="badge">2</span>Sizes/Measurements<span class="chevron"></span></li>
	            		<li data-target="#step3"><span class="badge">3</span>Confirm<span class="chevron"></span></li>
	        		</ul>
	        		<div class="actions">
	            		<button type="button" class="btn btn-small btn-prev"> <i class="icon-arrow-left"></i>Prev Step</button>
	            		<button type="button" class="btn btn-small btn-next" data-last="Finish">Next Step<i class="icon-arrow-right"></i></button>
	        		</div>
    			</div>
    			<div class="step-content">
        			<div class="step-pane active well" id="step1">
            			<br>
            			<form id="gsStep1" class="form-signin">
                			<p class="form-signin-heading">Please Enter the Following Information Below!</p>
                			<div class="control-group">
                    			<label class="lead" for="gsPass1">Create a Password</label>
                    			<hr>
                    			<input type="password" maxlength="20" class="span3" id="gsPass1" placeholder="Password" required>
                    			<input type="password" maxlength="20" class="span3" id="gsPass2" placeholder="Confirm Password" required>
                			</div>
                			<div class="control-group">
                    			<label class="lead" for="Contact Info">Contact Information</label>
                    			<hr>
                    			<input type="text" class="span5" id="gsAdd1" placeholder="Address 1" required>
                    			<br>
                    			<input type="text" class="span5" id="gsAdd2" placeholder="Address 2">
                    			<br>
                    			<input type="text" class="span2" id="gsAddCity" placeholder="City" required>
                    			<select class="span1" name="states">
                        			<option value="AL">AL</option>
                        			<option value="AK">AK</option>
			                        <option value="AZ">AZ</option>
			                        <option value="AR">AR</option>
			                        <option value="CA">CA</option>
			                        <option value="CO">CO</option>
			                        <option value="CT">CT</option>
			                        <option value="DE">DE</option>
			                        <option value="DC">DC</option>
			                        <option value="FL">FL</option>
			                        <option value="GA">GA</option>
			                        <option value="HI">HI</option>
			                        <option value="ID">ID</option>
			                        <option value="IL">IL</option>
			                        <option value="IN">IN</option>
			                        <option value="IA">IA</option>
			                        <option value="KS">KS</option>
			                        <option value="KY">KY</option>
			                        <option value="LA">LA</option>
			                        <option value="ME">ME</option>
			                        <option value="MD">MD</option>
			                        <option value="MA">MA</option>
			                        <option value="MI">MI</option>
			                        <option value="MN">MN</option>
			                        <option value="MS">MS</option>
			                        <option value="MO">MO</option>
			                        <option value="MT">MT</option>
			                        <option value="NE">NE</option>
			                        <option value="NV">NV</option>
			                        <option value="NH">NH</option>
			                        <option value="NJ">NJ</option>
			                        <option value="NM">NM</option>
			                        <option value="NY">NY</option>
			                        <option value="NC">NC</option>
			                        <option value="ND">ND</option>
			                        <option value="OH">OH</option>
			                        <option value="OK">OK</option>
			                        <option value="OR">OR</option>
			                        <option value="PA">PA</option>
			                        <option value="RI">RI</option>
			                        <option value="SC">SC</option>
			                        <option value="SD">SD</option>
			                        <option value="TN">TN</option>
			                        <option value="TX">TX</option>
			                        <option value="UT">UT</option>
			                        <option value="VT">VT</option>
			                        <option value="VA">VA</option>
			                        <option value="WA">WA</option>
			                        <option value="WV">WV</option>
			                        <option value="WI">WI</option>
			                        <option value="WY">WY</option>
                    			</select> 
                    			<input type="text" class="span2" id="gsAddZip" maxlength="5" placeholder="Zip Code" required>
                			</div>
                			<br>
                			<div class="control-group">
                    			<div class="input-prepend input-datepicker">
                      				<button type="button" class="btn"><span class="fui-calendar"></span></button>
                      				<input type="text" class="span2"  id="datepicker-01">
                    			</div>
                			</div>
                			<div class="control-group">
                    			<input type="tel" class="span2" id="gsPhone" value="(xxx) xxx-xxxx">
                			</div>
			                <div class="control-group">
			                    <select class="span2" name="gender">
			                        <option value="Please Select">Please Select</option>
			                        <option value="Male">Male</option>
			                        <option value="Female">Female</option>
			                    </select>
			                </div>
			            </form>
			            <p>
			                Profile Picture (Upload) (optional)
			            </p>
			        </div>
			        
			        
        			<div class="step-pane well" id="step2">
            			<form id="gsStep2">
                			<p class="form-signin-heading lead">Please Enter the Following Information Below!</p>
                			<p> If you don't know your sizes or want to learn how to size yourself <a href="#sizes-full-width" data-toggle="modal" title="Clothing Size Information - Gifting Block" target="_blank">click here</a></p>
                			<fieldset>
                        		<label class="checkbox primary" for="checkbox1">
                            		<span class="icons">
                            			<span class="first-icon fui-checkbox-unchecked"></span> 
                            			<span class="second-icon fui-checkbox-checked"></span> 
                            		</span>
                            		<input type="checkbox" value="" id="checkbox1" data-toggle="checkbox">&nbsp;&nbsp;Right Handed
                            	</label>
                        		<label class="checkbox primary" for="checkbox2">
                            		<span class="icons">
                            			<span class="first-icon fui-checkbox-unchecked"></span> 
                            			<span class="second-icon fui-checkbox-checked"></span> 
                            		</span>
                            		<input type="checkbox" value="" id="checkbox2" data-toggle="checkbox">&nbsp;&nbsp;Left Handed
                            	</label>
                    		</fieldset>                    
            			</form>
            			<p>
                			Sizes &amp; Measurements Fieldset (Text fields or Dropdowns)<br>
                			Torso Sizes &amp; Measurements<br>
                			Lower Body Sizes &amp; Measurements<br>
                			Head, Hands/Wrists &amp; Feet Sizes &amp; Measurements<br>
                			The user must also select the default privacy settings for their measurements (Public, Protected or Private)<br>
            			</p>
        			</div>
        			
        			
        			<div class="step-pane" id="step3">
            			<h3>The User will confirm there information here before finalizing the registration process</h3>
            			<p>
                			All their information will show up here so they can confirm it. Once they have confirmed there information is correct they will click the Finish Button and they will then be taken to their profile page.
            			</p>
        			</div>
    			</div>
    		</div>
    
  <?php 
  
  	include 'footer.php';
  ?>
