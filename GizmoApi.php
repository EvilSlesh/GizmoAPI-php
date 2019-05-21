//Fast data retrieval using ready functions.

//get active session
function ga_sessions($user,$password,$ip)
{
    //get all active sessions
    $active_session = 'http://'.$user.':'.$password.'@'.$ip.'/api/usersession/active';
    $get_active_session =  file_get_contents($active_session);
    $decode_active_session = json_decode($get_active_session,true);
    return $decode_active_session;
}
