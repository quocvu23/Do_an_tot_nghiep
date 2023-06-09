<!DOCTYPE html>
<html lang="en">

<head>
    @include('ChuShop.head')
</head>

<body>
    <main>
        <div style="background-image: url('/template/ChuShop/assets/img/background.jpg')">
            <!-- Section -->
            <section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">

                <div class="container">


                    <div class="d-flex align-items-center justify-content-center">
                        <div class=" p-4 p-lg-5 w-100 fmxw-500"
                            style="background-color: rgb(252, 253, 255); box-shadow: rgba(0, 0, 0, 0.19) 0px 20px 30px, rgba(0, 0, 0, 0.23) 0px 6px 6px;border-radius: 15px">
                            <div class="text-center text-md-center mb-4 mt-md-0">
                                <h1 class="mb-0 h3">ĐĂNG NHẬP</h1>
                            </div>
                            @include('admin.alert')
                            <form action="login_action" class="mt-4" method="POST">
                                <!-- Form -->
                                <div class="form-group mb-4">
                                    <label for="email">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">
                                            <svg class="icon icon-xs text-gray-600" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                                </path>
                                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z">
                                                </path>
                                            </svg>
                                        </span>
                                        <input type="email" class="form-control" placeholder="Nhập email "
                                            id="email" name="email" autofocus>

                                    </div>
                                </div>
                                <!-- End of Form -->
                                <div class="form-group">
                                    <!-- Form -->
                                    <div class="form-group mb-4">
                                        <label for="password">Mật Khẩu</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon2">
                                                <svg class="icon icon-xs text-gray-600" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </span>

                                            <input type="password" placeholder="Nhập mật khẩu" class="form-control"
                                                id="password" name="password">
                                            <span class="fw-normal mt-4" style="margin-left: 250px">

                                                <a href="/forgot_password" class="fw-bold">Quên mật khẩu?</a>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- End of Form -->

                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-gray-800">ĐĂNG NHẬP</button>
                                </div>
                                @csrf
                            </form>

                            <div class="d-flex justify-content-center mt-4">
                                <span class="fw-normal">

                                    Bạn chưa có tài khoản ? <br />
                                </span>
                            </div>
                            <div style="margin-top: 20px">
                                <a href="/register" class="fw-bold " style="color: blue">Đăng ký thành viên</a>
                                <a href="/register_seller" class="fw-bold " style="margin-left: 100px;color: brown">Đăng
                                    ký chủ
                                    Shop</a>
                            </div>

                        </div>
                    </div>
                </div>
        </div>
        </section>
    </main>




</body>

</html>
