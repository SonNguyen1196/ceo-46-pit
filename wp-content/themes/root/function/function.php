<?php
	$upload_folder= wp_upload_dir();
	define('THEME_URI', get_template_directory_uri());
	define('AJAX_URI', admin_url('admin-ajax.php'));
	define('UPLOAD_URI', $upload_folder['baseurl']);
	define('UPLOAD_DIR', $upload_folder['basedir']);
	define('MYID',get_current_user_id());
		
	add_theme_support( 'post-thumbnails' );
	
	require get_template_directory() . '/function/filters.php';
	require get_template_directory() . '/function/actions.php';
	require get_template_directory() . '/function/ajaxs.php';
	require get_template_directory() . '/function/shortcodes.php';
	require get_template_directory() . '/function/cropt.php';
	require get_template_directory() . '/function/bootnav-walker.php';
	/*------------------all function here------------*/
	function hr_cropt($media_id,$w,$h){
		if(is_numeric($w) and is_numeric($h)){
			$url = wp_get_attachment_url($media_id);
			$ext = substr(strrchr($url, '/'),1);
			$cropt=UPLOAD_URI.'/cropt/';
			if($url=="") return $url;
			if(file_exists($cropt.$media_id."_".$w."x".$h."_".$ext)){	
				$url=$cropt.$media_id."_".$w."x".$h."_".$ext;
			}
			else{
				$resizeObj = new resize($url);
				$resizeObj -> resizeImage($w,$h, "crop");
				$resizeObj -> saveImage(UPLOAD_DIR.'/cropt/'.$media_id."_".$w."x".$h."_".$ext, 100);
				$url=$cropt.$media_id."_".$w."x".$h."_".$ext;
			}
			return $url;
		}
		return "";
	}
	
	/** unsing str **/
	function hr_unsign($str){
       $arrs = array(
           'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
           'd'=>'đ',
           'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
           'i'=>'í|ì|ỉ|ĩ|ị',
           'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
           'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
           'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
           'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
           'D'=>'Đ',
           'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
           'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
           'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
           'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
           'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
       );
      foreach($arrs as $val=>$name){
           $str = preg_replace("/($name)/i", $val, $str);
      }
     return $str;
   }
?>