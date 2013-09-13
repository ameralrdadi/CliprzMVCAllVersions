<?php

if (!defined("IN_CLIPRZ")) die('Access Denied');

class library_time_ago {

    public function ago($tm,$rcs = 0) 
    {
       $cur_tm = time(); $dif = $cur_tm-$tm;
       $pds = array('second','minute','hour','day','week','month','year','decade');
       $lngh = array(1,60,3600,86400,604800,2630880,31570560,315705600);
       for($v = sizeof($lngh)-1; ($v >= 0)&&(($no = $dif/$lngh[$v])<=1); $v--); if($v < 0) $v = 0; $_tm = $cur_tm-($dif%$lngh[$v]);
    
       $no = floor($no); if($no <> 1) $pds[$v] .='s'; $x=sprintf("%d %s ",$no,$pds[$v]);
       if(($rcs > 0)&&($v >= 1)&&(($cur_tm-$_tm) > 0)) $x .= $this->ago($_tm, --$rcs);
       return $x;
    }

}

?>