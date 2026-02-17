# ✅ Cambios finales - HTTPS Support Fixed

## Problema resuelto
El middleware `TrustProxies` tenía una constante incompatible con Laravel 5.1.

## Solución aplicada

### Archivo: `app/Http/Middleware/TrustProxies.php`

**Versión FINAL (Compatible con Laravel 5.1):**

```php
<?php

namespace App\Http\Middleware;

use Closure;

class TrustProxies
{
    public function handle($request, Closure $next)
    {
        // Para Laravel 5.1, configuramos manualmente los proxies de confianza
        // Esto permite que Laravel detecte correctamente HTTPS detrás de un proxy
        
        // Confiar en el proxy actual
        $request->setTrustedProxies(['127.0.0.1', $request->getClientIp()]);

        return $next($request);
    }
}
```

## Archivos modificados (versión final):

1. ✅ `app/Providers/AppServiceProvider.php` - URL::forceScheme('https') en producción
2. ✅ `app/Http/Middleware/TrustProxies.php` - Middleware compatible con Laravel 5.1
3. ✅ `app/Http/Kernel.php` - TrustProxies registrado
4. ✅ `docker/apache/000-default.conf` - Configuración de Apache para assets
5. ✅ `docker/apache/Dockerfile` - Copia la configuración de Apache
6. ✅ `docker/apache/fix-dompdf.sh` - Script para parchar DOMPDF
7. ✅ `composer.json` - Hooks post-install para aplicar parches

## Para deployar en VPS:

```bash
# 1. Commit y push
git add .
git commit -m "Fix: HTTPS support and TrustProxies compatibility with Laravel 5.1"
git push origin carcasa

# 2. En el VPS
cd /path/to/tec
git pull origin carcasa

# 3. Verificar .env
nano .env
# Debe contener:
# APP_ENV=production
# APP_URL=https://tudominio.com

# 4. Limpiar todos los caches
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# 5. Si usas Docker
docker-compose down
docker-compose up -d

# Si NO usas Docker, reiniciar Apache:
sudo systemctl restart apache2
```

## Verificación final:

1. Accede a `https://tudominio.com`
2. Abre DevTools (F12) → Tab "Network"
3. Recarga la página (Ctrl+Shift+R / Cmd+Shift+R)
4. Verifica:
   - ✓ Todos los assets cargan con `https://`
   - ✓ No hay errores 404
   - ✓ No hay warnings de "Mixed Content"
   - ✓ CSS se aplican correctamente
   - ✓ Los PDFs se generan sin error

## Problemas solucionados:

- ✅ DOMPDF error: "continue targeting switch"
- ✅ CSS no carga en HTTPS
- ✅ TrustProxies error: "HEADER_X_FORWARDED_ALL"
- ✅ Assets no se sirven correctamente
- ✅ Mixed Content warnings

## Todo está listo para producción 🚀
