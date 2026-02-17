#!/bin/bash
# Fix for DOMPDF compatibility with PHP 7.4+
# Changes "continue" to "break" in switch statements within Dompdf.php
# This is necessary because PHP 7.4+ requires explicit control flow in switch statements

DOMPDF_FILE="vendor/dompdf/dompdf/src/Dompdf.php"

if [ -f "$DOMPDF_FILE" ]; then
    # Create a backup
    cp "$DOMPDF_FILE" "$DOMPDF_FILE.bak"
    
    # Use a more precise sed command to replace only in the specific context
    # Find the pattern with "continue;" that targets switch and replace it with "break;"
    sed -i 's/\(.*\)continue;\(.*\/\/.*Skip this css file\.\)/\1break;\2/g' "$DOMPDF_FILE"
    
    # Also handle the general case around lines 620-630
    sed -i '620,630s/continue;$/break;/g' "$DOMPDF_FILE"
    
    echo "✓ DOMPDF patch applied successfully"
else
    echo "⚠ Warning: DOMPDF file not found at $DOMPDF_FILE"
    echo "  This might be expected if running outside of the vendor directory context."
fi
