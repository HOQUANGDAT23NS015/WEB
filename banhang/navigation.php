<!-- header -->
<div class="header">
    <div class="container">
        <ul>
            <li><span class="glyphicon glyphicon-time" aria-hidden="true"></span>Free and Fast Delivery</li>
            <li><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Free shipping On all orders</li>
            <li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="mailto:cuocchaydua247@gmail.com"> cuocchaydua247@gmail.com</a></li>
        </ul>
    </div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
    <div class="container">
        <div class="col-md-3 header-left">
            <h1><a href="index.php"><img src="images/logo.png" alt="Logo"></a></h1>
        </div>
        <div class="col-md-6 header-middle">
            <form>
                <div class="search">
                    <input type="search" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" required="">
                </div>
                <div class="section_room">
                    <select id="country" onchange="change_country(this.value)" class="frm-field required">
                        <option value="null">Trí Tuệ</option>     
                        <option value="AX">Con trai</option>
                        <option value="AX">Con gái</option>
                        
                    </select>
                </div>
                <div class="sear-sub">
                    <input type="submit" value=" ">
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
        <div class="col-md-3 header-right footer-bottom">
            <ul>
                <li>
                <?php 
                    $login_register = "";
                    if (isset($_SESSION["TenKhachHang"]) && $_SESSION["TenKhachHang"] != null) {
                        $login_register = "./user/profile.php?taikhoan=" . $_SESSION["TaiKhoan"];
                    } else {
                        $login_register = "login-register.php";
                    }
                ?>
                    <a href="<?= $login_register ?>" class="use1"></a>
                </li>
                <a href="<?= $login_register ?>" class="use1">
                <?php 
                    echo isset($_SESSION["TenKhachHang"]) ? $_SESSION["TenKhachHang"] : "Đăng nhập"; 
                ?>
                </a>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //header-bot -->
<div class="ban-top">
    <div class="container">
        <div class="top_nav_left">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav menu__list">
                            <li class="active menu__item"><a class="menu__link" href="index.php">Home <span class="sr-only">(current)</span></a></li>
                            <li class="menu__item"><a class="menu__link" href="mens.php">Con trai</a></li>
                            <li class="menu__item"><a class="menu__link" href="womens.php">Con gái</a></li>
                        </ul>
                    </div>
                </div>
            </nav>    
        </div>
        <div class="top_nav_right">
            <div class="cart box_1">
                <?php 
                    $checkout = "";
                    if (isset($_SESSION["TaiKhoan"]) && $_SESSION["TaiKhoan"] != null) {
                        $checkout = "checkout.php";
                    } else {
                        $checkout = "login-register.php";
                    }
                ?>
                <a href="<?= $checkout ?>">
                    <h3> <div class="total">
                        <i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
                        <span class="simpleCart_total">0</span> (<span id="simpleCart_quantity" class="simpleCart_quantity">0</span> items)</div>
                    </h3>
                </a>
                <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
            </div>    
        </div>
        <div class="clearfix"></div>
    </div>
</div>