<?php
$consumerKey    = 'ts8a9qaWEEyHGI3qk10sHg';
$consumerSecret = 'LpXe2FcCVessRxKU8pt9lhsKoMZJ9HJXxyISF4o';
$oAuthToken     = '595677923-NzDqrNbFdZyF4EvbmMzAntJ1w69wAHLwvBWoy9qA';
$oAuthSecret    = 'MZ0grvjkZNYBWw8vf3awbQJrqRIW0PAQ5MvsZ3FZZ9g';
require_once('twitter/twitteroauth.php');
// twitteroauth.php points to OAuth.php
// all files are in the same dir
// create a new instance
$tweet = new TwitterOAuth($consumerKey, $consumerSecret, $oAuthToken, $oAuthSecret);
 
//This makes the twitter instance which you can use to post updates to your stream (the user account that registers the app, is used to post the updates to!) :
// post to twitter
//include 'tweet.php';  // the file where the tweet instance is created
$message='origami';
$statusMessage = 'Movie added: ' . $message;
$tweet->post('statuses/update', array('status' => $statusMessage));

?>