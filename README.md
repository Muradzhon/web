Установка

#заходим по root

su -

#ставим необходимые программы

apt update

apt install -y docker-compose

apt install -y git

#копируем папку с проектом из GIT

git clone https://github.com/Muradzhon/web.git

#переход в скачанную папку проекта 

cd web/

#переходим в папаку стэка веб-сервера и запускаем докеры

cd websrv/

docker-compose up -d

#на хосте, где будем тестировать добавляем в файл hosts записи

<ip> site1.net
  
<ip> site2.com

#проверяем работу сайта, ввобдим в браузере
  
http://site1.net
  
http://site2.com

  
#устнавливаем node-exporter на хост
  
wget https://github.com/prometheus/node_exporter/releases/download/v1.5.0/node_exporter-1.5.0.linux-amd64.tar.gz
  
tar xvfz node_exporter-1.5.0.linux-amd64.tar.gz

 cd node_exporter-1.5.0.linux-amd64/
  
#созадем сервис node-exporter

  cp node_exporter /usr/local/bin
  
 #добавляем запись в конфиг сервиса node_exporter
  
tee /etc/systemd/system/node_exporter.service <<EOF
  
[Unit]
  
Description=Node Exporter
  
Wants=network-online.target
  
After=network-online.target

[Service]
  
User=root
  
ExecStart=/usr/local/bin/node_exporter

[Install]
  
WantedBy=default.target
  
EOF

  
#запуск процесса node_exporter
  
systemctl daemon-reload
  
systemctl start node_exporter
  
systemctl enable node_exporter
  
  
#проверяем, что сервис node-exporter активен 
  
  systemctl start node_exporter.service
  
#переходим в папку "promgraph" и запускаем контейнеры связки
  
 docker-composer up -d
