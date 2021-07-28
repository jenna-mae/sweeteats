<?php
include("libs/functions.php");
session_start();
confirmLogin();
$title = "Dashboard";
$dashboardActive = "dashActive";
include("snippets/header.php");
?>
<body>

<div id="dashboard">
    <div class="container">
        <div class="sidebar">
            <?php
                include("snippets/main_nav.php")
            ?>
        </div>
        <div class="wrapper">
            <div class="content">
                <header>
                    <h1>Your Dashboard</h1>
                </header>
                <div class="dash">
                    <div class="dashContent">
                        <a href="order_list.php">Orders</a>
                    </div>
                    <div class="dashContent">
                        <a href="product_list.php">Products</a>
                    </div>
                    <div class="dashContent">
                        <a href="type_list.php">Types</a>
                    </div>
                    <div class="dashContent">
                        <a href="category_list.php">Categories</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
</body>
</html>