<?php
/* gets the oparating system the user is using so it down determine what file it will let you download */

$user_agent     =   $_SERVER['HTTP_USER_AGENT'];

function getOS() { 

    global $user_agent;

    $os_platform    =   "Unknown OS Platform";

    $os_array       =   array(
                            '/windows nt 6.3/i'     =>  'Win',
                            '/windows nt 6.2/i'     =>  'Win',
                            '/windows nt 6.1/i'     =>  'Win',
                            '/windows nt 6.0/i'     =>  'Win',
                            '/windows nt 5.2/i'     =>  'Win',
                            '/windows nt 5.1/i'     =>  'Win',
                            '/windows xp/i'         =>  'Win',
                            '/windows nt 5.0/i'     =>  'Win',
                            '/windows me/i'         =>  'Win',
                            '/win98/i'              =>  'Win',
                            '/win95/i'              =>  'Win',
                            '/win16/i'              =>  'Win',
                            '/macintosh|mac os x/i' =>  'Mac',
                            '/mac_powerpc/i'        =>  'Mac',
                            '/linux/i'              =>  'Linux',
                            '/ubuntu/i'             =>  'Ubuntu',
                        );

    foreach ($os_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }

    }   

    return $os_platform;

}

?>