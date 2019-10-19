<?


//////////////////////////////////////////////
//Fast data retrieval using ready functions.
//////////////////////////////////////////////

//UserSession api functions

//Description : Returns active user sessions list.
function ga_active_sessions($user, $password, $ip)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/usersessions/active';
    $get_content =  file_get_contents($url);
    $decode_active_session = json_decode($get_content, true)['result'];
    return $decode_active_session;
}


//Description : Returns active user sessions info list.
function ga_active_sessions_info($user, $password, $ip)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/usersessions/activeinfo';
    $get_content =  file_get_contents($url);
    $decode_active_session_info = json_decode($get_content, true)['result'];
    return $decode_active_session_info;
}

//Description: Returns user sessions list.
function ga_all_sessions($user, $password, $ip, $date)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/usersessions';
    $get_content = file_get_contents($url);
    $decode_user_sessions = json_decode($get_content, true)['result'];
    if ($date == 'today') {
        $date = strtotime(date('d.m.Y'));
    } elseif ($date == 'hour') {
        $date = strtotime(date('d.m.Y H:i') - 3600);
    } elseif ($date == 'minute') {
        $date = strtotime(date('d.m.Y H:i') - 60);
    } elseif ($date == 'day') {
        $date = strtotime(date('d.m.Y H:i') - 86400);
    } elseif (is_numeric($date)) {
        $date = strtotime($date);
    } elseif ($date == 'all') {
        $date = 1;
    }
    foreach ($decode_user_sessions as $key => $users) {
        if (strtotime(explode("T", $users['createdTime'])[0] . mb_strimwidth(explode("T", $users['createdTime'])[1], 0, 8)) >= $date) {
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
function ga_app($user, $password, $ip)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/apps';
    $get_content =  file_get_contents($url);
    $decode = json_decode($get_content, true)['result'];
    return $decode;
}


//Description : Gets app image.
function ga_app_image($user, $password, $ip, $id)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/apps/' . $id . '/image';
    $get =  file_get_contents($url);
    $decode = 'src="data:image/png;base64, ' . json_decode($get, true) . '"';
    return $decode;
}

//Description : Gets app titles
function ga_app_titles($user, $password, $ip)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/apps/titles';
    $get_content =  file_get_contents($url);
    $decode = json_decode($get_content, true)['result'];
    return $decode;
}

//Description : Gets app rating
function ga_app_rating($user, $password, $ip, $appid)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/apps/' . $appid . '/rating';
    $get_content =  file_get_contents($url);
    $decode = json_decode($get_content, true)['result'];
    return $decode;
}


//Description : Gets app average rating
function ga_app_average_rating($user, $password, $ip, $appid)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/apps/' . $appid . '/rating/average';
    $get_content =  file_get_contents($url);
    $decode = json_decode($get_content, true)['result'];
    return $decode;
}


//Description : Gets app rates count
function ga_app_count_rates($user, $password, $ip, $appid)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/apps/' . $appid . '/rating/count';
    $get_content =  file_get_contents($url);
    $decode = json_decode($get_content, true)['result'];
    return $decode;
}


//Description : Gets app rates count max
function ga_app_count_max_rates($user, $password, $ip, $appid)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/apps/infos/' . $appid;
    $get_content =  file_get_contents($url);
    $decode = json_decode($get_content, true)['result'];
    return $decode;
}




/*
 * 
 * 
 * API Name : User
 * Full path : http://your_ip/doc/user
 * 
 * 
*/


/* 
  
Description : Gets all users.
Base path : api/user
Full path : http://193.242.149.157/api/users
HTTP Method : GET

*/

function ga_users($user, $password, $ip)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/users';
    $get_content =  file_get_contents($url);
    $decode = json_decode($get_content, true)['result'];
    return $decode;
}

/*

Description : Gets user by username.
Base path : api/user/{username}
Full path : http://193.242.149.157/api/users/{username}
HTTP Method : GET
Parameter : username - [String] Username.

*/

function ga_user_by_un($user, $password, $ip, $username)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/users/' . $username;
    $get_content =  file_get_contents($url);
    $decode = json_decode($get_content, true)['result'];
    return $decode;
}

/*

Description : Gets user by id.
Base path : api/user/{userid}
Full path : http://193.242.149.157/api/users/{userid}
HTTP Method : GET
Parameter : userId - [Int32] User Id

*/

function ga_user_by_id($user, $password, $ip, $id)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/users/' . $id;
    $get_content =  file_get_contents($url);
    $decode = json_decode($get_content, true)['result'];
    return $decode;
}

