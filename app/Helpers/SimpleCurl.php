<?php
namespace Helpers;

/*
* Curl class with some default functions and settings
*
* @author SecretD - https://github.com/SecretD
* @version 2.2
* @date Sept 22, 2014
* @date updated May 18 2015
*/
class SimpleCurl
{
    /**
    * Performs a get request on the chosen link and the chosen parameters
    * in the array.
    * @param string $url
    * @param array $params
    * @return string returns the content of the given url
    */
    public static function get($url, $params = array())
    {
        $url = $url . '?' . http_build_query($params, '', '&');
        $ch = curl_init();

        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_SSL_VERIFYPEER => false
        );
        curl_setopt_array($ch, $options);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    /**
    * Performs a post request on the chosen link and the chosen parameters
    * in the array
    * @param string $url
    * @param array $fields
    * @return string returns the content of the given url after post
    */
    public static function post($url, $fields = array())
    {
        $ch = curl_init();

        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POSTFIELDS => $fields,
            CURLOPT_POST => true,
            CURLOPT_USERAGENT => "SMVC Agent",
        );
        curl_setopt_array($ch, $options);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    /**
    * Performs a put request on the chosen link and the chosen parameters
    * in the array.
    * @param string $url
    * @param array $fields
    * @return string with the contents of the site
    */
    public static function put($url, $fields = array())
    {
        $post_field_string = http_build_query($fields);
        $ch = curl_init($url);

        $options = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_POSTFIELDS => $post_field_string
            );
        curl_setopt_array($ch, $options);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}
