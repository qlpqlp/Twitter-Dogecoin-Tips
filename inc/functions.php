<?php
/**
*   File: functions
*   Author: https://twitter.com/inevitable360 and all #Dogecoin friends and familly helped will try to find a way to put all names eheh!
*   Description: Real use case of the dogecoin.com CORE Wallet connected by RPC Calls using Old School PHP Coding with easy to learn steps (I hope lol)
*   License: Well, do what you want with this, be creative, you have the wheel, just reenvent and do it better! Do Only Good Everyday
*/
    // Include the Dogecoin Core Bridge
    require_once 'vendors/jsonRPCClient.php';
    $DogePHPbridgeCommand = new jsonRPCClient($dogecoinCoreProtocol.$rpcuser.':'.$rpcpassword.'@'.$dogecoinCoreServer.':'.$dogecoinCoreServerPort);

    // Include the Twitter API Framework
    require_once('inc/vendors/TwitterAPIExchange.php');

    // Add the PDO DB Connection
    $db = 'mysql:host='.$dbhost.';dbname='.$dbname;
    $opt = [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES => false, ];
    try {
      $pdo = new PDO($db, $dbuser, $dbpass, $opt);
      }
    catch (PDOException $e) {
      echo '<br>DB Error: ' . $e->getMessage() . '<br><br>'; echo '<br>This page will auto refresh in 5 seconds to check if the issue is resolved!'; header("Refresh:5"); exit();
     };

    // we set the twitter API credentials from config.php
    $TwitterSettings = array(
        'oauth_access_token' => $TwitterAccessToken,
        'oauth_access_token_secret' => $TwitterAccessTokenSecret,
        'consumer_key' => $TwitterConsumerKey,
        'consumer_secret' => $TwitterConsumerSecret
    );
    $twitter = new TwitterAPIExchange($TwitterSettings);

    // now we send the request to get the all Tweets with the correct #hastag $TwitterSpecialTag
    $tweet = json_decode($twitter->setGetfield('query='.$TwitterSpecialTag.'&max_results=100&expansions=author_id&tweet.fields=created_at,referenced_tweets&place.fields=name&user.fields=username')->buildOauth('https://api.twitter.com/2/tweets/search/recent', 'GET')->performRequest());

    // we get the total of tweets and users found
    $total = count($tweet->data);
    $totalusers = count($tweet->includes->users);

    // we go tru all tweets to find Tips to send
    for ($i = 0; $i < $total; $i++ ) {

        // we check if the user has an account with more than 30 days and if it follows more then 100 users and is followed by at leat 100 users, because of fake accounts and abusers
            $tweetUser = json_decode($twitter->setGetfield('user.fields=created_at,public_metrics')->buildOauth('https://api.twitter.com/2/users/'.$tweet->data[$i]->author_id, 'GET')->performRequest());

            if (time() > strtotime($tweetUser->data->created_at . ' +30 day') and $tweetUser->data->public_metrics->followers_count > 100 and $tweetUser->data->public_metrics->following_count > 100){

                // We only allow Tips on New Tweets and Replies!
                $type = "tweet";
                if (isset($tweet->data[$i]->referenced_tweets[0]->type)){
                    $type = $tweet->data[$i]->referenced_tweets[0]->type;
                };
                if ($type != "retweeted"){

                    $amount = 0; // by default we confirm that $Doge is 0

                    // Now we will get the $Doge amount from the #Hastag
                    $muchdoge = explode($TwitterMuchDoge." ",$tweet->data[$i]->text);

                    $muchdoge = explode(" ".$TwitterSuchShib." @",$muchdoge[1]);
                    $amount = $muchdoge[0];

                    // Now we will get the Username from the #Hastag
                    $muchdoge = explode(" ".$TwitterDogeWallet." ",$muchdoge[1]);
                    $touser = $muchdoge[0];

                    // Now we will get the $Doge Wallet from the #Hastag
                    $muchdoge = explode(" ",$muchdoge[1]);
                    $to = $muchdoge[0];

                    // We validate the Shib Wallet Adress to make sure is correct formated
                    $pattern = '/^D{1}[5-9A-HJ-NP-U]{1}[1-9A-HJ-NP-Za-km-z]{32}/';
                    preg_match($pattern, trim($to), $matches);
                    if (!isset($matches[0])){
                      $amount = 0;
                    }else{
                      // we also check if the destination user has an account with more than 30 days and if it follows more then 100 users and is followed by at leat 100 users, because of fake accounts and abusers
                      $tweetUserTo = json_decode($twitter->setGetfield('user.fields=created_at,public_metrics')->buildOauth('https://api.twitter.com/2/users/by/username/'.$touser, 'GET')->performRequest());
                      if (time() < strtotime($tweetUserTo->data->created_at . ' +30 day') and $tweetUserTo->data->public_metrics->followers_count < 100 and $tweetUserTo->data->public_metrics->following_count < 100){
                                $amount = 0;
                      }
                    };

                    // We only allow sending $Doge if its only 1 $Doge
                    if ($amount == 1){

                          // Whe check if the TIP was alredy send to this tweet, to not doble send $Doge
                          $db = $pdo->query("SELECT * FROM tiptransactions where twitter_id='".$tweet->data[$i]->id."' limit 1");
                          if ($db->fetch()){
                                  // the transaction alredy exist, do nothing
                          }else{

                              $username = "";
                              // we go tru all ~user tweets to find the correct username
                              for ($iusers = 0; $iusers < $totalusers; $iusers++ ) {
                                  if ($tweet->includes->users[$iusers]->id == $tweet->data[$i]->author_id){
                                      $username = $tweet->includes->users[$iusers]->username;
                                  };
                              };

                              // we will check if the Shib is alredy in the Databse
                              $user_id = 0;
                              $db = $pdo->query("SELECT * FROM tipusers where user='".$username."' limit 1");
                              while ($row = $db->fetch()) {
                                $user_id = $row["id"];
                              };

                              // if thge Shib is not on the Database, we add it
                              if ($user_id == 0){

                                $db = $pdo->query("INSERT INTO `tipusers` (
                                `user`
                                ) VALUES (
                                '".$username."'
                                );");

                              // now we get the ID from the Shib
                                $db = $pdo->query("SELECT * FROM tipusers where user='".$username."' limit 1");
                                while ($row = $db->fetch()) {
                                  $user_id = $row["id"];
                                };
                              };

                              /*** HERE IT IS THE SIMPLICITY OF DOGECOIN CORE COMMANDS ***/
                              // Need to unlock wallet before any transactions
                              $DogePHPbridgeCommand->walletpassphrase($UnlockDogecoinWalletPassword, 60);

                              // Now we send the command to send $Doge to the Shib
                              $transaction_id = $DogePHPbridgeCommand->sendtoaddress($to, $amount, "TwitterID:".$tweet->data[$i]->id, $touser." From:".$username);
                              /*** END OF THE SIMPLICITY OF DOGECOIN CORE COMMANDS ***/

                              // If you get the transaction ID, then the the command was sent succeful and we can store in a DB
                              if (isset($transaction_id)){
                                    $db = $pdo->query("INSERT INTO `tiptransactions` (
                                    `user_id`,
                                    `twitter_id`,
                                    `transaction_id`,
                                    `amount`,
                                    `to`
                                    ) VALUES (
                                    '$user_id',
                                    '".$tweet->data[$i]->id."',
                                    '$transaction_id',
                                    '$amount',
                                    '$to'
                                    );");
                              };

                          };
                    };
                };
            };
    };
?>