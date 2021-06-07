<!-- Modal -->
<div class="modal fade" id="LoginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="logincode.php" method="POST">
                <div class="modal-body">

                    <div class="form-group mb-3">

                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>


                    <div class="form-group mb-3">

                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
                </div>

            </form>
        </div>
    </div>
</div>




<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">What do people think about this ?</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/Travel Blog/blog-php-mysql/index.php">Home</a>
                </li>
                <li class="nav-item">


                    <?php
                    if (!isset($_SESSION['auth_user_id'])) { ?>
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#LoginModal">Login</a>
                    <?php } else { ?>
                        <a class="nav-link" href="logout.php">Logout</a>
                    <?php } ?>





                    
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://www.facebook.com/lamsteven123/"> <?php
                                                    if (isset($_SESSION['authuser_name'])) {
                                                        echo $_SESSION['authuser_name'];
                                                    }
                                                    ?></a>
                </li>
            </ul>
        </div>
    </div>
</nav>