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
        /*
        stage("Docker build") {
            steps {
                sh "docker rmi danielgara/laravel8cdpart2"
                sh "docker build -t danielgara/laravel8cdpart2 --no-cache ."
            }
        }
        stage("Docker push") {
            environment {
                DOCKER_USERNAME = credentials("docker-user")
                DOCKER_PASSWORD = credentials("docker-password")
            }
            steps {
                sh "docker login --username ${DOCKER_USERNAME} --password ${DOCKER_PASSWORD}"
                sh "docker push danielgara/laravel8cdpart2"
            }
        }
        stage("Deploy to staging") {
            steps {
                sh "docker run -d --rm -p 80:80 --name laravel8cd danielgara/laravel8cd"
            }
        }
        stage("Acceptance tests") {
            steps {
                sleep 20
                sh "chmod +x acceptance_test.sh && ./acceptance_test.sh"
                sh "vendor/bin/codecept run"
            }
            post {
                always {
                    sh "docker stop laravel8cd"
                }
            }
        }
        */
  }
}