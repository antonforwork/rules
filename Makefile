
list:
	@$(MAKE) -pRrq -f $(lastword $(MAKEFILE_LIST)) : 2>/dev/null | awk -v RS= -F: '{if ($$1 !~ "^[#.]") {print $$1}}' | sort | egrep -v -e '^[^[:alnum:]]' -e '^$@$$'

lint: php-cs-fixer php-stan

php-cs-fixer:
	./vendor/bin/php-cs-fixer fix

php-stan:
	./vendor/bin/phpstan analyse --no-interaction src --level 8
