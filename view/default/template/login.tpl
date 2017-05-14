<section class="filter-page">
    <div class="container">
        <div class="row">
            <div class="login-register-page__content login_page">
                <div class="content-title" style="text-align: center"><span>{name}</span>
                </div>
                <form action="" method="post">
                    <div class="form-item"><label>Email hoặc Username</label>
                        <input type="text" required name="email_username">
                    </div>
                    <div class="form-item">
                        <label>Password</label>
                        <input type="password" required name="password">
                    </div>
                    <a href="javascript:void(0)" id="forgot_url" class="forgot-password">Quên mật khẩu</a>
                    <div class="form-actions">
                        <input type="submit" value="Đăng nhập">
                    </div>
                </form>
            </div>
            <div hidden class="login-register-page__content forgot_page">
                <div class="content-title" style="text-align: center"><span>Đổi mật khẩu</span>
                </div>
                <form action="" method="post">
                    <div class="form-item"><label>Email</label>
                        <input type="email" required name="email_forgot">
                    </div>
                    <div class="form-item"><label>Mật khẩu</label>
                        <input type="password" required name="password_forgot">
                    </div>
                    <div class="form-item"><label>Xác nhận mật khẩu</label>
                        <input type="password" required name="password_confirm">
                    </div>
                    <a href="javascript:void(0)" id="login_url" class="forgot-password">Đăng nhập</a>
                    <div class="form-actions">
                        <input type="submit" value="Cập nhật">
                    </div>
                </form>
            </div>
