<?php
include_once 'config.php';
session_start();
error_reporting(0);

if (isset($_SESSION["user_id"])) {
  header("Location: welcome.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amrita Vishwa Vidyapeetham</title>
    <link rel="stylesheet" href="homestyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/ea356287ed.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap"
        rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>



<body>
    <nav id="navbar">
        <div class="image">
            <a href="./index.html"><img src="img/image.png" alt="University Logo"></a>
            
        </div>
        <div id="container">
            <ul>
                <li><a href="/index.php">Home</a></li>
                <li><a href="https://amrita.edu/">Campus</a></li>
                <li><a href="https://amrita.edu/academics/">Academics</a></li>
                <li><a href="https://amrita.edu/research/">Research</a></li>
                <li><a href="./login_page.php">Login</a></li>
            </ul>
        </div>
    </nav>

    <section id="text">

    </section>

    <section class="campus">
<br><br>
<img src="img/para2.jpg" alt="Campus Image">
<img src="img/vision.jpg" alt="Campus Image">
<img src="img/mission1.jpg" alt="Campus Image">
<img src="img/mission2.jpg" alt="Campus Image"><br><br>
            <h1>Our Campuses</h1>

        <div class="row">
            <div class="campus-col">
                <img src="img/0.jpeg" alt="Campus Image">
                <div class="layer">
                    <h3>Amritapuri</h3>
                </div>
            </div>
            <div class="campus-col">
                <img src="img/1.jpeg" alt="Campus Image">
                <div class="layer">
                    <h3>Bengaluru</h3>
                </div>
            </div>
            <div class="campus-col">
                <img src="img/2.jpeg" alt="Campus Image">
                <div class="layer">
                    <h3>Chennai</h3>
                </div>
            </div>
            <div class="campus-col">
                <img src="img/3.jpeg" alt="Campus Image">
                <div class="layer">
                    <h3>Coimbatore</h3>
                </div>
            </div>
            <div class="campus-col">
                <img src="img/4.jpeg" alt="Campus Image">
                <div class="layer">
                    <h3>Kochi</h3>
                </div>
            </div>
            <div class="campus-col">
                <img src="img/5.jpeg" alt="Campus Image">
                <div class="layer">
                    <h3>Mysuru</h3>
                </div>
            </div>

        </div>
    </section>

    <section class="facilities">
        <h1>Campus infrastructure</h1>
        <p>The 400 acre campus is well planned with infrastructure like academic buildings, adminstration wing, central library, hostels, guest house, staff-quarters, shopping complex, swimming pool and play grounds.  The campus has built-up area of over 28 lakhs sq. feet linked by 7 km black topped roads. Eight hostels accomodated 5000 students. A swimming pool meeting Olympic standards is utlized by students, staff and others in the campus. Two power houses are installed with total generating capacity of 1660KVA to meet the shortage in power supply. Amrita also provides uninterrupted power and water supply round the clock.</p>

        <div class="row">
            <div class="facilities-col">
                <img src="img/library.jpg" alt="Library image">
                <h3>World Class Library</h3>
                <p>Amrita Vishwa Vidyapeetham Central Library is a valuable partner in user’s pursuit towards excellence in learning and research. Our value lies in the valuable information resources, services and facilities that we provide to all users. The Central library has a carpet area of 81,000 sq feet. The library has been automated by the Libsys software. We have the open access system. We have a wide range of library materials that cater to various learning resources of 58103 books, 377 Periodicals, 3000+ online e-resources like e-journals, e-books, conference proceedings, e-databases and standards, 2650 Project reports, 7086 back-volumes, 4781 CD/DVDs resources and 14 Daily News Papers.</p>
            </div>
            <div class="facilities-col">
                <img src="img/comp.jpg" alt="Play ground image">
                <h3>High tech computing facilities</h3>
                <p>The Information and Communication Technology Services (ICTS) Department is responsible for identifying, providing and maintaining reliable computing facilities, computing network environment, communication facilities and related infrastructure to facilitate education, research, instructional and Institute approved business services.

                    The department administers all computer laboratories in the campus. The facilities are made available to the staff and students from 7.00 AM to 10.30 PM on all days excluding national holidays. The laboratories extend all facilities required by students to fulfill their requirements for academic purposes.</p>
            </div>
            <div class="facilities-col">
                <img src="img/pool.jpg" alt="Cafeteria image">
                <h3>Swimming Pool</h3>
                <p>Amrita Swimming Pool is of Olympic Standard with 50m X 25m in Size and contains 2.4 million littres of water and a Toddlers Pool is to accommodate babies and for the professionals to have Warm-Up.

                    We have the State-of art machinery that can purify 2.4 million litres of water with in six hours. It is one of the few international standard swimming pools where the State, National and International Swimming Competitions can be conducted.</p>
            </div>
        </div>
    </section>

    <section class="footer">
        <img src="img/para3.jpg" alt="Campus Image">
        <h4>About Us</h4>
        <p style="font: size 50px;">Amrita University is a multi-disciplinary, research-intensive, private university, educating a vibrant student population of over 24,000 by 1700+ strong faculty. Accredited with the highest possible ‘A++’ grade by NAAC, Amrita offers more than 250 UG, PG, and Ph.D. programs in Engineering, Management, and Medical Sciences including Ayurveda, Life Sciences, Physical Sciences, Agriculture Sciences, Arts & Humanities, and Social & Behavioral Sciences.

            With seven campuses at Amaravati, Amritapuri, Bengaluru, Chennai, Coimbatore, Kochi, and Mysuru and a new upcoming campus at NCR Delhi (Faridabad) and spread over 1200+ acres with 100 lacs square feet of built-up space, Amrita is one of India’s top-ranked private university.</p>
            <p>Amrita has emerged as the fifth best university in the National Institutional Ranking Framework (NIRF) Rankings 2021. Amrita School of Medicine, Kochi has been ranked 6th Best in Medicine in NIRF Rankings 2021.

                In THE University Impact Rankings 2022, a pioneering initiative to recognise universities around the world for their social and economic impact for sustainable future, Amrita has been ranked among the Top 50 in the world.
                
                In a short span of 18 years, we have established 180+ collaborations with Top 500 world-ranked universities as Amrita is emerging as one of the fastest-growing institutions of higher learning in India
                
                World-renowned humanitarian leader, Sri Mata Amritanandamayi Devi, AMMA, is the founding Chancellor and guiding light of Amrita University.</p>
       <br><br><br>
       <img src="img/para1.jpg" alt="Campus Image"><br><br>
        <div class="icons">
            <a href="https://www.facebook.com/AmritaUniversity" target="_blank"><i class="fa-brands fa-facebook-square fa-5x"></i></a>
            <a href="https://twitter.com/AMRITAedu"target=_blank><i class="fa-brands fa-twitter-square fa-5x"></i></a>
            <a href="https://www.youtube.com/user/AmritaUniversity"target=_blank><i class="fa-brands fa-youtube fa-5x"></i></a>
            <a href="https://www.linkedin.com/school/amrita-vishwa-vidyapeetham-official/"target=_blank><i class="fa-brands fa-linkedin-in fa-5x"></i></a>
        </div>
    </section>
</body>

</html>