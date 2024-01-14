<div class="main">
    <?php
            //Kiểm tra các tham số truy vấn từ URL (thông qua $_GET) để quyết định nên bao gồm các tệp tin   
            if(isset($_GET['action']) && $_GET['query']){
                $tmp = $_GET['action'];
                $query = $_GET['query'];
            }else { 
                $tmp = '';
                $query = ''; 
            }
            if($tmp == 'quanlysanpham' && $query == 'them'){
                include('modules/pm/them.php');
                include('modules/pm/lietke.php');
            }elseif ($tmp == 'quanlysanpham' && $query == 'sua'){
                include('modules/pm/sua.php');
            }
            else{ 
               include("modules/dashboard.php"); 
            }
            
    ?>
</div>