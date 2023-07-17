<!-- 
<footer class="footer>

 <div class=" b-example-divider my-5">
    </div>

    <div class="bg-dark text-secondary text-center">
        <div class="py-5">
            <h1 class="display-5 fw-bold text-white">iForum - Rules & Regulations</h1>
            <div class="col-lg-10 mx-auto ">
                <p class="fs-7 mb-6 text-white">
                    No Spam / Advertising / Self-promote in the forums.<br>
                    Do not post copyright-infringing material.<br>
                    Do not post “offensive” posts, links or images.<br>
                    Do not cross post questions.<br>
                    Do not PM users asking for help.<br>
                    Remain respectful of other members at all times.<br>
                </p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <button type="button"
                        class="btn btn-outline-info btn-lg px-4 me-sm-3 fw-bold text-underline-none"><a
                            href="images/ForumRulesPolicies.pdf">Primary</a></button>
                    <button type="button" class="btn btn-outline-light btn-lg px-4 fw-bold"><a
                            href="images/policy2.jpg">Secondary</a></button>
                </div>
            </div>
        </div>
    </div>
    </div>
</footer>

<style>
.footer {
    margin-left: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
    box-sizing: border-box;
    width: 100%;

}
</style> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Footer Design</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="ForumsWebsite/style.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            line-height: 1.5;
            font-family: 'Poppins', sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            max-width: 1170px;
            margin: auto;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        ul {
            list-style: none;
        }

        .footer {
            background-color: #24262b;
            padding: 70px 0;
            display: flex;
        }

        .footer-col {
            width: 25%;
            padding: 0 15px;
        }

        .footer-col h4 {
            font-size: 18px;
            color: #ffffff;
            text-transform: capitalize;
            margin-bottom: 35px;
            font-weight: 500;
            position: relative;
        }

        .footer-col h4::before {
            content: '';
            position: absolute;
            left: 0;
            bottom: -10px;
            background-color: #e91e63;
            height: 2px;
            box-sizing: border-box;
            width: 50px;
        }

        .footer-col ul li:not(:last-child) {
            margin-bottom: 10px;
        }

        .footer-col ul li a {
            font-size: 16px;
            text-transform: capitalize;
            color: #ffffff;
            text-decoration: none;
            font-weight: 300;
            color: #bbbbbb;
            display: block;
            transition: all 0.3s ease;
        }

        .footer-col ul li a:hover {
            color: #ffffff;
            padding-left: 8px;
        }

        .footer-col .social-links a {
            display: inline-block;
            height: 40px;
            width: 40px;
            background-color: rgba(255, 255, 255, 0.2);
            margin: 0 10px 10px 0;
            text-align: center;
            line-height: 40px;
            border-radius: 50%;
            color: #ffffff;
            transition: all 0.5s ease;
        }

        .footer-col .social-links a:hover {
            color: #24262b;
            background-color: #ffffff;
        }

        /*responsive*/
        @media(max-width: 767px) {
            .footer-col {
                width: 50%;
                margin-bottom: 30px;
            }
        }

        @media(max-width: 574px) {
            .footer-col {
                width: 100%;
            }
        }
    </style>

</head>

<body>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>Features</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Process</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Categories</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Help</h4>
                    <ul>
                        <li><a href="#">Guidelines</a></li>
                        <li><a href="#">Advantages</a></li>
                        <li><a href="#">Features</a></li>
                        <li><a href="#">order status</a></li>
                        <li><a href="#">payment options</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>online shop</h4>
                    <ul>
                        <li><a href="#">watch</a></li>
                        <li><a href="#">bag</a></li>
                        <li><a href="#">shoes</a></li>
                        <li><a href="#">dress</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>follow us</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>