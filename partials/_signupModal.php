<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel"><strong>Sign-Up iForum Account</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form class="row g-3" action="/ForumsWebsite/partials/_handlesignup.php" method="POST">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Name(Full)</label>
                        <input required type="text" class="form-control" aria-label="name" name="signupname" id="signupname">
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input required type="email" class="form-control" aria-label="email" name="signupemail" id="signupemail">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input required type="password" class="form-control" id="signuppassword" name="signuppassword">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Confirm Password</label>
                        <input required type="password" class="form-control" name="signupconpassword" id="signupconpassword">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">City</label>
                        <input required type="text" class="form-control" id="signupcity" name="signupcity">
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">State</label>
                        <select id="inputState" class="form-select" name="signupstate">
                            <option selected>Choose...</option>
                            <option>Rajasthan</option>
                            <option>Bihar</option>
                            <option>Madhyapradesh</option>
                            <option>Karnataka</option>
                            <option>Maharastra</option>
                            <option>Tamilnadu</option>
                            <option>Goa</option>
                            <option>Panjab</option>
                            <option>UttarPradesh</option>
                            <option>Gujarat</option>
                            <option>Hariyana</option>
                            <option>Delhi</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="inputZip" class="form-label">Pin</label>
                        <input required type="text" class="form-control" id="signuppin" name="signuppin">
                    </div>

                    <div class="container">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="signupRadio" id="signupinlineRadio1" value="Male">
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="signupRadio" id="signupinlineRadio2" value="Female">
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="signupRadio" id="signupRadio3" value="Others">
                            <label class="form-check-label" for="inlineRadio3">Others</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-check">
                            <input required class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Check me out
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Sign-Up</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>