<?php
$id=$_POST['check'];
$N=count($id);
for($i=0; $i < $N; $i++)
{
    echo($id[$i] . " ");
}
?>