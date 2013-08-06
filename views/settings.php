<?php 
	include 'header.php';
?>

<div class="container-fluid">
    <div class="row">
      <div class="well span8 offset4">
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane active in" id="home">
                <h4>Account Settings</h4>
                <form id="tab2">
                    <label>Username</label>
                        <input type="text" placeholder="Username" class="input-xlarge">
                    <label>Name</label>
                        <input type="text" placeholder="First Name" class="input-xlarge">
                        <input type="text" placeholder="Last Name" class="input-xlarge">
                    <label>Email</label>
                        <input type="email" placeholder="Email Address" class="input-large">
                        <input type="email" placeholder="Confirm Your Email Address" class="input-large">
                
                </form>
            <span>
            <a href="#deleteConfirm" data-toggle="modal" title="Delete Your Account? - Gifting Block" target="_blank"><button class="btn btn-danger"><i class="icon-trash icon-white"></i> Delete Account</button></a>
            </span>
            <hr>
            <span>
                <button class="btn btn-success">Update</button>
            </span>
            </div>
      <div class="tab-pane fade in" id="contact">
       
          <h4>Contact Info</h4>
    <form class="span7" id="shippingadd">
            <h5>Shipping Address</h5>
    <fieldset>
        <!-- Address form -->
       <!-- address-line1 input-->
        <div class="control-group">
            <label class="control-label">Street Address</label>
            <div class="controls">
                <input id="address-line1" name="address-line1" type="text" placeholder="Street Address/P.O. Box" 
                class="input-xlarge">
                <input id="address-line2" name="address-line2" type="text" placeholder="Apartment, Suite, Unit, Building, Floor, Etc.."
                class="input-xlarge">
            </div>
        </div>
        <!-- city input-->
        <div class="control-group">
            <label>City </label>
            <div class="controls">
                <input id="city" name="city" type="text" placeholder="City" class="input-xlarge">
                <input id="postal-code" name="postal-code" type="text" placeholder="Zip Code"
                class="input-small">
                <input id="region" name="region" type="text" placeholder="State"
                class="input-medium">
                <p class="help-block"></p>
            </div>
        </div>
    </fieldset>
        </form>
        <form class="span7" id="billingadd">
            <h5>Billing Address</h5>
    <fieldset>
        <!-- Address form -->
       <!-- address-line1 input-->
       <p>Is Your Billing Address the Same as your Shipping Address?</p>
        <label class="radio">
            
            <input type="radio" name="optionsRadios" id="optionsRadios1" value="Yes" checked>
                Yes
        </label>
        <label class="radio">
            <input type="radio" name="optionsRadios" id="optionsRadios2" value="No">
                No
        </label>
        <div class="control-group">
            <label class="control-label">Street Address</label>
            <div class="controls">
                <input id="address-line1" name="address-line1" type="text" placeholder="Street Address/P.O. Box" 
                class="input-xlarge">
                <input id="address-line2" name="address-line2" type="text" placeholder="Apartment, Suite, Unit, Building, Floor, Etc.."
                class="input-xlarge">
            </div>
        </div>
        <!-- city input-->
        <div class="control-group">
            <label>City </label>
            <div class="controls">
                <input id="city" name="city" type="text" placeholder="City" class="input-xlarge">
                <input id="postal-code" name="postal-code" type="text" placeholder="Zip Code"
                class="input-small">
                <input id="region" name="region" type="text" placeholder="State"
                class="input-medium">
                <p class="help-block"></p>
            </div>
        </div>
    </fieldset>
    <hr>
    </form>
        <div>
            
            <button class="btn btn-success">Update</button>
        </div>
      </div>
      <div class="tab-pane fade" id="home">
      <form id="tab2">
          <label>Username</label>
            <input type="text" placeholder="Username" class="input-xlarge">
            <label>Name</label>
            <input type="text" placeholder="First Name" class="input-xlarge">
            <input type="text" placeholder="Last Name" class="input-xlarge">
            <label>Email</label>
            <input type="email" placeholder="Email Address" class="input-large">
            <input type="email" placeholder="Confirm Your Email Address" class="input-large">
        
      </form>
      <span>
        
        <a href="#deleteConfirm" data-toggle="modal" title="Delete Your Account? - Gifting Block" target="_blank"><button class="btn btn-warning">Delete Account</button></a>
      </span>
      <span>
        <button class="btn btn-success">Update</button>
      </span>
      </div>
      <div class="tab-pane fade" id="password">
        <h4> Password Settings</h4>
        <form id="tab3">
          <label>Old Password <span class="label label-small label-important">Important</span></label>
          <input type="password" class="input-xlarge">
          <label>New Password</label>
          <input type="password" class="input-xlarge">
          <label>Confirm New Password</label>
          <input type="password" class="input-xlarge">
          <hr>
          <div>
              <button class="btn btn-success">Update</button>
          </div>
      </form>
      </div>
    </div>
  </div>
  <div class="span3">
<div class="sidebar-nav">
  <div class="well" style="padding: 8px 0;">
    <ul class="nav nav-list"> 
      <li><a href="./profile.html"><i class="fui-user" style="color: #34485F;"></i> Back to My Profile</a></li>
      <li><a href="./edit-profile.html"><i style="color: #34485F;" class="icon-pencil"></i> Edit Your Profile</a></li>
      <li class="nav-header">Account Menu</li> 
            <li class="divider"></li>
        <li class="active"><a href="#home" data-toggle="tab"><i class="fui-gear"></i> Account Settings </a></li>
            <li class="divider"></li>
        <li><a href="#contact" data-toggle="tab"><i style="color: #344760;" class="fui-mail"></i> Contact Info </a></li>
            <li class="divider"></li>
        <li><a href="#password" data-toggle="tab"><i style="color: #344760;" class="fui-lock"></i> Password</a></li>
          <li class="divider"></li>
      <li><a href="#/?logout.php"><i class="icon-share"></i> Logout</a></li>
    </ul>
  </div>
</div>
  </div>


  <!-- Delete Account Modal -->
<div id="deleteConfirm" class="modal container hide fade" tabindex="-1">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>Account Deletion</h3>
    </div>
    <div class="modal-body">
    <p>Are you sure you want to <strong>Delete</strong> your Gifting Block&trade; Account?</p>
    <label>Enter <strong>DELETE</strong> in all Caps below to Delete your Account Permanently</label>
    <input type="text" placeholder="Type Here..." class="input-large">
    </div>
    <div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn btn-large btn-inverse">Whoops, Nevermind!</button>
    <button type="button" data-dismiss="modal" class="btn btn-large btn-primary">Delete Account</button>
    </div>
</div>
    <!-- End Sizes Modal -->

</div>

<?php 
	include 'footer.php';
?>