<?php
$net_fail=0;
while(true){
    //$URL = "http://120.24.87.76/hz.php?sn=xxxx";
    $URL = "http://127.0.0.1/jk/hz.php?sn=RBiJCmTZ7BsfaS56i3m2pFrmbdzctYPi";
    logging("start get");
    $html = @file_get_contents($URL, 0, stream_context_create(["http"=>["timeout"=>5]]));
    if($html=="ok"){
        $net_fail=0;
        logging("get ok");
        sleep(59);
        continue;
    }
    if($html=="no"){
        $net_fail=0;
        logging("get no");
        //exec("rundll32.exe powrProf.dll,SetSuspendState", $o, $r);
    }else{
        $net_fail++;
        if($net_fail>=5){
            
        }
        logging("get net failed:{$net_fail}, html:{$html}");
        //exec("rundll32.exe powrProf.dll,SetSuspendState", $o, $r);
    }
    sleep(59);
}

function logging($msg){
    $msg = date("Y-m-d H:i:s") . ", {$msg}" . PHP_EOL;
    @file_put_contents(__DIR__.'/jk.log', $msg, FILE_APPEND);
    echo $msg;
}
