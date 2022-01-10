sudo php bin/magento setup:upgrade
sudo php bin/magento setup:di:compile
sudo php bin/magento setup:static-content:deploy -f
sudo php bin/magento indexer:reindex
sudo php bin/magento cache:clean
sudo php bin/magento cache:flush
sudo chmod -R 777 var pub generated app



sudo php bin/magento setup:upgrade
sudo php bin/magento setup:di:compile
sudo php bin/magento setup:static-content:deploy -f
sudo php bin/magento cache:flush
sudo chmod -R 777 var pub generated app
