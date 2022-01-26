# best-practices

<!--
*** Thanks for checking out the Best-README-Template. If you have a suggestion
*** that would make this better, please fork the repo and create a pull request
*** or simply open an issue with the tag "enhancement".
*** Thanks again! Now go create something AMAZING! :D
***
***
***
*** To avoid retyping too much info. Do a search and replace for the following:
*** github_username, repo_name, twitter_handle, email, project_title, project_description
-->



<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
-->
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]


<!-- PROJECT LOGO -->
<br />
<p align="center">
  <p align="center">
    <br />
    <a href="./doc"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="https://github.com/Thynkon/priki">View Demo</a>
    ·
    <a href="https://github.com/Thynkon/priki/issues">Report Bug</a>
    ·
    <a href="https://github.com/Thynkon/priki/issues">Request Feature</a>
  </p>
</p>



<!-- TABLE OF CONTENTS -->
<details open="open">
  <summary><h2 style="display: inline-block">Table of Contents</h2></summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#hacking-on-the-project">Hacking on the project</a></li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#documentation">Documentation</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

Priki is a wiki for best practices in software development. It is a school project that allows you to learn the basics of laravel.

### Built With

* [PHP 8.0](https://www.php.net/releases/8.0/en.php)
* [Laravel 8](https://laravel.com/docs/8.x/installation)
* [Livewire 2.8.2](https://laravel-livewire.com/)
* [MariaDB 10.6.5](https://mariadb.com/kb/en/mariadb-1065-release-notes/)
* [Composer 2.1.11](https://getcomposer.org/download/)


<!-- GETTING STARTED -->
## Getting Started

To get a local copy up and running follow these simple steps.

### Prerequisites
#### Dependencies
- [NixOS](https://nixos.org/)
  ```sh
  nix-shell shell.nix
  ```
  
#### Database
Create database, user and grant him access to the database.

```sql
CREATE DATABASE priki;
CREATE USER '<USERNAME>'@'localhost' IDENTIFIED BY '<password';
GRANT ALL PRIVILEGES ON priki.* TO '<USERNAME>'@'localhost';
FLUSH PRIVILEGES;
```

### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/Thynkon/priki.git
   ```

2. Install php packages
   ```sh
   cd priki
   composer install
   ```

3. Generate application key and add it in `.env``
   ```sh
   cp .env.example .env
   php artisan key:generate
   ```

3. Install npm dependencies
    ```sh
    npm install
    ```

4. Build assets
    ```sh
    npm run dev
    npm run watch
    ```

5. Setup database connection
   This projects uses a mongo database. In order to connect to a database, you must set your database credentials in **.env**.
   ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=<DATABASE_NAME>
    DB_USERNAME=<USERNAME>
    DB_PASSWORD=<PASSWORD>
   ```

6. Populate the database
   ```sh
   php artisan migrate:fresh --seed
   ```

## Hacking on the project
### Tests
If you have added a feature and you want to test if everything is ok, you can run the unit tests we wrote
by typing the following:
```sh
composer test
```

<!-- ROADMAP -->
## Roadmap

See the [open issues](https://github.com/Thynkon/priki/issues) for a list of proposed features (and known issues).

## Documentation

<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE` for more information.


<!-- CONTACT -->
## Contact

- [Thynkon](https://github.com/Thynkon)

Project Link: [https://github.com/Thynkon/priki](https://github.com/Thynkon/priki)

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[forks-shield]: https://img.shields.io/github/forks/Thynkon/priki
[forks-url]: https://github.com/Thynkon/priki/network/members
[stars-shield]: https://img.shields.io/github/stars/Thynkon/priki
[stars-url]: https://github.com/Thynkon/priki/stargazers
[issues-shield]: https://img.shields.io/github/issues/Thynkon/priki
[issues-url]: https://github.com/Thynkon/priki/issues
[license-shield]: https://img.shields.io/github/license/Thynkon/priki
[license-url]: https://github.com/Thynkon/priki/blob/master/LICENSE
