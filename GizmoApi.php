//////////////////////////////////////////////
//Fast data retrieval using ready functions.
//////////////////////////////////////////////

//UserSession api functions

//Description : Returns active user sessions list.
function ga_active_sessions($user,$password,$ip)
{
    //get all active sessions
    $active_session = 'http://'.$user.':'.$password.'@'.$ip.'/api/usersession/active';
    $get_active_session =  file_get_contents($active_session);
    $decode_active_session = json_decode($get_active_session,true);
    return $decode_active_session;
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
