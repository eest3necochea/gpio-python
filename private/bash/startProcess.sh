#!/bin/sh

# Nombre del archivo de bloqueo
LOCKFILE="/home/dardo/target_py.lock"

# Función para limpiar el archivo de bloqueo al finalizar el script
cleanup() {
    rm -f "$LOCKFILE"
    exit
}

# Trap para asegurar que el archivo de bloqueo se elimina al finalizar el script
trap cleanup EXIT

# Verifica si el archivo de bloqueo existe
if [ -e "$LOCKFILE" ]; then
    echo "El proceso target.py ya está en ejecución."
    exit 1
fi

# Crea el archivo de bloqueo
touch "$LOCKFILE"

# Ejecuta el proceso target.py
python3 target.py

# Elimina el archivo de bloqueo al finalizar el proceso
cleanup
