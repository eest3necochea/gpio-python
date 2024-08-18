#!/bin/sh

PID=$(ps aux | grep '[t]arget.py' | awk '{print $2}')
if [ -n "$PID" ]; then
    kill $PID
    while kill -0 $PID 2>/dev/null; do
        echo "Esperando a que el proceso con PID $PID se detenga..."
        sleep 1
    done
    echo "Proceso con PID $PID ha sido detenido."
else
    echo "No se encontró ningún proceso con target.py en ejecución."
fi
