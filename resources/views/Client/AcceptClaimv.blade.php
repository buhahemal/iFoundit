Hey <i> {{$adata->claimusername}}</i>!
<br>
congralution Your Claim Was Accepr it Other Information Below:
<p> ItemName  :- {{$adata->itemName}}<p>
<p> ItemPostDate :- {{date('d F Y', strtotime($adata->itempostdate))}}</p>
<p> Item Claim-Description :-  {{$adata->cliamdescription}}</p>
<p> Found item User Mail-Id For Further Communication :- {{$adata->postuseremail}}</p>
Thank You,
<i>{{ $adata->sender }}</i>
 