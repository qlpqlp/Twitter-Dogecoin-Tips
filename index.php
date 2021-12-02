<?php
/**
*   File: Index file of Twitter Dogecoin Tips
*   Author: https://twitter.com/inevitable360 and all #Dogecoin friends and familly helped will try to find a way to put all names eheh!
*   Description: Real use case of the dogecoin.com CORE Wallet connected by RPC Calls using Old School PHP Coding with easy to learn steps (I hope lol)
*   License: Well, do what you want with this, be creative, you have the wheel, just reenvent and do it better! Do Only Good Everyday
*/
    // Now we include the basic configurations for Doge Nodes Map
    include("inc/config.php");
    // Now we include the basic functions for Doge Nodes Map
    include("inc/functions.php");
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Twitter Dogecoin Tips!</title>
  <meta name="description" content="Coded with the love for the Dogecoin Crypto, you can now Tip on Twitter easly without any #Dogecoin Wallet or sharing any private information">
  <meta name="author" content="All Dogecoin Community!">
  <meta name="generator" content="You!">
  <link href="//what-is-dogecoin.com/tips/dogetips.ico" rel="icon" />
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" crossorigin="anonymous">
  <link href="//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="css/doge.css" crossorigin="anonymous">
  <script src="//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="//code.jquery.com/ui/1.12.1/jquery-ui.min.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css" crossorigin="anonymous">
  <script type="text/javascript" src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="//cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="//cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js" crossorigin="anonymous"></script>
  <script type="text/javascript">
  $(document).ready(function() {
      $('#Ttabela').DataTable( {
          "order": [[ 0, "desc" ]],
          rowReorder: {
              selector: 'td:nth-child(0)'
          },
          responsive: true,
    columnDefs: [
        { responsivePriority: 1, targets: 0 },
        { responsivePriority: 2, targets: -1 }
    ]
      } );

  } );
  </script>
</head>
<body style="background: rgba(255, 241, 199, 0); color: rgba(0, 0, 0, 1) !important; background-image: url(img/marsbg.png); background-position: center; background-repeat: no-repeat; background-size: cover">
<?php include("inc/menu.php"); ?>
  <div class="row">
  <div class="col">
    <a href="https://dogecoin.com/#wallets" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Upgrade now to 1.14.5 here!">
      <div class="alert alert-danger" role="alert" style="text-align: center; font-weight: bold">
        Warning: Have a Dogecoin Core Wallet running as a Node? Upgrade now to 1.14.5 here!
      </div>
    </a>
  </div>
 </div>
   <div class="row">
  <div class="col" style="min-width: 350px">
    <div title="Total in the Dogecoin Tips Jar">
      <div class="alert alert-warning" role="alert" style="text-align: center; font-weight: bold">
        <img src="img/tips.gif" style="max-width: 50px; margin-top: -10px" alt="" />
        <span class="badge bg-light text-dark" style="font-size: 32px" data-bs-toggle="tooltip" data-bs-placement="top" title="Total &ETH;oge in the Jar to send Tips">&ETH;<?php echo $totalTips; ?></span><img src="img/tips_wallet.png" style="max-width: 50px; margin-top: -15px" alt="Send Jar Tips to this address" />
        <br>
        <a href="#" onclick="navigator.clipboard.writeText('DTqAFgNNUgiPEfGmc4HZUkqJ4sz5vADd1n');alert('Dogecoin Address Copied to clipboard!')" data-bs-toggle="tooltip" data-bs-placement="top" title="If you want to contribut to the Twitter Dogecoin Tips Jar, send some $Doge to this address!"><span class="badge rounded-pill bg-light text-dark">DTqAFgNNUgiPEfGmc4HZUkqJ4sz5vADd1n</span></a>
      </div>
    </div>
  </div>
  <div class="col" style="min-width: 350px">
    <a href="https://twitter.com/intent/tweet?hashtags=MuchDoge%201,SuchShib%20--twitter-username--,DogeWallet%20--wallet-here--,TwitterDogecoinTips%20--AddFunnyMemeOrMessageHere--"  target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Send a Dogecoin Tip on Twitter!" >
      <div class="alert alert-primary" role="alert" style="text-align: center; font-weight: bold; min-height: 110px">
        <i class="fa fa-twitter" aria-hidden="true" style="font-size: 50px"></i>
        Click here to send a Dogecoin Tip on Twitter!<br>
        <span style="font-size: 12px; color: #000">Only can send tips if the Doge Shib as more then 69 followers/following, 4 weeks and 2 days old minium!</span>
      </div>
    </a>
  </div>
 </div>
  <div class="row">
  <div class="col">
<table id="Ttabela" align="center" cellspacing="1" class="table table-striped table-sm" style="width:100%; background-color: rgba(255, 255, 255, 0.9)">
<thead>
  <tr>
    <th style="display: none">id</th>
    <th>Date</th>
    <th data-priority="1">Transaction</th>
    <th>Doge</th>
    <th>Wallet</th>
    <th>From</th>
    <th>To</th>
    <th>Tweet</th>
  </tr>
</thead>
<tbody id="loadtaks">
<?php
  $db = $pdo->query("SELECT * FROM tiptransactions order by id,date DESC");
  while ($row = $db->fetch()) {
    $dbu = $pdo->query("SELECT * FROM tipusers where id = '".$row["user_id"]."' limit 1"); while ($rowu = $dbu->fetch()) {
    $from = $rowu["user"];
  }
?>
  <tr>
    <td style="display: none"><?php echo $row["id"]; ?></td>
    <td><?php echo $row["date"]; ?></td>
    <td style="word-break: break-all !important"><a href="https://dogechain.info/tx/<?php echo $row["transaction_id"]; ?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Track the transaction!"><?php echo $row["transaction_id"]; ?></a></td>
    <td><?php echo $row["amount"]; ?></td>
    <td style="word-break: break-all !important"><a href="https://dogechain.info/address/<?php echo $row["wallet"]; ?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="View Dogecoin address detaill!"><?php echo $row["wallet"]; ?></a></td>
    <td><a href="https://twitter.com/<?php echo $from; ?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="View Twitter profile!"><?php echo $from; ?></a></td>
    <td><a href="https://twitter.com/<?php echo $row["to"]; ?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="View Twitter profile!"><?php echo $row["to"]; ?></a></td>
    <td><a href="https://twitter.com/<?php echo $from; ?>/status/<?php echo $row["twitter_id"]; ?>" class="btn btn-primary" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="View original TIP tweett!"><i class="fa fa-twitter" aria-hidden="true"></i> View</a></td>
  </tr>
<?php
 };
 ?>
</tbody>
</table>
</div>
</div>
    <!-- We initialise the Tool Tips PopUp on Mouse/Finger Hover-->
    <script type="text/javascript"> var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')); var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) { return new bootstrap.Tooltip(tooltipTriggerEl); })</script>
</body>
</html>