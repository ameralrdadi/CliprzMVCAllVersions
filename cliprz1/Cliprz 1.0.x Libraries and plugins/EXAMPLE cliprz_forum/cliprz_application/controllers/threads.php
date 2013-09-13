<?php

class threads
{

    public function show_thread ()
    {
	
	 $data = array(
	 'title_site'                      => 'عرض موضوع',
	 'query_show_thread'  => cliprz::system(database)->select("threads","*","id = 1")
	 );   

	 cliprz::system(view)->display("header","main",$data);

	 cliprz::system(view)->display("show_thread","threads",$data);
       
	 cliprz::system(view)->display("footer","main");
    
    }
    
    // Updated by Cliprz Yousef Ismaeil
    public function add_thread ()
    {
        $errors = false;
        $hide   = false;

        if (isset($_POST['action']) && $_POST['action'] == 'add')
        {
            $_tposts = array(
                "title_thread"    => (isset($_POST['title_thread'])) ? $_POST['title_thread'] : "",
                "content_thread"  => (isset($_POST['content_thread'])) ? $_POST['content_thread'] : "",
                "date_thread"     => TIME_NOW,
                "status_thread"   => (isset($_POST['status_thread'])) ? $_POST['status_thread'] : "",
                "id_user"         => 1 // Here user id from session or user data class somthing like that
                );

            if (empty($_tposts['title_thread']))
            {
                $errors = "ادخل عنوان الموضوع";
            }
            else if (empty($_tposts['content_thread']))
            {
                $errors = "ادخل محتوى الموضوع";
            }
            else
            {
                //cliprz::system(database)->insert("threads",$_tposts);
                unset($_tposts);
                $hide   = true;
                $errors = true;
                $refresh = array(
                    "title"=> "تم اضافة الموضوع",
                    "msg"=> "تم اضافة الموضوغ",
                    "page"=> "home" // you can cahnge for last id thred
                );
                cliprz::system(view)->display("refresh","",$refresh);
            }

        }

        $data = array(
            'title_site' => 'أضافة موضوع جديد',
            'errors'     => $errors
            );

        if ($hide == false)
        {
	        cliprz::system(view)->display("header","main",$data);
	        cliprz::system(view)->display("add_thread","threads",$data);
	        cliprz::system(view)->display("footer","main");
        }
    }
        
    public function edit_thread ($id)
    {
        if (isset($id) && c_validate_id($id))
        {
            // make ->query("thres","*","id='$id'");
            // get data and put them in form or edit_thared.page.php
            // thats easy eny problem send mail for me.
            // edit here like add_thread function
        }
        else
        {
            cliprz::system(error)->show_404();
        }
    }

}

?>