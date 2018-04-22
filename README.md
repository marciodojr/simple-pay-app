# Simple Pay App

## Como Instalar

Crie o arquivo de configurações config/config.local.php e defina os valores adequados. Ex:

```php
<?php

putenv('DB_DRIVER=pdo_mysql');
putenv('DB_HOST=localhost');
putenv('DB_PORT=3306');
putenv('DB_NAME=simple_pay_db');
putenv('DB_USER=root');
putenv('DB_PASS=root');
```

Crie o banco de dados com o nome dado em DB_NAME e rode o comando
```
php vendor/bin/doctrine orm:schema-tool:update
```

# Todo

> Criar pagamento
  > Listar pagamento específico e suas situações
    > Listar reembolsos
        > Listar reembolsos específicos e suas situações
> Integrar biblioteca SimplePay