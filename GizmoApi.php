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

//Description : Gets app image.
function ga_app_image($user,$password,$ip)
{
    $url = 'http://'.$user.':'.$password.'@'.$ip.'/api/app/'.$id.'/image';
    $get =  file_get_contents($url);
    $decode = 'src="data:image/png;base64,'.json_decode($get,true).'"';
    return $decode;
}

