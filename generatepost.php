
<head>
  <title></title>
</head>
<body>
<form method ="post" action="" name="form" id="form" >
    <input type="text" name="url" id="url" />
    <button type="submit"> save </button>
    </form>
</body>
</html>

<?php

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

#
# IMPORTANT: Please add your API key to make the tests work
#
$googl = new Googl('AIzaSyDCtt0M0o2sxYN1aFfQvPkKcXibFbivaZE');
$tag='&tag=tech2day-21';

$link= ($_REQUEST['url']);
//echo $link;
if (strpos($link, '&tag') !==false) {
     echo "<br/>";
     $count=strpos($link, '&tag');
     $count2=strpos($link, '&',$count+1);
     echo "<br/>";
     $link2= substr($link,0,$count) . "<br />\n"; // part of url before tag
     $anotherurl=substr($link,$count2);
     echo $finalstring=$link2.$tag.$anotherurl;
     $link=$finalstring;
}else{

     $link=$link2.$tag;
}
    println("#1 - Assert that shortening $link results in an URL");
   // echo $shortLink=$googl->shorten($link);

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

$date = date("Y-m-d H:i:s");
$currentDate = strtotime($date);
$futureDate = $currentDate+(60*5);
$formatDate = date("Y-m-d H:i:s", $futureDate);

/*$code = $tmhOAuth->user_request(array(
  'url' => $tmhOAuth->url('1.1/trends/place'),
   'params' => array(
      'id' =>'2295408', //'23424848',
    )
));

if ($code == 200) :
  $data = json_decode($tmhOAuth->response['response'], true);
  echo "<pre>"; print_r($data); die;
 
?>
 
<?php else : ?>
  <h3>Something went wrossng</h3>
  <p><?php echo $tmhOAuth->response['error'] ?></p>
<?php endif; ?>
</div>



 
<?php else : ?>
  <h3>Something went wrong</h3>
  <p><?php echo $tmhOAuth->response['error'] ?></p>
<?php endif; ?>
</div>

*/

$code = $tmhOAuth->user_request(array(
  'url' => $tmhOAuth->url('1.1/statuses/update'),
  'params' => array(
      'status' => 'Test tweet from ashish!',
    ),
  'method'=>'post',
));

if (/*$code == 200 ||*/1 ) {
  $data = json_decode($tmhOAuth->response['response'], true);
  echo "<pre>"; print_r($data); die;
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