/*

Description : Gets user id by username.
Base path : api/user/{username}/userid
Full path : http://193.242.149.157/api/users/{username}/userid
HTTP Method : GET
Parameter : username - [String] Username

*/

function ga_user_id($user, $password, $ip, $username)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/users/' . $username . '/userid';
    $get_content =  file_get_contents($url);
    $decode = json_decode($get_content, true)['result'];
    return $decode;
}


/*

Description : Validates user credentials.
Base path : api/user/{username}/{password}/valid
Full path : http://192.168.0.2/api/users/{username}/{password}/valid
HTTP Method : GET
Parameter : username - [String] Username
Parameter : password - [String] Password

*/

function ga_user_valid($user, $password, $ip, $username, $pwd_user)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/users/' . $username . '/' . $pwd_user . '/valid';
    $get_content =  file_get_contents($url);
    $decode = json_decode($get_content, true)['result'];
    return $decode;
}


/*

Description :
Base path : api/user/{userid}/balance
Full path : http://192.168.0.2/api/users/{userid}/balance
HTTP Method : GET
Parameter : userId - [Int32]

*/

function ga_user_balance($user, $password, $ip, $id)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/users/' . $id . '/balance';
    $get_content =  file_get_contents($url);
    $decode = json_decode($get_content, true)['result'];
    return $decode;
}


/*

Description : Gets user groups.
Base path : api/usergroup
Full path : http://192.168.0.2/api/usergroup
HTTP Method : GET


*/


function ga_user_group($user, $password, $ip)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/usergroups';
    $get_content =  file_get_contents($url);
    $decode = json_decode($get_content, true)['result'];
    return $decode;
}



/*


REPORTS 

SALESUMMARY


*/

function ga_reports_salesummary($user, $password, $ip, $operator)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/reports/salesummary/2017-08-09/2018-08-09/' . $operator . '/7';
    $get_content =  file_get_contents($url);
    $decode = json_decode($get_content, true)['result'];
    return $decode;
}



function ga_hostcomputer($user, $password, $ip)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/hostcomputers';
    $get_content =  file_get_contents($url);
    $decode = json_decode($get_content, true)['result'];
    return $decode;
}

function ga_hostid($user, $password, $ip, $id)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/hosts/' . $id;
    $get_content =  file_get_contents($url);
    $decode = json_decode($get_content, true)['result'];
    return $decode;
}

function ga_product_time($user, $password, $ip)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/products/time';
    $get_content =  file_get_contents($url);
    $decode = json_decode($get_content, true)['result'];
    return $decode;
}

function ga_close_session($user, $password, $ip, $id)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/users/' . $id . '/logout';
    $data = ['user' => $id];
    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    if ($result === TRUE) {
        $server = R::findone('servers', 'ip = ?', [$ip]);
        $pc = R::findone('pc', 'servers_id = ? and gizmousers_id = ? and status = 2', [$server->id, $id]);
        $pc->status = 1;
        $pc->gizmousers_id = null;
        R::store($pc);
    }
}

function ga_start_session($user, $password, $ip, $id, $pc)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/users/' . $id . '/login/' . $pc;
    $data = ['user' => $id, 'login' => $pc];
    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context = stream_context_create($options);
    return $result = file_get_contents($url, false, $context);
    if ($result === FALSE) {
        print 'ERRORS';
    }
}


function ga_invoice($user, $password, $ip)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/invoices';
    $get_content =  file_get_contents($url);
    $decode = json_decode($get_content, true)['result'];
    return $decode;
}

function ga_withdraw_user($user, $password, $ip, $id, $amount)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/users/' . $id . '/deposit/' . $amount;
    $data = ['user' => $id];
    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'DELETE',
            'content' => http_build_query($data)
        )
    );
    $context = stream_context_create($options);
    file_get_contents($url, false, $context);
}

function ga_delete_user($user, $password, $ip, $id)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/users/' . $id;
    $data = ['user' => $id];
    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'DELETE',
            'content' => http_build_query($data)
        )
    );
    $context = stream_context_create($options);
    file_get_contents($url, false, $context);
}

function ga_redeem_user($user, $password, $ip, $id, $amount)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/users/' . $id . '/points/' . $amount;
    $data = ['user' => $id];
    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'DELETE',
            'content' => http_build_query($data)
        )
    );
    $context = stream_context_create($options);
    file_get_contents($url, false, $context);
}

function ga_deposit_user($user, $password, $ip, $id, $amount)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/users/' . $id . '/deposit/' . $amount . '/-1';
    $data = ['user' => $id];
    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'PUT',
            'content' => http_build_query($data)
        )
    );
    $context = stream_context_create($options);
    file_get_contents($url, false, $context);
}

