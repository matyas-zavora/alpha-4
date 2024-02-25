<?php
session_start();
include "./UDPDiscovery.php";

/*
    1. UDP discovery
    Po startu začne peer provádět periodické hledání protějšků pomocí “UDP discovery”. Každých pět sekund
    pošle do sítě UDP broadcast na port 9876 a čeká na odpovědi (těch pět sekund než ho pošle znovu). Ke
    komunikaci je použit protokol na bázi JSON. Co řádek, to buď dotaz nebo odpověď. Řádky končí buď CR-LF
    nebo jen LF.

    Q=dotaz, A=odpověď

    Q: {"command":"hello","peer_id":"molic-peer1"}
    A: {"status":"ok","peer_id":"molic-peer1"}
    A: {"status":"ok","peer_id":"molic-peer2"}
    A: {"status":"ok","peer_id":"molic-peer3"}

    Zde “molic-peer1” poslal UDP dotaz do sítě (představil se) a ozvali se mu tři protějšky. Pozor, peer
    odpoví také sám sobě, nutno ignorovat. Čili protějšky jsou pouze dva. Součástí odpovědi je IP adresa
    protějšků. Díky ní lze pak s nimi navázat TCP spojení.
*/

$peerId = $_SESSION['peerId'];
$ipAddress = $_SESSION['ipAddress'];
$port = $_SESSION['port'];
$mask = $_SESSION['mask'];


$discovery = new UDPDiscovery($ipAddress, $mask, $port, $peerId);
$discovery->start();

echo "TEST";
foreach ($discovery->getPeers() as $peer) {
    echo "Peer: $peer\n";
}
include "./templates/chat.php";