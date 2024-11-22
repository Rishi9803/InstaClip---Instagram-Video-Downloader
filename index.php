<?php
require_once './application/Connection.php';
/*
 *---------------------------------------------------------------
 * SYSTEM DIRECTORY NAME
 *---------------------------------------------------------------
 *
 * This variable must contain the name of your "system" directory.
 * Set the path if it is not in the same directory as this file.
 */
	$system_path = './application/system';
/*
 *---------------------------------------------------------------
 * APPLICATION DIRECTORY NAME
 *---------------------------------------------------------------
 *
 * If you want this front controller to use a different "application"
 * directory than the default one you can set its name here. The directory
 * can also be renamed or relocated anywhere on your server. If you do,
 * use an absolute (full) server path.
 * For more info please see the user guide:
 *
 *
 * NO TRAILING SLASH!
 */
	$application_folder = 'application';
/*
 * -------------------------------------------------------------------
 *  Now that we know the path, set the main path constants
 * -------------------------------------------------------------------
 */
// The name of THIS file
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

// Path to the system directory
define('BASEPATH', $system_path);
// UPDATE 
$fien_update = 'update.php';
if (file_exists($fien_update)) {
	require($fien_update);
}


//-- Homepage
	$page = 'home';
//--
	if (isset($_GET['url'])) {
		$page = $_GET['url'];
	}
//--
	// Is the system path correct?
	if ( ! is_dir($system_path))
	{
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'Your system folder path does not appear to be set correctly. Please open the following file and correct this: '.pathinfo(__FILE__, PATHINFO_BASENAME);
		exit(3); // EXIT_CONFIG
	}
//--
if (is_dir($application_folder)) {
	//--
	$load->true_eden_panel = false;
	//--
	if (file_exists("./pages/$page/index.php")) {
		require_once("./pages/$page/index.php");
	}
	if (empty($load->content)) {
	   require_once("./application/includes/error_system/404.php");
	}
	#--
	//-- View
	$final_content = PHP_LoadPage('open_theme', array(
		'CONTAINER_TITLE' 		=> mb_substr($load->title, 0, 400, "UTF-8"),
		'CONTAINER_NAME' 		=> $config['name_site'],
		'CONTAINER_KEYWORDS' 	=> empty($load->keywords)?$load->config->keyword:$load->keywords,
		'CONTAINER_CONTENT' 	=> $load->content,
		'CONTAINER_DESC' 		=> mb_substr($load->description, 0, 400, "UTF-8"),
		'CONTAINER_IMAGE' 		=> empty($load->image_og)?$config['theme_url'].'/img/image_meta.png':$load->image_og,
		'CONTAINER_URL' 		=> mb_substr($load->actual_link, 0, 400, "UTF-8"),
		'MAIN_URL' 				=> $load->actual_link,
		'HEADER_LAYOUT' 		=> '',
		'ADS_ONE_CODE' 			=> htmlspecialchars_decode($load->config->ads_one),
		'ADS_TWO_CODE' 			=> htmlspecialchars_decode($load->config->ads_two),
		'EXTRA_TOP' 			=> ($load->true_eden_panel)?PHP_LoadPage('template/eden_themes/head_link'):PHP_LoadPage('extra-top/index'),
		'EXTRA_BOTTOM' 			=> ($load->true_eden_panel)?PHP_LoadPage('template/eden_themes/bottom'):PHP_LoadPage('extra-bottom/index'),
		'FOOTER_LAYOUT' 		=> '',
		'INCLUDE_HEADER' 		=> PHP_LoadPage('template/header',array(
			'DATA_FACEBOOK' 		=> ($load->config->facebook == null) ? '' : '<li><a href="'.$load->config->facebook.'"><span><i class="icon_red_i_facebook fab fa-facebook-square"></i> facebook</span></a></li>' ,
			'DATA_TWITTER' 			=> ($load->config->twitter == null) ? '' : '<li><a href="'.$load->config->twitter.'"><span><i class="icon_red_i_twitter fab fa-twitter-square"></i> twitter</span></a></li>' ,
			'DATA_EMAIL' 			=> ($load->config->email_web == null) ? '' : '<li><span><i class="icon_red_i_mail fas fa-envelope-square"></i> Contact Us</span></li>' ,
			'ME_USER_ID' 			=> ''
		)),
		'INCLUDE_FOOTER' 		=> PHP_LoadPage('template/footer',array()),
			'NAME_SITE' 			=> PHP_Secure($load->config->name).' ',
			'DATA_YEAR' 			=> date('Y')
	));
	echo $final_content;
}else{
	header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
	echo 'Your application folder path does not appear to be set correctly. Please open the following file and correct this: '.SELF;
	exit(3); // EXIT_CONFIG
} 
$db->disconnect();
unset($load);
ob_flush();
?>

