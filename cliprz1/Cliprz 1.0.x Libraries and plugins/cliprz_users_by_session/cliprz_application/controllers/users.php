<?php

class users
{
    
    public function regsiter()
    {

        $form_register = true;
        $error                = false;

        cliprz::system(view)->display("header","main");
        
        if(isset($_POST["user"]) && $_POST["user"] == "register")
        {
        
            $user_post = array(
                "username" => (isset($_POST["username"])) ? cliprz::system(database)->res($_POST["username"]) : "",
                "email"         => (isset($_POST["email"])) ? cliprz::system(database)->res($_POST["email"]) : "",
                "password" => (isset($_POST["password"])) ? cliprz::system(database)->res($_POST["password"]) : ""
            );
            
            if(empty($user_post["username"]))
            {
                $error = 'الاسم فارغ';
            }
            elseif(empty($user_post["email"]))
            {
                $error = 'البريد فارغ';     
            }
            elseif(empty($user_post["password"]))
            {
                $error = 'الرقم السري فارغ';     
            }            
            else
            {
                
                $user_post["password"] = sha1(md5(md5($user_post["password"])));

                cliprz::system(database)->insert("users",$user_post);

                echo "تم التسجيل بنجاح";

                $form_register = false;
                $error                = null;
                unset($user_post);
            }
            
        }

        $data = array(
            "error" => $error
        );

        
        ($form_register === true) ? cliprz::system(view)->display("register","users",$data) : "";        
        
        cliprz::system(view)->display("footer","main");

    }
    
    public function login()
    {
    
        $form_login = true;
        $error            = null;
    
        if(c_is_session("login")){ header("Location: ".c_url("home")); }
              
        cliprz::system(view)->display("header","main");        
    
    
        if(isset($_POST["user"]) && $_POST["user"] == "login")
        {
            $user_post = array(
                "username" => (isset($_POST["username"])) ? cliprz::system(database)->res($_POST["username"]) : "",
                "password" => (isset($_POST["password"])) ? cliprz::system(database)->res($_POST["password"]) : ""
            );
            
            if(empty($user_post["username"]))
            {
                $error = 'الاسم فارغ';
            }
            elseif(empty($user_post["password"]))
            {
                $error = 'الرقم السري فارغ';     
            }
            else
            {
                $user_post["password"] = sha1(md5(md5($user_post["password"]))); 
                $query = cliprz::system(database)->select("users","*","username = '".$user_post["username"]."' && password = '".$user_post["password"]."'");
                
                if(!cliprz::system(database)->num_rows($query))
                {
                    $error = 'الحساب غير موجود';
                }
                else
                {
                    $row = cliprz::system(database)->fetch_assoc($query);
                    
                    c_set_session("login",true);               
                    c_set_session("username",$row["username"]);               
                    c_set_session("email",$row["email"]);               
                    c_set_session("id",$row["id"]);               
                         
                    echo " أهلا وسهلا بعودتك".c_get_session("username");
                    unset($user_post);
                    $error           = null;  
                    $form_login = false;
                    
                }
                
            }
        
        }
        
        $data = array(
            "error" => $error
        );
    
        ($form_login === true) ? cliprz::system(view)->display("login","users",$data) : "";        
        
        cliprz::system(view)->display("footer","main");            
    
    }
    
    
    public function account()
    {
    
        if(!c_is_session("login")){ header("Location: ".c_url("home")); }
        
        $form_account = true;
        $error                = null;
        
        cliprz::system(view)->display("header","main");            
    
        $id = c_get_session("id");
        
        if(!c_validate_id($id))
        { 
            cliprz::system(error)->show_404();    
        }  

            
        if(isset($_POST["user"]) && $_POST["user"] == "update_account")
        {

            $user_post = array(
                "username" => (isset($_POST["username"])) ? cliprz::system(database)->res($_POST["username"]) : "",
                "email"         => (isset($_POST["email"])) ? cliprz::system(database)->res($_POST["email"]) : "",
                "password" => (isset($_POST["password"])) ? cliprz::system(database)->res($_POST["password"]) : ""
            );
                    
            if(empty($user_post["username"]))
            {
                $error = 'الاسم فارغ';
            }
            elseif(empty($user_post["password"]))
            {
                $error = 'الرقم السري فارغ';     
            }
            else
            {

                // Here code update user
                echo "لم يتم كتابة الكود الحفظ :) أكتبه ل تتعلم";
                            
            }
            
    
            
        }
    
        $data = array(
            "username" => c_get_session("username"),
            "email"         => c_get_session("email"),
            "error"         => $error
        );
    
        ($form_account === true) ? cliprz::system(view)->display("account","users",$data) : "";      
              
        cliprz::system(view)->display("footer","main");            
              
    }
    
    public function logout()
    {
    
        if(!c_is_session("login")){ header("Location: ".c_url("home")); }
        
        $data = array(
            "username" => c_get_session("username")
        );
    
        cliprz::system(view)->display("header","main");        
        cliprz::system(view)->display("logout","users",$data);        
        cliprz::system(view)->display("footer","main");        
    
        c_session_destroy();
        
    }    

}

?>