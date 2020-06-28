Jika terjadi Error pada appsa maka jalankan di phpmyadmin/mysql : 
SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));


