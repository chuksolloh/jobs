<?php require_once'top_1.php'; ?>
        <!-- form -->
        <p></p>
        <br/>
        <p class="lead" align="center">
                Sign-up now to start receiving updates as we approach launch date.
        </p>
        <div align="center">
            <form id="myForm" action="employer.php" method="post" enctype="multipart/form-data">
                <input type="text" name="companyname" required placeholder="Company name here." class="input-xlarge"/><br/>
                <input type="email" name="email" required placeholder="Company email address here." class="input-xlarge"/><br/>
                <button id="sub" name="submit" class="btn btn-large btn-primary input-xlarge">Sign-Up Now!</button>
            </form>
        </div>
    <?php require_once 'bottom.php';?>
