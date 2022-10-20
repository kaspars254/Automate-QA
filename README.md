# Automate-QA

## Requiremnts

< PHP version 8.1 and node v16.14.2

## Steps

1. Clone repository using "git clone"

2. Open terminal and write

    2.1. composer require "codeception/codeception" --dev
  
    2.2. php vendor/bin/codecept bootstrap
  
    2.3. php vendor/bin/codecept generate:cest Acceptance First
  
   2.4. composer require --dev codeception/module-webdriver
  
   2.5. npm install selenium-standalone -g
  
    2.6. selenium-standalone install
  
    2.7. selenium-standalone start
  
3. Open split terminal and write - php vendor/bin/codecept run --steps
