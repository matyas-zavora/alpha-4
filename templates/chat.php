<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Alpha 4 | Chat</title>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet">
    <link href="./img/favicon/apple-touch-icon.png" rel="apple-touch-icon" sizes="180x180">
    <link href="./img/favicon/favicon-32x32.png" rel="icon" sizes="32x32" type="image/png">
    <link href="./img/favicon/favicon-16x16.png" rel="icon" sizes="16x16" type="image/png">
    <link href="./img/favicon/site.webmanifest" rel="manifest">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="./styles/reset.css" rel="stylesheet">
    <link href="./styles/index.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
          rel="stylesheet"/>
    <link href="./styles/google_icons.css" rel="stylesheet">
    <link href="./styles/chat.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <div class="sidebar">
                <a class="btn btn-outline-danger back-button d-flex align-items-center justify-content-center w-100"
                   href="./">
                    <span class="material-symbols-outlined" style="font-size: 19px;">arrow_back</span> Back
                </a>
                <h5><b>Found Peers</b></h5>
                <ul class="peer-list">
                    <li class="d-flex justify-content-between">
                        <span>You</span>
                        <span class="text-muted">192.168.1.10</span>
                    </li>

                    <?php foreach ($discovery->getPeers() as $peer): ?>
                    <li class="d-flex justify-content-between">
                        <span><?= $peer ?></span>
                    </li>
                    <php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="col-md-10">
            <div class="messages-container">
                <div class="message incoming-message">
                    <div class="message-header">
                        <div class="message-sender">Molic-peer1</div>
                        <div class="message-timestamp">10:30 AM</div>
                    </div>
                    <div class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                </div>

                <div class="message outgoing-message">
                    <div class="message-sender">You</div>
                    <div class="message-timestamp">10:30 AM</div>
                    <div class="message-content">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </div>
                </div>
            </div>
            <form id="message-form">
                <div class="input-group">
                    <input class="form-control" id="message-input" placeholder="Type your message..." type="text">
                    <button class="btn btn-primary" type="submit">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script crossorigin="anonymous"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>