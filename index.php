<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HINADA</title>
    <link rel="shortcut icon" type="image/png" href="assets/images/icons/soccer-player.ico" />
    <link rel="stylesheet" href="assets/fonts/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="assets/css/main/style.css">
    <link rel="stylesheet" href="assets/css/main/slider.css">
    <link rel="stylesheet" href="assets/css/main/footer.css">
    <link rel="stylesheet" href="assets/css/effect/snow.css">
    <link rel="stylesheet" type="text/css" href="assets/css/login/login.css">
    <link rel="stylesheet" type="text/css" href="assets/css/regist/registration.css">
    <link rel="stylesheet" type="text/css" href="assets/css/setpitch/setpitch.css">
    <link rel="stylesheet" type="text/css" href="assets/css/setpitch/search-setpitch.css">
    <link rel="stylesheet" href="assets/css/main/news.css">
    <link rel="stylesheet" href="assets/css/main/advisory.css">
    <link rel="stylesheet" href="assets/css/setpitch/detail-setpitch.css" />
    <link rel="stylesheet" href="assets/css/blog/blog.css">
    <link rel="stylesheet" href="assets/css/personal/main-personal.css">
    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya:wght@500&display=swap" rel="stylesheet">
    <!-- Scroll -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        JavaScript Bundle with Popper>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a818068831.js" crossorigin="anonymous"></script>
    <script src="assets/javascript/add-shadow-navigation.js"></script>

</head>

<?php
include("config/config.php");
include("screen/auto-update-history.php");
//Truy???n bi???n th??ng qua SESSION
session_start();
?>

