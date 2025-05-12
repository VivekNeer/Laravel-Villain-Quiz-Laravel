# Which Historical Villain Are You? Quiz

A Laravel-based personality quiz that determines which historical villain matches your personality traits. Built with Laravel 10, PHP, and Blade templating.

## Features

- Interactive quiz with 5 personality-based questions
- Dramatic results page with villain descriptions
- Responsive design with dark theme
- Animated transitions and effects
- Optional background music

## Requirements

- PHP 8.1 or higher
- Composer
- Node.js and NPM (for asset compilation)

## Installation

1. Clone the repository:
```bash
git clone <repository-url>
cd villain-quiz
```

2. Install PHP dependencies:
```bash
composer install
```

3. Copy the environment file:
```bash
cp .env.example .env
```

4. Generate application key:
```bash
php artisan key:generate
```

5. Start the development server:
```bash
php artisan serve
```

6. Visit `http://localhost:8000` in your browser

## Project Structure

- `app/Http/Controllers/QuizController.php` - Main quiz logic
- `resources/views/` - Blade templates
- `public/images/` - Villain portraits
- `public/audio/` - Background music

## Adding Villain Images

Place villain portrait images in the `public/images/` directory with the following names:
- vlad.jpg
- rasputin.jpg
- genghis.jpg
- lucrezia.jpg
- attila.jpg

## Adding Background Music

Place your ambient background music file in the `public/audio/` directory as `ambient.mp3`.

## Contributing

Feel free to submit issues and enhancement requests!

## License

This project is open-sourced software licensed under the MIT license.
