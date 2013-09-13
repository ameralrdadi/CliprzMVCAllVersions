<?php

/**
 * Copyright :
 *  Cliprz model view controller framework.
 *  Copyright (C) 2012 - 2013 By Yousef Ismaeil.
 *
 * Framework information :
 *  Version 1.0.0 - Stability Stable.
 *  Official website http://www.cliprz.org .
 *
 * File information :
 *  File path BASE_PATH/cliprz_system/libraries/video/ .
 *  File name video.php .
 *  Created date 23/01/2013 11:59 AM.
 *  Last modification date 23/01/2013 11:13 PM.
 *
 * Description :
 *  Replace links and video display.
 *
 * Licenses :
 *  This program is released as free software under the Affero GPL license. You can redistribute it and/or
 *  modify it under the terms of this license which you can read by viewing the included agpl.txt or online
 *  at www.gnu.org/licenses/agpl.html. Removal of this copyright header is strictly prohibited without
 *  written permission from the original author(s).
 */
/**
 *
 *
 * @author Turkialawlqy
 */
if (!defined("IN_CLIPRZ"))
    die('Access Denied');

class library_video {

    public static function video($id, $width='', $height='') {
    # Youtube	
    if(preg_match('/http:\/\/(www\.)*youtube\.*/',$id)){
    	if(!$width)
    		$width  = '770';
        if(!$height)
    		$height = '433';

		$url_video  = array( 'http://www.youtube.com/watch?v=',
    	'http://www.youtube.com/v/',
    	'http://www.youtu.be/',
    	'http://www.youtube.com/watch?feature=player_embedded&v=',
		'http://youtube.com/watch?v=',
    	'http://youtube.com/v/',
    	'http://youtu.be/',
    	'http://youtube.com/watch?feature=player_embedded&v=');
    	$id_v = str_replace($url_video, '', $id);
    	echo '<iframe src="http://www.youtube.com/embed/'.$id_v.'?wmode=transparent&amp;rel=0&amp;showinfo=0" height="'.$height.'" width="'.$width.'"></iframe>';
	}
	# Vimeo
	if(preg_match('/http:\/\/(www\.)*vimeo\.*/',$id)){
		if(!$width)
			$width  = '560';
        if(!$height)
			$height = '315';

		$url_video  = array('http://www.vimeo.com/', 'http://vimeo.com/');
		$id_v = str_replace($url_video, '', $id);

		echo '<iframe src="http://player.vimeo.com/video/'.$id_v.'" width="'.$width.'" height="'.$height.'" frameborder="0"></iframe>';
	}

	# Facebook
	if(preg_match('/http:\/\/(www\.)*facebook\.*/',$id)){
		if(!$width)
			$width  = '500';
        if(!$height)
			$height = '300';

		$url_video  = array('http://www.facebook.com/video/video.php?v=', 'http://facebook.com/video/video.php?v=');
		$id_v = str_replace($url_video, '', $id);

		echo '<object width="'.$width.'" height="'.$height.'" data="http://www.facebook.com/v/'.$id_v.'" type="application/x-shockwave-flash">
	<param name="movie" value="http://www.facebook.com/v/'.$id_v.'" />
	<param name="allowfullscreen" value="true" />
	<param name="wmode" value="opaque" />
	<embed src="http://www.facebook.comvideo.php/v/'.$id_v.'" type="application/x-shockwave-flash" allowfullscreen="true" wmode="opaque" width="'.$width.'" height="'.$height.'" />
</object>';
	}

    # Dailymotion
	if(preg_match('/http:\/\/(www\.)*dailymotion\.*/',$id)){
		if(!$width)
			$width  = '500';
        if(!$height)
			$height = '300';
		$url_video  = array('http://www.dailymotion.com/video/', 'http://dailymotion.com/video/');
		$id_v = str_replace($url_video, '', $id);

		echo '<iframe frameborder="0" width="'.$width.'" height="'.$height.'" src="http://www.dailymotion.com/embed/video/'.$id_v.'?width=500&hideInfos=1"></iframe>';
	}

    # Liveleak
	if(preg_match('/http:\/\/(www\.)*liveleak\.*/',$id)){
		if(!$width)
			$width  = '500';
        if(!$height)
			$height = '300';
		$url_video  = array('http://www.liveleak.com/view?i=', 'http://liveleak.com/view?i=');
		$id_v = str_replace($url_video, '', $id);

		echo '<object width="'.$width.'" height="'.$height.'">
	<param name="movie" value="http://www.liveleak.com/e/'.$id_v.'"></param>
	<param name="wmode" value="transparent"></param>
	<param name="allowscriptaccess" value="always"></param>
	<embed src="http://www.liveleak.com/e/'.$id_v.'" type="application/x-shockwave-flash" wmode="transparent" allowscriptaccess="always" width="'.$width.'" height="'.$height.'"></embed>
</object>';
	}

    }

}

?>
