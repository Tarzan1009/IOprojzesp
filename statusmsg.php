<?php
function statusmsg($status)
{
    $msg = "0";
    switch ($status) {
        case 1:
            $msg = 'nadana';
            break;
        case 2:
            $msg = 'odebrana od klienta';
            break;
        case 3:
            $msg = 'w drodze';
            break;
        case 4:
            $msg = 'w paczkomacie docelowym';
            break;
        case 5:
            $msg = 'odebrana przez klienta';
            break;
        default:
            $msg = 'blad';
    }
    return $msg;
}

?>