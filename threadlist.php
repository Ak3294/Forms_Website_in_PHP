<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>iForum : Coding Discussion Website</title>
</head>

<body>

    <?php
    include("partials/_header.php");
    include("partials/_dbconnect.php");
    ?>

    <?php

    $id = $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE Catagories_id=$id";  // select catagory is from thread sql
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $cat_title = $row['Catagories_name'];
        $cat_description = $row['Catagories_discription'];
        $date = $row['date'];
    }
    ?>

    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        //Insert question form information into database.
        $thread_title = $_POST['title'];
        $thread_desc = $_POST['desc'];
        $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `date`) VALUES ('$thread_title', '$thread_desc', '$id', '1', current_timestamp())";  // select catagory is from thread sql
        $result = mysqli_query($conn, $sql);

        $showAlert = true;
    }

    if ($showAlert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congratulations!</strong> You are Posted Successfully our Problem.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }

    ?>

    <style>
    #problemform {
        border: 1px solid black;
        padding: 25px;
        border-radius: 7px;
    }
    </style>




    <!-- Category Conatiner starts here! -->
    <div class="container">
        <div class="container py-4">
            <header class="pb-3 mb-4 border-bottom">
                <img src="images/logo1.jpeg" width=130 height=80 alt="...">
                <a href="#" class="d-flex align-items-center text-dark text-decoration-none">
                    <span class="fs-4 "><strong>
                            <h3>Welcome to <?php echo $cat_title; ?> Forums</h3>
                        </strong></span>
                </a>
            </header>

            <div class="p-5 mb-4 bg-light rounded-3">
                <div class="container-fluid py-5">
                    <h3 class="display-5 fw-bold my-3"><?php echo $cat_title; ?></h3>
                    <p class="col-md-12 fs-4"><?php echo $cat_description; ?></p>
                    <p class="col-md-12 fs-4"><strong>This information Updated at <?php echo $date ?></strong></p>

                    <button class="btn btn-primary btn-lg" type="button">Learn More</button>
                </div>
            </div>
        </div>

        <?php

        if ($_SESSION['loggedin'] && $_SESSION['loggedin'] == true) {
            echo '<div class="container">
            <h1 class="py-2">Ask the Question?</h1>
            <!-- when we use REQUEST_URI then the location after ? are included in the request -->
            <form id="problemform" action="' . $_SERVER["REQUEST_URI"] . '" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1"><b>Question Title</b></label>
            <input type="text" class="form-control my-2" id="title" name="title" aria-describedby="emailHelp"
                placeholder="Put Your question Here!">

        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1"><b>Question Discription</b></label>
            <textarea class="form-control my-2" id="desc" name="desc" rows="3"
                placeholder="Eloborate Your Problem Here!"></textarea>
            <small id="emailHelp" class="form-text text-muted">Please put your question discription as crispy
                and short as possible.</small>
        </div>
        <button type="submit" class="btn btn-primary my-3">Post Message</button>
        </form>
    </div>';
        } else {
            echo '<div class="row gx-5">
            <div class="col">
             <div class="p-3 border bg-light">Currently You are not Logged in the Forum. So, Please log in and starts the discussion.</div>
            </div>';
        }
        ?>


        <div class="container mb-5" id="ques">



            <?php
            $id = $_GET['catid'];
            $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id";  // select catagory is from thread sql
            $result = mysqli_query($conn, $sql);
            $noResult = false;
            while ($row = mysqli_fetch_assoc($result)) {
                $noResult = true;
                $id = $row['thread_id'];
                $title = $row['thread_title'];
                $desc = $row['thread_desc'];
                $date = $row['date'];

                $thread_user_id = $row['thread_user_id'];

                $sql2 = "SELECT signup_name FROM `signup` WHERE SNo=$thread_user_id";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);


                echo '<div class="d-flex align-items-center my-4">
                <div class="flex-shrink-0">
                    <img src="images/python.png" width=45 height=45 alt="...">
                </div>
                <div class="flex-grow-1 ms-3">
                <p class="my-0"><b class="my-0">Posted By :' . $row2['signup_name'] . '</b></p>
                    <h5><a href="thread.php?threadid=' . $id . '">' . $title . '</a></h5>
                    ' . $desc . '
                    <p><strong>Posted at : ' . $date . '</strong></p>
                </div>
            </div>';
            }
            // echo var_dump($noResult);
            if (!$noResult) {
                echo '<div class="jumbotron jumbotron-fluid bg-light my-4">
                <div class="container">
                  <p class="display-5">No Questions Found!</p>
                  <p class="lead">You are the first person to ask the Question.</p>
                </div>
              </div>';
            }

            ?>

            <!-- <div class="d-flex align-items-center my-4">
                <div class="flex-shrink-0">
                    <img src="images/python.png" width=35 height=35 alt="...">
                </div>
                <div class="flex-grow-1 ms-3">
                    <h5>Media Title</h5>
                    This is some content from a media component. You can replace this with any content and adjust it as
                    needed.lorem This is some content from a media component. You can replace this with any content and
                    adjust it as
                    needed.
                </div>
            </div> -->



            <br>
            <br>


            <?php
            include('partials/_footer.php');

            ?>


            <!-- Optional JavaScript; choose one of the two! -->

            <!-- Option 1: Bootstrap Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
                crossorigin="anonymous">
            </script>

            <!-- Option 2: Separate Popper and Bootstrap JS -->
            <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>