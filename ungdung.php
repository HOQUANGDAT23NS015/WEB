<!DOCTYPE html>
<html>
    <head>
         <meta charset="utf-8">
         <link rel="stylesheet" type="text/css" href="nav_bar.css">
         <link rel="stylesheet" type="text/css" href="cuoitrang.css">
    </head>
    <title>CUỘC CHẠY ĐUA 24/7</title>
    <style>
          .divanhmo{
        height: 680px;
        width: 100vw;
     
        position: relative;
        top:20px
    }.anhtrong{
        position: absolute;
        height: 500px;
        width: 100%;
       
        top:80px

    }


    .div-con:hover img {
    opacity: 0.7; /* Thay đổi độ mờ của ảnh khi di chuột qua */
}

.div-con:hover {
    background-color: rgba(156, 39, 176, 0.4) !important; /* Semi-transparent background color */
}
td:hover .item {
 background-color: rgba(156, 39, 176, 0.4) !important;
            opacity: 0,7;
        }
.item:hover img{
    opacity: 0.7;
}
        td:hover {
            cursor: pointer;
        }
    body{
        font-family: 'Noto Sans',Arial, sans-serif;
    }
    </style>
    <body>
        <header>
        
        <div class="nav-bar">
          
          <a href="http://127.0.0.1:5500/trangchinh.html"><div class="logo"><img style="width: 150px;" src="./hinhanh/logo.png" alt="">   </a>                   
          </div>
          <div class="nav-bar-body">
              <div class="chart chart1"></div>
              <div class="chart chart2"></div>
              <div class="chart chart3"></div>
              <div class="chart chart4"></div>
              <div class="chart chart5"></div>
              <div class="chart chart6"></div>
              
          </div>
         <a href="./chedo.php"> <div class="chu_1" style="position: absolute;left: 215px ; top:0px;width: 100px;height: 50px;text-align: center;justify-content: center;font-size: 20px;font-family: 'Noto Sans',Arial, sans-serif;font-weight: 700px;">Cờ Caro</div></a>
          <a href="./giaodiennhdc.php"><div class="chu_2" style="position: absolute;left: 380px ; top:0px;width: 100px;height: 50px;text-align: center;justify-content: center;font-size: 20px;font-family: 'Noto Sans',Arial, sans-serif;font-weight: 700px;"> Nhìn hình đoán chữ</div></a>
         <a href="./gamemin.php"> <div class="chu_3" style="position: absolute;left: 550px ; top:10px;width: 100px;height: 50px;text-align: center;justify-content: center;font-size: 20px;font-family: 'Noto Sans',Arial, sans-serif;font-weight: 700px;"> Dò mìn</div></a>
          <a href="./ungdung.php"><div class="chu_4" style="position: absolute;left: 715px ; top:2px;width: 100px;height: 50px;text-align: center;justify-content: center;font-size: 20px;font-family: 'Noto Sans',Arial, sans-serif;font-weight: 700px;"> Ứng dụng</div></a>
         <a href="./dochoidientu.php"> <div class="chu_5" style="position: absolute;left: 880px ; top:0px;width: 100px;height: 50px;text-align: center;justify-content: center;font-size: 20px;font-family: 'Noto Sans',Arial, sans-serif;font-weight: 700px;"> Trò chơi điện tử</div></a>
         <a href="./chuongtrinhsukien.php"> <div class="chu_6" style="position: absolute;left: 1020px ; top:0px;width: 150px;height: 50px;text-align: center;justify-content: center;font-size: 20px;font-family: 'Noto Sans',Arial, sans-serif;font-weight: 700px;"> Chương trình/ sự kiện</div></a>
          <a href="http://127.0.0.1:5500/tudien.html"><div class="tudien">
              <div class="anh"><img width="48" height="48" src="./hinhanh/hinh-anh-cute-nhat-the-gioi.jpg" alt="pokemon"/></div>
              <div class="chutudien"><p>CUỘC CHẠY ĐUA 24/7</p></div>
          </div></a>
              
            </div>
           
        </header>
        <div class="divanhmo">
            <img id="imagemo" height="680px" width="100%" style="opacity: 0.3;" src="https://vn.portal-pokemon.com/assets_c/2023/12/EN-US_pc_s1_main_group_1280x458px_rgb-thumb-1280x458-22297.jpg" alt="">
            <div class="anhtrong">
                <img id="myImage" style="position: absolute;height: 500px;width: 100%;" src="./hinhanh/nen.png" alt="">           
            </div>
        </div>
        <button style="position: relative;cursor: pointer;top: 50px;left: 50%;z-index: 1;" type="button" id="button1"></button>
        <button style="position: relative;cursor: pointer;top: 50px;left: 51%;z-index: 1;" type="button" id="button2"></button>
        <button style="position: relative;cursor: pointer;top: 50px;left: 52%;z-index: 1;" type="button" id="button3"></button>
        <button style="position: relative;cursor: pointer;top: 50px;left: 53%;z-index: 1;" type="button" id="button4"></button>
        <div class="div-1" style="height: 550px;width: 100%;background-color: #E8E8E8;position: relative;">
             <div class="div-con" style="height: 370px;width: 310px;position: absolute; top:130px; left: 50px;background-color: #fff;" >
                 <img class="img-con" style="position: absolute;height: 60%;width: 100%;" src="https://vn.portal-pokemon.com/assets_c/2020/06/7d4a8abda1832393858534f630177845a558d4bf-thumb-624xauto-14809.jpg" alt="">
                 <div style="height: 4px;width: 100%;position: absolute;background-color: #9c27b0;top: 220px;"></div>
                <p style="position: absolute;font-size: 16px; top: 226px;left: 15px;">POKÉMON UNITE ANNOUNCED FOR NINTENDO SWITCH AND MOBILE DEVICES</p>
                <footer style="position: absolute; color: #9c27b0; bottom: 0;right: 5px;"><b>06/24/2020</b></footer>  
             </div>   
        </div>
        <div class="div-2" style="height: 800px;width: 100%;position: relative;background-image: linear-gradient(45deg, #ffffff 25%, #cccccc 25%, #cccccc 50%, #ffffff 50%, #ffffff 75%, #cccccc 75%, #cccccc 100%);">
            <p style="font-size: 28px;position: absolute;left: 40%;top: 20px;">DANH SÁCH ỨNG DỤNG</p>
            <table class="table" style="position: absolute; height: 600px; width: 93%; left: 4%;  top: 100px;border-spacing: 15px;">
                <tr>
                    <td>
                    <a href="./chedo.php" style="text-decoration: none;">
                        <div class="item" style="height: 338px; width: 310px; position: relative; background-color: #FFFFFF;">
                            <img style="position: absolute; height: 70%; width: 100%;" src="https://3.bp.blogspot.com/-SABUMFVg6eo/U-CG7HIrtfI/AAAAAAAABlQ/0Jp7-sNcJx4/s1600/tai-game-co-caro-1.jpg" alt="">
                            <div style="height: 5px; width: 100%; background-color: #9c27b0; position: absolute;top:235px   "></div>
                            <p style="color: #9c27b0;position: absolute;top: 70%;font-size: 17px;left: 10px;"><b>GAME CARO</b></p>
                        </div>
                    </td>
                    <td>
                    <a href="./giaodiennhdc.php" style="text-decoration: none;">
                        <div class="item" style="height: 338px; width: 310px; position: relative; background-color: #FFFFFF;">
                            <img style="position: absolute; height: 70%; width: 100%;" src="https://cdn-media.sforum.vn/storage/app/media/wp-content/uploads/2023/04/tai-minesweeper-game-do-min-thumbnail.jpg" alt="">
                            <div style="height: 5px; width: 100%; background-color: #9c27b0; position: absolute;top:235px   "></div>
                            <p style="color: #9c27b0;position: absolute;top: 70%;font-size: 17px;left: 10px;"><b>GAME DÒ MÌN</b></p>
                        </div>
                    </td>
                    <td>
                    <a href="./gamemin.php" style="text-decoration: none;">
                        <div class="item" style="height: 338px; width: 310px; position: relative; background-color: #FFFFFF;">
                            <img style="position: absolute; height: 70%; width: 100%;" src="https://allimages.sgp1.digitaloceanspaces.com/gametipeduvn/2022/07/1657158860_520_Top-game-nhin-hinh-doan-chu-dang-choi-nhat.jpg" alt="">
                            <div style="height: 5px; width: 100%; background-color: #9c27b0; position: absolute;top:235px   "></div>
                            <p style="color: #9c27b0;position: absolute;top: 70%;font-size: 17px;left: 10px;"><b>GAME NHÌN HÌNH ĐOÁN CHỮ</b></p>
                        </div>
                    </td>
                </tr>
            </table>
            

        </div>
  
        <script src="script.js" defer></script>
    <script>
        var images = [
            "./hinhanh/nen1.png", 
            "./hinhanh/nen2.png", 
            "./hinhanh/nen3.png", 
            "./hinhanh/nen4.png"
        ];
        var index = 0;

        document.getElementById("button1").addEventListener("click", function() {
            index = 0;
            changeImage();
        });

        document.getElementById("button2").addEventListener("click", function() {
            index = 1;
            changeImage();
        });

        document.getElementById("button3").addEventListener("click", function() {
            index = 2;
            changeImage();
        });

        document.getElementById("button4").addEventListener("click", function() {
            index = 3;
            changeImage();
        });

        function changeImage() {
            var image = document.getElementById("myImage");
            var image_1 = document.getElementById("imagemo");
            image.src = images[index];
            image_1.src =images[index];
        }
    </script>
      <div class="taikhoanchinhthuc">
        <p style="font-size: 20px; position: absolute;left: 370px;top:50px">Tài khoản chính thức</p>
        <a href=""><img style="height: 70px;position: absolute;left: 600px;top: 50px;"  src="https://vn.portal-pokemon.com/assets_c/2017/10/icon_facebook-thumb-132x132-323-thumb-132x132-3952.png" alt=""></a>
        <a href=""><img style="height: 70px;position: absolute;left: 680px;top: 50px;"  src="https://vn.portal-pokemon.com/assets_c/2017/10/icon_youtube-thumb-132x132-319-thumb-132x132-3951.png" alt=""></a>
        <a href=""><img  style="height: 70px;position: absolute;left: 760px;top: 50px;" src="https://vn.portal-pokemon.com/assets_c/2021/10/logo_tiktok-thumb-132x132-17043.png" alt=""></a>
    </div>
    <div class ="dieukhoan">
    <a style="text-decoration: none;position: absolute;top: 20px;left: 30px;color:white" href=""><span style="font-size: 16px;">Game 24/7 là gì <span style="margin-right: 20px;"></span> |</span></a>
      <a style="text-decoration: none;position: absolute;top: 20px;left: 170px;color:white" href=""><span style="font-size: 16px;">Quy định sử dụng <span style="margin-right: 20px;"></span> |</span></a>
      <a style="text-decoration: none;position: absolute;top: 20px;left: 340px;color:white" href=""><span style="font-size: 16px;">Chính sách bảo mật<span style="margin-right: 20px;"></span> |</span></a>
      <a style="text-decoration: none;position: absolute;top: 20px;left: 510px;color:white" href=""><span style="font-size: 16px;">Sơ đồ website <span style="margin-right: 20px;"></span> |</span></a>
      <a style="text-decoration: none;position: absolute;top: 20px;left: 650px;color:white" href=""><span style="font-size: 16px;"> Biểu mẫu yêu cầu cho danh nghiệp <span style="margin-right: 20px;"></span> |</span></a>
      <p style="position: absolute;top: 40px;left: 30px;font-size: 15px;">©Cuộc chay đua 24/7<br>
    </div>
  
    </body>
    
</html>