.PHONY: test
test:
	vendor/bin/phpunit --color=always --display-all-issues

.PHONY: codestyle
codestyle:
	vendor/bin/php-cs-fixer check

.PHONY: fix-codestyle
fix-codestyle:
	vendor/bin/php-cs-fixer fix

.PHONY: phpstan
phpstan:
	vendor/bin/phpstan --memory-limit=768M
