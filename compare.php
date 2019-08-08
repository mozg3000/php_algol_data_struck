<?php
$s =1000;
$a = [];

for ($i=0; $i < $s; $i++){
    $a[] = $i;
}
$start = microtime(true);

foreach ($a as $e){

    $e = $e+1;
}

$end = microtime(true);
echo "Время выполнения foreach: ".($end - $start) . "\n";

$b = [];

for ($j=0; $j < $s; $j++){
    $b[] = $j;
}
$bo = new ArrayObject($b);
$io = $bo->getIterator();

$start = microtime(true);

for (;$io->valid();){

    $io->current();
    $io->next();
}

$end = microtime(true);
echo "Время выполнения iterator: ".($end - $start);