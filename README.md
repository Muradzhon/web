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

#поднимаем стэк мониторинга
docker swarm init
docker stack deploy -c grafana-docker-stack/docker-compose.yml monitoring

#переходим в папаку стэка веб-сервера и запускаем докеры
cd websrv/
docker-compose up -d

#на хосте, где будем тестировать добавляем в файл hosts записи
<ip> site1.net
<ip> site2.com

#проверяем работу сайта, ввобдим в браузере
http://site1.net
http://site2.com
