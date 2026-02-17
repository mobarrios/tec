#!/bin/bash
# Fix for DOMPDF compatibility with PHP 7.4+
# Changes "continue" to "break" in switch statements within Dompdf.php
# This is necessary because PHP 7.4+ requires explicit control flow in switch statements

DOMPDF_FILE="/var/www/html/vendor/dompdf/dompdf/src/Dompdf.php"

if [ -f "$DOMPDF_FILE" ]; then
    # Create a backup if it doesn't exist
    if [ ! -f "$DOMPDF_FILE.bak" ]; then
        cp "$DOMPDF_FILE" "$DOMPDF_FILE.bak"
    fi
    
    # Replace all continue; with break; in the lines 620-650 range
    # This covers all problematic instances in switch statements
    sed -i '620,650s/continue;/break;/g' "$DOMPDF_FILE"
    
    echo "✓ DOMPDF patch applied successfully"
else
    echo "⚠ Warning: DOMPDF file not found at $DOMPDF_FILE"
fi
