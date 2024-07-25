pipeline {
 agent any
 stages {
        stage("Build") {
            steps {
                sh 'php --version'
                sh 'composer update'
                sh 'composer install'
                sh 'composer --version'
                sh 'cp .env.example .env'
                sh 'php artisan key:generate'
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
  }
}