function ga_award_user($user, $password, $ip, $id, $amount)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/users/' . $id . '/points/' . $amount;
    $data = ['user' => $id];
    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'PUT',
            'content' => http_build_query($data)
        )
    );
    $context = stream_context_create($options);
    file_get_contents($url, false, $context);
}


// Description : Creates an product order and invoice it.
// Base path : api/user/{userid}/order/{productid}/{quantity}/invoice/payment/{paymentmethodid}
// Full path : http://193.242.149.157/api/users/{userid}/order/{productid}/{quantity}/invoice/payment/{paymentmethodid}
// HTTP Method : POST
// Parameter : userId - [Int32] User id.
// Parameter : productId - [Int32] Product id.
// Parameter : quantity - [Int32] Product quantity.
// Parameter : paymentMethodId - [Int32] [optional] Prefered payment method id.




// Description : Gets user picture.
// Base path : api/user/{userid}/picture
// Full path : http://193.242.149.157/api/users/{userid}/picture
// HTTP Method : GET
// Parameter : userId - [Int32] User Id

// Description : Adds or updates user picture.
// Base path : api/user/{userid}/picture
// Full path : http://193.242.149.157/api/users/{userid}/picture
// HTTP Method : PUT
// Parameter : userId - [Int32] User Id



function ga_endtime_user($user, $password, $ip, $id)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/users/' . $id . '/balance';
    $get_content =  file_get_contents($url);
    $decode = json_decode($get_content, true)['availableTime'];
    if ($decode == null) {
        $endtime = '0';
    } else {
        $endtime = date('Y/m/d H:i:s', $decode + time());
    }
    return $endtime;
}



// Undefined = 0,
/// <summary>
/// Cash payment.
/// </summary>
// [Localized("PAYMENT_METHOD_CASH")]
// Cash = -1,

/// <summary>
/// Credit card payment.
/// </summary>
// [Localized("PAYMENT_METHOD_CREDIT_CARD")]
// CreditCard = -2,

/// <summary>
/// Deposit balance payment.
/// </summary>
// [Localized("PAYMENT_METHOD_DEPOSIT")]
// Deposit = -3,

/// <summary>
/// Deposit points payment.
/// </summary>
// [Localized("PAYMENT_METHOD_POINTS")]
// Points = -4,

function ga_dep_product_time($user, $password, $ip, $id, $product, $method)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/users/' . $id . '/order/' . $product . '/invoice/payment/' . $method;

    $data = ['user' => $id, 'order' => $product, 'payment' => $method];
    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
}


function ga_dep_fixed_time($user, $password, $ip, $id, $amount, $price, $method)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/users/' . $id . '/order/time/' . $amount . '/price/' . $price . '/invoice/payment/' . $method;

    $data = ['user' => $id, 'amount' => $amount, 'payment' => $method];
    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
}

