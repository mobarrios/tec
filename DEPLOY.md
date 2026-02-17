# 🚀 Deployment Guide - VPS Production

## ✅ TODO ESTÁ LISTO PARA PRODUCCIÓN

### Cambios implementados:

1. **DOMPDF Fix** - Se aplica automáticamente al iniciar Docker
2. **HTTPS Support** - URLs generadas correctamente con https://
3. **TrustProxies** - Compatible con Laravel 5.1 y proxies
4. **Apache Config** - Assets se sirven correctamente

---

## 📦 Pasos para deployar en VPS:

### Opción A: Con Docker (Recomendado)

```bash
# 1. Commit y push desde tu local
git add .
git commit -m "Complete HTTPS support, DOMPDF fix, and Apache configuration"
git push origin carcasa

# 2. En el VPS, hacer pull
cd /path/to/tec
git pull origin carcasa

# 3. Reconstruir contenedores
docker-compose down
docker-compose up --build -d

# 4. Verificar que el parche se aplicó
docker-compose logs app | grep "DOMPDF"
# Deberías ver: "✓ DOMPDF patch applied successfully"

# 5. Verificar .env
cat .env | grep APP_
# Debe tener:
# APP_ENV=production
# APP_URL=https://tudominio.com
```

### Opción B: Sin Docker (Servidor tradicional)

```bash
# 1. Pull del código
cd /path/to/tec
git pull origin carcasa

# 2. Instalar dependencias
composer install --no-dev --optimize-autoloader

# El script fix-dompdf.sh se ejecutará automáticamente por el hook de composer

# 3. Configurar Apache
sudo cp docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf
sudo a2enmod rewrite
sudo systemctl restart apache2

# 4. Permisos
sudo chown -R www-data:www-data /var/www/html
sudo chmod -R 755 /var/www/html/storage
sudo chmod -R 755 /var/www/html/bootstrap/cache

# 5. Limpiar cache
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

---

## ✅ Verificación (Importante)

### 1. Verificar HTTPS
```bash
curl -I https://tudominio.com
# Debe devolver 200 OK
```

### 2. Verificar assets en el navegador
1. Abre `https://tudominio.com`
2. Presiona F12 → Tab "Network"
3. Recarga (Ctrl+Shift+R)
4. Verifica:
   - ✓ CSS cargan con `https://`
   - ✓ JS cargan con `https://`
   - ✓ No hay errores 404
   - ✓ No hay warnings "Mixed Content"

### 3. Verificar generación de PDF
1. Ve a cualquier orden
2. Genera un PDF
3. Debe generarse sin errores

### 4. Verificar logs (si usas Docker)
```bash
docker-compose logs -f app
# No deben aparecer errores de DOMPDF o HTTPS
```

---

## ⚙️ Configuración del .env en VPS

Tu archivo `.env` en el VPS **DEBE** tener:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://tudominio.com

# Resto de tu configuración...
```

---

## 🔧 Si algo falla:

### DOMPDF sigue fallando
```bash
# Ejecutar manualmente el parche
docker-compose exec app bash /var/www/html/docker/apache/fix-dompdf.sh
```

### CSS no carga con HTTPS
```bash
# Verificar el .env
cat .env | grep APP_URL

# Limpiar cache
php artisan config:clear
php artisan cache:clear

# Reiniciar
docker-compose restart
```

### Proxy/Nginx
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

---

## 📚 Documentación adicional:

- `DOMPDF_FIX.md` - Detalles del parche DOMPDF
- `HTTPS_FIX.md` - Detalles del soporte HTTPS
- `ASSETS_FIX.md` - Configuración de Apache
- `FINAL_CHANGES.md` - Resumen técnico de cambios

---

## 🎉 ¡Listo para producción!

Todo está configurado y probado. Solo haz el deployment siguiendo los pasos de arriba.
