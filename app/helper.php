<?php
//common functions here
use Carbon\Carbon;
use App\Models\Email_settings;
use App\Models\EmailManagement;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Lang;

//Change date format
    function change_date_format($date, $fromFormat, $toFormat){
		$data = Carbon::createFromFormat($fromFormat, $date)->format($toFormat);
        return $data;
    }
    function website_date_format(){
        return 'd/m/Y';
    }
//get website settings
    function web_settings(){
		$data = array(
			'logo' => url('images/logo.png'),
			'screen_name' => config('app.name', 'Laravel'),
			'linkedin' => 'https://linkedin.com',
			'linkedin_image' => url('images/linkedin.png'),
			'instagram' => 'https://instagram.com',
			'instagram_image' => url('images/instagram.png'),
			'year' => date('Y'),
		);
        return $data;
    }
//get email template
	function get_email($id){
		$arr = EmailManagement::where('id',$id)
				->first();
		return $arr;
	}
//Email Configuration
	function set_email_configuration(){
		$settings = Email_settings::find(1);
		if($settings->smtp_security == 1){
			$encryption = 'tls';
		}else if($settings->smtp_security == 2){
			$encryption = 'ssl';
		}else{
			$encryption = '';
		}
		$config = array(
			'driver'     =>     'smtp',
			'host'       =>     isset($settings->smtp_host) ? $settings->smtp_host : '',
			'port'       =>     isset($settings->smpt_port) ? $settings->smpt_port : '',
			'username'   =>     isset($settings->smtp_user) ? $settings->smtp_user : '',
			'password'   =>     isset($settings->smtp_password) ? $settings->smtp_password : '',
			'encryption' =>     $encryption,
			'from'       =>     array('address' => isset($settings->email_from_address) ? $settings->email_from_address : '', 'name' => isset($settings->emails_from_name) ? $settings->emails_from_name : ''),
		);
		Config::set('mail', $config);	
    }	
//send email template
	function send_email($data){
		// toEmails = Receiver Email, bccEmails = Bcc Receiver, ccEmails = Cc Receiver, files = For attatchment files.
		$data['body'] = str_replace(array("[SCREEN_NAME]", "[YEAR]"), array(config('app.name', 'Laravel'),date('Y')), $data['body']);
		set_email_configuration();
        Mail::send('email-setting.sendmail', $data, function($message)use($data) {
            $message->to($data["toEmails"]);
			if(isset($data['bccEmails']) && count($data['bccEmails']) > 0){
				$message->bcc($data["bccEmails"]);
			}
			if(isset($data['ccEmails']) && count($data['ccEmails']) > 0){
				$message->cc($data["ccEmails"]);
			}
            $message->subject($data["subject"]);
			if(isset($data['files']) && count($data['files']) > 0){
				foreach ($data['files'] as $file){
					$message->attach($file);
				}
            }
        });
	}
//uc all text
    function uc_all($data){
        return strtoupper($data);
    }
// this function fetch dynamic data of cms page
    function getCms($id){
        $cms_data = Cms::where('id', $id)->first();
        return $cms_data;
    }
//this function making slug 
    function slug_create($text, string $divider = '-'){
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        // trim
        $text = trim($text, $divider);
        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);
        // lowercase
        $text = strtolower($text);
        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    } 
    function link_create($text, string $divider = '-'){
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        // trim
        $text = trim($text, $divider);
        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);
        // lowercase
        $text = strtolower($text);
        if (empty($text)) {
            return '';
        }
        return $text;
    }
//Image upload
	function uploadResizeImage($details_path='', $dest_path='', $dest_thumb_path='', $width='', $height='', $takeimage){
		
		/*if($oldimg!='')
		{
		  $image_path = $dest_path.$oldimg;
		  //echo $image_path; die;
		  if(File::isDirectory($image_path)){
			  unlink($image_path);
		  }
		  $image_thum_path = $dest_thumb_path.$oldimg;
		  if(File::isDirectory($image_thum_path)){
			  unlink($image_thum_path);
		  }
		}*/
		
		$paths = [
			'image_path' => $dest_path,
			'thumbnail_path' => $dest_thumb_path
		];
		
		foreach($paths as $key => $path) {
			if(!File::isDirectory($path)){
				File::makeDirectory($path, 0777, true, true);
			}
		}
		
		$imageName = time().'-'.generateImageName($takeimage->getClientOriginalName());
		
		// create image manager with desired driver
		$manager = new ImageManager(new Driver());
		
		$original_img = $img = $manager->read($takeimage);
		$img->save($dest_path.$imageName);
		// $img = $img->resize($width,$height);
		$img->resize($width, $height, function ($constraint) {
			// $constraint->aspectRatio();
		});
		$img->save($dest_thumb_path.$imageName);
		if($details_path != ''){
			if(!File::isDirectory($details_path)){
				File::makeDirectory($details_path, 0777, true, true);
			}
			$details_img = $original_img;
			$details_img->resize(750, 420, function ($constraint) {
				// $constraint->aspectRatio();
			});
			$details_img->save($details_path.$imageName);
		}
		
		return $imageName;
	}
//Replace special character with iconv (like - schönenlandm => schonenlandm)
	function replace_special_characters_iconv($string) {
		// Convert special characters to ASCII
		return iconv('UTF-8', 'ASCII//TRANSLIT', $string);
	}
	
	function generate_unique_id($model, $column, $type, $prefix = ''){
		// Get the last record
		if($type == 4){
			$lastRecord = $model::orderBy('id', 'desc')->first();
		}else{
			$lastRecord = $model::orderBy('id', 'desc')->where('move_to', $type)->first();
		}
		
		// Check if there is any previous record
		if (!$lastRecord) {
			// If no record exists, start with L00001
			$newId = $prefix . str_pad(1, 3, '0', STR_PAD_LEFT);
		} else {
			// Extract numeric part from the last ID (e.g., L00001 -> 00001)
			$lastIdNumber = intval(str_replace($prefix, '', $lastRecord->$column));

			// Increment the numeric part by 1
			$newIdNumber = $lastIdNumber + 1;

			// Create new ID with padded zeros (e.g., 1 -> 00001)
			$newId = $prefix . str_pad($newIdNumber, 3, '0', STR_PAD_LEFT);
		}

		return $newId;  // Return the new unique ID (e.g., L00002)
	} 
	function get_customer_email($id=''){
		$arr = EmailManagement::where('id',$id)
				->first();
		return $arr;
	}
	function generateImageName($string) {
	   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

	   return preg_replace('/[^A-Za-z0-9\-.]/', '', $string); // Removes special chars.
	}
?>