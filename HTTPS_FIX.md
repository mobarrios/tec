# Solución: Estilos no cargan con HTTPS

## Problema
Los CSS, JS e imágenes no se cargan cuando accedes a tu aplicación vía HTTPS porque Laravel genera las URLs con `http://` en lugar de `https://`.

## Causa
Laravel no detecta automáticamente que está detrás de un proxy HTTPS (como Nginx o un Load Balancer) y genera URLs incorrectas:
- Genera: `http://tudominio.com/css/style.css`
- Debería generar: `https://tudominio.com/css/style.css`

## Solución Implementada

### 1. AppServiceProvider actualizado
Se modificó `/app/Providers/AppServiceProvider.php` para forzar el esquema HTTPS en producción:

```php
public function boot()
{
    // Forzar HTTPS en producción
    if (config('app.env') === 'production') {
        URL::forceScheme('https');
    }
}
```

### 2. Configuración del .env en VPS

Asegúrate de tener estas variables en tu archivo `.env` en el VPS:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://tudominio.com
```

### 3. Si usas un Proxy/Load Balancer (Nginx, Cloudflare, etc.)

Si tu aplicación está detrás de un proxy, también necesitas confiar en los headers del proxy.

El middleware `/app/Http/Middleware/TrustProxies.php` ya fue creado con esta configuración para Laravel 5.1:

```php
<?php

namespace App\Http\Middleware;

use Closure;

class TrustProxies
{
    public function handle($request, Closure $next)
    {
        // Confiar en el proxy actual
        $request->setTrustedProxies(['127.0.0.1', $request->getClientIp()]);
        
        return $next($request);
    }
}
```

Y está registrado en `/app/Http/Kernel.php`:

```php
protected $middleware = [
    \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
    \App\Http\Middleware\TrustProxies::class,  // <-- Agregado
    // ...
];
```

## Alternativa: Forzar HTTPS siempre

Si siempre usas HTTPS (recomendado), cambia el `AppServiceProvider.php`:

```php
public function boot()
{
    // Forzar HTTPS siempre
    URL::forceScheme('https');
}
```

## Pasos para implementar en VPS

1. **Hacer commit y push de los cambios:**
```bash
git add app/Providers/AppServiceProvider.php
git commit -m "Force HTTPS schema for assets in production"
git push origin carcasa
```

2. **En el VPS, hacer pull y actualizar:**
```bash
cd /path/to/tec
git pull origin carcasa

# Si usas Docker:
docker-compose down
docker-compose up -d

# Si es servidor tradicional:
php artisan config:clear
php artisan cache:clear
```

3. **Verificar el .env en VPS:**
```bash
nano .env
# Asegurar que tenga:
# APP_ENV=production
# APP_URL=https://tudominio.com
```

4. **Limpiar cache de configuración:**
```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

## Verificación

1. Accede a tu sitio con HTTPS
2. Abre la consola del navegador (F12 → Network)
3. Verifica que las URLs de los assets empiecen con `https://`
4. No deberían aparecer errores de "Mixed Content"

## Problemas comunes

### Mixed Content Blocked
Si ves este error, significa que algunos assets todavía usan HTTP. Verifica:
- Que tu `.env` tenga `APP_URL=https://...`
- Que hayas limpiado el cache: `php artisan config:clear`
- Que no tengas URLs hardcodeadas con `http://` en tus vistas

### Headers X-Forwarded-Proto
Si usas Nginx como proxy reverso, asegúrate de tener:

```nginx
location / {
    proxy_pass http://localhost:8080;
    proxy_set_header Host $host;
    proxy_set_header X-Real-IP $remote_addr;
    proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
    proxy_set_header X-Forwarded-Proto $scheme;
}
```

## Archivos modificados
- `app/Providers/AppServiceProvider.php` - MODIFICADO (añadido forceScheme)
