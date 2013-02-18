<!DOCTYPE html>
<html lang="en">
    <body>
        <pre>
            <form id="myForm" action="employee.php" method="post" enctype="multipart/form-data"> 
                <label for="firstname">Firstname :</label>
                <input type="text" name="firstname" required/>
                <label for="lastname">Lastname :</label>
                <input type="text" name="lastname" required/>
                <label for="email">Email :</label>
                <input type="email" name="email" required/>
                <label for="cv">Resume :</label>
                <input type="file" name="cv" size="25"/>
                <button id="sub" name="submit">Go.</button>
            </form>
            <span id="result"></span>
        <pre>
        <script src="jquery1.8.3.js" type="text/javascript"></script>
        <script src="demo.js" type="text/javascript"></script>
    </body>
</html>
