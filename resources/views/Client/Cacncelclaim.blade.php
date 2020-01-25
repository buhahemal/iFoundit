Hey <i> {{$candata->claimusername}}</i>!
<br>
Your Claim Was Cancel Please Try Again :
<p> ItemName  :- {{$candata->itemName}}<p>
<p> ItemPostDate :- {{date('d F Y', strtotime($candata->itempostdate))}}</p>
<p> Item Claim-Description :-  {{$candata->cliamdescription}}</p>
Thank You,
<i>{{ $candata->sender }}</i>
   