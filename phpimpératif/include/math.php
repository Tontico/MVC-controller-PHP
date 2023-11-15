<?php

function constructTableMultiplie(int $x, int $y):string {
    $table = '<table>';
    for ($i=0;$i<$y+1;$i++) {   
        for ($j=0;$j<$x+1;$j++) {
            if ($i === 0) {
                if ($j === 0) {
                    $table = $table. '<tr>';
                    $table = $table.'<td> </td>';
                } else {
                    $table = $table."<td style='background: yellow;'>$j</td>";
                }       
            } elseif ($j === 0) {
                $table = $table.'<tr>';
                $table = $table."<td style='background: yellow;'>$i</td>";
            } else {
                if ($i === $j) {
                    $style = " style='background: green'";
                } else {
                    $style = '';
                }
                $table = $table.'<td'.$style.'>'.$i*$j.'</td>';
            }
    
            if ($j === $x) {
                $table = $table.'</tr>';
            }     
        }
    }
    $table = $table.'</table>';
    return $table;
}