<h3>Useful Links:</h3>
        <ul>
            <li><a href="https://www.reddit.com/r/Instagramediting/comments/1g3dcq9/why_instagram_will_be_a_game_changer_in_future/" target="_blank">Download Instagram Video</a></li>
            <li><a href="https://plaza.rakuten.co.jp/isntaclip/diary/202411220000/" target="_blank">Download Instagram Video and Images</a></li>
            <li><a href="https://music.amazon.com/podcasts/ea2d9666-ed99-4544-8f5f-30a7fe911b79/episodes/93dc4201-4436-41d5-b131-3d6a44849361/ideal-media-5-10-instagram-reels-hacks-every-channel-should-be-using" target="_blank">Instagram Video Downloader</a></li>
            <li><a href="https://sites.google.com/view/instaclip-app/home" target="_blank">Instagram video download</a></li>
            <li><a href="https://instaclipapp.wordpress.com/?_gl=1*886wrj*_gcl_au*MTQ1NzQ3Mzg5My4xNzI4OTAwMDc4" target="_blank">Instagram Video Download</a></li>
            <li><a href="https://groups.google.com/g/instagram-video-download/c/rcis12VclD0" target="_blank">instaclip</a></li>
            <li><a href="https://github.com/Rishi9803/InstaClip---Instagram-Video-Downloader/tree/main" target="_blank">Download Instagram Video</a></li>
            <li><a href="https://medium.com/@idealmedia2022/how-to-download-instagram-facebook-and-youtube-videos-online-f04f8c577895" target="_blank">Download Instagram Video and Images</a></li>
            <li><a href="https://vimeo.com/1024647521/150d22106a?ts=0&share=copy" target="_blank">Instagram Video Downloader</a></li>
            <li><a href="https://www.slideshare.net/slideshow/download-instagram-videos-pdf-how-to-download-instagram-videos/272404118" target="_blank">Instagram video download</a></li>
            <li><a href="https://in.pinterest.com/pin/911204937104249712/" target="_blank">Instagram Video Download</a></li>
            <li><a href="https://instadlapp.blogspot.com/2024/10/download-instagram-video.html" target="_blank">instaclip</a></li>
            <li><a href="https://www.tumblr.com/idealmedia2022/764309638242009088/how-to-download-instagram-videos?source=share" target="_blank">Download Instagram Video</a></li>
            <li><a href="https://issuu.com/idealmedia2022/docs/download_instagram_videos?cta=post-publish-view-live" target="_blank">Download Instagram Video and Images</a></li>
            <li><a href="https://instaclip.weebly.com/" target="_blank">Instagram Video Downloader</a></li>
            <li><a href="https://profamarun.wixsite.com/njqyvq/forum/general-discussions/unmatched-marketing-assignment-help-from-myassignmenthelpau" target="_blank">Instagram video download</a></li>
            <li><a href="https://about.me/rishich/getstarted" target="_blank">Instagram Video Download</a></li>
            <li><a href="https://idealmedia2022.wixstudio.io/instaclip-app" target="_blank">instaclip</a></li>
            <li><a href="https://unsplash.com/@instaclip" target="_blank">Download Instagram Video</a></li>
            <li><a href="https://ameblo.jp/instaclip/entry-12872789365.html" target="_blank">Download Instagram Video and Images</a></li>
            <li><a href="https://www.twitch.tv/instaclipapp/about" target="_blank">Instagram Video Downloader</a></li>
            <li><a href="https://www.behance.net/gallery/204306547/wwwAikitfindercom" target="_blank">Instagram video download</a></li>
            <li><a href="https://www.diigo.com/profile/idealmedia2022" target="_blank">Instagram Video Download</a></li>
            <li><a href="https://idealmedia2022.livejournal.com/431.html" target="_blank">instaclip</a></li>
            <li><a href="https://lite.evernote.com/note/bd979e03-68a9-3209-43d5-81abfeacdc83" target="_blank">Download Instagram Video</a></li>
            <li><a href="https://www.instructables.com/Download-Instagram-Video-and-Images/" target="_blank">Download Instagram Video and Images</a></li>
            <li><a href="https://foursquare.com/v/instaclip/67145d5cf966550758a17f9c" target="_blank">Instagram Video Downloader</a></li>
            <li><a href="https://500px.com/photo/1102454028/download-instagram-video-and-images-by-idealmedia-media" target="_blank">Instagram video download</a></li>
            <li><a href="https://substack.com/@instaclip?" target="_blank">Instagram Video Download</a></li>
            <li><a href="https://rankblend-46773470.hubspotpagebuilder.com/instaclip" target="_blank">instaclip</a></li>
            <li><a href="https://rankblend-46773470.hubspotpagebuilder.com/en-us/-1" target="_blank">Download Instagram Video</a></li>
            <li><a href="https://dribbble.com/idealmedia2022/about" target="_blank">Download Instagram Video and Images</a></li>
            <li><a href="https://flipboard.com/@Idealmedia2024/-instaclip---instagram-video-downloader-/a--Idf94EZQqq1D0frG-0OIw%3Aa%3A4103468702-dd92178f05%2Finstaclip.app" target="_blank">Instagram Video Downloader</a></li>
            <li><a href="https://u.osu.edu/iphone/fsdfsdff/" target="_blank">Instagram video download</a></li>
            <li><a href="https://www.bly.com/blog/online-marketing/boost-your-ranking-with-these-seo-hacks/#comment-1820678" target="_blank">Instagram Video Download</a></li>
            <li><a href="https://www.crunchbase.com/organization/instaclip" target="_blank">instaclip</a></li>
            <li><a href="https://www.ameba.jp/profile/general/instaclip/" target="_blank">Download Instagram Video</a></li>
            <li><a href="https://giphy.com/channel/Instaclip" target="_blank">Download Instagram Video and Images</a></li>
            <li><a href="https://t.me/s/instaclipapp" target="_blank">Instagram Video Downloader</a></li>
            <li><a href="https://instaclipapp.mystrikingly.com/" target="_blank">Instagram video download</a></li>
            <li><a href="https://heylink.me/idealmedia2022/" target="_blank">Instagram Video Download</a></li>
            <li><a href="https://account.goodfirms.co/manage/organisation/listing" target="_blank">instaclip</a></li>
            <li><a href="https://wellfound.com/recruit/jobs/3138876" target="_blank">Download Instagram Video</a></li>
            <li><a href="https://community.windy.com/user/idealmedia" target="_blank">Download Instagram Video and Images</a></li>
            <li><a href="https://linktr.ee/instaclip.app" target="_blank">Instagram Video Downloader</a></li>
            <li><a href="https://myanimelist.net/profile/intaclipinsta" target="_blank">Instagram video download</a></li>
            <li><a href="https://lichess.org/@/instaclip" target="_blank">Instagram Video Download</a></li>
            <li><a href="https://www.wishlistr.com/instaclipapp/" target="_blank">instaclip</a></li>
            <li><a href="https://lnk.bio/instaclip" target="_blank">Download Instagram Video</a></li>
            <li><a href="https://www.indiehackers.com/product/instaclip" target="_blank">Download Instagram Video and Images</a></li>
            <li><a href="https://linkbio.co/instaclip" target="_blank">Instagram Video Downloader</a></li>
            <li><a href="https://www.blogger.com/profile/12371406445685437590" target="_blank">Instagram video download</a></li>
            <li><a href="https://experiment.com/users/rrishikesh" target="_blank">Instagram Video Download</a></li>
            <li><a href="https://bit.ly/m/instaclip" target="_blank">instaclip</a></li>
            <li><a href="https://website-review.php8developer.com/fi/www/instaclip.app" target="_blank">Download Instagram Video</a></li>
            <li><a href="https://sites.stedwards.edu/culf131810sp2016-wnieto/2016/03/07/blog-4-zitkala-sa/" target="_blank">Download Instagram Video and Images</a></li>
            <li><a href="https://myspace.com/removebgai" target="_blank">Instagram Video Downloader</a></li>
            <li><a href="https://instaclip.my.canva.site/" target="_blank">Instagram video download</a></li>
            <li><a href="https://blogg.ng.se/amydiamondpodden/2018/11/min-helg-dumpad" target="_blank">Instagram Video Download</a></li>
            <li><a href="https://leetcode.com/u/Instaclip/" target="_blank">instaclip</a></li>
            <li><a href="https://app.roll20.net/users/15157184/instaclip" target="_blank">Download Instagram Video</a></li>
            <li><a href="https://www.gta5-mods.com/users/instaclip" target="_blank">Download Instagram Video and Images</a></li>
            <li><a href="https://removebgai-ai.webflow.io/" target="_blank">Instagram Video Downloader</a></li>
            <li><a href="https://smart.bio/instaclip/" target="_blank">Instagram video download</a></li>
            <li><a href="https://cutshort.io/company/instaclipapp-65-8uiTX2Om" target="_blank">Instagram Video Download</a></li>
            <li><a href="https://coub.com/instaclip.app" target="_blank">instaclip</a></li>
            <li><a href="https://starity.hu/profil/505561-instaclip/" target="_blank">Download Instagram Video</a></li>
            <li><a href="https://my.omsystem.com/members/instaclip" target="_blank">Download Instagram Video and Images</a></li>
            <li><a href="https://www.provenexpert.com/en-us/instaclip/" target="_blank">Instagram Video Downloader</a></li>
            <li><a href="https://telegra.ph/InstaClip-is-a-free-tool-that-supports-users-to-download-videos-on-instagram-Instagram-Photo-Downloader-from-Instaclip-allows-yo-11-07" target="_blank">Instagram video download</a></li>
            <li><a href="https://telegra.ph/Intaclipapp-11-07" target="_blank">Instagram Video Download</a></li>
            <li><a href="https://simple.bio/instaclip" target="_blank">instaclip</a></li>
        </ul>
