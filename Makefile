ROOT_DIR:=$(shell dirname $(realpath $(firstword $(MAKEFILE_LIST))))

.PHONY: dev
dev: 
	# cp .env.dev .env
	docker run --rm --platform linux/amd64 -d -p 8080:80 --env WEB_DOCUMENT_ROOT=/app/public --name core-api -v $(ROOT_DIR):/app webdevops/php-nginx:8.2-alpine
