<!-- Inner Banner -->
<div class="inner-banner inner-bg4">
    <div class="container">
        <div class="inner-title text-center">
            <h3>Sign In</h3>
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <i class='bx bxs-chevrons-right'></i>
                </li>
                <li>Sign In</li>
            </ul>
        </div>
    </div>
</div>
<!-- Inner Banner End -->

<!-- Start Sign In Area -->
<section class="sign-in-area ptb-100">
    <div class="container">
        <div class="section-title text-center">
            <span>Sign In</span>
            <h2>Sign In to your account!</h2>
        </div>
        <div class="contact-wrap-form log-in-width">
            <form id="login-form" action="<?=base_url('/home/aksi_login')?>" method="post">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <input class="form-control" type="text" name="name" placeholder="Username or Email" required>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
    	                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <!-- Soal captcha -->
                    <div class="col-12">
                        <div class="form-group">
                        <label id="math-captcha-label" style="display:none; font-weight: bold;"></label>
                        <input type="number" id="math-captcha" class="form-control" name="math_captcha" placeholder="Answer the question above" style="display:none;">
                        <input type="hidden" id="math-result" name="math_result" value="">
                        </div>
                        </div>
                    <div class="g-recaptcha" data-sitekey="6LeF9ugqAAAAAJ5jpTL4PtZcO3TSHymtLsYqj2wK">
                    </div>
                    <div class="col-lg-6 col-sm-6 form-condition">
                        <div class="agree-label">
                            <input type="checkbox" id="chb1" name="remember">
                                <label for="chb1">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <a class="forget" href="<?=base_url('home/resetpw')?>">Forgot my password?</a>
                    </div>

                    <div class="col-12 text-center">
                        <button class="default-btn btn-two" type="button" onclick="validateCaptcha()">
                            Sign In Now
                        </button>
                    </div>

                    <div class="col-12">
                        <p class="account-desc">
                            Not a member?
                            <a href="<?=base_url('home/register')?>">Sign Up</a>
                        </p>
                    </div>

                </div>
            </form>
        </div>
    </div>
</section>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script>
    let num1, num2;

    function generateCaptcha() {
        num1 = Math.floor(Math.random() * 10) + 1;
        num2 = Math.floor(Math.random() * 10) + 1;
        document.getElementById('math-captcha-label').innerText = `${num1} + ${num2} = ?`;
        document.getElementById('math-result').value = num1 + num2;
    }

    function validateCaptcha() {
        if (!navigator.onLine) {
            // Offline user, validate math captcha
            const userAnswer = parseInt(document.getElementById('math-captcha').value);
            const correctAnswer = parseInt(document.getElementById('math-result').value);

            if (userAnswer !== correctAnswer) {
                alert("Math CAPTCHA answer is incorrect.");
            } else {
                document.getElementById('login-form').submit();
            }
        } else {
            // Online user, validate Google reCAPTCHA
            var response = grecaptcha.getResponse();
            if (response.length === 0) {
                alert("Please complete the Google CAPTCHA.");
            } else {
                document.getElementById('login-form').submit();
            }
        }
    }

    window.onload = function() {
        if (!navigator.onLine) {
            // Show math captcha
            generateCaptcha();
            document.getElementById('math-captcha-label').style.display = 'block';
            document.getElementById('math-captcha').style.display = 'block';
        } else {
            // Hide math captcha when online
            document.getElementById('math-captcha-label').style.display = 'none';
            document.getElementById('math-captcha').style.display = 'none';
        }
    }
</script>

<!-- End Sign In Area -->
