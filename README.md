# PHP MVC Framework

A lightweight, modern PHP MVC (Model-View-Controller) framework with routing, middleware support, and dual database capabilities (MySQL and JSON).

## 🚀 Features

- **Modern MVC Architecture**: Clean separation of concerns with Models, Views, and Controllers
- **Flexible Routing System**: Support for GET, POST, PUT, DELETE, PATCH, OPTIONS methods with regex pattern matching
- **Middleware Support**: Global and route-specific middleware with browser detection
- **Dual Database Support**: 
  - MySQL database using Medoo ORM
  - JSON file-based database for lightweight applications
- **Environment Configuration**: Dotenv support for secure configuration management
- **IP-based Access Control**: Geographic access restrictions with IP API integration
- **Logging System**: Comprehensive logging for debugging and monitoring
- **Browser Detection**: Built-in browser detection and blocking capabilities
- **Error Handling**: Custom 404 and 405 error pages

## 📁 Project Structure

```
mvc.local/
├── App/
│   ├── Controllers/          # Application controllers
│   ├── Core/                # Core framework components
│   │   ├── Request.php      # HTTP request handling
│   │   └── Routing/         # Routing system
│   ├── Middleware/          # Middleware classes
│   │   └── Contract/        # Middleware interfaces
│   ├── Models/              # Data models
│   │   └── Contracts/       # Model interfaces and base classes
│   ├── Services/            # Business logic services
│   │   ├── IpApi/          # IP geolocation service
│   │   └── Log/            # Logging service
│   └── Utilities/          # Helper utilities
├── Bootstrap/              # Application bootstrap
├── Configs/               # Configuration files
├── Helpers/               # Global helper functions
├── Routes/                # Route definitions
├── Storage/               # Data storage
│   └── JsonDB/           # JSON database files
├── Views/                 # View templates
│   ├── Blocks/           # Access denied pages
│   ├── Errors/           # Error pages
│   └── home/             # Home page views
├── vendor/               # Composer dependencies
├── composer.json         # PHP dependencies
└── index.php            # Application entry point
```

## 🛠 Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd mvc.local
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Configure environment**
   - Copy `.env.example` to `.env` (if available)
   - Configure your database settings:
     ```env
     DB_HOST=localhost
     DB_NAME=your_database
     DB_USER=your_username
     DB_PASS=your_password
     HOST=http://localhost
     ```

4. **Set up web server**
   - Configure your web server to point to the project root
   - Ensure `mod_rewrite` is enabled for clean URLs

## 📖 Usage

### Routing

Define routes in `Routes/web.php`:

```php
<?php

use App\Core\Routing\Route;

// Simple route
Route::GET('/', 'HomeController@index');

// Route with middleware
Route::GET('/admin', 'AdminController@index', ['BlockFireFox']);

// Route with parameters
Route::GET('/user/{id}', 'UserController@show');
```

### Controllers

Create controllers in `App/Controllers/`:

```php
<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        view('home.index');
    }
}
```

### Models

The framework supports two types of models:

#### MySQL Models
```php
<?php

namespace App\Models;

use App\Models\Contracts\MysqlBaseModel;

class Users extends MysqlBaseModel
{
    protected $table = 'users';
    
    // Available methods: create(), find(), get(), getAll(), update(), delete()
}
```

#### JSON Models
```php
<?php

namespace App\Models;

use App\Models\Contracts\JsonBaseModel;

class Users extends JsonBaseModel
{
    protected $table = 'users';
    
    // Same CRUD interface as MySQL models
}
```

### Views

Create views in `Views/` directory:

```php
<!-- Views/home/index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h1>Welcome to MVC Framework</h1>
</body>
</html>
```

### Middleware

Create custom middleware:

```php
<?php

namespace App\Middleware;

use App\Middleware\Contract\MiddlewareInterface;

class CustomMiddleware implements MiddlewareInterface
{
    public function handle()
    {
        // Your middleware logic here
    }
}
```

## 🔧 Configuration

### Global Settings (`Configs/config.php`)

```php
<?php

define("Country", "Iran");
define("CountryCode", "IR");
define("STATUS_LOG_ENGIN", 0);
define("STATUS_IPAPI_ENGIN", 0);
```

### Environment Variables

The framework uses dotenv for environment configuration:

```env
DB_HOST=localhost
DB_NAME=mvc_framework
DB_USER=root
DB_PASS=password
HOST=http://localhost
```

## 🌐 Features in Detail

### Routing System
- **Regex Pattern Matching**: Supports dynamic route parameters
- **HTTP Method Support**: GET, POST, PUT, DELETE, PATCH, OPTIONS
- **Middleware Integration**: Route-specific middleware support
- **Error Handling**: Automatic 404 and 405 error responses

### Database Support
- **MySQL Integration**: Using Medoo ORM for robust database operations
- **JSON Database**: Lightweight file-based database for simple applications
- **Unified Interface**: Same CRUD methods across both database types

### Security Features
- **IP-based Access Control**: Geographic restrictions using IP API
- **Browser Detection**: Block specific browsers (Firefox, Edge)
- **Request Validation**: Built-in input validation and sanitization

### Logging
- **Fail Logs**: Automatic logging of IP API failures
- **Configurable**: Enable/disable logging through configuration
- **File-based**: Logs stored in `App/Services/Log/logs/`

## 📦 Dependencies

- **vlucas/phpdotenv**: Environment variable management
- **hisorange/browser-detect**: Browser detection
- **catfan/medoo**: MySQL database ORM

## 🚀 Getting Started

1. **Create your first route**:
   ```php
   // Routes/web.php
   Route::GET('/', 'HomeController@index');
   ```

2. **Create a controller**:
   ```php
   // App/Controllers/HomeController.php
   namespace App\Controllers;
   
   class HomeController
   {
       public function index()
       {
           view('home.index');
       }
   }
   ```

3. **Create a view**:
   ```php
   <!-- Views/home/index.php -->
   <h1>Welcome to MVC Framework!</h1>
   ```

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Commit your changes
4. Push to the branch
5. Create a Pull Request

## 📄 License

This project is open source and available under the [MIT License](LICENSE).

## 👨‍💻 Author

**Abbas Chitsazi**
- Email: abaschitsazii@gmail.com

---

Built with ❤️ using modern PHP practices and MVC architecture. 