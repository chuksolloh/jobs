<?php require_once'top.php'; ?>
        <!-- form -->
        <p></p>
        <br/>
        <div align="center" class="row-fluid">
            <p class="lead" align="center">
                Sign-up now to start receiving job matches as soon as we launch.
            </p>
            <form id="myForm" action="employee.php" method="post" enctype="multipart/form-data">
                <input type="text" name="firstname" required placeholder="First name here." class="input-xlarge"/><br/>
                <input type="text" name="lastname" required placeholder="Last name here." class="input-xlarge"/><br/>
                <input type="email" name="email" required placeholder="Email address here." class="input-xlarge"/><br/>
                <!--<div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="uneditable-input span2"><i class="icon-file fileupload-exists"></i> <span class="fileupload-preview
                      "></span></div><span class="btn btn-file"><span class="fileupload-new">Upload Resume</span>
                          <span class="fileupload-ex
                      ists">Change</span><input type="file" /></span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">
                      Remove</a>
                      </div>
                </div>-->
                <input type="file" name="cv" class="span2"/> Upload Resume<br/>
                    <button id="sub" name="submit" class="btn btn-large btn-primary input-xlarge">Sign-Up Now!</button>
            </form>
        </div>
        <!--end of form-->
    <?php require_once 'bottom.php';?>
