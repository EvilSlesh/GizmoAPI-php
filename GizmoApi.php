<?php
//////////////////////////////////////////////
//Fast data retrieval using ready functions.
//////////////////////////////////////////////

//UserSession api functions

//Description : Returns active user sessions list.
function ga_active_sessions($user,$password,$ip)
{
    $url = 'http://'.$user.':'.$password.'@'.$ip.'/api/usersession/active';
    $get_content =  file_get_contents($url);
    $decode_active_session = json_decode($get_content,true);
    return $decode_active_session;
}


//Description : Returns active user sessions info list.
function ga_active_sessions_info($user,$password,$ip)
{
    $url = 'http://'.$user.':'.$password.'@'.$ip.'/api/usersession/activeinfo';
    $get_content =  file_get_contents($url);
    $decode_active_session_info = json_decode($get_content,true);
    return $decode_active_session_info;
}

//Description: Returns user sessions list.
function ga_all_sessions($user,$password,$ip,$date)
{
    $url = 'http://'.$user.':'.$password.'@'.$ip.'/api/usersession'; 
    $get_content = file_get_contents($url);
    $decode_user_sessions = json_decode($get_content,true);
    if($date == 'today')
    {
        $date = strtotime(date('d.m.Y'));
    }
    elseif($date == 'hour')
    {
        $date = strtotime(date('d.m.Y H:i')-3600);
    }
    elseif($date == 'minute')
    {
        $date = strtotime(date('d.m.Y H:i')-60);
    }
    elseif($date == 'day')
    {
        $date = strtotime(date('d.m.Y H:i')-86400);
    }
    elseif(is_numeric($date))
    {
        $date = strtotime($data);
    }
    elseif($date == 'all')
    {
        $date = 1;
    }
    foreach ($decode_user_sessions as $key => $users)   
    {
        if(strtotime(explode("T",$users['createdTime'])[0].mb_strimwidth(explode("T",$users['createdTime'])[1],0,8))>=$date)
        {
            $content[$key] = [
                "userId" => $users['userId'],
                "hostId" => $users['hostId'],
                "state" => $users['state'],
                "span" => $users['span'],
                "billedSpan" => $users['billedSpan'],
                "pendTime" => $users['pendTime'],
                "pendSpan" => $users['pendSpan'],
                "endTime" => $users['endTime'],
                "slot" => $users['userId'],
                "pendSpanTotal" => $users['pendSpanTotal'],
                "pauseSpan" => $users['pauseSpan'],
                "pauseSpanTotal" => $users['pauseSpanTotal'],
                "createdById" => $users['createdById'],
                "createdTime" => $users['createdTime'],
                "id" => $users['id'],
                "pauseSpanTotal" => $users['pauseSpanTotal'],
              ];
        }
    }
    return $content;
}

//App api functions

//Description : Gets apps
function ga_app($user,$password,$ip)
{
    $url = 'http://'.$user.':'.$password.'@'.$ip.'/api/app';
    $get_content =  file_get_contents($url);
    $decode = json_decode($get_content,true);
    return $decode;
}


//Description : Gets app image.
function ga_app_image($user,$password,$ip,$id)
{
    $url = 'http://'.$user.':'.$password.'@'.$ip.'/api/app/'.$id.'/image';
    $get =  file_get_contents($url);
    $decode = 'src="data:image/png;base64,'.json_decode($get,true).'"';
    return $decode;
}

//Description : Gets app titles
function ga_app_titles($user,$password,$ip)
{
    $url = 'http://'.$user.':'.$password.'@'.$ip.'/api/app/titles';
    $get_content =  file_get_contents($url);
    $decode = json_decode($get_content,true);
    return $decode;

}

//Description : Gets app rating
function ga_app_rating($user,$password,$ip,$appid)
{
    $url = 'http://'.$user.':'.$password.'@'.$ip.'/api/app/'.$appid.'/rating';
    $get_content =  file_get_contents($url);
    $decode = json_decode($get_content,true);
    return $decode;
}


//Description : Gets app average rating
function ga_app_average_rating($user,$password,$ip,$appid)
{
    $url = 'http://'.$user.':'.$password.'@'.$ip.'/api/app/'.$appid.'/rating/average';
    $get_content =  file_get_contents($url);
    $decode = json_decode($get_content,true);
    return $decode;
}


//Description : Gets app rates count
function ga_app_count_rates($user,$password,$ip,$appid)
{
    $url = 'http://'.$user.':'.$password.'@'.$ip.'/api/app/'.$appid.'/rating/count';
    $get_content =  file_get_contents($url);
    $decode = json_decode($get_content,true);
    return $decode;
}


//Description : Gets app rates count max
function ga_app_count_max_rates($user,$password,$ip,$appid)
{
    $url = 'http://'.$user.':'.$password.'@'.$ip.'/api/app/infos/'.$appid;
    $get_content =  file_get_contents($url);
    $decode = json_decode($get_content,true);
    return $decode;
}



