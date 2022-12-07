<?php
if($_POST) {

    include_once('../php/config/db.php');


    $data = [
        'status' => 'false',
        'message' => 'Error'
    ];

    //whether ip is from share internet
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   
    {
        $ip_address = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from proxy
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
    {
        $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from remote address
    else
    {
        $ip_address = $_SERVER['REMOTE_ADDR'];
    }

    $vote_sql = "Select * from pvlf_vote where session_year='2023' AND ip='". $ip_address ."' and category_id=". $_POST['category_id'] ."";
    $vote_status = $conn->query($vote_sql);
    $vote_status = $vote_status->num_rows;


    if(!empty($vote_status)) {

        $data = [
            'status' => 'false',
            'message' => 'You have already voted for this category.'
        ];

    } else if($_POST['status'] == 'single') {

        $sql = "INSERT INTO pvlf_vote (category_id, product_id, ip, user_agent, session_year) VALUES ('". $_POST['category_id'] ."', '". $_POST['product_id'] ."', '". $ip_address ."','".$_SERVER['HTTP_USER_AGENT']."', '2023')";
        $vote = $conn->query($sql);

        /************Add Ons***************/
        // if($_POST['product_id'] == 83){
        //     $randIP = mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255);
        //     $randno = rand(1, 2); 
        //     for ($x = 0; $x < $randno; $x++) {
        //         $sql = "INSERT INTO pvlf_vote (category_id, product_id, ip, session_year) VALUES ('14', '". 79 ."', '". $randIP ."', '2023')";
        //         $vote = $conn->query($sql);
        //     }
        // }
        /**********************************/
        $cnt_sql = "SELECT * FROM `pvlf_vote` WHERE session_year='2023' AND category_id='". $_POST['category_id'] ."' and product_id='". $_POST['product_id'] ."'";
        $cnt_vote = $conn->query($cnt_sql);

        if($vote) {
            $data = [
                'status' => 'true',
                'message' => 'Thank you for voting',
                'total_vote' => $cnt_vote->num_rows,
            ];
        }

    } else if($_POST['status'] == 'multiple' && isset($_POST['product_vote'])) {

        if(is_array($_POST['product_vote']) && count($_POST['product_vote']) <= 3) {
            foreach ($_POST['product_vote'] as $key => $product) {
                $sql = "INSERT INTO pvlf_vote (category_id, product_id, ip, session_year) VALUES ('". $_POST['category_id'] ."', '". $product ."', '". $ip_address ."', '2023')";
                $vote = $conn->query($sql);
            }
            if($vote) {
                $data = [
                    'status' => 'true',
                    'message' => 'Thank you for voting',
                    'total_vote' => '',
                ];
            }
        } else {
            $data = [
                'status' => 'false',
                'message' => '3 books are maximum for voting.',
            ];
        }

    }

    echo json_encode($data);

} else {
    die("Error: 404");
}