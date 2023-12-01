<?php include "script.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        a{
            border:1px solid gray;
            padding:10px;
        }
        .pagination{
            display:flex;
            align-items:center;
        }
    </style>
</head>
<body>
<div class="content">
<?php 
while($row=$result->fetch_assoc())
{
?>
<p>
    <?php echo $row["id"] ?> - <?php echo $row["product_name"] ?>
</p>
<?php
}
?>
    </div>

<div class="page-info">
    <?php
    if(!isset($_GET['page-nr']))
    {
        $page=1;
    }
    else{
        $page = $_GET['page-nr'];
    }
    ?>
    showing <?php echo $page ?> of <?php echo $pages ?>
    <br>
</div>
<div class="pagination">
    <a href="?page-nr=1">First</a>
    <a href="">Previous</a>
    <?php
    if(isset($_GET['page-nr']) && $_GET['page-nr'] > 1)
    {
        ?>
        <a href="?page-nr=<?php echo $_GET['page-nr'] - 1?>">Previous</a>
        <?php
    }
    else{
        ?>
        <a>Previous</a>
        <?php
    }
    ?>
    <div class="page-numbers">
        <?php
        for( $counter= 1; $counter <= $pages; $counter++ )
        {
        ?>

            <a href="?page-nr=<?php echo $counter ?>"><?php echo $counter ?></a>
        <?php

        }
        ?>
    </div>
    <!-- Go to the next page -->
    <?php
    if(!isset($_GET['page-nr']))
    {
        ?>
        <a href="?page-nr=2">Next</a>
        <?php
    }else{
        if($_GET['page-nr']>=$pages)
        {
            ?>
            <a>Next</a>
            <?php
        }else{
            ?>
            <a href="?page-nr=<?php echo $_GET['page-nr'] + 1 ?>">Next</a>
            <?php
        }
    }
    ?>
    <a href="">Next</a>
    <a href="?page-nr=<?php echo $pages ?>">Last</a>
</div>
</body>
</html>