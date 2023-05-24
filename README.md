﻿
# academico

  

## Testado com Xampp -
Verificar o status do apache2 e do mysql na sua máquina. Você deve parar os serviços para ativar pelo xampp.

    sudo systemctl status mysql

    sudo systemctl status apache2

    sudo systemctl stop mysql

    sudo systemctl stop apache2

  

Iniciar o Painel de Controle do Xampp no Linux : Ambiente Gráfico : GUI

    sudo /opt/lampp/manager-linux-x64.run

Também é possivel iniciar os componentes via terminal com os comandos:
Iniciar o XAMP:

    sudo /opt/lampp/lampp start

Parar o XAMP:

    sudo /opt/lampp/lampp stop

Reiniciando o XAMPP:

    sudo /opt/lampp/xampp restart

Iniciar apenas o Apache:

    sudo /opt/lampp/xampp startapache

Parar apenas o Apache:

    sudo /opt/lampp/xampp stopapache

Para iniciar apenas o servidor de banco de dados MySQL:

    sudo /opt/lampp/xampp startmysql

Para parar apenas o servidor de banco de dados MySQL:

    sudo /opt/lampp/xampp stopmysql

Entrar no banco:

    sudo /opt/lampp/bin/mysql -u root -p

Para iniciar apenas o servidor FTP Proftpd

    sudo /opt/lampp/xampp startftp

Para parar apenas o servidor FTP Proftpd:

    sudo /opt/lampp/xampp stopftp

Acessando a seçao de Ajuda do XAMPP Linux:

    s udo /opt/lampp/xampp –help
