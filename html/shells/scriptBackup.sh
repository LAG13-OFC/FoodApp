#!/bin/bash

source /home/lag13-ofc/TODO/APP/foodAppFinal/FoodApp/.env

TIMESTAMP=$(date +"%Y-%m-%d_%H:%M:%S")
BACKUP_FILE="$BACKUP_DIR/$DB_NAME$TIMESTAMP.sql"


docker exec $CONTAINER_NAME mysqldump -u root -p"$MYSQL_ROOT_PASSWORD" $DB_NAME | sed 's/\t/-/g' > $BACKUP_FILE


gzip $BACKUP_FILE

# Guardar una copia local del backup en otra ruta (opcional)
#cp $BACKUP_FILE.gz $LOCAL_BACKUP_DIR

# Convertir la cadena de servidores remotos en un array
IFS=',' read -ra REMOTE_SERVERS_ARRAY <<< "$REMOTE_SERVERS"

# Iterar sobre cada servidor remoto
for SERVER in "${REMOTE_SERVERS_ARRAY[@]}"
do
    # Extraer usuario, servidor y ruta desde la cadena REMOTE_SERVERS
    IFS=':' read -r USER_SERVER REMOTE_PATH <<< "$SERVER"
    USER=$(echo "$USER_SERVER" | cut -d@ -f1)
    SERVER=$(echo "$USER_SERVER" | cut -d@ -f2)

    # Transferir el archivo de respaldo al servidor remoto usando scp con autenticación mediante clave SSH
    scp -i "$SSH_PRIVATE_KEY" "$BACKUP_FILE.gz" "$USER@$SERVER:$REMOTE_PATH"
    
    # Verificar el estado de la transferencia
    if [ $? -eq 0 ]; then
        echo "$(date +"%Y-%m-%d %H:%M:%S"): Archivo transferido con éxito a $SERVER"
    else
        echo "$(date +"%Y-%m-%d %H:%M:%S"): Error al transferir archivo a $SERVER. Código de salida: $?"
    fi
done
