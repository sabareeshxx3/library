<?php
// addbookserver_page.php
include("data_class.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize variables with default values
    $bookname = $bookdetail = $bookaudor = $bookpub = $branch = $bookprice = $bookquantity = '';

    // Check if the keys exist in the $_POST array before accessing them
    if (isset($_POST['bookname'])) {
        $bookname = $_POST['bookname'];
    }

    if (isset($_POST['bookdetail'])) {
        $bookdetail = $_POST['bookdetail'];
    }

    if (isset($_POST['bookaudor'])) {
        $bookaudor = $_POST['bookaudor'];
    }

    if (isset($_POST['bookpub'])) {
        $bookpub = $_POST['bookpub'];
    }

    if (isset($_POST['category'])) {
        $category = $_POST['category'];
    }

    if (isset($_POST['bookprice'])) {
        $bookprice = $_POST['bookprice'];
    }

    if (isset($_POST['bookquantity'])) {
        $bookquantity = $_POST['bookquantity'];
    }

    // Check if the file was uploaded successfully
    if (isset($_FILES["bookphoto"]) && $_FILES["bookphoto"]["error"] == UPLOAD_ERR_OK) {
        $bookpic = $_FILES["bookphoto"]["name"];

        $obj = new data();
        $obj->setconnection();
        $obj->addbook($bookpic, $bookname, $bookdetail, $bookaudor, $bookpub, $category, $bookprice, $bookquantity);
    } else {
        echo "File not uploaded or invalid file.";
    }
} else {
    echo "Invalid request.";
}
?>
