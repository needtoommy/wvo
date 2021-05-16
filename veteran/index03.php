<?php

include 'connect/db.php';
$db = new DB();
$db2 = new DB();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tradix</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link rel="stylesheet" href="./vendor/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.theme.default.css">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.carousel.min.css">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
</head>
<style>
    .dataTables_info {
        background-color: whitesmoke;
    }

    .dataTables_wrapper {
        background-color: whitesmoke;
    }

    .style_intro {
        position: relative;
        padding: 70px 0 100px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        z-index: 0;
    }
</style>

<body>

    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>

    <div id="main-wrapper">

        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="navigation">
                            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                                <a class="navbar-brand" href="index.html"><img src="./images/logo.png" alt=""></a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                    <ul class="navbar-nav">

                                        <?php
                                        $wording = array('แก้ไขโปรไฟล์', 'เบิกค่ารักษาพยาบาล', 'เบิกเงินช่วยเลือครั้งคราว', 'เบิกเงินค่าคลอดบุตร', 'เบิกเงินค่าประสบภัยพิบัติ', 'เบิกเงินช่วยเหลือรายเดือน', 'ทุนการศึกษาบุตร');
                                        for ($i = 1; $i <= 7; $i++) {
                                        ?>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#intro<?php echo $i; ?>"><?php echo $wording[$i - 1]; ?></a>
                                            </li>
                                        <?php
                                        }

                                        ?>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="intro1" id="intro1">
            <div class="container">
                <div class="row justify-content-between align-items-center">

                    <div class="col-xl-12 col-lg-12 col-12">
                        <div class="intro-form-exchange">
                            <form method="post" name="myform" class="currency_validate">
                                <div class="form-group">
                                    <label class="mr-sm-2">Send</label>
                                    <div class="input-group mb-3">
                                        <select name='currency' class="form-control">
                                            <option data-display="Bitcoin" value="bitcoin">Bitcoin</option>
                                            <option value="litecoin">Litecoin</option>
                                        </select>
                                        <input type="text" name="usd_amount" class="form-control" value="125.00 USD">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="mr-sm-2">Get</label>
                                    <div class="input-group mb-3">
                                        <select name='currency' class="form-control">
                                            <option data-display="Bitcoin" value="bitcoin">Bitcoin</option>
                                            <option value="litecoin">Litecoin</option>
                                        </select>
                                        <input type="text" name="usd_amount" class="form-control" value="125.00 USD">
                                    </div>
                                    <div class="d-flex justify-content-between mt-0 align-items-center">
                                        <p class="mb-0">Monthly Limit</p>
                                        <h6 class="mb-0">$49750 remaining</h6>
                                    </div>
                                </div>
                                <button type="submit" name="submit" class="btn btn-success btn-block">
                                    Exchange Now
                                    <i class="la la-arrow-right"></i>
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <?php
        //เบิกค่ารักษาพยาบาล
        $array_data = array();
        $sql = "SELECT * FROM wvo.req_health as rh 
        INNER JOIN tbl_member as m ON m.m_id = rh.m_id 
        INNER JOIN tbl_status as st ON st.s_id = rh.s_id 
        WHERE rh.m_id = 2 AND m.m_alive <> 0
        ORDER BY rh.m_id DESC";
        $db->Execute($sql);
        $res =  $db->getData();

        array_push($array_data, $res);

        //เบิกเงินช่วยเลือครั้งคราว
        $sql2 = "SELECT * FROM wvo.req_occ as rocc 
        INNER JOIN tbl_member as m ON m.m_id = rocc.m_id 
        INNER JOIN tbl_status as st ON st.s_id = rocc.s_id 
        WHERE rocc.m_id = 2 AND m.m_alive <> 0
        ORDER BY rocc.m_id DESC";
        $db2->Execute($sql2);
        $res2 =  $db2->getData();

        array_push($array_data, $res2);
        echo '<pre style="color:white">';
        var_dump($array_data);
        echo '</pre>';

        for ($i = 2; $i <= 7; $i++) {
            echo $i;
        ?>

            <div class="intro<?php echo $i ?>" id="intro<?php echo $i ?>">
                <div class="container">
                    <div class="row justify-content-between align-items-center">

                        <div class="col-xl-12 col-lg-12 col-12">
                            <table id="table<?php echo $i ?>" class="display" style="width:100%; color:black;">
                                <thead style="background-color: blanchedalmond;">
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                    </tr>
                                    <tr>
                                        <td>Garrett Winters</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>63</td>
                                        <td>2011/07/25</td>
                                        <td>$170,750</td>
                                    </tr>
                                    <tr>
                                        <td>Ashton Cox</td>
                                        <td>Junior Technical Author</td>
                                        <td>San Francisco</td>
                                        <td>66</td>
                                        <td>2009/01/12</td>
                                        <td>$86,000</td>
                                    </tr>
                                    <tr>
                                        <td>Cedric Kelly</td>
                                        <td>Senior Javascript Developer</td>
                                        <td>Edinburgh</td>
                                        <td>22</td>
                                        <td>2012/03/29</td>
                                        <td>$433,060</td>
                                    </tr>
                                    <tr>
                                        <td>Airi Satou</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>33</td>
                                        <td>2008/11/28</td>
                                        <td>$162,700</td>
                                    </tr>
                                    <tr>
                                        <td>Brielle Williamson</td>
                                        <td>Integration Specialist</td>
                                        <td>New York</td>
                                        <td>61</td>
                                        <td>2012/12/02</td>
                                        <td>$372,000</td>
                                    </tr>

                                </tbody>
                                <tfoot style="background-color: blanchedalmond;">
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </tfoot>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="copyright">
                            <p>© Copyright 2019 <a href="#">Tradix</a> I All Rights Reserved</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="footer-social">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

   
    </div>
    </div>
    </div>
    </div>
    </div>








    <script src="./js/global.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="./vendor/owl-carousel/js/owl.carousel.min.js"></script>
    <script src="./js/plugins/owl-carousel-init.js"></script>

    <script src="./vendor/apexchart/apexcharts.min.js"></script>
    <script src="./vendor/apexchart/apexchart-init.js"></script>

    <script src="./js/scripts.js"></script>

    <script src="./js/settings.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/styleSwitcher.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            for (let index = 2; index <= 7; index++) {
                $('#table' + index).DataTable();



            }
            for (let index = 1; index <= 7; index++) {
                $('#intro' + index).addClass('style_intro');

            }

        });
    </script>

</body>

</html>