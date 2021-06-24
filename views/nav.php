<nav id="navigation">
    <div class="navigation">
        <div class="mobileBar">
            <div class="menu">
                <i class="fas fa-bars"></i>
            </div>
            <a href="index.php" class="logo">sweeteats logo</a>
            <div class="icons">
                <?php
                if($this->state["user"]["email"] != NULL){
                    ?>
                    <a href="index.php?controller=user&action=account" class="loggedUser">Hi, <?=$this->state["user"]["firstName"]?>!</a>
                    <?php
                } else {
                    ?>
                    <a href="index.php?controller=user&action=login"><i class="fas fa-user"></i></a>
                    <?php
                }
                ?>
                <a href="index.php?controller=cart&action=showCart">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cartNum"><?=Cart::numberInCart()?></span>
                </a>
            </div>
        </div>
        <input type="checkbox" id="menuCheck">
        <div class="navContainer">
            <div class="navList">
                <i class="fas fa-times"></i>
                <ul class="primary">
                    <li><a href="index.php?controller=pages&action=home" class="<?=$this->state["homeLinkActive"]?>">Home</a></li>
                    <li><a href="index.php?controller=pages&action=shop" class="<?=$this->state["shopLinkActive"]?>">Shop</a></li>
                    <li><a href="index.php?controller=pages&action=howitworks" class="<?=$this->state["worksLinkActive"]?>">How It Works</a></li>
                    <li><a href="index.php?controller=pages&action=about" class="<?=$this->state["aboutLinkActive"]?>">About</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>