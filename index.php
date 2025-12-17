<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel = "stylesheet" type ="text/css" href="css/style.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<!--<h1>This is school management system!</h1>-->
    <nav>
        <label class="logo">W-School</label>
        <ul>
            <li><a href ="php/home.php">Home</a></li>
            <li><a href ="php/contact.php">Contact</a></li>
            <li><a href ="php/admission.php">Admission</a></li>
            <li><a href ="php/login.php" class="btn btn-success">Login</a></li>
        </ul>
    </nav>
    <div class="section1">

        <label class="img_text">We Teach Students With Care</label>
        <img class="main_img" src="images/school.png">

    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">

                <img class="welcome_img" src ="images/playground.jpg">

            </div> 
            <div class="col-md-8">

                <h1>Welcome to W-School</h1>
                <p>MEMS has been committed to global learning long before it became an indispensable feature of contemporary education. Established in 1997, we proudly stand as the 1st English medium school in Bangladesh to adopt both Pearson Edexcel and Cambridge curriculum (in O and A levels), drawing together students in a vibrant, academically challenging, and encouraging environment where manifold viewpoints are prized and celebrated.MEMS has been committed to global learning long before it became an indispensable feature of contemporary education. Established in 1997, we proudly stand as the 1st English medium school in Bangladesh to adopt both Pearson Edexcel and Cambridge curriculum (in O and A levels), drawing together students in a vibrant, academically challenging, and encouraging environment where manifold viewpoints are prized and celebrated.</p>
            
            </div>
        </div>
    </div>

    <center>
        <h1 class="adm">Our Teachers</h1>
    </center>

    <div class ="container">
        <div class="row">
            <div class="col-md-4" style="text-align: center;">
                <img class="teacher" src="images/teacher1.png">
                <p>in a vibrant, academically challenging, and encouraging environment where manifold viewpoints are prized and celebrated.</p>
            </div>
            <div class="col-md-4" style="text-align: center;">
                <img class="teacher" src="images/teacher2.png">
                <p>in a vibrant, academically challenging, and encouraging environment where manifold viewpoints are prized and celebrated.</p>
            </div>
            <div class="col-md-4" style="text-align: center;">
                <img class="teacher" src="images/teacher3.png">
                <p>in a vibrant, academically challenging, and encouraging environment where manifold viewpoints are prized and celebrated.</p>
            </div>
        </div>
    </div>

    <center>
        <h1 class="adm">Our Courses</h1>
    </center>

    <div class ="container">
        <div class="row">
            <div class="col-md-4" style="text-align: center;">
                <img class="teacher" src="images/digital_marketing.png">
                <h3>Digital Marketing</h3>
            </div>
            <div class="col-md-4" style="text-align: center;">
                <img class="teacher" src="images/graphic_design.png">
                <h3>Graphic Design</h3>
            </div>
            <div class="col-md-4" style="text-align: center;">
                <img class="teacher" src="images/web_development.png">
                <h3>Web Development</h3>
            </div>
        </div>
    </div>

    <center>
        <h1 class="adm">Admission Form</h1>
    </center>

    <div align="center" class="admission_form">
        <form action="php/data_check.php" method="POST">
            <div class="adm_int">
                <label class="label_text">Name</label>
                <input class="input_deg" type="text" name="name">
            </div>
            <div class="adm_int">
                <label class="label_text">Email</label>
                <input class="input_deg" type="text" name="email">
            </div>
            <div class="adm_int">
                <label class="label_text">Phone</label>
                <input class="input_deg" type="text" name="phone">
            </div>
            <div class="adm_int">
                <label class="label_text">Message</label>
                <textarea class="input_txt" name="message"></textarea>
            </div>
            <div class="adm_int">
                <input class="btn btn-primary" id="submit" type="submit" value="Apply">
            </div>
        </form>
    </div>

    <div class="footer_dvd"></div>

    <footer>
        <h3 class="footer_txt">All @copyright reserved by W-School</h3>
    </footer>

</body>
</html>