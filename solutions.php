<?php

//Problem1

function findOddEvenPair(array $numbers): int
{
    for($idx = 0; $idx < count($numbers) - 1; $idx++)
{

$even = ($numbers[$idx] + $numbers[$idx + 1]) % 2 == 0;
if (!$even) return $idx; // tiklīdz divu blakus esošo vērtību summa ir nepāra (odd)
}

return -1;
}

$array = [1, 2, 4, 3, 7];
echo findOddEvenPair($array);

//Problem2
class SummationService
{
    private $array;

    public function __construct(array $data)
    {
       $this->array = $data;
    }

    public function sum(int $a, int $b): int
    {
        $sum = 0;

        for ($i = $a; $i <= $b; $i ++)
        {
            $sum = $sum + $this->array[$i];
        }

        return $sum;
    }
}
$ss = new SummationService([-1, 0, 2, 7, -15]);
    echo $ss->sum(0, 0) . "<br />";
    echo $ss->sum(1, 3) . "<br />";
    echo $ss->sum(2, 4) . "<br />";
   
//Problem3

    function longestSubstr(string $text): string
    {
        $n = strlen($text);
        $st = 0;
        $currlen = 0;
        $maxlen = 0;
        $start = 0;
        $pos = array();

        $pos[$text[0]] = 0;

        for ($i = 1; $i < $n; $i++) {
            if (!array_key_exists($text[$i], $pos)) {
                $pos[$text[$i]] = $i;
            } else {
                if ($pos[$text[$i]] >= $st) {
                    $currlen = $i - $st;

                    if ($maxlen < $currlen) {
                        $maxlen = $currlen;
                        $start = $st;
                    }

                    $st = $pos[$text[$i]] + 1;
                }

                $pos[$text[$i]] = $i;
            }
        }

        if ($maxlen < $i - $st) {
            $maxlen = $i - $st;
            $start = $st;
        }

        return substr($text, $start, $maxlen + 1);
    
}
echo longestSubstr('aZaZaZa');