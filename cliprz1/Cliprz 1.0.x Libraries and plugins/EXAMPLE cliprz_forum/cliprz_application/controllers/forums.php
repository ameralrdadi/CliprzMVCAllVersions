<?php

class forums
{

    public function index ()
    {
	
	 $data = array(
	 'title_site'           => 'Cliprz Forum - منتدى أطار عمل كليبرز',
	 'query_threads' => cliprz::system(database)->select("threads,users","*","threads.id_user = users.id")
	 );   
	 
        cliprz::system(view)->display("header","main",$data);

       cliprz::system(view)->display("show_forum","forums",$data);
        
        cliprz::system(view)->display("footer","main");
    }

}

?>