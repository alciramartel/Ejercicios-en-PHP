<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class cropimage extends CI_Controller {
	var $upload_dir; 				// The directory for the images to be saved in
	var $upload_path;
	var $large_image_prefix;
	var $thumb_image_prefix;
	var $large_image_name;
	var $thumb_image_name;
	var $max_file;
	var $max_width;
	var $thumb_width;
	var $thumb_height;
	var $allowed_image_types;
	var $allowed_image_ext;
	var $image_ext;
	
	function __construct() 
	{
		parent::__construct();
		$this->load->model('datos_model');
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('url','form'));
		$this->load->database('default');
		
		if (!isset($_SESSION['random_key']) || strlen($_SESSION['random_key'])==0){
		    $_SESSION['random_key'] = strtotime(date('Y-m-d H:i:s')); //assign the timestamp to the session variable
			$_SESSION['user_file_ext']= "";
		}
		$this->upload_dir = "assets/uploads/crops";
		$this->upload_path = $this->upload_dir."/";
		$this->large_image_prefix = "resize_";
		$this->thumb_image_prefix = "thumbnail_";
		$this->large_image_name = $this->large_image_prefix.$_SESSION['random_key'];
		$this->thumb_image_name = $this->thumb_image_prefix.$_SESSION['random_key'];
		$this->max_file = "3";
		$this->max_width = "500";
		$this->thumb_width = "150";
		$this->thumb_height = "150";
		$this->allowed_image_types = array('image/pjpeg'=>"jpg",'image/jpeg'=>"jpg",'image/jpg'=>"jpg",'image/png'=>"png",'image/x-png'=>"png",'image/gif'=>"gif");
		$this->allowed_image_ext = array_unique($this->allowed_image_types);
		$this->image_ext = "";
		foreach ($this->allowed_image_ext as $mime_type => $ext) {
		    $this->image_ext.= strtoupper($ext)." ";
		}

		if($this->session->userdata('usuario') == null)
			redirect(base_url());
	}
 	
	public function index()
	{
		if(!is_dir($this->upload_dir)){
			mkdir($this->upload_dir, 0777);
			chmod($this->upload_dir, 0777);
		}
        $this->load->view('header_view');
        $this->load->view('cropimage_view');
        $this->load->view('footer_view');
	}

	public function uploadImage(){
		$file_name = $_POST['name'];
		$file_size = $_POST['size'];
		$file_type = $_POST['type'];
		$file = $_POST['file'];
		$file_ext = strtolower(substr($file_name, strrpos($file_name, '.') + 1));
		
		if((!empty($file))) {
			foreach ($this->allowed_image_types as $mime_type => $ext) {
				//loop through the specified image types and if they match the extension then break out
				//everything is ok so go and check file size
				if($file_ext == $ext && $file_type == $mime_type){
					$error = "";
					break;
				}else{
					$error = "Only <strong>".$this->image_ext."</strong> images accepted for upload<br />";
				}
			}
			//check if the file size is above the allowed limit
			if ($file_size > ($this->max_file*1048576)) {
				$error.= "Images must be under ".$this->max_file."MB in size";
			}
			
		}else{
			$error= "Select an image for upload";
		}

		$resp = array();
		//Everything is ok, so we can upload the image.
		if (strlen($error)>0){
			$resp = array(
				"Codigo" => 100,
				"imagen" => "",
				"Mensaje" => $error,
				"width" => 0,
				"height" => 0
			);			
		}
		else {			
			$filedir = $this->upload_path.$file_name;
			$fp = fopen($filedir,'w'); //Prepends timestamp to prevent overwriting
			fwrite($fp, base64_decode($file));
			fclose($fp);
			
			$width = $this->getWidth($filedir);
			$height = $this->getHeight($filedir);
			//Scale the image if it is greater than the width set above
			if ($width > $this->max_width){
				$scale = $this->max_width/$width;
				$uploaded = $this->resizeImage($filedir,$width,$height,$scale);
			}else{
				$scale = 1;
				$uploaded = $this->resizeImage($filedir,$width,$height,$scale);
			}

			$resp = array(
				"Codigo" => 200,
				"Imagen" => base_url().$filedir,
				"Mensaje" => "OK",
				"Width" => $this->getWidth($filedir),
				"Height" => $this->getHeight($filedir)
			);
		}
		echo json_encode($resp);
	}

	public function cropImage(){
		try{
			$x1 = $_POST["x1"];
			$y1 = $_POST["y1"];
			$x2 = $_POST["x2"];
			$y2 = $_POST["y2"];
			$w = $_POST["w"];
			$h = $_POST["h"];
			$file_name = $_POST['name'];
			$file_size = $_POST['size'];
			$file_type = $_POST['type'];
			$file = $_POST['file'];
			$ext = str_replace("image/", "", $file_type);
			$filepath = $this->upload_path.$file_name;
			if(!file_exists($filepath)){
				$fp = fopen($filepath,'w'); //Prepends timestamp to prevent overwriting
				fwrite($fp, base64_decode($file));
				fclose($fp);
				
				$width = $this->getWidth($filepath);
				$height = $this->getHeight($filepath);
				//Scale the image if it is greater than the width set above
				if ($width > $this->max_width){
					$scale = $this->max_width/$width;
					$uploaded = $this->resizeImage($filepath,$width,$height,$scale);
				}else{
					$scale = 1;
					$uploaded = $this->resizeImage($filepath,$width,$height,$scale);
				}
			}
			//Scale the image to the thumb_width set above
			$scale = $this->thumb_width/$w;
			$name = $this->thumb_image_prefix.strtotime(date('Y-m-d H:i:s')).'.'.$ext;
			$thumbpath = $this->upload_path.$name;
			$cropped = $this->resizeThumbnailImage($thumbpath, $filepath, $w, $h, $x1, $y1, $scale);
			$resp = array(
				"Codigo" => 200,
				"Imagen" => base_url().$filepath,
				"Mensaje" => $cropped,
				"Nombre" => $name,
				"Width" => $this->getWidth($filepath),
				"Height" => $this->getHeight($filepath),
				"Url" => base_url().$thumbpath
			);
		}
		catch (Exception $e){
			$resp = array(
				"Codigo" => 500,
				"imagen" => "",
				"Mensaje" => $e->getMessage(),
				"width" => 0,
				"height" => 0
			);		
		}
		echo json_encode($resp);
	}

	public function readImages(){
		$path    = $this->upload_dir;
		$files = scandir($path);
		$files = array_diff(scandir($path), array('.', '..'));
		$imagenes = array();
		foreach ($files as $i => $value) {
		 	$imagenes[] = array(
		 		"Nombre" => $value,
		 		"Url" => base_url().$this->upload_path.$value
		 	);
		 } 
		echo json_encode($imagenes);
	}

	public function deleteImage(){
		$file_name = $_POST["file"];
		$filepath = $this->upload_path.$file_name;
		if(file_exists($filepath)){
			unlink($filepath);
		}
		echo "imagen eliminado";
	}

	function getHeight($image) {
		$size = getimagesize($image);
		$height = $size[1];
		return $height;
	}

	function getWidth($image) {
		$size = getimagesize($image);
		$width = $size[0];
		return $width;
	}

	function resizeImage($image, $width, $height, $scale) {
		list($imagewidth, $imageheight, $imageType) = getimagesize($image);
		$imageType = image_type_to_mime_type($imageType);
		$newImageWidth = ceil($width * $scale);
		$newImageHeight = ceil($height * $scale);
		$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
		switch($imageType) {
			case "image/gif":
				$source=imagecreatefromgif($image); 
				break;
		    case "image/pjpeg":
			case "image/jpeg":
			case "image/jpg":
				$source=imagecreatefromjpeg($image); 
				break;
		    case "image/png":
			case "image/x-png":
				$source=imagecreatefrompng($image); 
				break;
	  	}
		imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
		
		switch($imageType) {
			case "image/gif":
		  		imagegif($newImage,$image); 
				break;
	      	case "image/pjpeg":
			case "image/jpeg":
			case "image/jpg":
		  		imagejpeg($newImage,$image,90); 
				break;
			case "image/png":
			case "image/x-png":
				imagepng($newImage,$image);  
				break;
	    }
		
		chmod($image, 0777);
		return $image;
	}

	function resizeThumbnailImage($thumb_image_name, $image, $width, $height, $start_width, $start_height, $scale){
		list($imagewidth, $imageheight, $imageType) = getimagesize($image);
		$imageType = image_type_to_mime_type($imageType);
		
		$newImageWidth = ceil($width * $scale);
		$newImageHeight = ceil($height * $scale);
		$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
		switch($imageType) {
			case "image/gif":
				$source=imagecreatefromgif($image); 
				break;
		    case "image/pjpeg":
			case "image/jpeg":
			case "image/jpg":
				$source=imagecreatefromjpeg($image); 
				break;
		    case "image/png":
			case "image/x-png":
				$source=imagecreatefrompng($image); 
				break;
	  	}
		imagecopyresampled($newImage,$source,0,0,$start_width,$start_height,$newImageWidth,$newImageHeight,$width,$height);
		switch($imageType) {
			case "image/gif":
		  		imagegif($newImage,$thumb_image_name); 
				break;
	      	case "image/pjpeg":
			case "image/jpeg":
			case "image/jpg":
		  		imagejpeg($newImage,$thumb_image_name,90); 
				break;
			case "image/png":
			case "image/x-png":
				imagepng($newImage,$thumb_image_name);  
				break;
	    }
		chmod($thumb_image_name, 0777);
		return $thumb_image_name;
	}
}
?>