<body>
    <div id="main">
        <div id="header">
            <div id="logo">
                <a href="index.php" class="content-logo">HINADA</a>
            </div>
        </div>
        <div id="navigation">
            <div id="fix-nav">
                <div class="move-nav">
                    <!-- Navigation -->
                    <div id="nav">
                        <ul id="select">
                            <!-- X??? l?? Hover khi nh???n v??o m???c ?????nh h?????ng -->
                            <?php
                            $tam = (isset($_GET['quanly'])) ? $_GET['quanly'] : '';
                            ?>

                            <li><a href="index.php" class="item-nav 
                            <?php
                            echo ($tam == '') ? 'is-active' : '';
                            ?>"><i class="fa-solid fa-house"></i> Trang ch???</a></li>

                            <li><a href="index.php?quanly=datsan&&type=default" class="item-nav 
                            <?php
                            echo ($tam == "datsan" || $tam == "chitietdatsan") ? 'is-active' : '';
                            ?>"><i class="fa-solid fa-baseball"></i> S??n b??ng</a></li>

                            <li><a href="index.php?quanly=sukien" class="item-nav 
                            <?php
                            echo ($tam == "sukien" || $tam == "chitietsukien") ? 'is-active' : '';
                            ?>"><i class="fa-solid fa-trophy"></i> S??? ki???n</a>

                            </li>
                            <li><a href="index.php?quanly=blog" class="item-nav 
                            <?php
                            echo ($tam == "blog" || $tam == "chitietblog") ? 'is-active' : '';
                            ?>"><i class="fa-brands fa-blogger"></i> Blog</a></li>

                            <li><a href="index.php?quanly=vechungtoi" class="item-nav 
                            <?php
                            echo ($tam == "vechungtoi") ? 'is-active' : '';
                            ?>"><i class="fa-solid fa-users-between-lines"></i> Gi???i thi???u</a></li>
                        </ul>

                    </div>
                    <!-- Hi???u ???ng m??? khi nh???n ?????i m???t kh???u -->
                    <div id="overlay"></div>
                    <!-- Begin user-nav -->
                    <div id="user-nav">
                        <form action="index.php?quanly=timkiemnguoidung" method="post">
                            <input type="text" style="display: none;height: 30px;border-radius: 3px;" name="searchUser"
                                id="input-search" placeholder='T??m ng?????i d??ng' required>
                        </form>
                        <a id="search-btns">
                            <i class="ti-search"></i>
                        </a>
                        <!-- X??? l?? ????ng xu???t -->
                        <?php
                        if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
                            $mataikhoan = isset($_GET['id_user']) ? $_GET['id_user'] : $_SESSION['id_khachhang'];
                            $update_logout = "UPDATE taikhoan SET tinhtrangtk = '2' WHERE mataikhoan = $mataikhoan";
                            mysqli_query($mysqli, $update_logout);
                            unset($_SESSION['tenkhachhang']);
                            unset($_SESSION['id_khachhang']);
                            unset($_SESSION['ten']);
                            unset($_SESSION['sodienthoai']);
                            unset($_SESSION['id_user']);
                            //session_destroy();
                        }
                        if (isset($_SESSION['tenkhachhang'])) {
                        ?>
                        <!-- X??? l?? trang c?? nh??n -->
                        <li>
                            <a href="#" class="user">
                                <?php
                                    $sql = "SELECT * FROM taikhoan WHERE mataikhoan = $_SESSION[id_khachhang] LIMIT 1";
                                    $query = mysqli_query($mysqli, $sql);
                                    while ($dong = mysqli_fetch_array($query)) {
                                    ?>
                                <img src="admin/modules/account/uploads-ac/<?php echo $dong['hinhanh'] ?>"
                                    alt="<?php echo $dong['hinhanh'] ?>"
                                    style="width:25px; height: 25px; border-radius: 50%; vertical-align: middle; margin: -5px 2px 0px -5px; object-fit: cover;">
                                <?php echo $dong['ten'] ?>
                                <?php } ?>
                            </a>
                            <ul class="sub_user">
                                <li><a href="index.php?quanly=trangcuatoi">Trang c???a t??i</a></li>
                                <li><a href="index.php?dangxuat=1">????ng xu???t</a></li>
                            </ul>
                        </li>
                        <a id="notification"><i class="ti-bell"></i>&nbsp;
                            <!-- X??? l?? hi???n th??? s??? l?????ng th??ng b??o m???i -->
                            <?php
                                $sql_count_notify = "SELECT * FROM thongbao WHERE mataikhoan = '$_SESSION[id_khachhang]' AND tinhtrangthongbao = 0";
                                $query_count_notify = mysqli_query($mysqli, $sql_count_notify);
                                $count_notify = mysqli_num_rows($query_count_notify);
                                if ($count_notify > 0) {
                                ?>
                            <span class="count-notify"><?php echo $count_notify; ?></span>
                            <?php } ?>
                        </a>
                        <?php
                        } else {
                        ?>
                        <a href="index.php?quanly=dangnhap">
                            <i class="ti-key"></i>
                            ????ng nh???p
                        </a>
                        <a href="index.php?quanly=dangky">
                            <i class="ti-marker-alt"></i>
                            ????ng k??
                        </a>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- End user-nav  -->
                </div>
            </div>
        </div>

        <!-- X??? l?? ???????ng d???n trang -->
        <?php
        include("screen/path.php");
        ?>
        <section id="path">
            <div class="w-normal clearfix">
                <div class="path-text" style="display: inline-block; width: max-content;">
                    <span>HINADA</span>
                    <?php
                    if ($_SESSION['path'] != '') {
                    ?>
                    <i class="ti-angle-right"></i>
                    <span>
                        <?php echo $_SESSION['path']; ?>
                    </span>
                    <?php
                    }
                    if ($_SESSION['path2'] != '') {
                    ?>
                    <i class="ti-angle-right"></i>
                    <span>
                        <?php echo $_SESSION['path2']; ?>
                    </span>
                    <?php
                    }
                    if ($_SESSION['path3'] != '') {
                    ?>
                    <i class="ti-angle-right"></i>
                    <span>
                        <?php echo $_SESSION['path3']; ?>
                    </span>
                    <?php
                    }
                    if ($_SESSION['path4'] != '') {
                    ?>
                    <i class="ti-angle-right"></i>
                    <span>
                        <?php echo $_SESSION['path4']; ?>
                    </span>
                    <?php
                    }
                    if ($_SESSION['path5'] != '') {
                    ?>
                    <i class="ti-angle-right"></i>
                    <span>
                        <?php echo $_SESSION['path5']; ?>
                    </span>
                    <?php
                    }
                    ?>
                </div>
                <?php
                include("screen/effect/effect.php");
                ?>
            </div>
        </section>
        <!-- Slider -->
        <?php
        include("screen/slider-sc/slider-ex.php");
        ?>
        <!-- Content -->
        <div id="content" class="w-normal clearfix flex">
            <?php
            include("screen/main.php");
            ?>
        </div>
        <!-- Footer -->
        <div id="footer">
            <div class="container-f">
                <footer class="py1-5">
                    <div class="row">
                        <div class="col-8 col-md-2 mb-3">
                            <h5>V??? ch??ng t??i</h5>
                            <ul class="nav flex-column">
                                <li class="nav-item mb-2"><a href="index.php" class="nav-link p-0 ">Trang ch???</a></li>
                                <li class="nav-item mb-2"><a href="index.php?quanly=vechungtoi"
                                        class="nav-link p-0 ">Gi???i thi???u</a></li>
                                <li class="nav-item mb-2"><a href="index.php?quanly=dieukhoan"
                                        class="nav-link p-0 ">??i???u kho???n</a></li>
                            </ul>
                        </div>

                        <div class="col-8 col-md-2 mb-3" style="line-height: 1.5;">
                            <h5>N???i dung</h5>
                            <ul class="nav flex-column">
                                <li class="nav-item mb-2"><a href="index.php?quanly=datsan&&type=default"
                                        class="nav-link p-0 ">S??n b??ng</a></li>
                                <li class="nav-item mb-2"><a href="index.php?quanly=sukien" class="nav-link p-0 ">S???
                                        ki???n</a></li>
                                <li class="nav-item mb-2"><a href="index.php?quanly=blog" class="nav-link p-0 ">Blog</a>
                                </li>
                                <li class="nav-item mb-2"><a
                                        href="index.php?quanly=timkiemnguoidung&&searchUser=HINADA&&page=1"
                                        class="nav-link p-0 ">T??m ki???m</a></li>
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-5 offset-md-3 mb-3">
                            <form>
                                <h5>Theo d??i tin t???c t??? ch??ng t??i</h5>
                                <p>????? bi???t th??m th??ng tin h??ng th??ng v??? nh???ng ??i???u m???i v?? th?? v???.</p>
                            </form>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!-- T?? v???n kh??ch h??ng -->
        <?php
        include('screen/advisory-sc/advisory2.php');
        ?>
        <!-- ----------------- -->
        <div id="copy-right">
            <div class="line-right">
                <p>(C) 2022 HiNaDa, LTD. M???i quy???n ???????c b???o l??u.</p>
            </div>
        </div>
        <!-- Button Th??ng b??o -->
        <?php
        if (isset($_SESSION['id_khachhang'])) {
            $sqlnotifi = "SELECT * FROM thongbao WHERE mataikhoan = $_SESSION[id_khachhang] ORDER BY mathongbao DESC";
            $query = mysqli_query($mysqli, $sqlnotifi);
        }
        ?>
        <div id="test-container" style="display: none;">
            <div id="notify">
                <div class="title">
                    <i class="fa-solid fa-bell"></i> &nbsp;<span style="font-size: 18px;">Th??ng b??o</span>
                    <!-- Khi ????ng th?? chuy???n ?????i t??nh tr???ng th??ng b??o th??nh ???? xem -->
                    <form action="screen/handle-notify.php" method="post" style="float:right">
                        <input type="text" name="mataikhoan" style="display: none;"
                            value="<?php echo $_SESSION['id_khachhang'] ?>">
                        <input type="text" name="maurl" style="display: none;"
                            value="<?php echo $_SERVER['REQUEST_URI'] ?>">
                        <button type="submit" name="closenotify " style="border:none;"><i id="ti-closes"></i></button>
                    </form>
                </div>
                <div class="notification-list">
                    <ul style="margin: 0; padding:0">
                        <?php
                        while ($dong = mysqli_fetch_array($query)) {
                        ?>
                        <li>
                            <p><?php echo $dong['noidungthongbao'] ?></p>
                            <div class="bottom-notify">
                                <div class="date-notify">
                                    <?php echo date('d-m-Y', strtotime($dong['thoigianthongbao'])) ?>
                                    <?php echo date('&#10059; H:i:s', strtotime($dong['thoigianthongbao'])) ?>
                                </div>
                                <div class="new-notify">
                                    <?php echo ($dong['tinhtrangthongbao'] == 0) ? 'M???i' : ''; ?>
                                </div>
                            </div>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <script>
        const toastTrigger = document.getElementById('liveToastBtn')
        const toastLiveExample = document.getElementById('liveToast')
        if (toastTrigger) {
            toastTrigger.addEventListener('click', () => {
                const toast = new bootstrap.Toast(toastLiveExample)

                toast.show()
            })
        }
        </script>
    </div>

    <script src="assets/javascript/notify-search.js"></script>
    <!-- Ki???m tra ????ng nh???p th??nh c??ng -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    if (isset($_GET['login']) && $_GET['login'] == 'success') {
    ?>
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Th??nh c??ng',
        text: '????ng nh???p th??nh c??ng.',
    })
    setTimeout(function() {
        window.location.href = "index.php";
    }, 3000);
    </script>
    <?php
    }
    ?>
    <!-- Ki???m tra ????ng xu???t th??nh c??ng -->
    <?php
    if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
    ?>
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Th??nh c??ng',
        text: '????ng xu???t th??nh c??ng.',
    })
    setTimeout(function() {
        window.location.href = "index.php";
    }, 3000);
    </script>
    <?php
    }
    ?>
    <!-- Ki???m tra ????ng k?? th??nh c??ng -->
    <?php
    if (isset($_GET['dangky']) && $_GET['dangky'] == 'success') {
    ?>
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Th??nh c??ng',
        text: '????ng k?? th??nh c??ng.',
    })
    setTimeout(function() {
        window.location.href = "index.php";
    }, 3000);
    </script>
    <?php
    }
    ?>
    <!-- Ki???m tra giao d???ch th???t b???i-->
    <?php
    if (isset($_GET['giaodich']) && $_GET['giaodich'] == 'thatbai') {
    ?>
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Th???t b???i',
        text: 'Giao d???ch th???t b???i.',
    })
    setTimeout(function() {
        window.location.href = "index.php";
    }, 3000);
    </script>
    <?php
    }
    ?>
    <!-- Ki???m tra l???y m???t kh???u th??nh c??ng-->
    <?php
    if (isset($_GET['forgotPassword']) && $_GET['forgotPassword'] == 'success') {
    ?>
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Th??nh c??ng',
        text: 'L???y l???i m???t kh???u th??nh c??ng. B???n c?? th??? ????ng nh???p l???i t??i kho???n b??nh th?????ng.',
    })
    </script>
    <?php
    }
    ?>
    <!-- Ki???m tra s??n ???? ???????c ?????t kh??ng th??? thanh to??n s??n n??y-->
    <?php
    if (isset($_GET['setpitch']) && $_GET['setpitch'] == 'failed') {
    ?>
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Th???t b???i',
        text: 'S??n n??y ???? c?? ng?????i ?????t.',
    })
    </script>
    <?php
    }
    ?>
    <!-- Ki???m tra x??c nh???n gmail ????ng nh???p th??nh c??ng-->
    <?php
    if (isset($_GET['xacnhandangnhap']) && $_GET['xacnhandangnhap'] == 'success') {
    ?>
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Th??nh c??ng',
        text: 'T??i kho???n c???a b???n ???? ???????c x??c nh???n gmail th??nh c??ng.',
    })
    </script>
    <?php
    }
    ?>
    <!-- Scroll Library -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
</body>

</html>