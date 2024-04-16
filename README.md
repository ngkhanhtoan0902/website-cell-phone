## Xampp
Run the following commands:
1/ composer install
2/ php artisan migrate
3/ php artisan storage:link
4/ npm install
5/ npm run dev


## Docker
1/ Create file php-fpm.log in ./docker/php-fpm/php-fpm.log
2/ Docker build and run


## SSO
1/ Migrate 
2/ add main app URL to .env
MAIN_APP_URL=https://app.writerzen.biz
MIX_MAIN_APP_URL=https://app.writerzen.biz

3/ add GTM tracking to .env

GTM_ID="GTM-NQ5D824"
GTM_AUTH="l-83UIEet5q5_5XJ-LbGiQ"
GTM_PREVIEW="env-5"
MIX_GTM_ID="GTM-NQ5D824"
MIX_GTM_AUTH="l-83UIEet5q5_5XJ-LbGiQ"
MIX_GTM_PREVIEW="env-5"