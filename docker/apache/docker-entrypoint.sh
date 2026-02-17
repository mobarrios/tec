#!/bin/bash
set -e

# Esperar a que Apache inicie en background
apache2-foreground &
APACHE_PID=$!

# Dar tiempo para que los volúmenes se monten
sleep 2

# Aplicar parche a DOMPDF usando el script
if [ -f /var/www/html/docker/apache/fix-dompdf.sh ]; then
    echo "Applying DOMPDF patches..."
    bash /var/www/html/docker/apache/fix-dompdf.sh
else
    # Fallback: aplicar parche directamente
    echo "Applying DOMPDF patch (fallback)..."
    
    FILES=(
        "/var/www/html/vendor/dompdf/dompdf/src/Dompdf.php"
        "/var/www/html/vendor/dompdf/dompdf/lib/Cpdf.php"
    )
    
    for FILE in "${FILES[@]}"; do
        if [ -f "$FILE" ]; then
            [ ! -f "$FILE.bak" ] && cp "$FILE" "$FILE.bak"
            sed -i 's/continue;/break;/g' "$FILE"
            echo "✓ Patched: $(basename $FILE)"
        fi
    done
fi

# Esperar a que Apache termine
wait $APACHE_PID
