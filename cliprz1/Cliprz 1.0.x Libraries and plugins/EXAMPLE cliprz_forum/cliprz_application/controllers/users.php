<?php

class users
{

    public function index ()
    {
	
	 $data = array(
	 'title_site'       => 'قائمة الاعضاء',
	 'query_users' => cliprz::system(database)->select("users")
	 );   
	 
        cliprz::system(view)->display("header","main",$data);

       cliprz::system(view)->display("list_users","users",$data);
        
        cliprz::system(view)->display("footer","main");
    }


    public function register ()
    {
	
	 $data = array(
	 'title_site' => 'تسجيل عضوية'
	 );   
	 
        cliprz::system(view)->display("header","main",$data);

       cliprz::system(view)->display("register","users");
        
        cliprz::system(view)->display("footer","main");
    }


    public function login ()
    {
	
	 $data = array(
	 'title_site' => 'تسجيل دخول'
	 );   
	
	 cliprz::system(view)->display("header","main",$data);

	 cliprz::system(view)->display("login","users");
        
	 cliprz::system(view)->display("footer","main");
    
    }

    public function logout ()
    {
	
	 $data = array(
	 'title_site' => 'تسجيل خروج'
	 );   
	 
	 cliprz::system(view)->display("header","main",$data);

	 cliprz::system(view)->display("logout","users");

	 cliprz::system(view)->display("footer","main");
    
    }


public function user ()
    {
	
	 $data = array(
	 'title_site' => 'ملف العضويه'
	 );   
	 
        cliprz::system(view)->display("header","main",$data);

       cliprz::system(view)->display("user","users");
        
        cliprz::system(view)->display("footer","main");
    }

public function myaccount ()
    {
	
	 $data = array(
	 'title_site' => 'حسابي'
	 );   
	 
        cliprz::system(view)->display("header","main",$data);

       cliprz::system(view)->display("myaccount","users");
        
        cliprz::system(view)->display("footer","main");
    }


}

?>