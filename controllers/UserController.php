<?php

class UserController extends Controller {

    public function login() {
        $this->state["user"] = User::currentUser();
        $this->state["browserTitle"] = "Home";
        $this->state["css"] = "<link rel='stylesheet' type='text/css' href='css/user.css'>";

        $this->state["footer"] = $this->loadView("footer");
        $this->state["nav"] = $this->loadView("nav");
        $this->state["content"] = $this->loadView("login");
        

        $this->state["html"] = $this->loadView("template");
    }

    public function enterEmail() {
        $this->state["user"] = User::currentUser();
        $this->state["browserTitle"] = "Enter Your Email";
        $this->state["css"] = "<link rel='stylesheet' type='text/css' href='css/user.css'>";

        $this->state["footer"] = $this->loadView("footer");
        $this->state["nav"] = $this->loadView("nav");
        $this->state["content"] = $this->loadView("enterEmail");
        

        $this->state["html"] = $this->loadView("template");
    }

    public function newPassword() {
        $this->state["user"] = User::currentUser();
        $this->state["browserTitle"] = "Change Password";
        $this->state["css"] = "<link rel='stylesheet' type='text/css' href='css/user.css'>";

        $this->state["footer"] = $this->loadView("footer");
        $this->state["nav"] = $this->loadView("nav");
        $this->state["content"] = $this->loadView("newPassword");
        
        $this->state["html"] = $this->loadView("template");
    }

    public function pendingReset() {
        $this->state["user"] = User::currentUser();
        $this->state["browserTitle"] = "Resetting Password";
        $this->state["css"] = "<link rel='stylesheet' type='text/css' href='css/user.css'>";

        $this->state["footer"] = $this->loadView("footer");
        $this->state["nav"] = $this->loadView("nav");
        $this->state["content"] = $this->loadView("pendingReset");
        
        $this->state["html"] = $this->loadView("template");
    }

    public function logout() {
        User::doLogout();
        header("location: index.php?controller=pages&action=home");
    }

    public function register() {
        $this->state["user"] = User::currentUser();
        $this->state["browserTitle"] = "Register";
        $this->state["css"] = "<link rel='stylesheet' type='text/css' href='css/user.css'>";
        
        $this->state["footer"] = $this->loadView("footer");
        $this->state["nav"] = $this->loadView("nav");
        $this->state["content"] = $this->loadView("register");

        $this->state["html"] = $this->loadView("template");
    }

    public function account() {
        $this->state["user"] = User::currentUser();
        $this->state["orders"] = User::orderHistory();
        $this->state["browserTitle"] = "Account";
        $this->state["css"] = "<link rel='stylesheet' type='text/css' href='css/user.css'>";
        
        $this->state["content"] = $this->loadView("nav");

        $this->state["footer"] = $this->loadView("footer");
        $this->state["content"] .= $this->loadView("account");

        $this->state["html"] = $this->loadView("template");
    }

    public function manageAccount() {
        $this->state["user"] = User::currentUser();
        $this->state["browserTitle"] = "Manage Account";
        $this->state["css"] = "<link rel='stylesheet' type='text/css' href='css/user.css'>";
        
        $this->state["content"] = $this->loadView("nav");

        $this->state["footer"] = $this->loadView("footer");
        $this->state["content"] .= $this->loadView("manageAccount");

        $this->state["html"] = $this->loadView("template");
    }

    public function viewInvoice() {
        $this->state["user"] = User::currentUser();
        $this->state["browserTitle"] = "Invoice";
        $this->state["css"] = "<link rel='stylesheet' type='text/css' href='css/user.css'>";
        
        $this->state["content"] = $this->loadView("nav");

        $this->state["footer"] = $this->loadView("footer");
        $this->state["content"] .= $this->loadView("viewInvoice");

        $this->state["html"] = $this->loadView("template");
    }

    public function error() {
        $this->state["browserTitle"] = "Error";
        $this->state["errorMsg"] = "Action Not Found";
        $this->state["css"] = "<link rel='stylesheet' type='text/css' href='css/error.css'>";

        $this->state["content"] = $this->loadView("error");

        $this->state["html"] = $this->loadView("template");
    }
}

?>