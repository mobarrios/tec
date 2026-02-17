# ✅ Checklist de Deployment

## Pre-deployment (Local)
- [x] DOMPDF patch implementado y funcionando
- [x] HTTPS support configurado en AppServiceProvider
- [x] TrustProxies middleware creado y registrado
- [x] Apache configurado para servir assets
- [x] Docker entrypoint configurado para aplicar parches automáticamente
- [x] Contenedor local funcionando correctamente

## Deployment a VPS

### Paso 1: Git
- [ ] `git add .`
- [ ] `git commit -m "Complete HTTPS support, DOMPDF fix, and Apache configuration"`
- [ ] `git push origin carcasa`

### Paso 2: En el VPS
- [ ] `cd /path/to/tec`
- [ ] `git pull origin carcasa`

### Paso 3: Verificar .env
- [ ] Abrir `.env` con `nano .env`
- [ ] Verificar `APP_ENV=production`
- [ ] Verificar `APP_URL=https://tudominio.com`
- [ ] Guardar y cerrar

### Paso 4: Deployment
**Si usas Docker:**
- [ ] `docker-compose down`
- [ ] `docker-compose up --build -d`
- [ ] `docker-compose logs app | grep "DOMPDF"` → Debe mostrar "✓ DOMPDF patch applied successfully"

**Si NO usas Docker:**
- [ ] `composer install --no-dev --optimize-autoloader`
- [ ] `sudo cp docker/apache/000-default.conf /etc/apache2/sites-available/`
- [ ] `sudo a2enmod rewrite`
- [ ] `sudo systemctl restart apache2`
- [ ] `php artisan config:clear`
- [ ] `php artisan cache:clear`

### Paso 5: Verificación en Navegador
- [ ] Abrir `https://tudominio.com`
- [ ] Presionar F12 → Network
- [ ] Recargar página (Ctrl+Shift+R)
- [ ] Verificar que CSS carguen con `https://`
- [ ] Verificar que JS carguen con `https://`
- [ ] NO debe haber errores 404
- [ ] NO debe haber warnings "Mixed Content"

### Paso 6: Verificar PDF
- [ ] Ir a una orden
- [ ] Generar PDF
- [ ] El PDF debe generarse sin errores

### Paso 7: Verificar Logs
**Si usas Docker:**
- [ ] `docker-compose logs -f app`
- [ ] NO deben aparecer errores de DOMPDF
- [ ] NO deben aparecer errores de HTTPS

**Si NO usas Docker:**
- [ ] `tail -f /var/log/apache2/error.log`
- [ ] NO deben aparecer errores

## ✅ Deployment Exitoso

Si todos los checkboxes están marcados, el deployment fue exitoso. 🎉

## 🚨 Si algo falla

### DOMPDF error persiste
```bash
docker-compose exec app bash /var/www/html/docker/apache/fix-dompdf.sh
docker-compose restart
```

### CSS no cargan
```bash
php artisan config:clear
php artisan cache:clear
docker-compose restart
```

### Permisos en servidor tradicional
```bash
sudo chown -R www-data:www-data /var/www/html
sudo chmod -R 755 /var/www/html/storage
sudo chmod -R 755 /var/www/html/bootstrap/cache
```

## 📞 Contacto/Soporte
- Ver `DEPLOY.md` para instrucciones detalladas
- Ver `HTTPS_FIX.md` para troubleshooting HTTPS
- Ver `DOMPDF_FIX.md` para troubleshooting PDF
