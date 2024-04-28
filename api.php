<?php
//api.php
require "includes/SubmitFunctions.php";


$subdomain = 'izuchukwuogbonna18';
$access_token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjM2NDNlYTQzOGNlNzAwOTRmOTJjZDQ0Y2JmZTdmOTRkZjEyNGNjYjc0YzZlNmUzOTNmZjkxNTIxODhkYzI3OWYzMjY2MmNlYzJiZWFhNTQ3In0.eyJhdWQiOiI0ZGQxZDQ2My00YjBjLTQ0NzEtYjk4Yy00NTBiMWI2ZDc4MWUiLCJqdGkiOiIzNjQzZWE0MzhjZTcwMDk0ZjkyY2Q0NGNiZmU3Zjk0ZGYxMjRjY2I3NGM2ZTZlMzkzZmY5MTUyMTg4ZGMyNzlmMzI2NjJjZWMyYmVhYTU0NyIsImlhdCI6MTcxMzcyMzQzNywibmJmIjoxNzEzNzIzNDM3LCJleHAiOjE3MjAzMTA0MDAsInN1YiI6IjEwOTY2NjkwIiwiZ3JhbnRfdHlwZSI6IiIsImFjY291bnRfaWQiOjMxNzEzNjI2LCJiYXNlX2RvbWFpbiI6ImFtb2NybS5ydSIsInZlcnNpb24iOjIsInNjb3BlcyI6WyJjcm0iLCJmaWxlcyIsImZpbGVzX2RlbGV0ZSIsIm5vdGlmaWNhdGlvbnMiLCJwdXNoX25vdGlmaWNhdGlvbnMiXSwiaGFzaF91dWlkIjoiYWM0NGI2MjUtODYxNS00ZDJjLTllYmItOWY2NzEyZTE3OTQ4In0.hli7JTBVpZqOTp1m69muH-wWwSx4mXJLtLVvz_a1Bc2I0bL08zTwpKN42bFuovRpM3QxYcNDGJdvPBdVNjTmR2Q5lUy6MlFz1pkvhrg0KSi3_OeiNIM6P3PEQk1ODW76wk_1Uk0VO0EV9gLtarQmjfIgJ3fiwL86mPW7snXZJWqzGZS9OhppanQwigQnhogFPiNAe0Dk6fpEyPHxlJsag6JWGYspuQ-ZMOhc4xDqXjYbCNO1EdDmDmTQQ70uliVvtycxEMIV2fSURMwfzmKQUeuUNppsDdF7lyG1EbFIxqGiFdw0PDb7iqRweKFi5Msq2Ruhwfm1DTsmThYGryWNUA';

function makeCurl($method, $endpoint, $body)
{
    global $subdomain, $access_token;

    $link = 'https://' . $subdomain . '.amocrm.ru' . $endpoint . ''; //Формируем URL для запроса

    $headers = [
        'Authorization: Bearer ' . $access_token
    ];

    /**
     * Нам необходимо инициировать запрос к серверу.
     * Воспользуемся библиотекой cURL (поставляется в составе PHP).
     * Вы также можете использовать и кроссплатформенную программу cURL, если вы не программируете на PHP.
     */
    $curl = curl_init(); //Сохраняем дескриптор сеанса cURL
    /** Устанавливаем необходимые опции для сеанса cURL  */
    curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-oAuth-client/1.0');
    curl_setopt($curl,CURLOPT_URL, $link);
    curl_setopt($curl,CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($curl,CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl,CURLOPT_POSTFIELDS, $body); //    curl_setopt($curl,CURLOPT_POSTFIELDS, json_encode($body_data));
    curl_setopt($curl,CURLOPT_HEADER, false);
    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 1);
    curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 2);
    $out = curl_exec($curl); //Инициируем запрос к API и сохраняем ответ в переменную
    $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    /** Теперь мы можем обработать ответ, полученный от сервера. Это пример. Вы можете обработать данные своим способом. */
    $code = (int)$code;
    $errors = [
        400 => 'Bad request',
        401 => 'Unauthorized',
        403 => 'Forbidden',
        404 => 'Not found',
        500 => 'Internal server error',
        502 => 'Bad gateway',
        503 => 'Service unavailable',
    ];

    try
    {
        /** Если код ответа не успешный - возвращаем сообщение об ошибке  */
        if ($code < 200 || $code > 204) {
            throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undefined error', $code);
        }
        else {
            return $out;
        };

    } catch(\Exception $e)
    {
        die('Ошибка: ' . $e->getMessage() . PHP_EOL . 'Код ошибки: ' . $e->getCode());
    }
}

