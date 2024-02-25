# <img src="https://i.imgur.com/N3e32ol.png" width="40"> Alpha 4
## Description

This is the fourth (and hopefully last) alpha project for my school.
The project is a website that allows users to chat with other people that are in the same network.
The processing is done by a backend written
in <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/2560px-PHP-logo.svg.png" width="40">.
The website is written
in <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/38/HTML5_Badge.svg/800px-HTML5_Badge.svg.png" width="20"> and
<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/62/CSS3_logo.svg/1024px-CSS3_logo.svg.png" width="20">.
<br>
This project was made by [Matyáš Závora](https://www.linkedin.com/in/matyas-zavora/) (me)
<br><a href="https://www.linkedin.com/in/matyas-zavora/"><img src="https://avatars.githubusercontent.com/u/105340917?v=4" width=10%></a>

Note: It's 25th of February, 18:59 and i'm giving up.<br><br>
I have tried to make at least the UDP discovery part of it, but I have failed.<br><br>
Firstly I have made the chat's design that can be seen in the `templates` folder. I personally think that it looks good.
Then I realized, I don't know how to make a UDP discovery. I have tried to send a UDP packet to the broadcast address of the network, but it didn't work.
Overall, this project is a total failure and to be honest, I'm not ashamed of it as failure is a part of success. <br><br>
When I'll have more time, I would like to come back to this project and try it again. But for now, I'm done with it.

#### Grade(s): TBA
### Prerequisites
- [<u><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/03/Xampp_logo.svg/2560px-Xampp_logo.svg.png" width="80"></u>](https://www.apachefriends.org/index.html) (
  or any other web server)
- [<u><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/2560px-PHP-logo.svg.png" width="40"></u>](https://www.php.net/downloads.php)
  7.4 (or higher)
  - Enable `sockets` extension in `php.ini` (uncomment `extension=sockets` line)
- A web browser
- (Optional) Access to the internet (
  for <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Bootstrap_logo.svg/2560px-Bootstrap_logo.svg.png" width="24">)
    - Note: website is fully functional
      without <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Bootstrap_logo.svg/2560px-Bootstrap_logo.svg.png" width="24">,
      but it won't look as good as it is supposed to.
- Not really a prerequisite, but it is recommended to have a network of people to chat with. Otherwise, the website is pretty much useless.

## Installation
#### Windows
1. Open <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/03/Xampp_logo.svg/2560px-Xampp_logo.svg.png" width="80"> or any other web server
2. Clone this repository into the `htdocs` folder of <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/03/Xampp_logo.svg/2560px-Xampp_logo.svg.png" width="80">
3. Start <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/03/Xampp_logo.svg/2560px-Xampp_logo.svg.png" width="80"/> (Apache should be enough) (default port is 80)
4. Open `localhost[:port]/alpha-4` in your browser
5. Chat away!

#### Linux

1. Clone this repository into `/var/www/html`
2. Start Apache/Nginx (default port is 80)
3. Open `localhost[:port]/alpha-4` in your browser

If you get a permission error, run `sudo chmod -R 777 /var/www/html/alpha-4`
and `sudo chown -R www-data:www-data /var/www/html/alpha-4`.
This will give the web server full access to the folder.