<nav id="mainNav">
    <div class="header">
        <h1>JME</h1>
        <h2>cms</h2>
    </div>
    <div class="navTabs">
        <div id="<?=$dashboardActive?>" class="field">
            <i class="fas fa-tachometer-alt"></i>
            <a href="dashboard.php">Dashboard</a>
        </div>
        <div id="<?=$sitecontentActive?>" class="field">
            <i class="fas fa-scroll"></i>
            <a href="product_list.php">Site Content</a>
        </div>
        <div id="<?=$orderActive?>" class="field">
            <i class="fas fa-user-friends"></i>
            <a href="order_list.php">Orders</a>
        </div>
        <div class="field">
            <i class="fas fa-sign-out-alt"></i>
            <a href="processlogout.php">Logout</a>
        </div>
    </div>
</nav>