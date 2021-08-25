<?php
ini_set('display_errors',1);
class FormController extends Controller {

    public function newPassword() {
        $newPass = $_POST["newPassword"];
        $confirmPass = $_POST["confirmPassword"];
        $token = $_POST["token"];

        $email = Db::getSingleEntry("SELECT email FROM reset_password WHERE token='".$token."' LIMIT 1");

        if($email) {
            $encPass = password_hash($newPass, PASSWORD_DEFAULT);
            Db::doQuery("UPDATE users SET password='".$encPass."' WHERE email='".$email["email"]."'");
            header("location: index.php?controller=user&action=login");
        } else {
            echo "new pass error";
        }
    }

    public function passwordReset() {
        // https://codewithawa.com/posts/password-reset-system-in-php
        if(isset($_POST["resetPass"])) {
            $email = $_POST["email"];
            $userEmail = Db::getSingleEntry("SELECT email FROM users WHERE email='".$email."'");
            $token = bin2hex(random_bytes(20));

            if($userEmail) {
                Db::doQuery("INSERT INTO reset_password(email, token) VALUES ('".$email."', '".$token."')");
                $to = $email;
                $subject = "Reset your password on sweeteats.com";
                $msg = "To reset your password go to http://jennamae.ca/sweeteats/index.php?controller=user&action=newPassword&token=".$token;
                $msg = wordwrap($msg,70);
                $headers = "From: info@sweateats.com";
                mail($to, $subject, $msg, $headers);
                header("location: index.php?controller=user&action=pendingReset");
            } else {
                echo "theres an error";
            }
            
        }
    }
    public function updateUser() {
        $id = $_POST["id"];
        $email = $_POST["email"];
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $company = $_POST["company"];
        $address = $_POST["address"];
        $suite = $_POST["suite"];
        $city = $_POST["city"];
        $province = $_POST["province"];
        $country = $_POST["country"];
        $postal = $_POST["postal"];
        $blankPass = "";
        $diet = $_POST["diet"];
        User::accountInfo($id, $email, $blankPass, $blankPass, $firstName, $lastName, $company, $address, $suite, $city, $province, $country, $postal, $diet);
        header("location: index.php?controller=user&action=account&updated=true");
    }

    static public function checkout() {
        $id = $_POST["id"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $encPass = password_hash($password, PASSWORD_DEFAULT);
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $company = $_POST["company"];
        $address = $_POST["address"];
        $suite = $_POST["suite"];
        $city = $_POST["city"];
        $province = $_POST["province"];
        $country = $_POST["country"];
        $postal = $_POST["postal"];
        $diet = $_POST["diet"];

        User::accountInfo($id, $email, $password, $encPass, $firstName, $lastName, $company, $address, $suite, $city, $province, $country, $postal, $diet);
        
        $number = Invoice::generateInvoiceNumber();
        Invoice::recordInvoiceItem($number);
        Invoice::invoiceEntry($number);

        Cart::Empty();
        header("location: index.php?controller=user&action=account&checkout=1");
    }

    static public function sortBy() {
        $sortBy = $_POST["sortBy"];
        $sortValue = AllProducts::sort($sortBy);

        return $sortValue;
    }

    public function itemQuantity() {
        $productId = $_POST["productId"];
        $amount = $_POST["quantity"];

        Cart::updateQuantity($productId, $amount);

        header("location: index.php?controller=cart&action=showCart");
    }

    public function cartQuantity() {
        $productId = $_POST["productId"];
        $amount = $_POST["quantity"];

        Cart::add($productId, $amount);

        header("location: index.php?controller=pages&action=shop&addedToCart=true");
    }

    public function userLogin() {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $user = User::doLogin($email, $password);
        if($user) {
            $this->state["user"] = User::currentUser();
            if(isset($_GET["checkout"])) {
                header("location: index.php?controller=cart&action=checkout");
            } else {
                header("location: index.php?controller=pages&action=home");
            }
            
        } else {
            header("location: index.php?controller=user&action=login");
        }   
    }

    public function userRegister() {
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $encPass = password_hash($password, PASSWORD_DEFAULT);

        User::register($firstName, $lastName, $email, $encPass);

        header("location: index.php?controller=pages&action=home");
    }

    public function error() {
        $this->state["browserTitle"] = "Error";
        $this->state["errorMsg"] = "Action Not Found";
        $this->state["css"] = "<link rel='stylesheet' type='text/css' href='css/error.css'>";
        $this->state["functions"] = "";
        
        $this->state["content"] = $this->loadView("error");

        $this->state["html"] = $this->loadView("template");
    }
}

?>