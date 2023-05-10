#!/bin/bash
DATE=$(date +%Y%m%d)
DB_USER="phpmyadmin"
DB_PASSWORD="1q2w3e4R"
DB_NAME="cementeras"
FTP_SERVER="172.17.41.113"
FTP_USER="elian"
FTP_PASSWORD="Monlau2020"
FTP_PATH="\\DISCOS\Backup"
FILENAME="backup_${DB_NAME}_${DATE}.sql.gz"

mysqldump -u$DB_USER -p$DB_PASSWORD $DB_NAME | gzip > $FILENAME

ftp -n $FTP_SERVER <<END_SCRIPT
quote USER $FTP_USER
quote PASS $FTP_PASSWORD
cd $FTP_PATH
put $FILENAME
quit
END_SCRIPT

rm $FILENAME
