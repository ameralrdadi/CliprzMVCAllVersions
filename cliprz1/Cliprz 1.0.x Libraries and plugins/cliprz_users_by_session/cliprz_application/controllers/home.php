<?php

class home
{

    public function index ()
    {
                    
        
        cliprz::system(view)->display("header","main");
        echo "<h2>HOME</h2>";
        cliprz::system(view)->display("footer","main");
    
    }

	public function info ()
	{
		cliprzinfo();
	}
	
}

?>