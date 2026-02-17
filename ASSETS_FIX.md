# Solución: CSS/Assets no se cargan en VPS

## Problema
Los archivos CSS, JS e imágenes no se están sirviendo correctamente en el VPS.

## Causa
La configuración de Apache no estaba correctamente apuntando a la carpeta `public` como DocumentRoot, lo que causaba que las rutas relativas no funcionaran.

## Solución Implementada

### 1. Nueva configuración de Apache (000-default.conf)
Se creó `/docker/apache/000-default.conf` con:
- DocumentRoot apuntando a `/var/www/html/public`
- Rewrite rules correctas para Laravel
- Permisos específicos para directorios de assets (css/, js/, images/, vendors/, uploads/)
- RewriteEngine desactivado para carpetas estáticas (previene conflictos)

### 2. Cambios en el Dockerfile
El Dockerfile ahora copia la configuración de Apache personalizada:
```dockerfile
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
```

## Cómo implementar en tu VPS

### Opción 1: Con Docker (Recomendado)
```bash
cd /path/to/tec
git pull origin carcasa
docker-compose down
docker-compose up --build -d
```

### Opción 2: Sin Docker (Servidor Tradicional)
Si usas un servidor Apache tradicional en tu VPS:

1. **Copiar la configuración de Apache:**
```bash
sudo cp docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf
```

2. **Cambiar permisos y propietario:**
```bash
sudo chown -R www-data:www-data /var/www/html
sudo chmod -R 755 /var/www/html
sudo chmod -R 755 /var/www/html/public
sudo chmod -R 777 /var/www/html/storage
sudo chmod -R 777 /var/www/html/bootstrap/cache
```

3. **Habilitar mod_rewrite:**
```bash
sudo a2enmod rewrite
sudo systemctl restart apache2
```

4. **Verificar que el DocumentRoot sea correcto:**
```bash
sudo apache2ctl -S | grep DocumentRoot
```

## Verificación
Una vez aplicados los cambios:
1. Accede a tu aplicación en el navegador
2. Abre la consola del navegador (F12)
3. Verifica que no haya errores 404 en los assets
4. Los CSS deben cargar correctamente

## Archivos modificados
- `docker/apache/000-default.conf` - NUEVO
- `docker/apache/Dockerfile` - MODIFICADO (añadido COPY de la conf)
