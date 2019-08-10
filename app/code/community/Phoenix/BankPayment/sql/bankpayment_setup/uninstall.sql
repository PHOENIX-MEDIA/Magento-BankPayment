-- add table prefix if you have one
DELETE FROM core_config_data WHERE path like 'bankpayment/%';
DELETE FROM core_config_data WHERE path = 'advanced/modules_disable_output/Phoenix_BankPayment';
DELETE FROM core_resource WHERE code = 'bankpayment_setup';