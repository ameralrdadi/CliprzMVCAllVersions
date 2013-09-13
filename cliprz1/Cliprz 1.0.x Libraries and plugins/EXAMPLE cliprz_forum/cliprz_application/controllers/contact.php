<?php

class contact
{

    public function index ()
    {
	
	 $data = array(
	 'title_site' => 'أتصل بنا'
	 );   
	 
        cliprz::system(view)->display("header","main",$data);

       cliprz::system(view)->display("contact","contact");
        
        cliprz::system(view)->display("footer","main");
    }

    
}

?>