<?php
$mysqli = new mysqli('localhost','root','','coder');
if($mysqli->connect_errno !=0)
{
    echo $mysqli->connect_error;
    exit();
}
$start = 0;
// Setting the number of rows to display in a page
$rows_per_page = 10;
$records = $mysqli->query("SELECT * FROM products");
$nr_of_rows = $records->num_rows;
// calculating of nr of pages
$pages = ceil($nr_of_rows / $rows_per_page);
// if the user clicks on the pagination buttons we set a new starting point.
if(isset($_GET['page-nr']))
{
    $page = $_GET['page-nr']-1;
    $start = $page * $rows_per_page;
}
$result = $mysqli->query("SELECT * FROM products LIMIT $start,$rows_per_page");