function ga_new_user($user, $password, $ip, $username, $email, $firstName, $lastName, $sex, $birthDate, $userGroupId, $identification, $mobilePhone)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/users';
    $data = array(
        'username' => $username, 'email' => $email, 'firstName' => $firstName, 'lastName' => $lastName, 'sex' => $sex, 'birthDate' => $birthDate,
        'userGroupId' => $userGroupId, 'identification' => $identification, 'mobilePhone' => $mobilePhone
    );
    $headers = array(
        "Content-Type: application/x-www-form-urlencoded",
    );
    $query = http_build_query($data);
    $channel = curl_init($url);
    curl_setopt($channel, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($channel, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($channel, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($channel, CURLOPT_POSTFIELDS, $query);
    curl_setopt($channel, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($channel, CURLOPT_CONNECTTIMEOUT, 10);

    $id = curl_exec($channel);
    curl_close($channel);
    return $id;
}

function ga_email_exist($user, $password, $ip, $email)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/users/' . $email . '/emailexist';
    $get_content =  file_get_contents($url);
    $decode = json_decode($get_content, true)['result'];
    return $decode;
}

function ga_username_exist($user, $password, $ip, $username)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/users/' . $username . '/exist';
    $get_content =  file_get_contents($url);
    $decode = json_decode($get_content, true)['result'];
    return $decode;
}

function ga_new_pwd($user, $password, $ip, $id, $new)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/users/' . $id . '/password/' . $new;

    $data = ['id' => $id, 'password' => $new];
    $headers = array(
        "Content-Type: application/x-www-form-urlencoded",
    );
    $query = http_build_query($data);
    $channel = curl_init($url);
    curl_setopt($channel, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($channel, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($channel, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($channel, CURLOPT_POSTFIELDS, $query);
    curl_setopt($channel, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($channel, CURLOPT_CONNECTTIMEOUT, 10);

    $id = curl_exec($channel);
    curl_close($channel);
    return $id;
}

function ga_user_update($user, $password, $ip)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/users';
    // $data = array('username' => 'KeZA3D','id' => 1493,'firstName' => 'Александр','userGroupId' => 8,'email'=>"zubar_az@mail.ru",'lastName'=>'Зубарь','identification'=>'https://vk.com/alexandrzubar','mobilePhone'=>'+7(900)231-59-44','birthDate'=>'1999-09-23T00:00:00');

    $data = array('username' => 'tester123##deleted', 'id' => 2242, 'userGroupId' => 9);
    $headers = array(
        "Content-Type: application/x-www-form-urlencoded",
    );
    $query = http_build_query($data);
    $channel = curl_init($url);
    curl_setopt($channel, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($channel, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($channel, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($channel, CURLOPT_POSTFIELDS, $query);
    curl_setopt($channel, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($channel, CURLOPT_CONNECTTIMEOUT, 10);

    $id = curl_exec($channel);
    curl_close($channel);
    return $id;
}

//////////////////////////////////////////////
//Fast data retrieval using ready functions.
//////////////////////////////////////////////

//UserSession api functions


function ga_hostcomputer_bool($user, $password, $ip)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/hostcomputers';
    $get_content =  file_get_contents($url);
    $decode = json_decode($get_content, true)['result'];
    return $decode ? true : false;
}

function ga_usergroup_disallowedhost($user, $password, $ip, $id)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/usergroups/' . $id . '/disallowedhost';
    $get_content =  file_get_contents($url);
    $decode_active_session = json_decode($get_content, true)['result'];
    return $decode_active_session;
}

function ga_host_lastuserlogin($user, $password, $ip, $id)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/host/' . $id . '/lastuserlogin';
    $get_content =  file_get_contents($url);
    $decode_active_session = json_decode($get_content, true);
    return explode("T", $decode_active_session)[0];
}



/**
 * $user, $password, $ip,$userid,$phone,$email,$date,$duration,$hostid
 * @param $message (optional) message to log (might also be data or output)
 *
 * @return void
 */

function ga_add_reservation()
{
    $url = 'http://admin:admin@cloud.gizmopowered.net/api/reservations?id=3&note=hgesfsd&duration=30&CONTACTEMAIL=HELLO@KITT&contactphone=210956753&Date=1-29-2019+21:00&Hosts[0].HostId=6&Hosts[1].HostId=5';
    $data = array('UserId' => 4, 'Note' => 'test', 'ContactPhone' => '+79002315944', 'Date' => date("Y-m-d\TH:i", time() + 8000), 'Duration' => 600, 'Users' => array(0 => 4), 'Hosts' => array(0 => 4));
    // $data = array('UserId' => $userid, 'Note' => $note, 'ContactPhone' => $phone, 'Date' => $date, 'Duration' => $duration, 'Users' => $users, 'Hosts' => $hosts);
    $headers = array(
        "Content-Type: application/x-www-form-urlencoded",
    );
    $query = http_build_query($data);
    $channel = curl_init($url);
    curl_setopt($channel, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($channel, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($channel, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($channel, CURLOPT_POSTFIELDS, 0);
    curl_setopt($channel, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($channel, CURLOPT_CONNECTTIMEOUT, 10);

    $id = curl_exec($channel);
    curl_close($channel);
    return $id;
}

function ga_add_reservation_status()
{
    $url = 'http://admin:admin@cloud.gizmopowered.net/api/reservations/4/status/Active';
    $headers = array(
        "Content-Type: application/x-www-form-urlencoded",
    );
    $channel = curl_init($url);
    curl_setopt($channel, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($channel, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($channel, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($channel, CURLOPT_POSTFIELDS, 0);
    curl_setopt($channel, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($channel, CURLOPT_CONNECTTIMEOUT, 10);

    $id = curl_exec($channel);
    curl_close($channel);
    return $id;
}


function ga_note_user($user,$password,$ip,$id)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/user/' . $id .'/note';
    $get_content =  file_get_contents($url);
    $decode = json_decode($get_content, true);
    return $decode['result'];
}


function ga_version($user, $password, $ip)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/service/version';
    $get_content =  file_get_contents($url);
    // $decode = json_decode($get_content, true);
    if (json_decode($get_content,true)) {
        return json_decode($get_content,true)['result'];
    } else {
        return $get_content;
    }
}


function ga_host_group($user, $password, $ip)
{
    $url = 'http://' . $user . ':' . $password . '@' . $ip . '/api/hostgroups';
    $get_content =  file_get_contents($url);
    $decode = json_decode($get_content, true)['result'];
    return $decode;
}
