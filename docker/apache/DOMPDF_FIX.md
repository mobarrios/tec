# DOMPDF PHP 7.4+ Compatibility Fix

Este script aplica un parche a DOMPDF para hacerlo compatible con PHP 7.4+

## Problema Original
DOMPDF versión 0.7.x falla en PHP 7.4+ debido a:
```
ErrorException: "continue" targeting switch is equivalent to "break". Did you mean to use "continue 2"?
```

## Solución
El script reemplaza `continue;` con `break;` en el contexto correcto (líneas 620-630 de Dompdf.php)

## Cómo funciona
1. Se ejecuta automáticamente después de `composer install/update` (hook en composer.json)
2. Genera un backup del archivo original (.bak)
3. Aplica sed para reemplazar el patrón problemático

## En tu VPS
Cuando hagas `composer install` en producción, el parche se aplicará automáticamente.
No necesitas hacer nada adicional.
