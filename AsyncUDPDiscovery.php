<?php

class AsyncUDPDiscovery
{
    private $socket;
    private $multicastAddress;
    private $multicastPort;
    private $peerId;
    private $peers = [];

    public function __construct($peerId, $ipAddress, $maskLength, $multicastPort)
    {
        $this->multicastAddress = $this->getMulticastAddress($ipAddress, $maskLength);
        $this->multicastPort = $multicastPort;
        $this->peerId = $peerId;

        $this->socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
        socket_set_option($this->socket, SOL_SOCKET, SO_REUSEADDR, 1);
        socket_bind($this->socket, 0, 0);
        socket_set_option($this->socket, SOL_SOCKET, SO_BROADCAST, 1);
        socket_set_option($this->socket, IPPROTO_IP, MCAST_JOIN_GROUP, $this->packMulticastAddress());
    }

    function getMulticastAddress($ipAddress, $maskLength)
    {
        $networkAddress = ip2long($ipAddress) & ip2long('255.255.255.255') << (32 - $maskLength);
        $multicastBaseAddress = '224.0.0.0';

        return long2ip($networkAddress | ip2long($multicastBaseAddress));
    }

    private function packMulticastAddress(): string
    {
        return inet_pton($this->multicastAddress) . pack("I", INADDR_ANY);
    }

    public function discover()
    {
        $request = json_encode(["command" => "hello", "peer_id"]);

        socket_sendto($this->socket, $request, strlen($request), 0, $this->multicastAddress, $this->multicastPort);

        while (true) {
            $data = '';
            socket_recvfrom($this->socket, $data, 1024, 0, $peerAddress, $peerPort);

            if (isset($response['status']) && $response['status'] === 'ok') {
                $peerId = $response['peer_id'];
                if ($peerId != $this->peerId) {
                    $this->peers[] = $peerId;
                }
            }
        }
    }

    public function __destruct()
    {
        socket_close($this->socket);
    }

    public function getPeers(): array
    {
        return $this->peers;
    }
}