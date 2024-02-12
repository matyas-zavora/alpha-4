# <img src="https://i.imgur.com/N3e32ol.png" width="40"> Alpha 4
## Description

This is the fourth (and hopefully) alpha project for my school.
The project is a website that allows users to chat with other people that are in the same network.
The processing is done by a backend written
in <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/2560px-PHP-logo.svg.png" width="40">.
The website is written
in <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/38/HTML5_Badge.svg/800px-HTML5_Badge.svg.png" width="20">,
<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/62/CSS3_logo.svg/1024px-CSS3_logo.svg.png" width="20">
and <img src="https://iconape.com/wp-content/png_logo_vector/javascript-logo.png" width="18">.
<br>
This project was made by [Matyáš Závora](https://www.linkedin.com/in/matyas-zavora/) (me)
<br><a href="https://www.linkedin.com/in/matyas-zavora/"><img src="https://avatars.githubusercontent.com/u/105340917?v=4" width=10%></a>

#### Grade(s): TBA
### Prerequisites
- [<u><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/03/Xampp_logo.svg/2560px-Xampp_logo.svg.png" width="80"></u>](https://www.apachefriends.org/index.html) (
  or any other web server)
- [<u><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/2560px-PHP-logo.svg.png" width="40"></u>](https://www.php.net/downloads.php)
  7.4 (or higher)
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
2. Start Apache (default port is 80)
3. Open `localhost[:port]/alpha-4` in your browser

If you get a permission error, run `sudo chmod -R 777 /var/www/html/alpha-4`
and `sudo chown -R www-data:www-data /var/www/html/alpha-4`.
This will give the web server full access to the folder.