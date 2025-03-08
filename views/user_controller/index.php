<div class="main-register-wrap modal">
    <div class="reg-overlay"></div>
    <div class="main-register-holder tabs-act">
        <div class="main-register fl-wrap  modal_main">
            <div class="main-register_title"></div>
            <div class="close-reg"><i class="fal fa-times"></i></div>
            <ul class="tabs-menu fl-wrap no-list-style">
                <li class="current"><a href="#tab-1"><i class="fal fa-sign-in-alt"></i> وارد شدن</a></li>
                <li><a href="#tab-2"><i class="fal fa-user-plus"></i> ثبت نام</a></li>
            </ul>
            <!--tabs -->
            <div class="tabs-container">
                <div class="tab">
                    <!--tab -->
                    <div id="tab-1" class="tab-content first-tab">
                        <div class="custom-form">
                            <form method="post" name="registerform">
                                <span id="errorLogin" class="error"></span>
                                <label>آدرس ایمیل <span>*</span> </label>
                                <input id="email" type="email" onclick="this.select()" value="">
                                <label>کلمه عبور <span>*</span> </label>
                                <input id="password" type="password" onclick="this.select()" value="">
                                <a onclick="login();" class="btn float-btn color2-bg" style="cursor: pointer">
                                    ورود به سایت
                                    <i class="fas fa-caret-left"></i>
                                </a>
                                <div class="clearfix"></div>
                                <div class="filter-tags">
                                    <!--                                    <input id="check-a3" type="checkbox" name="check">-->
                                    <!--                                    <label for="check-a3">مرا به خاطر بسپار</label>-->
                                </div>
                            </form>
                            <div class="lost_password">
                                <!--                                <a href="#">رمزعبور خود را گم کردید؟</a>-->
                            </div>
                        </div>
                    </div>
                    <!--tab end -->
                    <!--tab -->
                    <div class="tab">
                        <div id="tab-2" class="tab-content">
                            <div class="custom-form">
                                <form method="post" name="registerform" class="main-register-form"
                                      id="main-register-form2">
                                    <span id="errorRegister" class="error"></span>
                                    <label>نام و نام خانوادگی <span>*</span> </label>
                                    <input id="nameR" type="text" onclick="this.select()">
                                    <label>موبایل</label>
                                    <input id="phoneR" type="text" onclick="this.select()">
                                    <label>آدرس ایمیل <span>*</span></label>
                                    <input id="emailR" type="email" onclick="this.select()">
                                    <label>کلمه عبور <span>*</span></label>
                                    <input id="passwordR" type="password" onclick="this.select()">
                                    <label> تکرار کلمه عبور
                                        <span>*</span></label>
                                    <input id="confirmPasswordRٌ" type="password" onclick="this.select()">

                                    <div class="clearfix"></div>


                                    <a onclick="register();" class="btn float-btn color2-bg" style="cursor: pointer">
                                        ثبت نام <i class="fas fa-caret-left"></i></a>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--tab end -->
                </div>
                <!--tabs end -->
                <div class="log-separator fl-wrap"><span>...</span></div>
                <div class="soc-log fl-wrap">
                    <p>برای ورود سریع یا ثبت نام از حساب کابری خود استفاده کنید.</p>
                    <!--                    <a href="#" class="facebook-log">ورود</a>-->
                    <br><br><br>
                </div>
                <div class="wave-bg">
                    <div class='wave -one'></div>
                    <div class='wave -two'></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function login() {
        var email = $('#email').val();
        var password = $('#password').val();
        // alert(password);

        var url = 'user_controller/checkuserlogin/';
        var data = {'email': email, 'password': password};
        $.post(url, data, function (msg) {
            // alert(password);

            console.log(msg);
            if (msg == 1) {
                window.location.assign('profile');

            } else if (msg == 0) {
                $('#errorLogin').html('لطفا مشخصات را درست وارد کنید');
            } else if (msg == -1) {
                $('#errorLogin').html('ایمیل و پسورد باید بیشتر از ۸ و کمتر از ۳۲ کارکتر باشد');
            } else if (msg == -2) {
                $('#errorLogin').html('ایمیل یا پسورد به اشتباه وارد شده');
            }
        }, 'json');
    }


    function register() {

        var name = $('#nameR').val();
        var email = $('#emailR').val();
        var password = $('#passwordR').val();
        var confirmPassword = $('#confirmPasswordRٌ').val();
        var phone = $('#phoneR').val();
        // // alert(password);

        var url = 'user_controller/newuser/';
        var data = {'name': name, 'email': email, 'password': password,'confirmPassword':confirmPassword,'phone':phone};
        // console.log(data);
        // alert(phone);
        $.post(url, data, function (msg) {
            // alert();

            console.log(msg);
            if (msg == 1) {
                window.location.assign('profile');

            } else if (msg == 0) {
                $('#errorRegister').html('لطفا مشخصات را درست وارد کنید');
            } else if (msg == -1) {
                $('#errorRegister').html('ایمیل و پسورد باید بیشتر از ۸ و کمتر از ۳۲ کارکتر باشد');
            } else if (msg == -2) {
                $('#errorRegister').html('از این ایمیل قبلا استفاده شده');
            }else if (msg == -3) {
                $('#errorLogin').html('تکرار رمز عبور صحیح نمی باشد');
            }
        }, 'json');
    }

</script>