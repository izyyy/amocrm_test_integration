<?php

class SubmitFunctions
{
    function test()
    {
        echo "yes";
    }


    public static function HooksToArray($post_information)
    {
    // Create the return array
    $return = [];

    // Add each variable to the return array if it is set
    if (isset($post_information['contacts']['add'])) {

        $return['contacts']['add'] = $post_information['contacts']['add'];

        SubmitFunctions::submitWebHookEvent($return);

    }
    if (isset($post_information['contacts']['update'])) {
        $return['contacts']['update'] = $post_information['contacts']['update'];
    }
    if (isset($post_information['leads']['add'])) {
        $return['leads']['add'] = $post_information['leads']['add'];
    }
    if (isset($post_information['leads']['update'])) {
        $return['leads']['update'] = $post_information['leads']['update'];
    }

    // Return the created array
    return $return;
    }


    public static function submitWebHookEvent($events)
    {
        $q_id = substr(
            str_shuffle(
                "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"
            ),
            1,
            7
        );

        error_log(count($events['event']));

        $N = count($events['event']);
        // error_log(json_encode($events));
        error_log( $events['eventName'] );
        $eventName = $events['eventName'];
        ($xml = simplexml_load_file("webeventsbase.xml")) or
        die("error: cannot create object");
        // $addnew = $xml->events->contact_add;
        $addnew = $xml->events->$eventName;
        $addevent = $addnew->addChild('event');

        for ($i = 0; $i < $N; $i++) {
            $addp = $addevent->addChild('SN');

            $addp->addAttribute("id", $i+1);
            $addp->addChild("id", $events['event'][$i]['id']);

            $addp->addChild("name", $events['event'][$i]['name']);
            $addp->addChild("cid", $events['event'][$i]['cid']);
            $addp->addChild("mid", $events['event'][$i]['mid']);
            $addp->addChild("c_at", $events['event'][$i]['c_at']);
            $addp->addChild("u_at", $events['event'][$i]['u_at']);
            $addp->addChild("rname", $events['event'][$i]['rname']);

        }
        file_put_contents("webeventsbase.xml", $xml->asXML());

    }

    public static function showEvents($eventName)
    {

        // echo '<div style="color:blue; padding:20px; font-size:18px">';
        ($xml = simplexml_load_file("webeventsbase.xml")) or
        die("error: cannot create object");


        $return = [];

        // $num_event = count($xml->events->contact_add->event);
        $num_event = count($xml->events->$eventName->event);

        for ($i=0; $i<$num_event; $i++ ) {
            // $events = $xml->events->contact_add->event[$i]->SN;
            $events = $xml->events->$eventName->event[$i]->SN;
            
        }

        $last_event = $events;
        $num_in_last_event = count($last_event);

        for ($j=0; $j<$num_in_last_event; $j++ ) {

            $return[$j]['id'] = $last_event[$j]->id;
            $return[$j]['name'] = $last_event[$j]->name;
            $return[$j]['c_at'] = $last_event[$j]->c_at;
            $return[$j]['u_at'] = $last_event[$j]->u_at;
            $return[$j]['rname'] = $last_event[$j]->rname;
            

            echo "<br>";
            }
            
        return $return;

    }

    public static function listEvents($eventName)
    {

        // echo '<div style="color:blue; padding:20px; font-size:18px">';
        ($xml = simplexml_load_file("webeventsbase.xml")) or
        die("error: cannot create object");


        $return = [];

        // $num_event = count($xml->events->contact_add->event);

        // $num_event = count($xml->events->$eventName->event);
        $num_event = count($xml->events->$eventName->event);

        echo $xml->events->$eventName->event[0]->SN[0]->id;
        echo '<br>';

        echo $num_event;
        for ($i=0; $i<$num_event; $i++ ) {

            for ($j=0; $j<2; $j++ ) {

                echo $xml->events->$eventName->event[$i]->SN[$j]->id;
                echo $xml->events->$eventName->event[$i]->SN[$j]->name;
                echo '<br>';

            
            }
        }

        return $return;

    }

}
//SubmitFunctions::submitExam($examquestions);
//SubmitFunctions::submitQuestion($_POST);
//SubmitFunctions::test();
