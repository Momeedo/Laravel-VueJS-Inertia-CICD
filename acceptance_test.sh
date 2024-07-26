#!/bin/bash
res=$(curl -s -w "%{http_code}" $(docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' laravel8cd)/sum/20/2)
body=${res::-3}
if [ $body != "22" ]; then
 echo "Error"
fi