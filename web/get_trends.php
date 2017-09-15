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

if ($code == 200 ||1 ) :
  //$data = json_decode($tmhOAuth->response['response'], true);
  //var_dump($data);
 
?>

<div id="get_trends_country" >
  <h2>get_trends_country</h2>

<?php 
//echo $data[0]['woeid']; //die;
$code = $tmhOAuth->user_request(array(
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


