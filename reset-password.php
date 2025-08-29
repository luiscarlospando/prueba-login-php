<?php include "header.php"; ?>

    <main class="main--area">

        <section class="breadcrumb-area" data-background="assets/img/bg/breadcrumb_bg01.jpg">
            <div class="container">
                <div class="breadcrumb__wrapper">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7">
                            <div class="breadcrumb__content">
                                <h2 class="title">Reset Password</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Reset Password</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-5 position-relative d-none d-lg-block">
                            <div class="breadcrumb__img">
                                <img src="assets/img/others/breadcrumb_img02.png" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="signup__area team-bg section-pt-120 section-pb-120" data-background="assets/img/bg/team_bg.jpg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="singUp-wrap">
                            <h2 class="title">Forgot Password!</h2>
                            <p>Enter your email address to request password reset.</p>
                            <form action="#" class="account__form">
                                <div class="form-grp">
                                    <label for="email">Email</label>
                                    <input id="email" type="text" placeholder="Enter your email">
                                </div>
                                <button type="submit" class="btn mt-15 btn-two arrow-btn">Send mail</button>
                            </form>
                            <div class="account__switch">
                                <p>Remember Password?<a href="login.php">Login</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php include "footer.php"; ?>
