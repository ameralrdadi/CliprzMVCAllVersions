<?php

class home
{

    public function index ()
    {
	
	 $data = array(
	 'title_site'                          => 'Cliprz Forum - منتدى أطار عمل كليبرز',
	 'query_forums_parent'   => cliprz::system(database)->select("forums","*","id_parent = 0")
	 );   
	 
	 cliprz::system(view)->display("header","main",$data);
        
	 cliprz::system(view)->display("forums","forums",$data);
        
	 cliprz::system(view)->display("footer","main");
    
    }

}

?>