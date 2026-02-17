#!/bin/bash
set -e

# Aplicar parche a DOMPDF si existe
if [ -f /var/www/html/docker/apache/fix-dompdf.sh ]; then
    echo "Applying DOMPDF patch..."
    bash /var/www/html/docker/apache/fix-dompdf.sh
fi

# Ejecutar el comando original de apache
exec apache2-foreground
