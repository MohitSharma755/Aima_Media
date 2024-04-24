<?php
include ("connection.php");
$action = $_POST['action'];
if ($action == "statevalget") {
    $cityarrlist = array(
        'select' => '--select--',
        'Andhra Pradesh' => [

            'Adilabad',
            'Anantapur',
            'Chittoor',
            'Kakinada',
            'Guntur',
            'Hyderabad',
            'Karimnagar',
            'Khammam',
            'Krishna',
            'Kurnool',
            'Mahbubnagar',
            'Medak',
            'Nalgonda',
            'Nizamabad',
            'Ongole',
            'Hyderabad',
            'Srikakulam',
            'Nellore',
            'Visakhapatnam',
            'Vizianagaram',
            'Warangal',
            'Eluru',
            'Kadapa',
        ],
        'Arunachal Pradesh' => [
            'Anjaw',
            'Changlang',
            'East Siang',
            'Kurung Kumey',
            'Lohit',
            'Lower Dibang Valley',
            'Lower Subansiri',
            'Papum Pare',
            'Tawang',
            'Tirap',
            'Dibang Valley',
            'Upper Siang',
            'Upper Subansiri',
            'West Kameng',
            'West Siang',
        ],
    );
    $statename = $_POST['statename'];
    $output = "";
    foreach ($cityarrlist as $allcity => $getvalue) {
        if ($statename == $allcity) {
            foreach ($getvalue as $getcity) {
                $output .= "<option>$getcity</option>";
            }
            echo $output;
        }
    }
}
?>