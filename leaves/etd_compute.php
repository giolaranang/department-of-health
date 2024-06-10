<?php
/*
$mo = $_POST['month'];
$dd = $_POST['day'];
$yy = $_POST['year'];
$half_day = $_POST['half_day'];

if($half_day=='yes'){
$constant = 30 - $dd + 0.5;
}
if($half_day=='no'){
$constant = 30 - $dd;
}
*/
$constant = $_POST['days_present'];

if($constant=="30"){
$points="1.250";
}
if($constant=="29.5"){
$points="1.229";
}
if($constant=="29"){
$points="1.208";
}
if($constant=="28.5"){
$points="1.188";
}
if($constant=="28"){
$points="1.167";
}
if($constant=="27.5"){
$points="1.146";
}
if($constant=="27"){
$points="1.125";
}
if($constant=="26.5"){
$points="1.104";
}
if($constant=="26"){
$points="1.083";
}
if($constant=="25.5"){
$points="1.063";
}
if($constant=="25"){
$points="1.042";
}
if($constant=="24.5"){
$points="1.021";
}
if($constant=="24"){
$points="1.000";
}
if($constant=="23.5"){
$points="0.979";
}
if($constant=="23"){
$points="0.958";
}
if($constant=="22.5"){
$points="0.938";
}
if($constant=="22"){
$points="0.917";
}
if($constant=="21.5"){
$points="0.896";
}
if($constant=="21"){
$points="0.875";
}
if($constant=="20.5"){
$points="0.854";
}
if($constant=="20"){
$points="0.833";
}
if($constant=="19.5"){
$points="0.813";
}
if($constant=="19"){
$points="0.792";
}
if($constant=="18.5"){
$points="0.771";
}
if($constant=="18"){
$points="0.750";
}
if($constant=="17.5"){
$points="0.729";
}
if($constant=="17"){
$points="0.708";
}
if($constant=="16.5"){
$points="0.687";
}
if($constant=="16"){
$points="0.667";
}
if($constant=="15.5"){
$points="0.646";
}
if($constant=="15"){
$points="0.625";
}
if($constant=="14.5"){
$points="0.604";
}
if($constant=="14"){
$points="0.583";
}
if($constant=="13.5"){
$points="0.562";
}
if($constant=="13"){
$points="0.542";
}
if($constant=="12.5"){
$points="0.521";
}
if($constant=="12"){
$points="0.500";
}
if($constant=="11.5"){
$points="0.479";
}
if($constant=="11"){
$points="0.458";
}
if($constant=="10.5"){
$points="0.437";
}
if($constant=="10"){
$points="0.417";
}
if($constant=="9.5"){
$points="0.396";
}
if($constant=="9"){
$points="0.375";
}
if($constant=="8.5"){
$points="0.354";
}
if($constant=="8"){
$points="0.333";
}
if($constant=="7.5"){
$points="0.312";
}
if($constant=="7"){
$points="0.292";
}
if($constant=="6.5"){
$points="0.271";
}
if($constant=="6"){
$points="0.250";
}
if($constant=="5.5"){
$points="0.229";
}
if($constant=="5"){
$points="0.208";
}
if($constant=="4.5"){
$points="0.187";
}
if($constant=="4"){
$points="0.167";
}
if($constant=="3.5"){
$points="0.146";
}
if($constant=="3"){
$points="0.125";
}  
if($constant=="2.5"){
$points="0.104";
}
if($constant=="2"){
$points="0.83";
}
if($constant=="1.5"){
$points="0.162";
}
if($constant=="1"){
$points="0.042";
}
if($constant=="0.00"){
$points="0.021";
}
if($constant==""){
$points="0.000";
}
/*
$remaining_months = 12 - $mo;
$basta = $remaining_months * 1.250;

//echo 'basta : '.$basta.'<br/>';
//echo 'remaining months : '.$remaining_months.'<br/>';
echo $constant.' - days present.';
*/
echo $points.' - Leave Credits Earned for the month .<br/>';

//$ewan = $basta + $points;
//echo "Earned Points : ".$ewan.'<br/>';


?>
<a href="etd.php">Back</a>