# WordPress starter

WordPress starter project for custom theme development with Composer, Glide, Vite, Tailwind CSS, Prettier, Deployer, Gutenberg, Advanced Custom Fields and other tools I like.

It contains a few useful WordPress plugins, development tools and a custom starter theme to get a head start with custom theme development. The theme contains a few simple templates, styles and scripts and some PHP classes with sensible defaults that can be easily customized.

## Features

This starter project uses the folowing PHP dependencies and JavaScript packages by default. Of course, this can be customized to your liking or the project specific needs:

### Development tools

- [Composer](https://getcomposer.org/) - PHP dependency manager
- [Bedrock autoloader](https://roots.io/bedrock/) - Autoloader for WordPress plugins
- [Env](https://github.com/oscarotero/env) and [PHP dotenv](https://github.com/vlucas/phpdotenv) - Loads environment variables from `.env`
- [Glide](https://glide.thephpleague.com/) - Image resizing and manipulation
- [NPM](https://www.npmjs.com/) - Frontend package manager
- [Vite](https://vite.dev/) - Frontend build tool and local development server
- [Tailwind CSS](https://tailwindcss.com/) - Utility-first CSS framework
- [Prettier](https://prettier.io/) - Code formatting
- [Prettier PHP](https://github.com/prettier/plugin-php) - PHP code formatting
- [Deployer](https://deployer.org/) - PHP deployment tool
- [GitHub actions](https://github.com/features/actions) - Automatic deployment

### WordPress and plugins

- [WordPress](https://wordpress.org/) - Content Management System
- [Gutenberg](https://wordpress.org/gutenberg/) - WordPress block editor
- [Advanced Custom Fields Pro](https://www.advancedcustomfields.com/) - Custom fields and meta boxes (requires license)
- [Rank Math](https://rankmath.com/) - SEO stuff
- [Limit login attempts](https://wordpress.org/plugins/limit-login-attempts/) - Brute force protection
- [Proxy cache purge](https://wordpress.org/plugins/varnish-http-purge/) - Purges (Varnish) cache when content is updated
- [WP Mail SMTP](https://wpmailsmtp.com/) - Email delivery
- [WP Languages](https://wp-languages.github.io/) - WordPress language packs via Composer

## Requirements

Ensure you have the following installed on your system:

- [PHP](https://www.php.net/) (version 8.1 or higher)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) (version 23 or higher)
- [npm](https://www.npmjs.com/) or [yarn](https://yarnpkg.com/)

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/sboerrigter/wordpress-starter.git
   cd wordpress-starter
   ```

2. Install PHP dependencies:

   ```bash
   composer install
   ```

3. Install JavaScript dependencies:

   ```bash
   npm install
   # or
   yarn install
   ```

4. Set up your `.env` file for environment-specific configurations.

## Usage

- Run the development server:

  ```bash
  npm start
  ```

- Build for production:
  ```bash
  npm run build
  ```

## License

This project is licensed under the [MIT License](LICENSE).
