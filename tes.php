
<?php
//  date_default_timezone_set('Asia/Jakarta');
//  echo date('Y-m-d');

// $content=file_get_contents("https://api.simleg-dprdsulteng.com/index.php/invite/jumlah/3");
// $content=file_get_contents("https://api.simleg-dprdsulteng.com/index.php/vote/peserta/11");

//mengubah standar encoding
// $content=utf8_encode($content);

//mengubah data json menjadi data array asosiatif
// $result=json_decode($content,true);
// $r = http_build_query($result);
// $r = (json_encode($result));

// $object = new stdClass();
// foreach ($result as $key => $value)
// {
//     $object->$key = $value;
// }
// echo
// $url="https://exp.host/--/api/v2/push/send";
// $data=array('judul'=>'Indonesia Raya','pencipta'=>'WR Supratman');
// $options = array(
//             "http"=> array(
//                 "method"=>"POST",
//                 "header"=>"Content-Type: application/x-www-form-urlencoded",
//                 "content"=>http_build_query($data)
//             )
// );
// $response=file_get_contents($url);
// echo json_decode($response, true);

// $payload = array(
//     'to' => 'ExponentPushToken[_gLhfjDP1E9UhcGX7YXp3D]',
//     'title' => 'Sistem Agenda',
//     'body' => 'Anda dapat notif',
//     'data'=> $object
// );

// $curl = curl_init();

// curl_setopt_array($curl, array(
//         CURLOPT_URL => "https://exp.host/--/api/v2/push/send",
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_ENCODING => "",
//         CURLOPT_MAXREDIRS => 10,
//         CURLOPT_TIMEOUT => 30,
//         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//         CURLOPT_CUSTOMREQUEST => "POST",
//         CURLOPT_POSTFIELDS => json_encode($payload),
//         CURLOPT_HTTPHEADER => array(
//                 "Accept: application/json",
//                 "Accept-Encoding: gzip, deflate",
//                 "Content-Type: application/json",
//                 "cache-control: no-cache",
//                 "host: exp.host"
//                 ),
//     ));

// $response = curl_exec($curl);
// $err = curl_error($curl);

// curl_close($curl);

// if ($err) {
//     echo "cURL Error #:" . $err;
// } else {
//     echo $response;
// }
// $tes = "file:///E:/Desktop/logodprdsulteng.png";
if(isset($_POST['submit']))
    echo $_POST['tes'];
?>
<form action="tes.php" method="post">
    <input type="file" name="tes" id="">
    <input type="submit" value="tes">
</form>
