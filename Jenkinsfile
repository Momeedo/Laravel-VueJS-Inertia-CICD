pipeline {
 agent any
 stages {
        stage("Build") {
            /*
            environment {
                DB_HOST = credentials("laravel-host")
                DB_DATABASE = credentials("laravel-database")
                DB_USERNAME = credentials("laravel-user")
                DB_PASSWORD = credentials("laravel-password")
            }
            */
            steps {
                sh 'php --version'
                sh 'composer update'
                sh 'composer install'
                sh 'composer --version'
                sh 'cp .env.example .env'
                //sh 'echo DB_HOST=${DB_HOST} >> .env'
                //sh 'echo DB_USERNAME=${DB_USERNAME} >> .env'
                //sh 'echo DB_DATABASE=${DB_DATABASE} >> .env'
                //sh 'echo DB_PASSWORD=${DB_PASSWORD} >> .env'
                sh 'php artisan key:generate'
                //sh 'cp .env .env.testing'
                sh 'sqlite3 database/database.sqlite'
                sh 'php artisan migrate'
                sh 'npm install'
                sh 'npm run build' 
            }
        }
        stage("Unit test") {
            steps {
                sh 'php artisan test'
            }
        }
        stage("Code coverage") {
            steps {
                sh "php -d xdebug.mode=coverage vendor/bin/phpunit --coverage-html 'reports/coverage'"
            }
        }
        stage("Static code analysis larastan/phpcs") {
            steps {
                //Commented due to false positive
                //sh "vendor/bin/phpstan analyse"
                sh "vendor/bin/phpcs"
            }
        }
  }
}