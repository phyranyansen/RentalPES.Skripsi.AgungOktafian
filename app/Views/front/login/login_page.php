<section id="center" class="center_login">
    <div class="center_om clearfix">
        <div class="container-sm">
            <div class="row center_o1">
                <div class="col-md-12" style="height: 5px;">
                    <h2 class="text-white">Login</h2>
                    <h6 class="mb-0 mt-3 fw-normal col_oran"><a class="text-light" href="#">Home</a> <span
                            class="mx-2 col_light">/</span> Login</h6>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="login" class="p_3 bg-light">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <!-- <div class="card bg_light"> -->
                <form action="javascript:void(0);" id="loginForm">
                    <div class="login_1 p-4 m-auto">
                        <h3 class="col_oran">Login</h3>
                        <p>Silahkan Login terlebih dahulu!</p>
                        <h6 class="mt-4">Email Address</h6>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Your Email"
                            required>
                        <h6 class="mt-4">Password</h6>
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Your Password" required>
                        <div class="d-flex justify-content-between mt-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="remember">
                                <label class="form-check-label" for="remember">
                                    Remember Me
                                </label>
                            </div>
                            <a class="col_oran" href="#">Forgot Password?</a>
                        </div>
                        <h6 class="mt-4 mb-0">
                            <button type="submit" class="button">Login <i class="fa fa-sign-in ms-1"></i></button>
                        </h6>
                        <p class="mt-4 mb-0">Don't have an account? <a class="col_oran" href="login">Register</a>
                        </p>
                </form>
                <!-- </div> -->

            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    <br>
    <br>
</section>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-md5/2.5.0/js/md5.min.js"></script>
<script>
$(document).ready(function() {
    $('#loginForm').submit(function(e) {
        //header form
        var username = $('#username').val();
        var password = $('#password').val();
        $.ajax({
            url: "login-user",
            type: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            success: function(data) {
                var msg = JSON.parse(data);
                if (msg.statusCode == 200) {
                    Swal.fire('Success!', msg.pesan, 'success');

                    timer_reload(msg.level);
                } else {
                    Swal.fire('Oops,', msg.pesan, 'error');

                }
            },
            error: function(data) {
                Swal.fire('Oops,', 'Sign-in gagal!', 'error');
            }
        });

        e.preventDefault();
    });
});

function timer_reload(level) {
    setTimeout(function() {
        if (level == 'Administrator') {

            window.location.href = "dashboard";
        } else {
            window.location.href = "";

        }
    }, 1400);
}
</script>