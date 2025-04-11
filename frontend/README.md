<p>Разрабатывалось на node version 14.19.3 npm version: 6.14.17</p>
<h2>Запуск</h2>
<p>В файле /.env указать урл бэкенда(Laravel папкой выше) и любой свободный порт сервера на котором будет запускаться приложение. Запуск приложения на отдельном порте нужен для работы SSR</p>
<p>В файле /src/shared/env.js также указать в соответствующих полях урл бэкенда со слэшем и без</p>
<p>Запустить npm i для скачивания модулей, после npm run build</p>
<p>Создастся папка dist, в ней будет лежать server.js Файл необходимо запустить на сервере. Я использую pm2, вот документация https://nodejsdev.ru/doc/pm2/ . Команда запуска: pm2 start dist/server.js --name=irs-server</p>
<h3>Пример конфигурации сайта</h3>
<p>Сайт необходимо настроить так чтобы он брал контент с порта запущенного pm2. Еще нужно указать входную папку с бэкенда для статических файлов по урлу начинающихся со /storage/. Порт указать что был в /.env</p>
<pre>

server {
  listen 80;

  server_name irs.bulochkin.site;

  location /.well-known {
    root /var/www/html;
  }

  location / {
    return 301 https://$host$request_uri;
  }
}
server {
  listen 443 ssl;
  listen [::]:443 ssl;

  server_name irs.bulochkin.site;

  ssl_certificate /etc/letsencrypt/live/irs.bulochkin.site/fullchain.pem;
  ssl_certificate_key /etc/letsencrypt/live/irs.bulochkin.site/privkey.pem;
  ssl_trusted_certificate /etc/letsencrypt/live/irs.bulochkin.site/chain.pem;

  root /var/www/irs.bulochkin.site/frontend/dist/;

  index index.html index.htm;


  location ~* ^\/storage\/.+\.(png|jpeg|jpg|svg|pdf|gif)$ {
      root /var/www/irs.bulochkin.site/backend/public; 
  }  


  location /.well-known {
    root /var/www/html;
  }

  location ~* ^.+\.(css|js|png|jpeg|jpg|svg)$ {
    #  root /var/www/irs.bulochkin.site/frontend/build
      expires modified +1d;
  }  

  location ~* ^.+\.(woff2)$ {
      # root /var/www/site
      expires max;
  }

  location / {    

   proxy_set_header Upgrade $http_upgrade;
   proxy_set_header Connection 'upgrade';
   proxy_set_header Host $host;
   proxy_set_header X-Real-IP $remote_addr;
   proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
   proxy_set_header X-Forwarded-Proto $scheme;
   proxy_pass   http://localhost:666;

  } 

}

</pre>