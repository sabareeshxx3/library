<?php
session_start();

// Validate and sanitize the userlogid before setting it in the session
$userloginid = isset($_GET['userlogid']) ? $_GET['userlogid'] : '';
$_SESSION["userid"] = $userloginid;
?>


<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Library Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

    <style>
        body {
            background-color: #f5f5f5;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            margin: auto;
        }

        .imglogo {
            width: 37%;
            padding: 20px;
        }

        .leftinnerdiv {
            float: left;
            width: 25%;
        }

        .rightinnerdiv {
            float: right;
            width: 75%;
        }

        .greenbtn {
            background-color: #003366;
            color: #ffffff;
            width: 95%;
            height: 40px;
            margin-top: 8px;
            border: none;
        }

        .greenbtn:hover {
            background-color: #001a33;
        }

        .icons {
            margin-right: 10px;
        }

        .innerright {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
           
        }

        th {
            background-color: #003366;
            color: #ffffff;
        }

        td {
            background-color: #cce5ff;
            color: #003366;
        }

        a {
            color: #003366;
            text-decoration: none;
        }

        .modal-dialog {
            max-width: 800px;
            margin: 30px auto;
        }

        .modal-content {
            padding: 20px;
            border-radius: 10px;
        }

        .modal-header {
            background-color: #003366;
            color: #ffffff;
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }

        .modal-body {
            padding: 20px;
        }

        .close {
            color: #fff;
            opacity: 1;
        }
        .newinnerdiv{
           
            float: left;
            width: 113%;
        }
    </style>
</head>

<body style="background-color:#f5f5f5;">
    <?php include("data_class.php"); ?>
    <div class="container">
        <div class="innerdiv">
            <div class="row"><img class="imglogo" src="images/openlibrarylogo.png" style=" width: 37%;
        padding-block: 20px;"/></div>
            <div class="leftinnerdiv">
                <br>
                <Button class="greenbtn" onclick="openpart('myaccount')"> <img class="icons" src="images/icon/profile.png" width="30px" height="30px" /> MY ACCOUNT</Button>
                <Button class="greenbtn" onclick="openpart('requestbook')"><img class="icons" src="images/icon/book.png" width="30px" height="30px" /> REQUEST BOOK</Button>
                <Button class="greenbtn" onclick="openpart('issuereport')"> <img class="icons" src="images/icon/monitoring.png" width="30px" height="30px" /> BOOK REPORT</Button>
                <a href="index.php"><Button class="greenbtn" ><img class="icons" src="images/icon/logout.png" width="30px" height="30px" /> LOGOUT</Button></a>
            </div>

            <div class="rightinnerdiv">
                <div id="myaccount" class="innerright portion" style="<?php if (!empty($_REQUEST['returnid'])) {
                                                                        echo "display:none";
                                                                    } else {
                                                                        echo "";
                                                                    } ?>">
                    <Button class="greenbtn">MY ACCOUNT</Button>
                    <?php
                    $u = new data;
                    $u->setconnection();
                    $u->userdetail($userloginid);
                    $recordset = $u->userdetail($userloginid);
                    foreach ($recordset as $row) {
                        $id = $row[0];
                        $name = $row[1];
                        $email = $row[2];
                        $pass = $row[3];
                        $type = $row[4];
                    }
                    ?>
                    <p style="color:black"><u>Person Name:</u> &nbsp&nbsp<?php echo $name ?></p>
                    <p style="color:black"><u>Person Email:</u> &nbsp&nbsp<?php echo $email ?></p>
                    <p style="color:black"><u>Account Type:</u> &nbsp&nbsp<?php echo $type ?></p>
                </div>
            </div>

            <div class="rightinnerdiv">
                <div id="issuereport" class="innerright portion" style="<?php if (!empty($_REQUEST['returnid'])) {
                                                                            echo "display:none";
                                                                        } else {
                                                                            echo "display:none";
                                                                        } ?>">
                    <Button class="greenbtn">BOOK RECORD</Button>
                    <?php
                    $userloginid = $_SESSION["userid"] = $_GET['userlogid'];
                    $u = new data;
                    $u->setconnection();
                    $u->getissuebook($userloginid);
                    $recordset = $u->getissuebook($userloginid);

                    $table = "<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='padding: 8px;'>Name</th><th>Book Name</th><th>Issue Date</th><th>Return Date</th><th>Fine</th></th><th>Return</th></tr>";

                    foreach ($recordset as $row) {
                        $table .= "<tr>";
                        "<td>$row[0]</td>";
                        $table .= "<td>$row[2]</td>";
                        $table .= "<td>$row[3]</td>";
                        $table .= "<td>$row[6]</td>";
                        $table .= "<td>$row[7]</td>";
                        $table .= "<td>$row[8]</td>";
                        $table .= "<td><a href='otheruser_dashboard.php?returnid=$row[0]&userlogid=$userloginid'><button type='button' class='btn btn-primary'>Return</button></a></td>";
                        $table .= "</tr>";
                    }
                    $table .= "</table>";

                    echo $table;
                    ?>
                </div>
            </div>

            <div class="rightinnerdiv">
            <div class="rightinnerdiv">
    <div id="return" class="innerright portion" style="<?php echo isset($_REQUEST['returnid']) ? '' : 'display:none'; ?>">
        <Button class="greenbtn">RETURN BOOK</Button>
        <?php
        if (isset($_REQUEST['returnid'])) {
            $u = new data;
            $u->setconnection();
            $recordset = $u->returnbook($_REQUEST['returnid']);

            // Process $recordset as needed
        }
        ?>
    </div>
</div>

<div class="newinnerdiv">   
            <div id="requestbook" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ $returnid=$_REQUEST['returnid'];echo "display:none";} else {echo "display:none"; }?>">
            <Button class="greenbtn" >REQUEST BOOK</Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->getbookissue();
            $recordset=$u->getbookissue();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr>
            <th>Image</th><th>Book Name</th><th>Author</th><th>Category</th><th>Price</th></th><th>Request Book</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
               $table.="<td><img src='uploads/$row[1]' width='100px' height='100px' style='border:1px solid #333333;'></td>";
               $table.="<td>$row[2]</td>";
                $table.="<td>$row[4]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td><a href='requestbook.php?bookid=$row[0]&userid=$userloginid'><button type='button' class='btn btn-primary'>Request Book</button></a></td>";
           
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;


                ?>

            </div>
            </div>

        </div>
        </div>

    <script>
        function openpart(portion) {
            var i;
            var x = document.getElementsByClassName("portion");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            document.getElementById(portion).style.display = "block";
        }
    </script>
</body>

</html>