// $numberEvents = SubmitFunctions::showEvents();
// echo $numberEvents[1]['c_at'];

function getResponsibleUsername($responsible_user_id)
{
//    makecurl
    // Call makeCurl function with appropriate arguments
    $method = 'GET'; // Set your method
    $endpoint = '/api/v4/users/'.$responsible_user_id.''; // Set your endpoint
    $body = ''; // Set your request body
    $responsible_user_data = makeCurl($method, $endpoint, $body);
    // var_dump($responsible_user_data); // Debug statement
    return $responsible_user_data;
}


if (isset($_POST['contacts']['add'])) {

    // Create the return array
    $events_array = [];

    // $events_array['event_type'] = $_POST['contacts']['add'];
    $post_data = $_POST['contacts']['add'];

    $num_post_data = count($_POST['contacts']['add']);
    // error_log($num_post_data);
    // $events_array['event'] = $post_data;

    for ($i = 0; $i < $num_post_data; $i++) {   


        $new_contact_data = $post_data[$i];

        $events_array['eventName'] = 'contact_add';


        // $contact_id = $new_contact_data['id'];
        $events_array['event'][$i]['id'] = $new_contact_data['id'];


        $contact_name = $new_contact_data['name']; //1
        $events_array['event'][$i]['name'] = $new_contact_data['name']; //1


        // $created_user_id = $new_contact_data['created_user_id']; //use and request modified username
        $events_array['event'][$i]['cid'] = $new_contact_data['created_user_id']; //use and request modified username

        // $modified_user_id = $new_contact_data['modified_user_id']; //use and request modified username
        $events_array['event'][$i]['mid'] = $new_contact_data['modified_user_id']; //use and request modified username

        // $created_at = $new_contact_data['created_at']; //use and request modified username
        $events_array['event'][$i]['c_at'] = $new_contact_data['created_at']; //use and request modified username


        // $updated_at = $new_contact_data['updated_at']; //use and request modified username
        $events_array['event'][$i]['u_at'] = $new_contact_data['updated_at']; //use and request modified username

        // qykwig-papvog-wIfha8
        // amandajosiah

        $responsible_user_id = $new_contact_data['responsible_user_id']; 
        $events_array['event'][$i]['rid'] = $new_contact_data['responsible_user_id']; 
        // use the id to get the name    
        $out = getResponsibleUsername($responsible_user_id); //2
        $response = json_decode($out, true);
        $responsible_user_name = $response['name'];
        
        $events_array['event'][$i]['rname'] = $responsible_user_name;
    }

        SubmitFunctions::submitWebHookEvent($events_array);


        $show_arr = json_encode($events_array);
}

if (isset($_POST['contacts']['update'])) {


    // Create the return array
    $events_array = [];

    $post_data = $_POST['contacts']['update'];

    $num_post_data = count($_POST['contacts']['update']);


    for ($i = 0; $i < $num_post_data; $i++) {   


        $new_contact_data = $post_data[$i];

        $events_array['eventName'] = 'contact_update';


        // $contact_id = $new_contact_data['id'];
        $events_array['event'][$i]['id'] = $new_contact_data['id'];


        $contact_name = $new_contact_data['name']; //1
        $events_array['event'][$i]['name'] = $new_contact_data['name']; //1


        // $created_user_id = $new_contact_data['created_user_id']; //use and request modified username
        $events_array['event'][$i]['cid'] = $new_contact_data['created_user_id']; //use and request modified username

        // $modified_user_id = $new_contact_data['modified_user_id']; //use and request modified username
        $events_array['event'][$i]['mid'] = $new_contact_data['modified_user_id']; //use and request modified username

        // $created_at = $new_contact_data['created_at']; //use and request modified username
        $events_array['event'][$i]['c_at'] = $new_contact_data['created_at']; //use and request modified username


        // $updated_at = $new_contact_data['updated_at']; //use and request modified username
        $events_array['event'][$i]['u_at'] = $new_contact_data['updated_at']; //use and request modified username

        // qykwig-papvog-wIfha8
        // amandajosiah

        $responsible_user_id = $new_contact_data['responsible_user_id']; 
        $events_array['event'][$i]['rid'] = $new_contact_data['responsible_user_id']; 
        // use the id to get the name    
        $out = getResponsibleUsername($responsible_user_id); //2
        $response = json_decode($out, true);
        $responsible_user_name = $response['name'];

        $events_array['event'][$i]['rname'] = $responsible_user_name;
    }

        SubmitFunctions::submitWebHookEvent($events_array);


        $show_arr = json_encode($events_array);
  
}


