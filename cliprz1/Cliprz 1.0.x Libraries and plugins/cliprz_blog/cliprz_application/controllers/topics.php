<?php

class topics
{

//============================>
// Show All Topics
//============================>

    public function index ()
    {
        cliprz::system(view)->display("header","main");
        
        $query = cliprz::system(database)->select("topics","*","","id DESC");

        $data = array(
            "query" => $query
        );

        cliprz::system(view)->display("show_all_topics","topics",$data);
        cliprz::system(view)->display("footer","main");
    
    }

//============================>
// Add Topic
//============================>
 
    public function add_topic()
    {
        
        $error         = null; 
        $form_add = true;
         
        cliprz::system(view)->display("header","main");
    
        if(isset($_POST["add_topic"])){
            
            $topic_post = array(
                "title_topic"         => (isset($_POST["title_topic"])) ? cliprz::system(database)->res($_POST["title_topic"]) :  "",
                "content_topic"   => (isset($_POST["content_topic"])) ? cliprz::system(database)->res($_POST["content_topic"]) : "",
                "date_topic"        => date("d/m/Y")
              );
               
             if(empty($topic_post["title_topic"]))
             {
                $error = 'Not Found Title Topic';
             }
             elseif(empty($topic_post["content_topic"])){
                 $error = 'Not Found Content Topic';
             }
             else
             {
                    cliprz::system(database)->insert("topics",$topic_post);
                    echo  '<h2>Done Add Topic .. </h2>';   
                    unset($link_post);
                    $error          = null;
                    $form_add = false;
            }

        }        
        
        $data = array(
                "error" => (isset($error) && $error !== NULL) ? $error : ""
        );
                            
        ($form_add == true) ? cliprz::system(view)->display("add_topic","topics",$data) : "";
        
        cliprz::system(view)->display("footer","main");
        
    }


//============================>
// Show Topic
//============================>

    public function show_topic ($id)
    {
    
        cliprz::system(view)->display("header","main");
    
        if(c_validate_id($id)){

            $query = cliprz::system(database)->select("topics","*","id = '".$id."'");
            
            $data = array(
                "query" => $query
            );

            cliprz::system(view)->display("show_topic","topics",$data);
  
        }
        else
        {
            cliprz::system(error)->show_404();
        }

        cliprz::system(view)->display("footer","main");
    
    }


//============================>
// Edit Topic
//============================>

    public function edit_topic($id)
    {
        
        $error         = null; 
        $form_edit = true;
         
        cliprz::system(view)->display("header","main");

        $query = cliprz::system(database)->select("topics","*","id = '".$id."'");
        $num   = cliprz::system(database)->num_rows($query);                
           
           if(!$num)
           {
               cliprz::system(error)->show_404();
           }
           else
           {
                   
            $row    = cliprz::system(database)->fetch_assoc($query);
            
            if(isset($_POST["update_topic"])){
                
                $topic_post = array(
                    "title_topic"         => (isset($_POST["title_topic"])) ? cliprz::system(database)->res($_POST["title_topic"]) :  "",
                    "content_topic"   => (isset($_POST["content_topic"])) ? cliprz::system(database)->res($_POST["content_topic"]) : ""
               );
                   
                 if(empty($topic_post["title_topic"]))
                 {
                    $error = 'Not Found Title Topic';
                 }
                 elseif(empty($topic_post["content_topic"])){
                     $error = 'Not Found Content Topic';
                 }
                 else
                 {
                        cliprz::system(database)->update("topics",$topic_post);
                        echo  '<h2>Done Update Topic .. </h2>';   
                        unset($link_post);
                        $error          = null;
                        $form_edit = false;
                }
    
            }        
            
            $data = array(
                    "error"                => (isset($error) && $error !== NULL) ? $error : "",
                    "title_topic"       => $row["title_topic"],
                    "content_topic" => $row["content_topic"],
                    "id_topic"           => $row["id"] 
            );
                                
            ($form_edit == true) ? cliprz::system(view)->display("edit_topic","topics",$data) : "";
                              
      }

        cliprz::system(view)->display("footer","main");
           

    }


//============================>
// Delete Topic
//============================>
    public function delete_topic ($id)
    {
    
        cliprz::system(view)->display("header","main");
    
        if(c_validate_id($id)){

            $query = cliprz::system(database)->select("topics","id","id = '".$id."'");
            
            if(cliprz::system(database)->num_rows($query))
            {
                cliprz::system(database)->delete("topics","id = '".$id."");    
                echo "Message : done Delete topic .";
            }
            else
            {
                cliprz::system(error)->show_404();
            }
          
        }
        else
        {
            cliprz::system(error)->show_404();
        }

        cliprz::system(view)->display("footer","main");
    
    }        
	
}

?>