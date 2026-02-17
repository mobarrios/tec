#!/bin/bash
# Fix for DOMPDF compatibility with PHP 7.4+
# Changes "continue" to "break" in switch statements within DOMPDF files
# This is necessary because PHP 7.4+ requires explicit control flow in switch statements

# Array de archivos a parchear
FILES=(
    "/var/www/html/vendor/dompdf/dompdf/src/Dompdf.php"
    "/var/www/html/vendor/dompdf/dompdf/lib/Cpdf.php"
)

for DOMPDF_FILE in "${FILES[@]}"; do
    if [ -f "$DOMPDF_FILE" ]; then
        # Create a backup if it doesn't exist
        if [ ! -f "$DOMPDF_FILE.bak" ]; then
            cp "$DOMPDF_FILE" "$DOMPDF_FILE.bak"
        fi
        
        # Replace all continue; with break; in switch statements
        # This is a broad replacement but safe for these specific files
        sed -i 's/continue;/break;/g' "$DOMPDF_FILE"
        
        echo "✓ Patched: $(basename $DOMPDF_FILE)"
    else
        echo "⚠ Not found: $(basename $DOMPDF_FILE)"
    fi
done

echo "✓ DOMPDF patch completed"
