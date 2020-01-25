Hey <i> {{$cdata->Postusername}}</i>!
<br>
Notification For ClaimUser
<br>
<p> ItemName  :- {{$cdata->itemName}}<p>
<br>
<p> ItemPostDate :- {{date('d F Y', strtotime($cdata->itempostdate))}}</p>
<br>
<p> Item Claim-Description :-  {{$cdata->cliamdescription}}</p>
Thank You,
<br/>
<i>{{ $cdata->sender }}</i>
 