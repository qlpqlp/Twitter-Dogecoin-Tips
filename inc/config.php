<?php
/**
*   File: Default Configuration of Twitter Dogecoin Tips
*   Author: https://twitter.com/inevitable360 and all #Dogecoin friends and familly helped will try to find a way to put all names eheh!
*   Description: Real use case of the dogecoin.com CORE Wallet connected by RPC Calls using Old School PHP Coding with easy to learn steps (I hope lol)
*   License: Well, do what you want with this, be creative, you have the wheel, just reenvent and do it better! Do Only Good Everyday
*/
    // Add your Data Base credentials here!
    $dbhost = "localhost";  // put here you database adress
    $dbname = ""; // your DB name
    $dbuser = ""; // your DB username
    $dbpass = ""; // your DB password

    // Add your Dogecoin Core Node credentials here! https://github.com/dogecoin/dogecoin/blob/master/doc/getting-started.md
    $rpcuser = "";
    $rpcpassword = "";
    $dogecoinCoreProtocol = "http://";
    $dogecoinCoreServer = "";
    $dogecoinCoreServerPort = 22555;
    // DANGER |||| DANGER |||| DANGER |||| DANGER
    $UnlockDogecoinWalletPassword = ""; // only used to actually send $DOGE, if you have your Dogecoin Core Wallet Encrypted like you should have :)
    // DANGER |||| DANGER |||| DANGER |||| DANGER

    // Add your Twitter Dev credentials here! Apply for a Dev account here: https://dev.twitter.com/apps/
    $TwitterAccessToken = "";
    $TwitterAccessTokenSecret = "";
    $TwitterConsumerKey = "";
    $TwitterConsumerSecret = "";

    // What Word to find on Twitter to show the last post on Doge Nodes Map?
    $TwitterMuchDoge = "#MuchDoge"; // the hashtag to get the amount of $Doge to send
    $TwitterSuchShib = "#SuchShib"; // the hashtag to get the twitter username that are sending to
    $TwitterDogeWallet = "#DogeWallet"; // the hashtag to get the #Dogecoin Wallet to send $Doge
    $TwitterSpecialTag = "#TwitterDogecoinTips"; // the hashtag to activate the search of sending $Doge Tips
?>