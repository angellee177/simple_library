    <nav class="navbar navbar-expand-lg navbar-light static-top mg-b-30">
        <div class="container">
            <a href="#" class="navbar-brand">
                <img src="../../Assets/img/logo.png" class="wd-100p ht-50" alt="">
            </a>
            <h2 style="font-family: courier" class="mg-t-10">Trove Library</h2>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="../landing/index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Article</a>
                    </li>
                    <li class="nav-item">
                        <a href="../landing/about_us.php" class="nav-link">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="../landing/contact_us.php" class="nav-link">Contact Us</a>
                    </li>
                <?php if(isset($_SESSION['role'])) : ?>
                    <li class="nav-item">
                        <a href="../auth/login.php" class="nav-link">
                            <p class="tx-bold mg-b-0 tx-danger">
                                <?php 
                                    echo $_SESSION['name'];
                                    ?>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../../Model/Auth/LogOutController.php" class="nav-link">Log Out</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a href="../auth/login.php" class="nav-link">
                            <p class="tx-bold mg-b-0 tx-danger">Sign In</p>
                        </a>
                    </li>
                <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>