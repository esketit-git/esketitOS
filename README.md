# EsketitOS

  - many coins, one interface... a cryptocurrency operating system. 

this release is not yet functional, it has no rpc node support programmed. Support for Bitcoin and Cardano is being programmed.

EsketitOS uses its own custom HTTP server and its own QT Window Container that loads the local files or web files. The HTTP server allows worldwide access from any device while the QT window container provides a specialized experience. You can also opt for your own stack and standard browser access. EsketitOS is designed for personal use and to be securely networked globally as an enterprise solution over HTTPS.

  -sys directory goes outside of (htdocs) web root, it holds the databases and the RPC configuration.
  
  -terminals directory, index.php is the main program, all links run off index.php. (QT Window Container, executes the HTTP server and is hardcoded to search for /terminals/index.php file on startup). The various nodes are not embedded, instead are monitored by EsketitOS, they can be started, stopped, monitored (and email sent to admin), commanded and controlled and so on.
  
  -all other programs go into web root alongside terminals not in it and are hyperlinked and accessed from the terminals/index.php
  Every folder outside of terminals is scanned as an app in EsektitOS and appears in the right pane. These folders can be worked on independently as their own project. An app in EsketitOS is a webscript in its own folder with its own icon. This plugin architecture allows the applications identity to evolve and change relative to its application.

The QT web container

https://github.com/esketit-git/Qt-Middleware-Container

The custom HTTP Server built especially to house EsketitOS

https://github.com/esketit-git/meHs

Optionally at some stage aSSL is also utilized to provide some encryption benefit. With an enterprise stack, SSL certs would be used.

https://github.com/esketit-git/aSSL

Also utilizes Bitcoin RPC Wrapper which goes into the terminals/php folder but we are preferring to work on Sergio Vaccaro <sergio@inservibile.org> jsonRPCClient.php as it is a case of better error handling and direct commands, less overhead as we proceed rather than OOP.

https://github.com/briababby/bitcoin_rpc_wrapper

EsketitOS, an operating system for cryptocurrency, multi-coin wallet, HTTP networking, token store and more...

Esketit is pronounced, skedet or sshkedit, don't think about it, sshkedit. It is a play on the word "just get it" in reference 
to buying something.

EsketitOS aims to be an operating system for cryptocurrencies. It is currently in development, pre-release. Version 0.9 to be compatible with Bitcoin and 
Ethereum in a subsequent version. You cannot use it yet, we are still programming it.

EsketitOS is open source.

EsketitOS is multi-user. It allows mutiple accounts.

EsketitOS is networked, over HTTP users wallets are potentially accessible world wide.

EsketitOS has a token store, similar to an app store or play store, developers can add their own applications and extend the functionaility of EsketitOS.

Esketit is not a cryptocurrency or a token.

For developers, EsketitOS aims to be easy to develop for, its is written in web scripting languages, runs on a web server and communicates with core over remote procedure calls (RPC). Here are some screenshots.

<img src="/ss/ss1.png" width=49% height=49% alt="Login" title="login world wide"> <img src="/ss/ss2.png" width=49% height=49% alt="Signup" title="sign up new user">
<img src="/ss/ss3.png" width=49% height=49% alt="Bitcoin Wallet" title="clone of bitcoin wallet"> <img src="/ss/ss4.png" width=49% height=49% alt="Token Store" title="develop your own apps and add them to esketitOS">
<img src="/ss/ss5.png" width=49% height=49% alt="Send" title="send coin"> <img src="/ss/ss6.png" width=49% height=49% alt="News" title="a news app">

<img src="/ss/ss.png" width=49% height=49% alt="in its own window" title="in its own window">

https://esketit.org/

Copyright &copy; 2021 esketit.org
