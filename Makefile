docker-up:
	docker-compose up -d

docker-down:
	docker-compose down

docker-build:
	docker-compose up --build -d

test:
	docker exec ads_php-fpm_1 vendor/bin/phpunit --colors=always

assets-install:
	docker exec ads_node_1 npm install

assets-dev:
	docker exec ads_node_1 npm run dev

assets-watch:
	docker exec ads_node_1 npm run watch

perm:
	if [ -d "node_modules" ]; then sudo chown ${USER}:${USER} node_modules -R; fi
	if [ -d "public/build" ]; then sudo chown ${USER}:${USER} public/build -R; fi
