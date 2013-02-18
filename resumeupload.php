<?php require_once'top.php'; ?>
        <!-- form -->
        <p></p>
        <br/>
        <div align="center">
            <h3>Your account has been created. Please upload your resume.</h3>
            <div class="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Warning!</strong> Please upload your resume in any of the following format below.<br/>
                1. Microsoft Word.<br/>
                2. Portable Document format(PDF).
            </div>
            <form id="myForm" action="uploadresume.php" method="post" enctype="multipart/form-data">               
                <input type="file" name="cv" size="25"/><br/>
                <input type="hidden" name="email" required class="input-xlarge"
                       value="<?php echo $_GET['email']; ?>"/><br/>
                <button id="sub" name="submit" class="btn btn-large btn-primary input-xlarge">Upload Resume Now!</button>
            </form>
        </div>
        </div>
     <?php require_once 'bottom.php';?>
