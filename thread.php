<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- font-awsome cdn -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>iForum : Coding Discussion Website</title>
</head>

<body>

    <?php
    include("partials/_header.php");
    include("partials/_dbconnect.php");
    ?>
    <!-- This process ends here -->


    <?php
    //In which threadid and thread_id both are different.
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id=$id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
        $thread_user_id = $row['thread_user_id'];
        $thread_date = $row['date'];
    }
    ?>

    <?php
    //This php code for comment database operation performation. 


    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        //Insert question form Comments into database.
        $comment_content = $_POST['commentdesc'];
        $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment_content', '$id', '0', current_timestamp());";
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

    <!-- Category Conatiner starts here! -->
    <div class="p-5 mb-4 bg-warning">
        <div class="container-fluid py-4 mx-5">
            <h3 class="display-5 fw-bold my-3">
                <?php echo $title; ?>
            </h3>
            <p class="col-md-12 fs-4">
                <?php echo $desc; ?>
            </p>
            <hr>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga nostrum excepturi officiis id quisquam odit
                dignissimos non facilis incidunt, nisi nesciunt. Ad, reprehenderit nihil? Debitis quisquam esse animi,
                sunt iste magni enim maxime blanditiis perferendis hic rerum veniam amet illo vitae similique, nesciunt
                voluptas sapiente vero magnam. Quas dolores, iusto tenetur odit, eligendi distinctio ea, eveniet
                voluptatibus soluta alias placeat?
            </p>

            <p class="col-md-12 fs-5"><strong>This Post Updated at
                    <?php echo $thread_date ?>
                </strong></p>
            <p><b>Posted By : Akshay Kumar Hiran </b></p>
            <button class="btn btn-primary btn-lg" type="button">Learn More</button>
        </div>
    </div>
    <!-- </div> -->


    <style>
        /* thread,php style code */
        #commentform {
            border: 1px solid black;
            padding: 25px;
            border-radius: 7px;
        }

        .bg-warning {
            margin-top: -16px;
        }

        #commentans {
            margin-left: 110px;
        }
    </style>

    <?php
    if ($_SESSION['loggedin'] && $_SESSION['loggedin'] == true) {

        echo ' <div class="container">
        <h1 class="py-2">Disscussions/Comments</h1>
        <form id="commentform" action="' . $_SERVER["REQUEST_URI"] . '" method="POST">
    <div class="form-group">
        <label for="exampleFormControlTextarea1"><b>Comment Discription</b></label>
        <textarea class="form-control my-2" id="commentdesc" name="commentdesc" rows="3"
            placeholder="Put Your Comments Here!"></textarea>
        <small id="emailHelp" class="form-text text-muted">Please put your comments as crispy
            and short as possible.</small>
            <input type="hidden" name="SNo" value="' . $_SESSION["SNO"] . '">
    </div>
    <button type="submit" class="btn btn-primary my-3">Post Comment</button>
    </form>
</div>';
    } else {
        echo '<div class="row gx-5">
        <div class="col mx-5">
         <div class="p-3 border bg-light">Currently You are not Logged in the Forum. So, Please log in and starts the discussion.</div>
        </div>';
    }
    ?>

    <?php

    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `comments` WHERE thread_id=$id";
    $result = mysqli_query($conn, $sql);
    $noResult = true;
    while ($row = mysqli_fetch_assoc($result)) {
        $noResult = false;
        $id = $row['comment_id'];
        $content = $row['comment_content'];
        $date = $row['comment_time'];

        $comment_by = $row['comment_by'];

        $sql2 = "SELECT signup_name FROM `signup` WHERE SNo=$comment_by";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);


        echo '<div id="commentans" class="d-flex align-items-center my-4">
                <img src="images/python.png" width=45 height=45 alt="...">

               <div class="flex-grow-1 ms-4">
               <p class="my-0"><b class="my-0">Comment By : ' . $row2['signup_name'] . '</b></p>
                ' . $content . '
               <p><i>Posted at : ' . $date . '</i></p>
               </div>
              </div>';
    }
    if ($noResult) {
        echo '<div class="jumbotron jumbotron-fluid bg-light my-4">
        <div class="container">
            <p class="display-5">No Comments Found!</p>
            <p class="lead">You are the first person to write the comment of this problem.</p>
        </div>
        </div>';
    }
    ?>
    <br>
    <br>

    <?php
    include('partials/_footer.php');

    ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>