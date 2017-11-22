<?php
/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 20-11-2017
 * Time: 05:26
 */

class Events_model
{
    public function getAllEvents()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_PORT => "80",
            CURLOPT_URL => "http://maatwerk.works/api/events?offset=0&limit=10",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return 'error: ' . $err;
        } else {
            //http://docs.php.net/json_decode
            return json_decode($response, TRUE);
        }
    }

    public function getEventById($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_PORT => "80",
            CURLOPT_URL => "http://maatwerk.works/api/events/" . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return 'error: ' . $err;
        } else {
            return json_decode($response, true);
        }
    }
}