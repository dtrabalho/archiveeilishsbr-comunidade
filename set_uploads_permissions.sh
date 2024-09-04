#!/bin/bash

# Diretório alvo
UPLOADS_DIR="uploads"

# Verifica se o diretório existe
if [ -d "$UPLOADS_DIR" ]; then
    # Define as permissões para 755
    chmod 755 "$UPLOADS_DIR"
    echo "Permissões do diretório '$UPLOADS_DIR' definidas para 755."
else
    echo "Erro: Diretório '$UPLOADS_DIR' não encontrado."
    exit 1
fi
