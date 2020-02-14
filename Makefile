.SILENT:
.PHONY: start stop

GREEN = \033[0;32m
RED = \033[0;31m
NO_COLOR=\033[0m

start:
		echo "${GREEN}[Database] Starting DB...${NO_COLOR}"
		docker run -d --rm \
            --name=afm_db \
            --network=afm-net \
            -e MYSQL_USER=root \
            -e MYSQL_ROOT_PASSWORD=kUJdfjkhKUYkjbKJGJBKDSFQD547521 \
            -e MYSQL_DATABASE=afm \
            -p 3222:3306 \
            -v afm_db_volume:/var/lib/mysql \
            mysql:5.7


stop:
		echo "${GREEN}[Database] Stopping DB...${NO_COLOR}"
		docker stop afm_db