if (isset($_POST['leads']['add'])) {


        // Create the return array
        $events_array = [];

        $post_data = $_POST['leads']['add'];
    
        $num_post_data = count($_POST['leads']['add']);
        // error_log($num_post_data);
        // $events_array['event'] = $post_data;
    
        for ($i = 0; $i < $num_post_data; $i++) {   
    
    
            $new_contact_data = $post_data[$i];
    
            $events_array['eventName'] = 'lead_add';
    
    
            // $contact_id = $new_contact_data['id'];
            $events_array['event'][$i]['id'] = $new_contact_data['id'];
    
    
            $contact_name = $new_contact_data['name']; //1
            $events_array['event'][$i]['name'] = $new_contact_data['name']; //1
    
    
            // $created_user_id = $new_contact_data['created_user_id']; //use and request modified username
            $events_array['event'][$i]['cid'] = $new_contact_data['created_user_id']; //use and request modified username
    
            // $modified_user_id = $new_contact_data['modified_user_id']; //use and request modified username
            $events_array['event'][$i]['mid'] = $new_contact_data['modified_user_id']; //use and request modified username
    
            // $created_at = $new_contact_data['created_at']; //use and request modified username
            $events_array['event'][$i]['c_at'] = $new_contact_data['created_at']; //use and request modified username
    
    
            // $updated_at = $new_contact_data['updated_at']; //use and request modified username
            $events_array['event'][$i]['u_at'] = $new_contact_data['updated_at']; //use and request modified username
    
            // qykwig-papvog-wIfha8
            // amandajosiah
    
            $responsible_user_id = $new_contact_data['responsible_user_id']; 
            $events_array['event'][$i]['rid'] = $new_contact_data['responsible_user_id']; 
            // use the id to get the name    
            $out = getResponsibleUsername($responsible_user_id); //2
            $response = json_decode($out, true);
            $responsible_user_name = $response['name'];
    
            $events_array['event'][$i]['rname'] = $responsible_user_name;
        }
    
            SubmitFunctions::submitWebHookEvent($events_array);
    
    
            $show_arr = json_encode($events_array);
            
}


if (isset($_POST['leads']['update'])) {


        // Create the return array
        $events_array = [];

        $post_data = $_POST['leads']['update'];
    
        $num_post_data = count($_POST['leads']['update']);
    
        for ($i = 0; $i < $num_post_data; $i++) {   
    
    
            $new_contact_data = $post_data[$i];
    
            $events_array['eventName'] = 'lead_update';
    
    
            // $contact_id = $new_contact_data['id'];
            $events_array['event'][$i]['id'] = $new_contact_data['id'];
    
    
            $contact_name = $new_contact_data['name']; //1
            $events_array['event'][$i]['name'] = $new_contact_data['name']; //1
    
    
            // $created_user_id = $new_contact_data['created_user_id']; //use and request modified username
            $events_array['event'][$i]['cid'] = $new_contact_data['created_user_id']; //use and request modified username
    
            // $modified_user_id = $new_contact_data['modified_user_id']; //use and request modified username
            $events_array['event'][$i]['mid'] = $new_contact_data['modified_user_id']; //use and request modified username
    
            // $created_at = $new_contact_data['created_at']; //use and request modified username
            $events_array['event'][$i]['c_at'] = $new_contact_data['created_at']; //use and request modified username
    
    
            // $updated_at = $new_contact_data['updated_at']; //use and request modified username
            $events_array['event'][$i]['u_at'] = $new_contact_data['updated_at']; //use and request modified username
    
            // qykwig-papvog-wIfha8
            // amandajosiah
    
            $responsible_user_id = $new_contact_data['responsible_user_id']; 
            $events_array['event'][$i]['rid'] = $new_contact_data['responsible_user_id']; 
            // use the id to get the name    
            $out = getResponsibleUsername($responsible_user_id); //2
            $response = json_decode($out, true);
            $responsible_user_name = $response['name'];
    
            // $responsible_user_name = "izuchukwu ogbonna";
            $events_array['event'][$i]['rname'] = $responsible_user_name;
        }
    
            SubmitFunctions::submitWebHookEvent($events_array);
    
    
            $show_arr = json_encode($events_array);
            
}

