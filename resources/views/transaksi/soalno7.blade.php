@extends('layouts.app')

@section('content')
    <b>Jawaban A </b><br>
    <?php
        for($i=5;$i>=1;$i--){
            for($j=1;$j<=$i;$j++){
                echo $j." ";
            }
            echo "<br>";
        }
    ?>

    <br><b>Jawaban B </b><br>
    <?php
        for($i=0; $i<=5; $i++){
            for($j=5-$i; $j>=1; $j--){
                echo $j." ";
            }
            echo "<br>";
        }
    ?>

    <br><b>Jawaban C </b><br>
    <?php
        function jawabanc($num){
            for ($i = 1; $i <=$num; $i++){
                for($k=1; $k<=$i; $k++){
                    echo "&nbsp;&nbsp;";
                }
                for($j=$i; $j<=$num; $j++){
                    echo $j."";
                }
                for($j = $num-1; $j >= $i; $j-- ){
                    echo $j;
                }
                    echo "<br>";
            }

            for ($i = $num-1; $i >=1; $i--){
                for ($d=1; $d <= $i; $d++)  {
                    echo  "&nbsp;&nbsp;";
                }
                for ($j = $i; $j <=$num-1; $j++){
                    echo $j."";
                }
                for ($j = $num; $j >=$i; $j--){
                    echo $j."";
                }
                echo "<br>";
            }
        }
        $num = 5;
        jawabanc($num);
    ?>

    <br><b>Jawaban D </b><br>
    <?php
        function jawaband($num){
            for ($i = 1; $i <= $num; $i++)
            {
                for($k = $num; $k > $i; $k-- ){
                    echo "&nbsp;&nbsp;";
                }
                for($j = 1; $j <= $i; $j++ ){
                    echo $j;
                }
                for($j = $i-1; $j >= 1; $j-- ){
                    echo $j;
                }
                echo "<br>";
            }

            for($i=$num-1;$i>=1;$i--){
                for ($k=0; $k <= $num-$i; $k++)  {
                    echo  "&nbsp;";
                }
                for($j=1;$j<=$i;$j++){
                    echo $j;
                }
                for($j = $i-1; $j >= 1; $j-- ){
                    echo $j;
                }
                echo "<br>";
            }
        }
        $num = 5;
        jawaband($num);
    ?>
@endsection
