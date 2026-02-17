# DOMPDF PHP 7.4+ Compatibility Fix

Este script aplica un parche a DOMPDF para hacerlo compatible con PHP 7.4+

## Problema Original
DOMPDF versión 0.7.x falla en PHP 7.4+ debido a:
```
ErrorException: "continue" targeting switch is equivalent to "break". Did you mean to use "continue 2"?
```

Este error aparece en múltiples archivos:
- `vendor/dompdf/dompdf/src/Dompdf.php` (línea ~645)
- `vendor/dompdf/dompdf/lib/Cpdf.php` (línea ~454)

## Solución
El script reemplaza **todos** los `continue;` con `break;` en estos archivos específicos.

## Archivos parcheados
1. `/var/www/html/vendor/dompdf/dompdf/src/Dompdf.php`
2. `/var/www/html/vendor/dompdf/dompdf/lib/Cpdf.php`

## Cómo funciona
1. Se ejecuta automáticamente después de `composer install/update` (hook en composer.json)
2. Genera un backup del archivo original (.bak)
3. Aplica sed para reemplazar el patrón problemático

## En tu VPS
Cuando hagas `composer install` en producción, el parche se aplicará automáticamente.
No necesitas hacer nada adicional.
