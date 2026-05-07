#!/bin/bash
set -e

# Remove stale PID and socket files
rm -f /tmp/apache.pid /tmp/php-fpm.pid /tmp/php-fpm.sock

# Start PHP-FPM in background
php-fpm --fpm-config "$(pwd)/php-fpm.conf" &

# Wait for PHP-FPM socket to be ready
for i in $(seq 1 10); do
    [ -S /tmp/php-fpm.sock ] && break
    echo "Aguardando PHP-FPM iniciar... ($i)"
    sleep 0.5
done

echo "PHP-FPM iniciado com sucesso."
echo "Iniciando Apache na porta 5000..."

# Start Apache in a new session to avoid receiving terminal signals (SIGWINCH)
setsid httpd -f "$(pwd)/apache.conf" -DFOREGROUND &
APACHE_PID=$!

# Keep script alive while Apache runs
wait $APACHE_PID
