
<head>
<title></title>
</head>
<body>
<form method ="post" action="" name="form" id="form" >
<input type="text" name="url" id="url" size="150" /> <br/>
<input type="text" name="price" id="price" size="50" />
<button type="submit"> save </button>
</form>
</body>
</html>

<?php
session_start();
/**
* This file is part of googl-php
*
* https://github.com/sebi/googl-php
*
* googl-php is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/





function assert_equals($is, $should) {
if($is != $should) {
  exit(1);
} else {
  println('Passed!');
}
}

function assert_url($is) {
if(!preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $is)) {
  exit(1);
} else {
  println('Passed!');
}
}

function println($text) {
echo $text . "\n";
}

require 'googl/Googl.class.php';

require 'tmhOAuthExample.php';
require 'tmhOAuthExample1.php';

$tmhOAuth = new tmhOAuthExample();
$tmhOAuth1 = new tmhOAuthExample1();

#
# IMPORTANT: Please add your API key to make the tests work
#
$googl = new Googl('AIzaSyDCtt0M0o2sxYN1aFfQvPkKcXibFbivaZE');

require_once('bitly/bitly.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$tag='&tag=tech2day-21';

$link= ($_REQUEST['url']);
//echo $link;
if (strpos($link, '&tag') !==false) {
   echo "<br/>";
   $count=strpos($link, '&tag');
   $count2=strpos($link, '&',$count+1);
   echo "<br/>";
   $link2= substr($link,0,$count); // part of url before tag
   $anotherurl=substr($link,$count2);
   echo $finalstring=$link2.$tag.$anotherurl;
   $link=$finalstring;
}else{

   $link=$link.$tag;
}
  println("#1 - Assert that shortening $link results in an URL");
 //  $shortLink=$googl->shorten($link); 


$client_id = 'b43f5748332b17a0c188afc18cb4b21781e1cd24';
$client_secret = '0d5fa40fb8081baf837718bc423c370fa36f304c';
$user_access_token = '77fa72713a3a19c8a2cf8c480c3f6b83156603b8';
$user_login = 'tush59links';



$params = array();
$params['access_token'] = $user_access_token;
$params['longUrl'] = $link;
//$params['domain'] = 'j.mp';
$results = bitly_get('shorten', $params);
$finalshortenedurl='https://amazon.in&tag=tech2day-21';
if($results['status_code']==200){
  $finalshortenedurl=$results['data']['url'];
?> 



<div id="get_trends">
<h2>Get trends</h2>
<?php



      /*$code = $tmhOAuth->user_request(array(
      'url' => $tmhOAuth->url('1.1/trends/closest'),
      'params' => array(
        'lat' => '20.5937',
        'long' => '78.9629',
      )
      ));*/

      //if (/*$code == 200 ||*/1 ) :
      //$data = json_decode($tmhOAuth->response['response'], true);
      //var_dump($data);

      ?>

      <div id="get_trends_country" >
      <h2>get_trends_country</h2>

      <?php 
      //echo $data[0]['woeid']; //die;
      $trends='';
      $cntr=1;
      $fetchtrends=0;
   //session_destroy();
   error_reporting(E_ALL ^ E_STRICT);
  if(isset($_SESSION['futuredate']) && !empty($_SESSION['futuredate'])){
      $date = date("Y-m-d H:i:s");
      $now = strtotime($date);
      $prev= strtotime($_SESSION['futuredate']);
      if($now>$prev){
        $fetchtrends=1;
      }else{
       if(isset($_SESSION['trends'])){ 
         $trends=$_SESSION['trends'];
        }
      }
  }else{
       $fetchtrends=1;
  }
    
    if($fetchtrends==1){
      //echo "<pre>"; print_r($_SESSION); die;
      echo "here"; //die;
          $date = date("Y-m-d H:i:s");
          $currentDate = strtotime($date);
          $futureDate = $currentDate+(60*5);
          $formatDate = date("Y-m-d H:i:s", $futureDate); //die;
          echo $_SESSION['futuredate']=$formatDate;

          $code = $tmhOAuth->user_request(array(
          'url' => $tmhOAuth->url('1.1/trends/place'),
          'params' => array(
            'id' =>'23424848',//'2295408', //
          )
          ));

          if ($code == 200) :
          $data = json_decode($tmhOAuth->response['response'], true);
          //echo "<pre>"; print_r($data); die;
          $data=$data[0]['trends'];

          foreach ($data as $data1) {
            # code...
            
            if($data1['promoted_content']===null){
              $trends.=$data1['name']." "; 
             $cntr++;
            }

            if($cntr>=4) {
              break;
            }
          }
     
        $_SESSION['trends']=$trends;
      ?>

      <?php else : ?>
      <h3>Something went wrossng</h3>
      <p><?php echo $tmhOAuth->response['error'] ?></p>
      <?php endif; } ?>
      </div>




      

     <?php 
     // echo $trends; die;
    if($trends !=''){
        $code = $tmhOAuth->user_request(array(
        'url' => $tmhOAuth->url('1.1/statuses/update'),
        'params' => array(
          'status' =>"Check out this product at amazon @".$_REQUEST['price']." Only : ".$finalshortenedurl." ".$trends."",
        ),
        'method'=>'post',
        ));

    $code = $tmhOAuth1->user_request(array(
        'url' => $tmhOAuth1->url('1.1/statuses/update'),
        'params' => array(
          'status' =>"Check out this product at amazon @".$_REQUEST['price']." Only : ".$finalshortenedurl." ".$trends."",
        ),
        'method'=>'post',
        ));

        if (/*$code == 200 ||*/1 ) {
        $data = json_decode($tmhOAuth->response['response'], true);
        echo "<pre>"; print_r($data); die;
        }
    }
    }
}

?>



<?php /*
//assert_url($shortLink);


/*println('#2 - Assert that expanding http://goo.gl/KSggQ resolves to http://www.google.com/');
assert_equals($googl->expand('https://goo.gl/9HzoQK'), 'http://www.google.com/');

println('#3 - Assert that shortening https://www.facebook.com results in an URL');
assert_url($googl->shorten('https://www.facebook.com'));

println('#4 - Assert that expanding http://goo.gl/wCWWd resolves to http://www.php.net/');
assert_equals($googl->expand('https://goo.gl/9HzoQK'), 'http://www.php.net/'); */

# If this point is reached, all tests have passed
//println('All tests have successfully passed!'); */  ?>
