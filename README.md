# Errands Management System

A modern, full-featured errands management system built with Laravel 11. This application allows customers to post errands and errand runners to apply for and complete tasks, with comprehensive tracking, payment processing, and notification features.

## 🚀 Features

### Core Features
- **User Authentication & Registration**
- **Customer & Runner Profiles**
- **Errand Posting & Management**
- **Application System**
- **Real-time Tracking**
- **Payment Processing**
- **Rating & Review System**
- **Notifications**
- **Analytics Dashboard**
- **RESTful API**

### Advanced Features
- **File Upload (CV/Documents)**
- **Email Notifications**
- **Search & Filtering**
- **Mobile-Responsive Design**
- **Admin Dashboard**
- **Performance Metrics**
- **Payment History**
- **Status Tracking**

## 🛠️ Technology Stack

- **Backend**: Laravel 11, PHP 8.2+
- **Frontend**: Blade Templates, Tailwind CSS, Alpine.js
- **Database**: PostgreSQL (Production), SQLite (Development)
- **Authentication**: Laravel Sanctum
- **File Storage**: Local/Cloud Storage
- **Email**: SMTP/Mailtrap
- **Queue**: Database/Redis
- **Deployment**: Heroku

## 📋 Requirements

- PHP 8.2 or higher
- Composer
- Node.js & NPM
- PostgreSQL (for production)

## 🚀 Installation

### Local Development

1. **Clone the repository**
   ```bash
   git clone https://github.com/your-username/errands-management.git
   cd errands-management
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database setup**
   ```bash
   touch database/database.sqlite
   php artisan migrate --seed
   ```

5. **Build assets**
   ```bash
   npm run build
   ```

6. **Start development server**
   ```bash
   php artisan serve
   ```

### Heroku Deployment

1. **Install Heroku CLI**
   ```bash
   # macOS
   brew tap heroku/brew && brew install heroku
   
   # Windows
   # Download from https://devcenter.heroku.com/articles/heroku-cli
   ```

2. **Login to Heroku**
   ```bash
   heroku login
   ```

3. **Create Heroku app**
   ```bash
   heroku create your-app-name
   ```

4. **Add buildpacks**
   ```bash
   heroku buildpacks:add heroku/php
   heroku buildpacks:add heroku/nodejs
   ```

5. **Add PostgreSQL addon**
   ```bash
   heroku addons:create heroku-postgresql:essential-0
   ```

6. **Set environment variables**
   ```bash
   heroku config:set APP_NAME="Errands Management System"
   heroku config:set APP_ENV=production
   heroku config:set APP_DEBUG=false
   heroku config:set APP_KEY=$(php artisan --no-ansi key:generate --show)
   heroku config:set APP_URL=https://your-app-name.herokuapp.com
   ```

7. **Deploy**
   ```bash
   git add .
   git commit -m "Initial deployment"
   git push heroku main
   ```

8. **Run migrations**
   ```bash
   heroku run php artisan migrate --force
   heroku run php artisan db:seed --force
   ```

## 🔧 Configuration

### Environment Variables

Key environment variables for production:

```env
APP_NAME="Errands Management System"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-app.herokuapp.com

DB_CONNECTION=pgsql
DATABASE_URL=postgres://...

MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host
MAIL_PORT=587
MAIL_USERNAME=your-username
MAIL_PASSWORD=your-password
```

### File Storage

For production, configure cloud storage:

```env
FILESYSTEM_DISK=s3
AWS_ACCESS_KEY_ID=your-key
AWS_SECRET_ACCESS_KEY=your-secret
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=your-bucket
```

## 📱 API Documentation

The application includes a RESTful API for mobile app integration:

### Authentication
- `POST /api/register` - User registration
- `POST /api/login` - User login
- `POST /api/logout` - User logout

### Errands
- `GET /api/errands` - List errands
- `GET /api/errands/{id}` - Get errand details
- `POST /api/errands/{id}/apply` - Apply for errand

### Applications
- `GET /api/my-applications` - User's applications
- `POST /api/applications/{id}/tracking` - Update tracking

## 🎯 Usage

### For Customers
1. Register and create a customer profile
2. Post errands with detailed descriptions
3. Review applications from runners
4. Track errand progress in real-time
5. Make payments upon completion
6. Rate and review runners

### For Runners
1. Register as an errand runner
2. Browse available errands
3. Apply with expected salary and CV
4. Update progress and location
5. Complete errands and receive payments
6. Build reputation through ratings

## 🔒 Security Features

- **CSRF Protection**
- **SQL Injection Prevention**
- **XSS Protection**
- **File Upload Validation**
- **Rate Limiting**
- **Secure Authentication**
- **Authorization Policies**

## 🧪 Testing

Run the test suite:

```bash
php artisan test
```

## 📊 Monitoring

The application includes:
- **Performance Analytics**
- **User Activity Tracking**
- **Payment Monitoring**
- **Error Logging**
- **Health Checks**

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Add tests
5. Submit a pull request

## 📄 License

This project is licensed under the MIT License.

## 🆘 Support

For support and questions:
- Create an issue on GitHub
- Email: support@errandsystem.com
- Documentation: [Wiki](https://github.com/your-username/errands-management/wiki)

## 🚀 Roadmap

- [ ] Mobile app (React Native)
- [ ] Real-time chat
- [ ] Advanced analytics
- [ ] Multi-language support
- [ ] Payment gateway integration
- [ ] GPS tracking
- [ ] Push notifications

---

Built with ❤️ using Laravel