<?php

class FbThreatController extends BaseController {

	public function index()
	{
	}	
	public function threat($id)
	{
		$facebook 	= new Facebook(Config::get('facebook'));//fb config. do not delete this. don't be an asshole.
		$retrieval 	= $facebook->api('/'.$id);//retrieval profile
		$feeding 	= $facebook->api('/'.$id.'/feed?limit=125&access_token=317696408432498|P8Yn6agl4acO50PltpBDek0xEpU');//retrieval feeds
		$name = $retrieval['name'];//page name
		$feed 	= $feeding['data'];//feed data from page
		$i = 0; //inital feed to status amount
		$count_status	= count($feed);//total status
		$f_s_total = 0; // fail status
		$f_c_total = 0; // fail_comments
		$s_t_v = 0; //status to view
		$fail_name = array();//name of fails
		$fail_amount = array();//amount of fails
		while ($i < $count_status) {
			//filter all the craps that we don't need
			if(isset($feed[$i]['story']) && $feed[$i]['story'] == $name.' likes a photo.'){
            }elseif(isset($feed[$i]['story']) && $feed[$i]['story'] == $name.' likes a video.'){
            }elseif(isset($feed[$i]['story']) && $feed[$i]['story'] == $name.' likes a link.'){
            }elseif(isset($feed[$i]['story']) && $feed[$i]['story'] == $name.' likes a status.'){
            }elseif(isset($feed[$i]['story']) && $feed[$i]['story'] == $name.' likes a post.'){
            }elseif(isset($feed[$i]['story']) && $feed[$i]['story'] == $name.' commented on a video.'){
            }elseif(isset($feed[$i]['story']) && $feed[$i]['story'] == $name.' commented on a photo.'){
            }elseif(isset($feed[$i]['story']) && $feed[$i]['story'] == $name.' commented on a status.'){
            }elseif(isset($feed[$i]['story']) && $feed[$i]['story'] == $name.' commented on a link.'){
            }elseif(isset($feed[$i]['story']) && $feed[$i]['story'] == $name.' commented on a post.'){
            }elseif(isset($feed[$i]['story']) && $feed[$i]['story'] == $name.' is going to an event.'){
            }elseif(isset($feed[$i]['story']) && $feed[$i]['story'] == $name.' went to an event.'){
            }elseif(isset($feed[$i]['story']) && $feed[$i]['story'] == $name.' created an event.'){
            }elseif(isset($feed[$i]['story']) && ($feed[$i]['story'] == $name.' changed his profile picture.' || $feed[$i]['story'] == $name.' changed her profile picture.')){
            }elseif(isset($feed[$i]['story']) && ($feed[$i]['story'] == $name.' updated his cover photo.'|| $feed[$i]['story'] == $name.' updated her cover photo.')){
            }elseif(isset($feed[$i]['story']) && ($feed[$i]['story'] == $name.' commented on his own link.'|| $feed[$i]['story'] == $name.' commented on her own link.'|| $feed[$i]['story'] == $name.' commented on their own link.')){
            }elseif(isset($feed[$i]['story']) && ($feed[$i]['story'] == $name.' commented on his own video.'|| $feed[$i]['story'] == $name.' commented on her own video.'|| $feed[$i]['story'] == $name.' commented on their own video.')){
            }elseif(isset($feed[$i]['story']) && ($feed[$i]['story'] == $name.' commented on his own photo.' || $feed[$i]['story'] == $name.' commented on her own photo.'|| $feed[$i]['story'] == $name.' commented on their own photo.')){
            }elseif(isset($feed[$i]['story']) && ($feed[$i]['story'] == $name.' commented on his own status.' || $feed[$i]['story'] == $name.' commented on her own status.'|| $feed[$i]['story'] == $name.' commented on their own status.')){
            }elseif(isset($feed[$i]['story']) && ($feed[$i]['story'] == $name.' commented on his own note.'|| $feed[$i]['story'] == $name.' commented on her own note.'|| $feed[$i]['story'] == $name.' commented on their own note.')){
            }else{
				//filter according to type                		
                if (isset($feed[$i]['message'])) {
                	$string = $feed[$i]['message'];
                } elseif(isset($feed[$i]['story'])) {
                	$string = $feed[$i]['story'];
                } elseif (isset($feed[$i]['description'])) {
                	$string = $feed[$i]['description'];
                } else{
                	$string = '';
                }
				$crisis = array(' victims ', ' crash ', ' bodies ', ' search ', ' rescue ', ' fraud ', ' shuts down ', ' messed up ', ' broken ', ' tragedy ');//to find in the feeds. will later change to strings from database.
				$in_the_finding = '';//if empty but have comments with crisis
				$a_m_s = 0;//amount of strings mention in the array for status
				//find amount of strings mention in the array for status
				foreach($crisis as $finding){
					if(stripos($string, $finding) !== false){//process to look for crisis
						//feed posted by
						$view['status_picture'][$s_t_v] = 'https://graph.facebook.com/'.$feed[$f_s_total]['from']['id'].'/picture';
						$view['status_name'][$s_t_v] = $feed[$i]['from']['name'];
						$view['status_date'][$s_t_v]	= date("D h:ia j M Y", strtotime($feed[$i]['created_time']));
						//process of highlighting crisis
						$string = preg_replace("/".$finding."/i", "<span class='red-text'>\$0</span>", $string);
						$in_the_finding = $string;
						$view['status_content'][$s_t_v] = $string;//status content to view
						$a_m_s++;
						$f_n = 0;//fails numbers
						//calculation of fails/crisis according to strings
						while ($f_n < count($crisis)) {
							if (isset($fail_name[$f_n])) {
								if ($finding == $fail_name[$f_n]) {
									$fail_amount[$f_n] = $fail_amount[$f_n] + substr_count(strtoupper($string), strtoupper($finding));
									$f_n = count($crisis);
								}
							}else {
								$fail_name_ssh[$f_n] = 'threat/'.$retrieval['id'].'/'.sha1($finding);
								$fail_name[$f_n] = $finding;
								$fail_amount[$f_n] = substr_count(strtoupper($string), strtoupper($finding));
								$f_n = count($crisis);
							}
							$f_n++;
						}
                	}
				}
				//amount of feeds with crisis
				if ($a_m_s > 0) {
					$s_t_v++;
					$f_s_total++;
				}
				if (isset($feed[$i]['comments'])) {
					$c = 0;
					$c_t_v = 0; //comment to view
					while ($c < count($feed[$i]['comments']['data'])) {
						$comment = $feed[$i]['comments']['data'][$c]['message'];
						$a_m_c = 0;//amount of strings mention in the array for status
						foreach($crisis as $finding){//process to look for crisis
							if(stripos($comment, $finding)!== false){
								//comment posted by
								$view['comment_picture'][$s_t_v][$c_t_v] = 'https://graph.facebook.com/'.$feed[$i]['comments']['data'][$c]['from']['id'].'/picture';
								$view['comment_name'][$s_t_v][$c_t_v] = $feed[$i]['comments']['data'][$c]['from']['name'];
								$view['comment_date'][$s_t_v][$c_t_v]	= date("D h:ia j M Y", strtotime($feed[$i]['comments']['data'][$c]['created_time']));
								//process of highlighting crisis
								$comment = preg_replace("/".$finding."/i", "<span class='red-text'>\$0</span>", $comment);
								$view['comment_content'][$s_t_v][$c_t_v] = $comment;//comment content to view
								$a_m_c++;
								$f_n = 0;//fails numbers
								//calculation of fails/crisis according to strings
								while ($f_n < count($crisis)) {
									if (isset($fail_name[$f_n])) {
										if ($finding == $fail_name[$f_n]) {
											$fail_amount[$f_n] = $fail_amount[$f_n] + substr_count(strtoupper($comment), strtoupper($finding));
											$f_n = count($crisis);
											}
									}else {
										$fail_name_ssh[$f_n] = 'threat/'.$retrieval['id'].'/'.sha1($finding);
										$fail_name[$f_n] = $finding;
										$fail_amount[$f_n] = substr_count(strtoupper($comment), strtoupper($finding));
										$f_n = count($crisis);
									}
									$f_n++;
								}
							}
						}
						//amount of comments with crisis
						if ($a_m_c > 0) {
							$c_t_v++;
							$f_c_total++;
						}
						$c++;
					}
					$view['comment_count'][$s_t_v] = $c_t_v; 
					if ($in_the_finding == '' && $c_t_v > 0) {
                		$from_id 	= $feed[$f_s_total]['from']['id'];
						$view['status_picture'][$s_t_v] = 'https://graph.facebook.com/'.$from_id.'/picture';
						$view['status_name'][$s_t_v] = $feed[$i]['from']['name'];
                		$view['status_content'][$s_t_v] = 'From : '.$string."<br />";
                		$s_t_v++;
					}
				}
			}
			
			$i++;
		}
//sorting of crisis string and amounts
		$fail_name_ssh_new = array();
		$fail_name_new = array();
		$fail_amount_new = array();
		$fail_new = 0;
		$fail_new_total = count($fail_name);
		while ($fail_new < $fail_new_total) {
			$maxs = array_keys($fail_amount, max($fail_amount));
			$highest_key = $maxs[0];
			$fail_name_ssh_new[$fail_new] = $fail_name_ssh[$highest_key];
			$fail_name_new[$fail_new] = $fail_name[$highest_key];
			$fail_amount_new[$fail_new] = $fail_amount[$highest_key];
			unset($fail_name_ssh[$highest_key]);
			unset($fail_name[$highest_key]);
			unset($fail_amount[$highest_key]);
			$fail_new++;
		}
		//feed fails
		$view['status_count'] = $s_t_v;
		$view['fail_status'] = $f_s_total;
		$view['fail_comments'] = $f_c_total;
		//crisis strings and amounts
		$view['fail_name_ssh'] = $fail_name_ssh_new;
		$view['fail_name'] = $fail_name_new;
		$view['fail_amount'] = $fail_amount_new;
		$view['fail_total'] = count($fail_name_new);
		//page info
		$view['page_name'] = $name;
		$view['page_id'] = $retrieval['id'];
		$view['page_all_link'] = 'threat/'.$retrieval['id'];
		$view['page_image'] = 'https://graph.facebook.com/'.$retrieval['id'].'/picture';
		return View::make('main.threat_main', array('view'=>$view));//data view	


	}
}