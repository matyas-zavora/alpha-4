<?php

class UDPDiscovery
{
    private $ipv4;
    private $mask;
    private $port;
    private $peerId;
    private $socket;
    private $peers = [];
    private $broadcastAddress;

    public function __construct($ipv4, $mask, $port, $peerId)
    {
        $this->ipv4 = $ipv4;
        $this->mask = long2ip(-1 << (32 - $mask));
        $this->port = $port;
        $this->peerId = $peerId;
    }

    public function start()
    {
        $broadcastAddress = $this->calculateBroadcastAddress();
        if ($broadcastAddress === false) {
            throw new Exception("Failed to calculate broadcast address");
        }
        $this->ipv4 = $broadcastAddress;
        $this->createSocket();
        $this->sendDiscovery();

        while (true) {
            $this->receiveAndHandleMessages();
            usleep(500000); // Sleep for 0.5 seconds to prevent busy looping
        }
    }

    private function calculateBroadcastAddress(): void
    {
        // Split the IP address and subnet mask into parts
        $ipParts = explode('.', $this->ipv4);
        $maskParts = explode('.', $this->mask);

        // Calculate the broadcast address by performing a bitwise OR operation
        $broadcastParts = [];
        for ($i = 0; $i < 4; $i++) {
            // Convert IP parts and mask parts to integers before performing bitwise operation
            $ipInt = (int)$ipParts[$i];
            $maskInt = (int)$maskParts[$i];
            $broadcastParts[] = ($ipInt | ~$maskInt) & 255; // Apply bitmask to ensure values are in range [0, 255]
        }

        // Return the broadcast address as a string
        echo "Broadcast: " . implode('.', $broadcastParts) . "\n";
        $this->broadcastAddress = implode('.', $broadcastParts);
    }

    private function createSocket()
    {
        /*
         * $ip = "255.255.255.255";
$port = 8888;
$str = "DEVICE_DISCOVERY";

$sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
socket_set_option($sock, SOL_SOCKET, SO_BROADCAST, 1);
socket_sendto($sock, $str, strlen($str), 0, $ip, $port);

socket_recvfrom($sock, $buf, 20, 0, $ip, $port);
echo "Messagge : < $buf > , $ip : $port <br>";

socket_close($sock);
         */

        // Make a non-blocking socket based on the example above
        // Send a json {"command":"hello","peer_id":$this->peerId} to the broadcast address

        $this->socket = stream_socket_server("udp://{$this->broadcastAddress}:{$this->port}", $errno, $errstr, STREAM_SERVER_BIND);
        if (!$this->socket) {
            throw new Exception("Failed to create server socket: $errstr ($errno)");
        }

        // Set the socket to non-blocking mode
        stream_set_blocking($this->socket, false);

        // Set the socket to receive broadcast messages
        socket_set_option($this->socket, SOL_SOCKET, SO_BROADCAST, 1);

        // Set the socket to receive messages from any address
        socket_set_option($this->socket, SOL_SOCKET, SO_REUSEADDR, 1);
    }

    private function sendDiscovery()
    {
        $discovery = json_encode(['command' => 'hello', 'peer_id' => $this->peerId]);
        $socket = stream_socket_client("udp://{$this->broadcastAddress}:{$this->port}", $errno, $errstr);
        if (!$socket) {
            echo "Failed to create client socket: $errstr ($errno)\n";
            return;
        }
        stream_socket_sendto($socket, $discovery);
        fclose($socket);
    }

    private function receiveAndHandleMessages()
    {
        $readSockets = [$this->socket];
        $writeSockets = null;
        $exceptSockets = null;
        $numChanged = stream_select($readSockets, $writeSockets, $exceptSockets, 0); // Non-blocking check
        if ($numChanged === false) {
            // Error occurred
            echo "Error occurred while checking sockets\n";
            return;
        }

        if ($numChanged > 0) {
            // There are incoming messages
            $data = stream_socket_recvfrom($this->socket, 2048, 0, $peer);
            if ($data !== false) {
                $this->handleMessage($data);
            }
        }
    }

    private function handleMessage($data)
    {
        $message = json_decode($data, true);
        if ($message && isset($message['status']) && $message['status'] === 'ok' && isset($message['peer_id'])) {
            $peerId = $message['peer_id'];
            if ($peerId !== $this->peerId) {
                $this->peers[$peerId] = $this->extractIpAddress($peer);
                echo "A: $data\n";
            }
        }
    }

    private function extractIpAddress($peer)
    {
        if (strpos($peer, ':') !== false) {
            // IPv6 format, remove port part
            $peer = explode(':', $peer)[0];
        }
        return $peer;
    }

    public function getPeers()
    {
        return $this->peers;
    }
}

?>
